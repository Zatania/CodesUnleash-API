<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Repositories\User\UserRepository;
use App\Models\User;
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
}
