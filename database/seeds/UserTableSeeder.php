<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->truncate();

		$faker = Faker::create();

		foreach(range(1,15) as $si)
		{
			User::create([
				'name' => $faker->name(),
				'email' => $faker->email(),
				'password' => Hash::make($faker->word)
			]);
		} 
		
	}
	
}