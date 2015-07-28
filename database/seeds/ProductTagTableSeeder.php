<?php

use Illuminate\Database\Seeder;

class ProductTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_tag')->truncate();
        factory('CodeCommerce\ProductTag',100)->create();

    }
}
