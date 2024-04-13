<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Client as GoogleClient;
use Google\Service\Drive;

class GoogleDriveController extends Controller
{
    public function listFiles()
    {
        //Folder ID and Name
        $folderId = '1Pz1sZakL6vKDrYfCYiwM_cPCetmoPwLE';
        $folderName = 'KOTLIN VIDEO CONTENTS';
        
        // Initialize Google Client
        $googleClient = new GoogleClient();
        $googleClient->setAuthConfig(storage_path('codes-unleash-30749074dc32.json'));
        $googleClient->setAccessType('offline');

        // Create Drive service
        $driveService = new Drive($googleClient);

        try {
            // List files from Google Drive
            $files = $driveService->files->listFiles();

            // Process the list of files (example: print file names)
            $fileNames = [];
            foreach ($files as $file) {
                $fileNames[] = $file->getName();
            }

            return response()->json(['files' => $fileNames]);
        } catch (\Exception $e) {
            // Handle any errors that occur during API interaction
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
