<?php

namespace App\Traits;

trait HasImage
{
    public function uploadImage($request, $path)
    {
        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs($path, $image->hashName());
        }

        return $image;
    }
}
