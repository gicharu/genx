<?php

namespace Database\Seeders;

use App\Models\AuthorHasBooks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsHasBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AuthorHasBooks::factory()
            ->count(10)
            ->create();
    }
}
