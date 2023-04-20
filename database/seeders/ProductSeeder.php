<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Kitchen Chair',
                'price' => '30000',
                'category' => 'kitchen',
                'brand' => 'No limits',
                'logo' => '/images/products/product8.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia voluptatem quam consectetur dicta, incidunt maiores earum consequuntur recusandae temporibus libero sequi, quis animi soluta quisquam distinctio explicabo delectus! Provident, rerum.',
                'materials' => 'wood,leather',
                'weight' => '25',
                'size_xs' => '10',
                'size_s' => '5',
                'size_m' => '0',
                'size_l' => '15',
                'size_xl' => '30',
                'sku' => 'RAF0001'
            ],
            [
                'name' => 'Kitchen Table',
                'price' => '55000',
                'category' => 'kitchen',
                'brand' => 'Larrys',
                'logo' => '/images/products/product5.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia voluptatem quam consectetur dicta, incidunt maiores earum consequuntur recusandae temporibus libero sequi, quis animi soluta quisquam distinctio explicabo delectus! Provident, rerum.',
                'materials' => 'marble,steel',
                'weight' => '200',
                'size_xs' => '0',
                'size_s' => '20',
                'size_m' => '10',
                'size_l' => '8',
                'size_xl' => '17',
                'sku' => 'RAF0002'
            ],
            [
                'name' => 'Italian Sofa',
                'price' => '300000',
                'category' => 'living room',
                'brand' => 'No limits',
                'logo' => '/images/products/product1.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia voluptatem quam consectetur dicta, incidunt maiores earum consequuntur recusandae temporibus libero sequi, quis animi soluta quisquam distinctio explicabo delectus! Provident, rerum.',
                'materials' => 'wood,latex',
                'weight' => '180',
                'size_xs' => '30',
                'size_s' => '55',
                'size_m' => '0',
                'size_l' => '25',
                'size_xl' => '10',
                'sku' => 'RAF0003'
            ]
        ];


        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'price' => $product['price'],
                'category' => $product['category'],
                'brand' => $product['brand'],
                'logo' => $product['logo'],
                'description' => $product['description'],
                'materials' => $product['materials'],
                'weight' => $product['weight'],
                'size_xs' => $product['size_xs'],
                'size_s' => $product['size_s'],
                'size_m' => $product['size_m'],
                'size_l' => $product['size_l'],
                'size_xl' => $product['size_xl'],
                'sku' => $product['sku']
            ]);

        }
    }
}
