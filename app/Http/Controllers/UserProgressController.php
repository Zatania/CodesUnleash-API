<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{UserProgress, Lesson, Chapter, User};

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

    public function update(Request $request)
    {
        $userProgress = UserProgress::where('user_id', $request->user_id)
                                    ->where('chapter_id', $request->chapter_id)
                                    ->where('lesson_id', $request->lesson_id)
                                    ->first();

        $userProgress->update([
            'completion_status' => $request->completion_status
        ]);

        return response()->json($userProgress);
    }
    
    public function unlocked(Request $request)
    {
        $unlockedData = UserProgress::where('user_id', $request->user_id)
                                    ->where(function($query) {
                                        $query->where('completion_status', 'completed')
                                            ->orWhere('completion_status', 'inprogress');
                                    })
                                    ->get();
        // You can now return this data as JSON or process it further
        return response()->json($unlockedData);
    }

    public function index(Request $request)
    {
        $inProgressData = UserProgress::where('user_id', $request->user_id)
                                        ->where('completion_status', 'inprogress')->get();

        if($inProgressData->isEmpty()) {
            return response()->json(['message' => 'No in progress data found'], 404);
        }

        // You can now return this data as JSON or process it further
        return response()->json($inProgressData);
    }

    public function completed(Request $request)
    {
        $completedData = UserProgress::where('user_id', $request->user_id)
                                        ->where('completion_status', 'completed')->get();

        if($completedData->isEmpty()) {
            return response()->json(['message' => 'No completed data found'], 404);
        }

        // You can now return this data as JSON or process it further
        return response()->json($completedData);
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

    public function getNextChapterId(Request $request)
    {
        $nextChapter = Chapter::where('id', '>', $request->chapter_id)
                                    ->orderBy('id', 'asc')
                                    ->first();
        if (!$nextChapter) {
            return response()->json(['message' => 'No next chapter found'], 404);
        }

        return response()->json(['next_chapter_id' => $nextChapter->id]);
    }

    public function getLastLessonID(Request $request)
    {
        $lastLesson = Lesson::where('chapter_id', $request->chapter_id)
                                    ->orderBy('id', 'desc')
                                    ->first();
        if (!$lastLesson) {
            return response()->json(['message' => 'No last lesson found'], 404);
        }

        return response()->json(['last_lesson_id' => $lastLesson->id]);
    }

    public function getFirstLessonID(Request $request)
    {
        $firstLesson = Lesson::where('chapter_id', $request->chapter_id)
                                    ->orderBy('id', 'asc')
                                    ->first();
        if (!$firstLesson) {
            return response()->json(['message' => 'No first lesson found'], 404);
        }

        return response()->json(['first_lesson_id' => $firstLesson->id]);
    }

}
