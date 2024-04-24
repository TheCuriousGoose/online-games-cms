<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\Support\FileNamer\DefaultFileNamer;

class FileNamer extends DefaultFileNamer
{
    public function originalFileName(string $fileName): string
    {
        return Hash::make($fileName);
    }
}
