<?php
namespace App\ValidatorClass;

use Intervention\Image\Facades\Image;

class PostValidator
{
    public static function validateRequest()
    {
        $data = request()->validate([
            'caption' => 'nullable|string',
            'image' => ['image', 'mimes:png,jpeg,jpg', 'max:1999'],
            'text' => 'nullable|string|max:15000',
        ]);

        if (request('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(450, 350);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        return $validatedArray = array_merge(
            $data,
            $imageArray ?? []
        );
    }
}