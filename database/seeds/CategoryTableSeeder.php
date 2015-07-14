<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;


class CategoryTableSeeder extends Seeder
{
	public function run()
	{
	
		DB::table('categories')->truncate();

		factory('CodeCommerce\Category')->create([
			'name' => 'Computer',
			'description' => 'Computer description'
		]);

		factory('CodeCommerce\Category',10)->create();		
	}
	
}