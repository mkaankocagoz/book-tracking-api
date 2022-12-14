<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=5; $i++) {
            Book::create([
                'author' => 'author '.$i,
                'book_name' => 'book '.$i,
                'summary' => $i. ' nolu kitap özeti',
            ]);
        }
    }
}
