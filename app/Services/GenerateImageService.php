<?php

namespace App\Services;

use App\Models\DenbyOption;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GenerateImageService
{
    protected bool $background = false;
    protected bool $overlay = false;

    /**
     * @return Collection<int, DenbyOption>
     */
    protected function denbyOptions(): Collection
    {
        return collect(json_decode(Storage::disk('local')->get('options.json'), true)['options'])
            ->map(fn($option) => new DenbyOption($option));
    }

    public function withBackground(): self
    {
        $this->background = true;

        return $this;
    }

    public function withoutBackground(): self
    {
        $this->background = false;

        return $this;
    }

    public function withOverlay(): self
    {
        $this->overlay = true;

        return $this;
    }

    public function withoutOverlay(): self
    {
        $this->overlay = false;

        return $this;
    }

    /**
     * @param array<int> $options
     */
    public function generate(array $options): \Intervention\Image\Image
    {
        $image = Image::canvas(1920, 1080);
        
        if ($this->background) {
            $image->insert(public_path('images/visualiser/global/background.png'));
        }

        $denbyOptions = $this->denbyOptions();

        // Default exterior grills
        $image->insert(public_path('/images/visualiser/exterior/images/standard_grills.png'));

        foreach ($options as $option) {
            $denbyOption = $denbyOptions[$option] ?? null;

            if (is_null($denbyOption) || is_null($denbyOption->getImageUrl())) {
                continue;
            }

            $image->insert(public_path($denbyOption->getImageUrl()));
        }

        $image->insert(public_path('/images/visualiser/gadgets/images/sink_hob.png'));

        if ($this->overlay) {
            $image->insert(public_path('images/visualiser/global/overlay.png'));
        }
        return $image;
    }
}
