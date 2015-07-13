<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;

class ProductTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('products')->truncate();

		factory('CodeCommerce\Product')->create([
			'name' => 'Lapis',
			'description' => 'Colorido',
			'price' => '10'
		]);

		factory('CodeCommerce\Product',10)->create();		
	}
	
}