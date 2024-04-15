<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{GettingStarted, GettingStartedSteps, ProgrammingLanguage};
use App\Http\Requests\GettingStartedSteps\GettingStartedStepsRequest;

class GettingStartedStepsController extends Controller
{
    public function index()
    {
        return GettingStartedSteps::all();
    }

    public function view($id)
    {
        return GettingStartedSteps::find($id);
    }

    public function create(GettingStartedStepsRequest $request)
    {
        $programmingLanguageID = ProgrammingLanguage::where('reference_number', $request->programmingLanguage)->first()->id;

        if (!$programmingLanguageID) {
            return response()->json(['Programming language not found.'], 404);
        }

        $gettingStarted = GettingStarted::where('programming_language_id', $programmingLanguageID)->first();

        if ($gettingStarted) {
            $steps = GettingStartedSteps::create([
                'getting_started_id' => $gettingStarted->id,
                'name' => $request->name,
                'description' => $request->description,
                'image' => $request->image,
                'order' => $request->order
            ]);
        } else {
            return response()->json(['message' => 'Getting started id not found.'], 404);
        }
        
        return response()->json($steps, 201);
    }
}
