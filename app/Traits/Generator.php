<?php

namespace App\Traits;

use App\Models\{
    User,
    ProgrammingLanguage,
    Chapter,
    Lesson,
    ChapterAssessment,
    Exam,
    Badge,
    UserBadge
};

trait Generator
{
    public function programmingLanguageReferenceNumber(){

        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (ProgrammingLanguage::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }

    public function chapterReferenceNumber(){

        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (Chapter::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }

    public function chapterAssessmentReferenceNumber() {
            
        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (ChapterAssessment::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }

    public function lessonReferenceNumber(){

        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (Lesson::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }
    
    public function examReferenceNumber(){

        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (Exam::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }

    public function badgeReferenceNumber() 
    {
        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (Badge::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }

    public function userBadgeReferenceNumber()
    {
        do {

            $referenceNumber = bin2hex(random_bytes(6));

        } while (UserBadge::where("reference_number", $referenceNumber)->first());

        return $referenceNumber;
    }
}
