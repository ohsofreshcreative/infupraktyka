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


<!--- numbers --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-numbers -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main">
		<div class="">
			@if (!empty($g_numbers['header']))
			<h2 class="text-white w-full md:w-2/3">{{ strip_tags($g_numbers['header']) }}</h2>
			@endif

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-10">
				@foreach ($g_numbers['r_numbers'] as $item)
				<div class="__card relative bg-primary border-p radius p-10">
				@if (!empty($item['img']))
					<img src="{{ $item['img']['url'] }}" alt="{{ $item['img']['alt'] ?? '' }}" />
					@endif
					<p class="secondary font-bold text-h2 !mb-0">{{ $item['title'] }}</p>
					<p class="text-white text-lg">{{ $item['txt'] }}</p>
				</div>
				@endforeach
			</div>

		</div>
	</div>

</section>