<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'title' => 'Thus Spake Zarathustra',
            'author' => 'Frederich Nietzsche',
            'pages' => '300',
            'genre' => 'Philosophy',
            'publisher' => 'Oreily',
            'description' => 'A book about ethics',
            'sort_order' => 1,
            'creator_id' => 1,
        ]);
        DB::table('books')->insert([
            'title' => 'On The Geneology Of Morality',
            'author' => 'Frederich Nietzsche',
            'pages' => '300',
            'genre' => 'Philosophy',
            'publisher' => 'Oreily',
            'description' => 'Philosophy Book',
            'sort_order' => 1,
            'creator_id' => 2,
        ]);
        DB::table('books')->insert([
            'title' => 'The Will To Power',
            'author' => 'Frederich Nietzsche',
            'pages' => '300',
            'genre' => 'Philosophy',
            'publisher' => 'Oreily',
            'description' => 'Philosophy Book',
            'sort_order' => 1,
            'creator_id' => 1,
        ]);
    }
}
