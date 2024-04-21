<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Repositories\User\UserRepository;
use App\Models\{
    User,
    UserProgress,
    Chapter,
    ChapterAssessment
};
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        return $this->userRepository->index();
    }

    public function view($id)
    {
        return $this->userRepository->view($id);
    }

    public function updatePassword(UserRequest $request, $id)
    {
        return $this->userRepository->updatePassword($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

    public function uploadProfilePicture(Request $request, $username)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $user = User::where('username', $username)->firstOrFail();
        $user->update([
            'profile_picture' => url(Storage::url($imagePath))
        ]);

        return response()->json(['profile_picture' => $user->profile_picture]);
    }


    public function getProfilePicture($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return $user->profile_picture;
    }

    public function getChapAss($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $userProgress = $user->userProgress;

        $progress = [];

        foreach ($userProgress as $progressItem) {
            $chapter_id = $progressItem->chapter_id;
            $chapter_name = Chapter::find($chapter_id)->chapter_name;
            $items_count = ChapterAssessment::where('chapter_id', $chapter_id)->count();
    
            if (!isset($progress[$chapter_id])) {
                $progress[$chapter_id] = [
                    'chapter_name' => $chapter_name,
                    'total_items' => $items_count,
                    'latest_score' => null,
                    'last_attempt' => null,
                    'status' => null 
                ];
            }
    
            // Filter to include only rows with completion_status = null and lesson_id = null
            if ($progressItem->completion_status === null && $progressItem->lesson_id === null) {
                $score = $progressItem->score;
                $last_attempt = Carbon::parse($progressItem->updated_at)->format('M d, Y h:iA');

                // Determine if the current score is the latest one for this chapter
                if ($progress[$chapter_id]['latest_score'] === null || $last_attempt > $progress[$chapter_id]['last_attempt']) {
                    $progress[$chapter_id]['latest_score'] = $score;
                    $progress[$chapter_id]['last_attempt'] = $last_attempt;

                    // Calculate status based on passing score
                    $passingScore = 0.75 * $items_count; // 75% of total items
                    if ($score >= $passingScore) {
                        $progress[$chapter_id]['status'] = 'Passed';
                    } else {
                        $progress[$chapter_id]['status'] = 'Failed';
                    }
                }
            }
        }

        // Reindex the array to start from 0
        $progress = array_values($progress);

        return response()->json($progress);
    }
}
