@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';
@endphp

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-video -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}">

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10">

			@if (!empty($g_video['video']))
			<div class="">
				{!! $g_video['video'] !!}
			</div>
			@endif

			<div class="__content order2">
				<p data-gsap-element="subtitle" class="subtitle-s">{{ $g_video['subtitle'] }}</p>
				<h2 data-gsap-element="header" class="text-white m-header">{{ $g_video['title'] }}</h2>

				<div data-gsap-element="txt" class="__txt text-white">
					{!! $g_video['txt'] !!}
				</div>

				@if (!empty($g_video['button']))
				<a data-gsap-element="btn" class="second-btn m-btn" href="{{ $g_video['button']['url'] }}" target="{{ $g_video['button']['target'] }}">{{ $g_video['button']['title'] }}</a>
				@endif

			</div>

		</div>
	</div>

</section>