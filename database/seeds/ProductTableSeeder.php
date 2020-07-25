<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'title' => 'Beats Headphones',
            'imagePath' => 'https://elcopcbonline.com/photos/product/4/176/4.jpg',
            'description' => 'Some dummy text for the description of the product.',
            'price' => 110,
            'sale_price' => 90,
            'product_type' => 1
        ]);

        $product->save();

        $product = new Product([
            'title' => 'Redragon M711 Mouse',
            'imagePath' => 'https://egyptlaptop.com/images/watermarked/1/detailed/19/m711_fdbeedb7-7692-4180-b0f8-8c2354dae9f7.png',
            'description' => 'Some dummy text for the description of the product.',
            'price' => 50,
            'sale_price' => 30,
            'product_type' => 1
        ]);

        $product->save();

        $product = new Product([
            'title' => 'Redragon K578 Keyboard',
            'imagePath' => 'https://shiftstore-eg.com/wp-content/uploads/2020/06/3Oh4BwY88NHuPzUleloobMKLik589mZqryr4oTMO.png',
            'description' => 'Some dummy text for the description of the product.',
            'price' => 75.99,
            'sale_price' => null,
            'product_type' => 0
        ]);

        $product->save();

        $product = new Product([
            'title' => 'Legion Y740 Gaming Laptop',
            'imagePath' => 'https://eg.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/17/645251/1.jpg?7121',
            'description' => 'Some dummy text for the description of the product.',
            'price' => 500,
            'sale_price' => null,
            'product_type' => 0
        ]);

        $product->save();

        $product = new Product([
            'title' => 'Wireless Mouse Logitech M220 Silent Gray',
            'imagePath' => 'https://www.powerplanetonline.com/cdnassets/raton_inalambrico_logitech_m220_silent_gris_01_l.jpg',
            'description' => 'Some dummy text for the description of the product.',
            'price' => 59.99,
            'sale_price' => null,
            'product_type' => 0
        ]);

        $product->save();

        $product = new Product([
            'title' => 'AMD Ryzen 3 3200G',
            'imagePath' => 'https://cf2.s3.souqcdn.com/item/2019/08/21/67/45/85/68/item_XL_67458568_ac79c1e5607ed.jpg',
            'description' => 'Some dummy text for the description of the product.',
            'price' => 110,
            'sale_price' => null,
            'product_type' => 0
        ]);

        $product->save();

        
    }
}
