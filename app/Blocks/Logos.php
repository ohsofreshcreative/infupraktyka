@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}
@endphp

<!--- logos -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-logos c-main relative -smt {{ $sectionClass }} {{ $section_class }}">

    <div class="__wrapper relative">
        <h3 data-gsap-element="header" class="text-white w-full md:w-1/2">{{ $g_logos['title'] }}</h3>
    </div>

    @if (!empty($g_logos['logos_repeater']))
    <div data-gsap-element="logos" class="__logos grid grid-cols-2 md:grid-cols-4 gap-4 mt-10">
        @foreach ($g_logos['logos_repeater'] as $logo_item)
            @php
                $image = $logo_item['image'];
                $link = $logo_item['link'];
            @endphp
            <div class="__logo relative border border-secondary-100 rounded-2xl bg-white flex items-center justify-center h-40 p-8">
                @if ($link)
                    <a href="{{ $link['url'] }}" target="{{ $link['target'] ? $link['target'] : '_blank' }}" rel="noopener noreferrer" class="flex items-center justify-center w-full h-full">
                @endif
                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="max-h-20 w-auto">
                @if ($link)
                    </a>
                @endif
            </div>
        @endforeach
    </div>
    @endif

</section>