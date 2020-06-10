<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::create([
            'code' => 'L25',
            'name' => 'Lipstik Korea Berubah Warna',
            'price' => 24900,
            'description' => 'Lipstik',
            'picture' => 'https://s3-ap-southeast-1.amazonaws.com/eraste/public/uploads/products/1589437313_1.jpg'            
        ]);

        Product::create([
            'code' => 'L24',
            'name' => 'Teayason Korean Liquid Lip',
            'price' => 20900,
            'description' => 'Lipstik',
            'picture' => 'https://s3-ap-southeast-1.amazonaws.com/eraste/public/uploads/products/1589526205_4.jpg'            
        ]);

        Product::create([
            'code' => 'L23',
            'name' => 'Kitty Heart Lipstick',
            'price' => 24000,
            'description' => 'Lipstik',
            'picture' => 'https://s3-ap-southeast-1.amazonaws.com/eraste/public/uploads/products/1589437313_1.jpg'            
        ]);

        Product::create([
            'code' => 'L22',
            'name' => 'Lip Gloss Sakura Cair',
            'price' => 21000,
            'description' => 'Lipstik',
            'picture' => 'https://s3-ap-southeast-1.amazonaws.com/eraste/public/uploads/products/1589526205_4.jpg'            
        ]);

        Product::create([
            'code' => 'L23',
            'name' => 'Kitty Heart Lipstick',
            'price' => 24000,
            'description' => 'Lipstik',
            'picture' => 'https://s3-ap-southeast-1.amazonaws.com/eraste/public/uploads/products/1589437313_1.jpg'            
        ]);

        Product::create([
            'code' => 'L21',
            'name' => 'Set Lily Gold Lipstick',
            'price' => 21000,
            'description' => 'Lipstik',
            'picture' => 'https://s3-ap-southeast-1.amazonaws.com/eraste/public/uploads/products/1589421633_5.jpg'            
        ]);
        
    }
}
