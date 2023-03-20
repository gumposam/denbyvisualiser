<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ShareController extends Controller
{
    public function show(string $share)
    {
        return Inertia::render('SharePage', [
            'image' => action(GenerateShareImageController::class, ['uuid' => $share]),
        ]);
    }

    public function store(Request $request)
    {
        $uuid = Str::uuid();

        Storage::disk('local')->put("shares/{$uuid}.json", json_encode($request->input('visualiser', [])));

        return new JsonResponse([
            'share' => action([ShareController::class, 'show'], ['share' => $uuid]),
            'image' => action(GenerateShareImageController::class, ['uuid' => $uuid]),
        ]);
    }
}
