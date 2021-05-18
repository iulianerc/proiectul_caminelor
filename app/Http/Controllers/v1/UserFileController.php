<?php


namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\File\UserCheckFileRequest;
use App\Http\Requests\User\File\UserUploadFileRequest;
use App\Models\User\User;
use App\Models\User\UserFile;
use App\Repositories\Chat\MessageRepository;

class UserFileController extends Controller
{
    public function uploadFile(UserUploadFileRequest $request)
    {
        foreach ($request->validated() as $fileType => $file) {
            break;
        }
        $userFile = user()->userFile()->whereFileType($fileType)->first() ?? (new UserFile());
        $result = $userFile->store($file, user()->id, $fileType);


        return ok([
            'saved_name' => route('v1.files.show', $result->file->uuid)
        ]);
    }

    public function checkFile(User $user, UserCheckFileRequest $request, MessageRepository $messageRepository)
    {

        foreach ($request->validated() as $fileType => $fileStatus) {
            break;
        }

        $file = $user->userFile()->whereFileType($fileType)->first();
        $file->changeStatus($fileStatus, user());

        return updated();
    }
}
