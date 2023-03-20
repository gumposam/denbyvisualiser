<?php

namespace App\Http\Controllers;

use App\Services\CachedImageService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenerateCampervanController extends Controller
{
    public function __invoke(Request $request)
    {
        abort_if(empty($selected = $request->input('options', [])), Response::HTTP_BAD_REQUEST);

        $image = resolve(CachedImageService::class)->retrieve($selected);

        return redirect()->to($image);
    }
}
