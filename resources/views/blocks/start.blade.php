@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
@endphp

<!-- start --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-start bg-secondary relative -menu-pt min-h-[85svh] {{ $sectionClass }} {{ $section_class }}">

	@if (!empty($g_start['use_video']) && !empty($g_start['video']))
	<video
		class="absolute inset-0 w-full h-full object-cover z-0"
		autoplay
		muted
		loop
		playsinline
		preload="metadata"
		@if(!empty($g_start['video_poster']['url'])) poster="{{ $g_start['video_poster']['url'] }}" @endif
		aria-hidden="true">
		<source src="{{ is_array($g_start['video']) ? ($g_start['video']['url'] ?? '') : $g_start['video'] }}"
			type="{{ is_array($g_start['video']) ? ($g_start['video']['mime_type'] ?? 'video/mp4') : 'video/mp4' }}">
	</video>
	<div class="absolute inset-0 z-10 pointer-events-none" style="background: linear-gradient(90deg, rgba(0, 34, 85, 0.9) 30%, rgba(0, 34, 85, 0.3) 100%);"></div>
	@endif

	<div class="__wrapper c-wide grid grid-cols-1 md:grid-cols-2 gap-8 items-center relative z-20">
		<div class="__content pt-20 pb-10 md:py-30">
			<h2 data-gsap-element="header" class=" text-white">
				{{ $g_start['title'] }}
			</h2>
			<h5 data-gsap-element="txt" class="text-white mt-2">
				{!! $g_start['subtitle'] !!}
			</h5>
			<div data-gsap-element="txt" class="__txt text-white mt-2">
				{!! $g_start['txt'] !!}
			</div>

			<div data-gsap-element="info" class="__info flex gap-6 mt-6">
				<div class="flex items-center gap-2">
					<div>
						<img src="/wp-content/uploads/2025/11/calendar.svg" />
					</div>
					<div class="text-white">
						{!! $g_start['date'] !!}
					</div>
				</div>
				<div class="flex items-center gap-2">
					<div>
						<img src="/wp-content/uploads/2025/11/place.svg" />
					</div>
					<div class="">
						<a class="text-white !underline" target="_blank" href="{!! $g_start['link'] !!}">{!! $g_start['place'] !!}</a>
					</div>
				</div>
			</div>

			@if (!empty($g_start['button1']))
			<div class="inline-buttons m-btn">
				<a data-gsap-element="button" class="second-btn left-btn"
					href="{{ $g_start['button1']['url'] }}"
					target="{{ $g_start['button1']['target'] }}">
					{{ $g_start['button1']['title'] }}
				</a>
				@if (!empty($g_start['button2']))
				<a data-gsap-element="button" class="white-btn"
					href="{{ $g_start['button2']['url'] }}"
					target="{{ $g_start['button2']['target'] }}">
					{{ $g_start['button2']['title'] }}
				</a>
				@endif
			</div>
			@endif

		</div>

		<div data-gsap-element="form" class="__form bg-primary p-10">
			<h3 class="text-white">{{ $g_start_2['title'] }}</h3>
			<div class="contact-form-container mt-4">
				{!! do_shortcode($g_start_2['shortcode']) !!}
			</div>
		</div>

		@if (!empty($g_start['image']))
		<div data-gsap-element="image" class="">
			<img src="{{ $g_start['image']['url'] }}" alt="{{ $g_start['image']['alt'] ?? '' }}">
		</div>
		@endif
	</div>

</section>