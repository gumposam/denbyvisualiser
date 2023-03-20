<?php

namespace App\Services;

use App\Models\DenbyOption;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GenerateShareImageService
{
    protected bool $background = false;
    protected bool $overlay = false;
    protected int $width = 1920;

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
        $cachedImagePath = resolve(CachedImageService::class)->retrieve($options);

        $campervanImage = Image::canvas(1920, 1080);
        $campervanImage->insert($cachedImagePath);
        $campervanImage->resize(1080, 607.5);

        $shareImage = Image::canvas(1080, 828);

        $shareImage->insert(public_path('images/visualiser/global/background.png'));
        $shareImage->insert($campervanImage);
        $shareImage->insert(public_path('images/visualiser/global/overlay.png'), 'bottom-left');

        return $shareImage;
    }
}
