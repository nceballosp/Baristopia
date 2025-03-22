<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        if ($request->hasFile('profile_image')) {

            $file = $request->file('profile_image');
            $imageName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $imageExtension = $extension = $file->getClientOriginalExtension();
            $fileName = $imageName . '_' . time() . '.' . $extension;

            Storage::disk('public')->put(
                $fileName,
                file_get_contents($file->getRealPath())
            );

            return $fileName;
        }

        return '';
        
    }
}