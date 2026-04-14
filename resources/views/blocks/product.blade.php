@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';

// Ustawiamy globalny post, aby niektóre funkcje WC działały
if ($selected_product_obj) {
    global $post;
    $post = get_post($selected_product_obj->get_id());
    setup_postdata($post);
}
@endphp

@if ($selected_product_obj && !empty($variants))
<section
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    class="b-product-variants -smt {{ $sectionClass }} {{ $section_class }}">
    <div class="c-main">
	<h2 class="text-white text-center">Zarejestruj się</h2>
        <div class="woocommerce mt-10">
            {{-- Bierzemy tylko pierwsze dwa warianty do wyświetlenia w kolumnach --}}
            @php $variants_to_show = array_slice($variants, 0, 2); @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">

                @foreach ($variants_to_show as $index => $variant)
                    @php
                        // Pobieramy pełny obiekt wariantu, aby mieć dostęp do wszystkich metod
                        $variant_product = wc_get_product($variant['variation_id']);
                        $variant_attributes = implode(', ', $variant['attributes']);
                    @endphp
                
                    <div class="variant-column border border-gray-200 rounded-lg p-6 flex flex-col">
                        {{-- Tytuł wariantu (atrybuty) --}}
                        <h3 class="text-xl font-bold">{{ $variant_product->get_name() }}</h3>
                        

                        {{-- Opis w zależności od kolumny --}}
                        <div class="prose prose-sm mt-6 mb-6 flex-grow">
                            @if ($index === 0)
                                {{-- Kolumna 1: Krótki opis --}}
                                {!! $selected_product_obj->get_short_description() !!}
                            @else
                                {{-- Kolumna 2: Długi opis --}}
                                {!! $selected_product_obj->get_description() !!}
                            @endif
                        </div>

                        {{-- Formularz dodawania do koszyka dla konkretnego wariantu --}}
                        <form class="cart" action="{{ esc_url($selected_product_obj->get_permalink()) }}" method="post" enctype='multipart/form-data'>
                            
                            {{-- Cena wariantu --}}
                            <div class="price-wrapper mb-4">
                                {!! $variant_product->get_price_html() !!}
                            </div>

                            <div class="flex items-center gap-4">
                                {{-- Pole ilości --}}
                                @php
                                    woocommerce_quantity_input([
                                        'min_value'   => apply_filters('woocommerce_quantity_input_min', $variant_product->get_min_purchase_quantity(), $variant_product),
                                        'max_value'   => apply_filters('woocommerce_quantity_input_max', $variant_product->get_max_purchase_quantity(), $variant_product),
                                        'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $variant_product->get_min_purchase_quantity(),
                                    ]);
                                @endphp

                                {{-- Ukryte pola potrzebne do dodania wariantu do koszyka --}}
                                <input type="hidden" name="add-to-cart" value="{{ esc_attr($selected_product_obj->get_id()) }}">
                                <input type="hidden" name="product_id" value="{{ esc_attr($selected_product_obj->get_id()) }}">
                                <input type="hidden" name="variation_id" value="{{ esc_attr($variant['variation_id']) }}">
                                
                                @foreach ($variant['attributes'] as $attr_name => $attr_value)
                                    <input type="hidden" name="{{ esc_attr($attr_name) }}" value="{{ esc_attr($attr_value) }}">
                                @endforeach

                                {{-- Przycisk dodania do koszyka --}}
                                <button type="submit" class="second-btn single_add_to_cart_button button alt">
                                    {{ esc_html($variant_product->single_add_to_cart_text()) }}
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@php
wp_reset_postdata();
@endphp

@else
    @if (is_admin())
        <div class="p-4 text-center bg-yellow-100 text-yellow-800">
            <p>Blok Produkt: Proszę wybrać produkt wariantowy z co najmniej dwoma wariantami.</p>
        </div>
    @endif
@endif