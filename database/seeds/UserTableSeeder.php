<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
			[
				'name' 		=> 'admin', 
				'last_name' => 'admin', 
				'email' 	=> 'admin@hotmail.com', 
				'user' 		=> 'admin',
				'password' 	=> \Hash::make('12345678'),
				'type' 		=> 'admin',
				'active' 	=> 1,
				'address' 	=> 'Av. Universidad 333, Colima',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Juan', 
				'last_name' => 'Perez', 
				'email' 	=> 'juan.perez@live.com', 
				'user' 		=> 'juan',
				'password' 	=> \Hash::make('12345678'),
				'type' 		=> 'user',
				'active' 	=> 1,
				'address' 	=> 'Av. Universidad 333, Colima',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],

		);

		User::insert($data);
    }
}
