<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\form;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        DB::table('product_tag')->truncate();
        Product::query()->truncate();
        ProductSize::query()->truncate();
        ProductColor::query()->truncate();
        Tag::query()->truncate();

        Tag::factory(15)->create();

        //size
        foreach (['S','M','L','XL','XXL'] as $item) {
            ProductSize::query()->create([
                'name'=>$item
            ]);
        }
        //color
        foreach (['#0000FF','#808080','#99FFFF','#FFCCCC','#FF99CC'] as $item) {
            ProductColor::query()->create([
                'name'=>$item
            ]);
        }

        for ($i=0;$i<1000;$i++) {
            $name=fake()->text(100);
            Product::query()->create([
                'catelogue_id' => rand(2,7),
                'name'=> $name,
                'slug'=> Str::slug($name).'-'.Str::random(8),
                'sku'=> Str::random(8).$i,
                'image_thumbnail'=> 'https://canifa.com/img/1000/1500/resize/6/o/6ot23s001-sm165-1-thumb.webp',
                'price_regular'=> 600000,
                'price_sale'=> 314300,
            ]);
        }
        for ($i=1;$i<1001;$i++) {
            ProductGallery::query()->insert([
                [
                'product_id'=> $i,
                'image'=>'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sm164-1.webp',
                ], [
                    'product_id'=> $i,
                    'image'=>'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sm164-1.webp',
                ],
            ]);
        }
        for ($i=1;$i<1001;$i++) {
            DB::table('product_tag')->insert([
                ['product_id'=>$i,
                    'tag_id'=>rand(1,8)],
                ['product_id'=>$i,
                    'tag_id'=>rand(9,15)]
            ]);
        }
        for ($productId=1;$productId<1001;$productId++) {
            $data =[];
            for ($sizeId=1;$sizeId<6;$sizeId++) {
                for ($colorID=1;$colorID<1001;$colorID++) {
                   $data[]=[
                       'product_id'=> $productId,
                       'product_size_id'=> $sizeId,
                       'product_color_id'=> $colorID,
                       'quatity'=>100,
                       'image'=>'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sm164-1.webp',
                   ];
                }
            }
            DB::table('product_variants')->insert($data);
        }
    }
}
