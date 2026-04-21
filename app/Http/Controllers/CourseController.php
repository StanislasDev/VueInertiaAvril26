<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('user')
        ->select('courses.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
            FROM conpletions
            INNER JOIN episodes ON conpletions.episode_id = episodes.id
            WHERE episodes.course_id = courses.id)
            as participants'
            ))
        ->withCount('episodes')->latest()->get();
        // dd($courses->toArray() ?: []);

        return Inertia::render('Courses/Index', [
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load('episodes', 'user');
        $watched = auth()->user()->episodes;

        return Inertia::render('Courses/Show', [
            'course' => $course,
            'watched' => $watched
        ]);
    }

    public function toggleProgress(Request $request)
    {
        $id = request()->input('episodeId');
        // Logique pour marquer l'épisode comme terminé pour l'utilisateur actuel
        // Par exemple, vous pourriez enregistrer cette information dans une table pivot entre les utilisateurs et les épisodes
        $user = auth()->user();

        $user->episodes()->toggle($id);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
