<?php

namespace App\Http\Controllers;

use App\Models\DenbyOption;
use App\Services\CachedImageService;
use App\Services\VisualiserOptionsService;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GenerateShareImageController extends Controller
{
    public function __invoke(string $uuid)
    {
        $options = resolve(VisualiserOptionsService::class)->retrieveFromUuid($uuid);

        return redirect()->to(resolve(CachedImageService::class)->share($options));
    }
}
