import options from './../../../storage/app/options.json'

export class DenbyOption {
    constructor(option) {
        this.id = option.id
        this.type = option.type
        this.area = option.area
        this.oven_grill = option.oven_grill !== undefined ? option.oven_grill : null;
        this.description = option.description || null
        this.swatch = option.swatch || null
        this.image = option.image || null
        this.brand = option.brand || null
        this.setName(option.name)
        this.imageUrl = this.getImageUrl(false)
        this.swatchUrl = this.getImageUrl(true)
    }

    setName(name) {
        if (this.type === 'base' || this.type === 'wheels') {
            this.name = name
            return
        }

        this.name = name.toLowerCase()
            .split(' ')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ')
    }

    getImageUrl(is_swatch) {
        if((is_swatch && this.swatch === null) || (!is_swatch && this.image === null)) {
            return null;
        }

        let folder = `/images/visualiser/${this.type}`;
        const ending = (is_swatch ? this.swatch : this.image) + '.png';

        folder += is_swatch ? "/swatches" : "/images";

        if (["worktops", "upholstery", "roof", "gadgets", "floors", "exterior"].includes(this.type)) {
            return `${folder}/${ending}`;
        }

        if(["interior", "trim"].includes(this.type)) {
            if(!is_swatch) {
                folder =+ this.oven_grill ? "oven-grill/" : "no-oven-grill/";
            }
        }

        if(this.type === "paintwork") {
            if(is_swatch || this.area === "two-tone-bottom") {
                if(["two-tone-top", "two-tone-bottom"].includes(this.area)){
                    if(["candy_white", "ice_blue", "bright_orange"].includes(this.image)) {
                        return `${folder}/solid/${ending}`;       
                    }
                    return `${folder}/metallic/${ending}`;       
                }
            }
        }
        
        return `${folder}/${this.area}/${ending}`;       
    }

    isTwoTone() {
        return ['two-tone-top', 'two-tone-bottom'].includes(this.area)
    }

    isTwoToneTop() {
        return this.area === 'two-tone-top'
    }

    isTwoToneBottom() {
        return this.area === 'two-tone-top'
    }
}

const mappedOptions = options.options.map((option, index) => new DenbyOption({id: index, ...option}))

export function convertVisualiserToOptions(visualiser) {
    let selectedIds = []

    if (visualiser.paintwork.bottom) {
        selectedIds.push(visualiser.paintwork.bottom)
    }

    if (visualiser.paintwork.top) {
        selectedIds.push(visualiser.paintwork.top)
    }

    if (visualiser.wheel) {
        selectedIds.push(visualiser.wheel)
    }

    if (visualiser.interior) {
        selectedIds.push(visualiser.interior)
    }

    if (visualiser.trim) {
        selectedIds.push(visualiser.trim)
    }

    if (visualiser.worktop) {
        selectedIds.push(visualiser.worktop)
    }

    if (visualiser.floor) {
        selectedIds.push(visualiser.floor)
    }

    if (visualiser.upholstery) {
        selectedIds.push(visualiser.upholstery)
    }

    if (visualiser.oven) {
        selectedIds.push(visualiser.oven)
    }

    if (visualiser.gadgets.length) {
        selectedIds = selectedIds.concat(visualiser.gadgets)
    }

    selectedIds = selectedIds.concat(
        Object.keys(visualiser.exterior).map(key => {
            return visualiser.exterior[key]
        })
    )

    selectedIds = selectedIds.concat(
        Object.keys(visualiser.roof).map(key => {
            return visualiser.roof[key]
        })
    )

    return selectedIds.map(selectedId => {
        return mappedOptions.find(option => option.id === selectedId)
    }).filter(option => option?.image)
}


export default mappedOptions
