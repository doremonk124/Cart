<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
class UsersTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->insert(
			['full_name' => 'nguyen dang khoa', 'email'=> 'doremon@gmail.com', 'password'=>bcrypt('matkhau'), 'phone'=> str_random(11), 'address'=> 'Cau giay']
		);
	}
}
