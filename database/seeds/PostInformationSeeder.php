<?php

use Illuminate\Database\Seeder;
use App\PostInformationModel;

class PostInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PostInformationModel::class,20)->create();
    }
}
