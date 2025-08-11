<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048', 
        ]);

        $uploadedFileUrl = Cloudinary::upload(
            $request->file('image')->getRealPath(),
            ['folder' => 'laravel_uploads']
        )->getSecurePath();

        return view('show', ['url' => $uploadedFileUrl]);
    }
}
