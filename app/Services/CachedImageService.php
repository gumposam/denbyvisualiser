<?php

namespace App\Services;

class CachedImageService
{
    public function share(array $options): string
    {
        $filename = collect($options)->sort()->implode('-') . '.png';

        $generatedFile = public_path($path = "images/shared/$filename");

        if (file_exists($generatedFile)) {
            return $path;
        }

        $image = resolve(GenerateShareImageService::class)->generate($options);

        $image->save($generatedFile, 90, 'png');

        return $path;
    }

    public function retrieve(array $options): string
    {
        $filename = collect($options)->sort()->implode('-') . '.png';

        $generatedFile = public_path($path = "images/generated/$filename");

        if (file_exists($generatedFile)) {
            return $path;
        }

        $image = resolve(GenerateImageService::class)
            ->withoutBackground()
            ->withoutOverlay()
            ->generate($options);

        $image->save($generatedFile, 90, 'png');

        return $path;
    }
}
