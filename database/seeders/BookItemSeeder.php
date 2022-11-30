<?php

namespace Database\Seeders;

use App\Models\BookItem;
use Illuminate\Database\Seeder;

class BookItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookItem::factory()->count(35)->hasTakens(6)->create();
        BookItem::factory()->count(15)->hasTakens(15)->create();
    }
}
