<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email', 'mazin19932009@hotmail.com')->first();
        if (!$user) {
            User::create(
                [
                'name' => 'mazin',
                'email'=> 'mazin1993@hotmail.com',
                'password'=> Hash::make('123123123'),
                'role'=>'manager'
                 ]
                ,[
                    'name' => 'supplier',
                    'email'=> 'supplier@hotmail.com',
                    'password'=> Hash::make('123123123'),
                    'role'=>'supplier'
                ]
            );

        }
    }
}
