<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index(Request $request) {
        $search = $request->search ?? null;

        $users = User::with('pharmacy', 'roles')
            ->when($search, function($query) use ($search) {
                return $query->where('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%');
            })->paginate(config('app.pagination'))->withQueryString();

		return Inertia::render('Admin/Users/List', [
			'users'     => $users,
            'search'    => $search,
		]);
	}

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(User $user)
    {
        $user->loadMissing('Roles');
        $roles = Role::get();
        return Inertia::render('Admin/Users/Edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $user = User::find($id);

        $user->syncRoles([$request->role]);

        return redirect()->route('admin.users.index')->with('message', 'Se ha actualizado con éxito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.users.index')->with('message', 'Se ha eliminado con éxito');
    }

    public function export()
    {
        $name = 'usuarios-'.date('Y-m-d').'.xlsx';
        Excel::store(new UsersExport, $name, 'export');

        return Storage::disk('export')->download($name, $name, ['Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']);
    }
}
