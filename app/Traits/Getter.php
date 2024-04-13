<?php

namespace App\Traits;

use App\Models\{
    User,
    ProgrammingLanguage,
    Chapter,
    Lesson,
    Quiz,
    Exam
};

trait Getter
{
    protected function getUserId($userNumber){
        $user = User::where('user_number', $userNumber)->first();

        return $user->id;
    }

    protected function getProgrammingLanguageId($referenceNumber){
        $programmingLanguage = ProgrammingLanguage::where('reference_number', $referenceNumber)->first();

        return $programmingLanguage->id;
    }

    protected function getChapterId($referenceNumber){
        $chapter = Chapter::where('reference_number', $referenceNumber)->first();

        return $chapter->id;
    }

    protected function getLessonId($referenceNumber){
        $lesson = Lesson::where('reference_number', $referenceNumber)->first();

        return $lesson->id;
    }

    protected function getQuizId($referenceNumber){
        $quiz = Quiz::where('reference_number', $referenceNumber)->first();

        return $quiz->id;
    }

    protected function getExamId($referenceNumber){
        $exam = Exam::where('reference_number', $referenceNumber)->first();

        return $exam->id;
    }
}
