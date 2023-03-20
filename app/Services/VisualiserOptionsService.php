<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class VisualiserOptionsService
{
    public function retrieveFromUuid(string $uuid): array
    {
        $visualiser = collect(json_decode(Storage::disk('local')->get("shares/{$uuid}.json"), true));

        $denbyOptions = [];

        if ($option = $visualiser['paintwork']['bottom']) {
            $denbyOptions[] = $option;
        }

        if ($option = $visualiser['paintwork']['top']) {
            $denbyOptions[] = $option;
        }

        if ($option = $visualiser['wheel']) {
            $denbyOptions[] = $option;
        }

        if ($option = $visualiser['interior']) {
            $denbyOptions[] = $option;
        }

        if ($option = $visualiser['trim']) {
            $denbyOptions[] = $option;
        }

        if ($option = $visualiser['worktop']) {
            $denbyOptions[] = $option;
        }

        if ($option = $visualiser['floor']) {
            $denbyOptions[] = $option;
        }

        if ($option = $visualiser['upholstery']) {
            $denbyOptions[] = $option;
        }

        if ($option = $visualiser['oven']) {
            $denbyOptions[] = $option;
        }

        $gadgets = $visualiser['gadgets'] ?? [];

        foreach ($gadgets as $gadget) {
            $denbyOptions[] = $gadget;
        }

        foreach (array_keys($visualiser['exterior']) as $key) {
            if (is_null($visualiser['exterior'][$key])) {
                continue;
            }
            $denbyOptions[] = $visualiser['exterior'][$key];
        }


        foreach (array_keys($visualiser['roof']) as $key) {
            if (is_null($visualiser['roof'][$key])) {
                continue;
            }
            $denbyOptions[] = $visualiser['roof'][$key];
        }

        return $denbyOptions;
    }

}
