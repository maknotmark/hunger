<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['koerner kaese',2.5,'broetchen',],
            ['koerner vsalami',2.5,'broetchen',],
            ['koerner pute',2.5,'broetchen',],
            ['koerner tomato mozzarella',2.5,'broetchen',],
            ['koerner hummus',2.5,'broetchen',],
            ['koerner ei',2.5,'broetchen',],
            ['normal kaese',2.5,'broetchen',],
            ['normal vsalami',2.5,'broetchen',],
            ['normal pute',2.5,'broetchen',],
            ['normal tomato mozzarella',2.5,'broetchen',],
            ['normal hummus',2.5,'broetchen',],
            ['normal ei',2.5,'broetchen',],
            ['wasser',0.5,'getraenke',],
            ['apfelschorle',1.0,'getraenke',],
            ['eistee',1.2,'getraenke',],
            ['spezi',1.2,'getraenke',],
            ['redbull',1.7,'getraenke',],
            ['kinderschokolade',0.5,'snacks',],
            ['knoppers',0.5,'snacks',],
            ['corny',0.5,'snacks',],
        ];

        for ($i = 0; $i < count($items) ; $i ++) {
            Product::firstOrCreate([
                'id' => $i,
                'name' => $items[$i][0],
                'price' => $items[$i][1],
                'group' => $items[$i][2],
            ]);
        }
    }
}
