<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Score;
use App\Models\Course;
use App\Models\Module;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // hacer verificaciones de si puede hacer el modulo selecionado (entro por url)
        $module = Module::with('course', 'questions')->find($id);
        $user = Auth::user();

        $next = Module::nextModule($id);
        $isApprovedByUser = $module->isApprovedByUser($user);

        return Inertia::render('Courses/Module', [
            'module'            => $module,
            'next'              => $next,
            'isApprovedByUser'  => $isApprovedByUser
        ]);
    }

    public function store(Request $request, $id) {
        $score = $this->checkScore($request->answers, $id);
        $userId = Auth::id();

        if($score >= 50) {
            $module = Module::with('course')->find($id);

            $module->users()->attach($userId, ['approved' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

            if(Module::isLastModule($id)) {
                $this->addScore($userId, $module->course->score);
                return redirect()->back()->with("message", 'completo');
            }

            return redirect()->back()->with("message", 'aprobado');
        }

        if($score < 50) {
            return redirect()->back()->withErrors('No aprobado');
        }
    }

    public function checkScore($selected_answers, $id) {

        $questions = Question::where('module_id', $id)->orderBy('id')->get();
        $correct_answers = 0;

        foreach ($questions as $key => $question) {
            $answers = collect(json_decode($question->getRawOriginal('answers')), true);
            $valid = $answers->where('valid', true)->first();

            if($selected_answers[$key] == $valid->id) {
                $correct_answers += 1;
            }
        }

        $percent = (100 * $correct_answers)/$questions->count();

        return $percent;
    }

    public function addScore($userId, $score) {
        $scoreModel = Score::firstOrNew(
            ['user_id' => $userId],
            [
                'score' => $score,
                'accumulated' => $score,
                'valid_until' => Carbon::now()->startOfYear()->addYear(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        if ($scoreModel->exists) {
            $scoreModel->increment('score', $score);
            $scoreModel->increment('accumulated', $score);
        } else {
            $scoreModel->save();
        }
    }
}
