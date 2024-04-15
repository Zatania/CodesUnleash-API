<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{GettingStarted, ProgrammingLanguage};
use App\Http\Requests\GettingStarted\GettingStartedRequest;

class GettingStartedController extends Controller
{
    public function index()
    {
        return GettingStarted::all();
    }

    public function view($id)
    {
        return GettingStarted::find($id);
    }

    public function create(GettingStartedRequest $request)
    {
        $programmingLanguageID = ProgrammingLanguage::where('reference_number', $request->programmingLanguage)->first()->id;

        if (!$programmingLanguageID) {
            return response()->json(['Programming language not found.'], 404);
        }

        $gettingStarted = GettingStarted::where('programming_language_id', $programmingLanguageID)->exists();

        if ($gettingStarted) {
            return response()->json(['message' => 'Programming language already exists in the table.'], 409);
        }

        $gettingStarted = GettingStarted::create([
            'programming_language_id' => $programmingLanguageID
        ]);
        
        return response()->json($gettingStarted, 201);
    }

    public function uploadGettingStartedImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        return $imagePath;
    }
}
