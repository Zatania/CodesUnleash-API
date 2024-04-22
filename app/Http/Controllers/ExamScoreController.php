<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamScore;

class ExamScoreController extends Controller
{
    public function create(Request $request)
    {
        $examScore = ExamScore::create([
            'user_id' => $request->user_id,
            'score' => $request->score,
            'attempt_date' => now()
        ]);

        return response()->json($examScore, 201);
    }
}
