const faqs = [
    {
        question: 'Can I drive a campervan on a standard driving licence?',
        answer: '<p>Yes, our VW campervan conversions all utilise VW Transporter vans and can be driven on a standard UK driving license.</p>',
    },
    {
        question: 'Barn Doors or Tailgate?',
        answer: '<p>There are pro\'s and con\'s to both options and we always advise you to consider both options and not let one or the other put you off your perfect van.</p>' +
            '<p>We have highlighted the biggest positives of each below:</p>' +
            '<p class="mt-2">Tailgate:</p>' +
            '<ul class="list-disc list-inside">' +
            '<li class="mt-2">You can carry 4 bikes on a bike carrier (however please note that the tailgate will not stay up with the bikes on)</li>' +
            '<li class="mt-2">You have some shelter whilst loading the boot</li>' +
            '</ul>' +
            '<p class="mt-4">Barn Doors:</p>' +
            '<ul class="list-disc list-inside">' +
            '<li class="mt-2">You can leave less room at the back when parking and still have access</li>' +
            '<li class="mt-2">You can open and leave the doors open with your bikes on the bike carrier (however you can only carry two bikes)</li>' +
            '</ul>',

    },
    {
        question: 'Do Denby VW campervans have toilets?',
        answer: '<ul>' +
            '<li>Our Standard VW Conversion, the Balmoral, does not have integrated toilets but do come with a Porta Potti 335</li>' +
            '<li>There are options for an integrated toilet in our Buckingham Conversion</li>' +
            '</ul>',
    },
    {
        question: 'What will the height of my Campervan be?',
        answer: '<p>With our M1 Tested Denby Freedom Elevating Roof your Campervan will be 2 meters, dependant on wheels</p>',
    },
    {
        question: 'How long is a Denby VW Campervan?',
        answer: '<p>Our campervans use the VW Transporter T6.1 vans, which come in two lengths - SWB and LWB. A SWB VW Transporter T6.1 is 4.9m long, whilst a LWB VW Transporter T6.1 is 5.3m long.</p>',
    },
    {
        question: 'Are your Roofs & Beds Crash Tested?',
        answer: '<p>Yes, both our Elevating Roofs and our Rock and Roll beds are M1 Tested</p>',
    },
    {
        question: 'Are Denby Campervans Insulated?',
        answer: '<p>Yes! We take the extra step of insulating our Campervans as this can vastly extend your\n' +
            'season. If you have a diesel heater fitted, an insulated van stays much warmer for longer.\n' +
            'It also helps with noise reduction, ensuring you can get a great nights sleep in your\n' +
            'Campervan.</p>',
    },
]

export default faqs.map((faq, index) => {
    faq.id = index
    return faq
})
