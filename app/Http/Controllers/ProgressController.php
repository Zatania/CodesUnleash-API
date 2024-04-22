<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User,
    UserProgress,
    Chapter,
    Lesson,
    ChapterAssessment
};
use Carbon\Carbon;

class ProgressController extends Controller
{
    public function index(Request $request, $username)
    {
        $user = User::where('username', $username)->first();
        $user_id = $user->id;
        $user_progress = UserProgress::where('user_id', $user_id)->get();
        $progress = [];

        foreach ($user_progress as $progressItem) {
            $chapter_id = $progressItem->chapter_id;
            $chapter_name = Chapter::find($chapter_id)->chapter_name;

            if (!isset($progress[$chapter_id])) {
                $progress[$chapter_id] = [
                    'chapter_name' => $chapter_name,
                    'total_lessons' => Lesson::where('chapter_id', $chapter_id)->count(),
                    'completed_lessons' => 0,
                    'average_score' => 0,
                    'last_attempt' => null
                ];
            }

            if ($progressItem->completion_status === 'completed') {
                $progress[$chapter_id]['completed_lessons']++;
            }

            // Get total items
            $progress[$chapter_id]['total_items'] = ChapterAssessment::where('chapter_id', $chapter_id)->count();

            // Calculate average score
            $progress[$chapter_id]['average_score'] = UserProgress::where('user_id', $user_id)
                                                                    ->where('chapter_id', $chapter_id)
                                                                    ->where('completion_status', null)
                                                                    ->avg('score');

            // Get the latest updated_at date
            $last_attempt = UserProgress::where('chapter_id', $chapter_id)
                ->max('updated_at');
            if ($last_attempt > $progress[$chapter_id]['last_attempt']) {
                $progress[$chapter_id]['last_attempt'] = Carbon::parse($last_attempt)->format('M d, Y h:iA');
            }
        }

        return response()->json(array_values($progress));
    }

    public function checkIfChapterLessonIsCompleted(Request $request)
    {
        $user_progress = UserProgress::where('user_id', $request->user_id)
                                    ->where('chapter_id', $request->chapter_id)
                                    ->where('lesson_id', $request->lesson_id)
                                    ->where('completion_status', 'completed')
                                    ->orwhere('completion_status', 'inprogress')
                                    ->first();

        if (!$user_progress) {
            return response()->json(['message' => 'User progress not found'], 404);
        }

        return response()->json(['message' => 'true'], 200);
    }

}
