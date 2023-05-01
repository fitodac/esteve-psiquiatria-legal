<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Course;
use App\Models\Format;
use App\Models\Module;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::with(['category', 'format'])
            ->when($request->filters && $request->filters['format'], function($query) {
                $filter = request('filters');
                return $query->where('format_id', $filter['format']);
            })
            ->when($request->filters && $request->filters['category'], function($query, $category) {
                $filter = request('filters');
                return $query->where('category_id', $filter['category']);
            })
            ->paginate(config('app.pagination'));

        $formats = Format::all();
        $categories = Category::popularFields()->get();

        return Inertia::render('Courses/Trainings', [
            'courses' => $courses,
            'formats'  => $formats,
            'categories' => $categories,
            'filters' => [
                'format'    => $request->filters ? $request->filters['format']: null,
                'category' => $request->filters ? $request->filters['category']: null,
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // verificar si ya lo completo
        $course = Course::find($id);
        $user = Auth::user();

        $approved = $course->isApprovedByUser($user);

        $modules = $course->modules;

        $previousModuleApproved = true;

        foreach ($modules as $module) {
            $module->canAccess = $previousModuleApproved || $module->isFirstModule();
            $previousModuleApproved = $module->isApprovedByUser($user);
        }

        $related = Course::with('format')->where('category_id', $course->category_id)->where('id','!=', $course->id)->limit(4)->get();

        return Inertia::render('Courses/Course', [
            'course'    => $course,
            'modules'   => $modules,
            'approved'  => $approved,
            'related'   => $related,
        ]);
    }
}
