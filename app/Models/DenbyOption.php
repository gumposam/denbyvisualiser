<?php

namespace App\Models;

class DenbyOption
{
    protected ?string $image;
    protected string $type;

    public function __construct(array $data)
    {
        $this->image = $data['image'] ?? null;
        $this->type = $data['type'];
        $this->area = $data['area'] ?? null;
        $this->oven_grill = $data['oven_grill'] ?? null;
    }

    public function getImageUrl(): ?string
    {
        if (is_null($this->image)) {
            return null;
        }
        $folder =  "/images/visualiser/{$this->type}/images";
        $ending = "$this->image.png";

        if (in_array($this->type, ["worktops", "upholstery", "roof", "gadgets", "floors", "exterior"])) {
            return "$folder/$ending";
        }

        if(in_array($this->type, ["interior","trim"])) {
            $folder = $this->oven_grill ? "$folder/oven-grill" : "$folder/no-oven-grill";
        }

        if($this->type === "paintwork") {
            if($this->area === "two-tone-bottom") {
                if(in_array($this->image,["candy_white", "ice_blue", "bright_orange"])) {
                    return "$folder/solid/$ending";       
                }
                return "$folder/metallic/$ending";       
            }
            if($this->area === "two-tone-top") {
                return "$folder/two-tone/$ending";       
            }
        }

        return "$folder/{$this->area}/$ending";  
    }
}


