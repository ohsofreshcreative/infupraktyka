<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Product extends Block
{
    public $name = 'Produkt';
    public $description = 'Wyświetla wybrany produkt WooCommerce.';
    public $slug = 'product';
    public $category = 'woocommerce';
    public $icon = 'products';
    public $keywords = ['product', 'woocommerce'];
    public $mode = 'edit';
    public $supports = [
        'align' => false,
        'mode' => false,
        'jsx' => true,
    ];

    public function fields()
    {
        $product = new FieldsBuilder('product');

        $product
            ->setLocation('block', '==', 'acf/product')
            ->addPostObject('selected_product', [
                'label' => 'Wybierz produkt',
                'post_type' => ['product'],
                'return_format' => 'id',
                'required' => 1,
            ])

            /*--- USTAWIENIA BLOKU ---*/
            ->addTab('Ustawienia bloku', ['placement' => 'top'])
            ->addText('section_id', [
                'label' => 'ID',
            ])
            ->addText('section_class', [
                'label' => 'Dodatkowe klasy CSS',
            ])
            ->addTrueFalse('nomt', [
                'label' => 'Usunięcie marginesu górnego',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ]);

        return $product->build();
    }

    public function with()
    {
       $product_id = get_field('selected_product');
    $product = $product_id ? wc_get_product($product_id) : null;
    $variants = [];

    if ($product && $product->is_type('variable')) {
        $variants = $product->get_available_variations();
    }

    return [
        'selected_product_obj' => $product,
        'variants' => $variants, // Przekazujemy warianty do widoku
        'section_id' => get_field('section_id'),
        'section_class' => get_field('section_class'),
        'nomt' => get_field('nomt'),
    ];
    }
}