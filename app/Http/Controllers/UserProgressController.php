<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{UserProgress, Lesson};

class UserProgressController extends Controller
{
    // Create a new user progress record
    public function create(Request $request)
    {
        // Create an initial entry for the user progress when they register
        $userProgress = UserProgress::create([
            'user_id' => $request->user_id,
            'chapter_id' => $request->chapter_id,
            'lesson_id' => $request->lesson_id,
            'assessment_id' => $request->assessment_id,
            'completion_status' => $request->completion_status,
            'score' => $request->score
        ]);
        
        return response()->json($userProgress, 201);
    }

    public function index()
    {
        $inProgressData = UserProgress::where('completion_status', 'inprogress')->get();

        if($inProgressData->isEmpty()) {
            return response()->json(['message' => 'No in progress data found'], 404);
        }

        // You can now return this data as JSON or process it further
        return response()->json($inProgressData);
    }

    public function getNextLessonId(Request $request)
    {        
        $nextLesson = Lesson::where('chapter_id', $request->chapter_id)
                                    ->where('id', '>', $request->lesson_id)
                                    ->orderBy('id', 'asc')
                                    ->first();
        if (!$nextLesson) {
            return response()->json(['message' => 'No next lesson found'], 404);
        }

        return response()->json(['next_lesson_id' => $nextLesson->id]);
    }


}
