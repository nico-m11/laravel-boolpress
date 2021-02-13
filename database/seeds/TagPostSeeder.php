<?php

use Illuminate\Database\Seeder;
use App\TagPostModel;
use App\TagModel;

class TagPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TagPostModel::class, 20)->create();
    }
}
