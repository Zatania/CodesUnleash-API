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

trait Generator
{
    protected function programmingLanguageReferenceNumber(){

        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (ProgrammingLanguage::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }

    protected function chapterReferenceNumber(){

        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (Chapter::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }

    protected function lessonReferenceNumber(){

        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (Lesson::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }

    protected function lessonFolder(){

        do {

            $folder = bin2hex(random_bytes(6));

        } while (Lesson::where("folder", $folder)->first());

        return $folder;
    }

    protected function quizReferenceNumber(){

        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (Quiz::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }

    protected function examReferenceNumber(){

        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (Exam::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }
}
