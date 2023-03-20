@php
/**
* @var \App\DataTransferObjects\RequestQuoteData $quote
*/
@endphp

@component('mail::message')
# Quote Requested

A quote has been requested from: {{ $quote->firstName }} {{ $quote->lastName }} ({{ $quote->email }}).

@if($quote->contactNumber)
Their contact number is: {{ $quote->contactNumber }}.
@endif

## Base Vehicle Specs


@if(array_key_exists('engine', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['engine'], 'title' => 'Engine'])
@endif

@if(array_key_exists('wheelbase', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['wheelbase'], 'title' => 'Wheelbase'])
@endif

@if(array_key_exists('horsepower', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['horsepower'], 'title' => 'Power'])
@endif

@if(array_key_exists('transmission', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['transmission'], 'title' => 'Transmission'])
@endif

@if(array_key_exists('rearDoor', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['rearDoor'], 'title' => 'Rear Door'])
@endif

## Paintwork


@if(array_key_exists('top', $quote->visualiser['paintwork']))

@include('emails.quote-part', ['part' => $quote->visualiser['paintwork']['top'], 'title' => 'Paintwork (Top)'])
@endif
@if(array_key_exists('bottom', $quote->visualiser['paintwork']))
@include('emails.quote-part', ['part' => $quote->visualiser['paintwork']['bottom'], 'title' => 'Paintwork'])
@endif

## Wheel Options

@if(array_key_exists('wheel', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['wheel'], 'title' => 'Wheel'])
@endif

## Interior Units

@if(array_key_exists('interior', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['interior'], 'title' => 'Interior'])
@endif


@if(array_key_exists('oven_grill', $quote->visualiser))
Doors: {{ $quote->visualiser['oven_grill'] }}
@endif

## Cabinet Trim

@if(array_key_exists('trim', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['trim'], 'title' => 'Trim'])
@endif

## Worktops

@if(array_key_exists('worktop', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['worktop'], 'title' => 'Worktop'])
@endif

## Floor Style

@if(array_key_exists('floor', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['floor'], 'title' => 'Floor'])
@endif

## Upholstery Style

@if(array_key_exists('upholstery', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['upholstery'], 'title' => 'Upholstery'])
@endif

#### Gadgets & Gizmos

@if(array_key_exists('oven', $quote->visualiser))
@include('emails.quote-part', ['part' => $quote->visualiser['oven'], 'title' => 'Oven'])
@endif
@foreach($quote->visualiser['gadgets'] ?? [] as $gadget)
@include('emails.quote-part', ['part' => $gadget, 'title' => 'Gadget / Gizmo'])
@endforeach

## Exterior Styling

@if(array_key_exists('sidebars', $quote->visualiser['exterior']))
@include('emails.quote-part', ['part' => $quote->visualiser['exterior']['sidebars'], 'title' => 'Exterior'])
@endif
@if(array_key_exists('rails', $quote->visualiser['exterior']))
@include('emails.quote-part', ['part' => $quote->visualiser['exterior']['rails'], 'title' => 'Exterior'])
@endif
@if(array_key_exists('bike', $quote->visualiser['exterior']))
@include('emails.quote-part', ['part' => $quote->visualiser['exterior']['bike'], 'title' => 'Exterior'])
@endif
@if(array_key_exists('towbar', $quote->visualiser['exterior']))
@include('emails.quote-part', ['part' => $quote->visualiser['exterior']['towbar'], 'title' => 'Exterior'])
@endif
@if(array_key_exists('lip', $quote->visualiser['exterior']))
@include('emails.quote-part', ['part' => $quote->visualiser['exterior']['lip'], 'title' => 'Exterior'])
@endif
@if(array_key_exists('blackGlossGrills', $quote->visualiser['exterior']))
@include('emails.quote-part', ['part' => $quote->visualiser['exterior']['blackGlossGrills'], 'title' => 'Exterior'])
@endif
@if(array_key_exists('blackBadges', $quote->visualiser['exterior']))
@include('emails.quote-part', ['part' => $quote->visualiser['exterior']['blackBadges'], 'title' => 'Exterior'])
@endif
@if(array_key_exists('spoiler', $quote->visualiser['exterior']))
@include('emails.quote-part', ['part' => $quote->visualiser['exterior']['spoiler'], 'title' => 'Exterior'])
@endif
@if(array_key_exists('roof', $quote->visualiser['exterior']))
@include('emails.quote-part', ['part' => $quote->visualiser['exterior']['roof'], 'title' => 'Exterior'])
@endif
@if(array_key_exists('solar', $quote->visualiser['exterior']))
@include('emails.quote-part', ['part' => $quote->visualiser['exterior']['solar'], 'title' => 'Exterior'])
@endif

## Roof options

@if(array_key_exists('colour', $quote->visualiser['roof']))
@include('emails.quote-part', ['part' => $quote->visualiser['roof']['colour'], 'title' => 'Exterior'])
@endif
@if(array_key_exists('tent', $quote->visualiser['roof']))
@include('emails.quote-part', ['part' => $quote->visualiser['roof']['tent'], 'title' => 'Exterior'])
@endif


Thanks,<br>
{{ config('app.name') }}
@endcomponent
