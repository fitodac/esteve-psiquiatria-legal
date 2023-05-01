<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Score;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Models\Participation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class ProfileController extends Controller
{
    public function index(Request $request) {
        $qty_pharmacy = $request->qty_pharmacy ?? config('app.pagination');
        $qty_participants = $request->qty_participants ?? config('app.pagination');

        $pharmacy_users = null;
        $participants_user = null;
        $pharmacy_count = null;
        $participants_total = null;
        $score = null;
        $search_auxiliar = $request->search_auxiliar ?? null;
        $search_participants = $request->search_participants ?? null;

        $user = User::where('id', Auth::id())->first();
        $date = Carbon::now();

        if(!$user->hasRole('titular')) {
            $score = Score::where('user_id', $user->id)->first();
        }

        if($user->hasRole('titular')) {
            $pharmacy_users = User::query()
                ->Select('name', 'email')
                ->where('pharmacy_id', $user->pharmacy_id)
                ->where('id','!=', $user->id)
                ->when($search_auxiliar, function($q, $search) use ($user) {
                    $q->where('name', 'like', '%'. $search . '%');
                    $q->orWhere('email', 'like', '%'. $search . '%');
                    $q->where('pharmacy_id', $user->pharmacy_id);
                    $q->where('id','!=', $user->id);
                })
                ->paginate($qty_pharmacy)
                ->withQueryString();

            $pharmacy_count = User::where('pharmacy_id', $user->pharmacy_id)->count();

            $participants_user = Participation::query()
                ->Select('user_id', 'earned_points', 'challenge_id')
                ->where('pharmacy_id', $user->pharmacy_id)
                ->whereHas('user', function($query) use ($search_participants) {
                    $query->where('email', 'like', '%'.$search_participants.'%');
                })
                ->Approved()
                ->paginate($qty_participants)
                ->withQueryString();

                $participants_user->loadMissing('challenge');
                $participants_user->loadMissing('user');

            $participants_total = Participation::selectRaw('SUM(earned_points) as earned_points, COUNT(*) as total')
                ->where('pharmacy_id', $user->pharmacy_id)
                ->first();
        }

        return Inertia::render('Profile/Index', [
            'pharmacy_users'        => $pharmacy_users,
            'participants_user'     => $participants_user,
            'pharmacy_count'        => $pharmacy_count,
            'participants_total'    => $participants_total,
            'qty_pharmacy'          => $qty_pharmacy,
            'qty_participants'      => $qty_participants,
            'score'                 => $score,
            'search_auxiliar'       => $search_auxiliar,
            'search_participants'   => $search_participants,
            'until'                 => $date->startOfYear()->addYear()->format('d/m/Y')
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
