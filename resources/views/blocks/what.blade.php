@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!--- what -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-what -smt relative {{ $sectionClass }} {{ $section_class }}">

    <div class="bg-dark rounded-4xl relative mx-6 sm:mx-6 md:mx-10 lg:mx-20 overflow-hidden">

        <div class="absolute top-0 left-1/4 -translate-x-1/2 -translate-y-1/2 w-206 h-206 bg-blue-500/30 rounded-full blur-[300px] pointer-events-none"></div>
        
        <div class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 w-96 h-96 bg-blue-500/50 rounded-full blur-[300px] pointer-events-none"></div>

        <div class="__wrapper c-main text-center relative z-20 py-40">
            {{-- Treść pozostaje tutaj, wewnątrz __wrapper --}}
            <div class="relative w-full z-10 md:w-1/2 mx-auto">
                @if ($what['header'])
                <h3 data-gsap-element="header" class=" m-header text-white">{{ $what['header'] }}</h3>
                @endif
                @if ($what['txt'])
                <div data-gsap-element="txt" class="text-white">{!! $what['txt'] !!}</div>
                    @endif
                @if (!empty($what['button']))
                    <a data-gsap-element="btn" class="second-btn m-btn" href="{{ $what['button']['url'] }}" target="{{ $what['button']['target'] }}">{{ $what['button']['title'] }}</a>
                    @endif
            </div>
        </div>

        <img class="absolute opacity-20 top-0 right-0 -translate-x-1/2 pointer-events-none mix-blend-overlay z-10" src="/wp-content/uploads/2026/04/shape.svg" />

    </div>
</section>