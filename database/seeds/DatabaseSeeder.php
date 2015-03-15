<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	public function run() {
		$user = new \App\User();
		$user->email = 'eliraz@design-studio.co.il';
		$user->password = Hash::make('admin');
		$user->name = 'Admin';
		$user->save();
	}
}