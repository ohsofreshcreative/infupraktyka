@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!-- hero --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-hero relative bg-cover bg-right overflow-hidden {{ $sectionClass }} {{ $section_class }}"
	@if (!empty($g_hero['image']['url'])) style="background-image: url('{{ $g_hero['image']['url'] }}')" @endif>

	<div class="absolute inset-0 bg-gradient-to-r from-blue-900 to-blue-800/30"></div>

	<div class="__wrapper c-main relative z-20 py-30">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-20 mt-30 md:mt-0 ">

			<div class="__hero order2 lg:py-10">
				<h1 data-gsap-element="header" class="text-white">{{ $g_hero['title'] }}</h1>

				<div data-gsap-element="txt" class="__txt mt-4 text-white">
					{!! $g_hero['txt'] !!}
				</div>

				@if (!empty($g_hero['hint']))
				<div data-gsap-element="box" class="__hint flex items-center radius bg-primary-lighter border border-dashed border-primary p-6 gap-4 mt-6">
					@if (!empty($g_hero['image_hint']['url']))
					<img
						class="max-w-10 aspect-square"
						src="{{ $g_hero['image_hint']['url'] }}"
						alt="{{ $g_hero['image_hint']['alt'] ?? '' }}">
					@endif

					@if (!empty($g_hero['header_hint']))
					<div class="">
						{{ $g_hero['header_hint'] }}
					</div>
					@endif
				</div>
				@endif

				<div class="inline-buttons flex gap-4 mt-6">

					@if (!empty($g_hero['button1']))
					<a data-gsap-element="btn" class="second-btn m-btn" href="{{ $g_hero['button1']['url'] }}" target="{{ $g_hero['button1']['target'] }}">{{ $g_hero['button1']['title'] }}</a>
					@endif

					@if (!empty($g_hero['button2']))
					<a data-gsap-element="btn" class="white-btn m-btn" href="{{ $g_hero['button2']['url'] }}" target="{{ $g_hero['button2']['target'] }}">{{ $g_hero['button2']['title'] }}</a>
					@endif
				</div>

			</div>



		</div>
	</div>

	<img class="absolute opacity-10 top-0 -left-40 pointer-events-none mix-blend-overlay z-10" src="/wp-content/uploads/2026/04/shape.svg" />

</section>