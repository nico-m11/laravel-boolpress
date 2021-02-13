<?php

use Illuminate\Database\Seeder;
use App\PostModel;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PostModel::class, 20)->create();
    }
}
