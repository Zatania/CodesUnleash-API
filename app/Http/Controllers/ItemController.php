<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import User model
use App\Models\ProgrammingLanguage; // Import ProgrammingLanguage model
use App\Models\Chapter; // Import Chapter model
use App\Models\Lesson; // Import Lesson model
use App\Models\Quiz; // Import Quiz model
use App\Models\Exam; // Import Exam model

class ItemController extends Controller
{
    // Retrieve all users
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Store a new user
    public function storeUser(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string',
            // Add more validation rules as per your requirements
        ]);

        // Create a new user
        $user = User::create($validatedData);

        return response()->json($user, 201);
    }

    // Retrieve all programming languages
    public function getProgrammingLanguages()
    {
        $languages = ProgrammingLanguage::all();
        return response()->json($languages);
    }

    // Store a new programming language
    public function storeProgrammingLanguage(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string',
            // Add more validation rules as per your requirements
        ]);

        // Create a new programming language
        $language = ProgrammingLanguage::create($validatedData);

        return response()->json($language, 201);
    }

    // Implement similar methods for chapters, lessons, quizzes, and exams
    // You can follow the pattern used above for users and programming languages

    // Note: Implement show(), update(), and destroy() methods similarly for each entity
}
