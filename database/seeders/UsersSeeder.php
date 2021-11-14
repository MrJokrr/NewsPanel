<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Nette\Utils\Random;
use App\Models\User;

include 'C:\OSPanel\domains\NewsPanel\news\public\names.blade.php';

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jara' ,
            'email' => 'jara@og_mail.org',
            'password' => 'ThisIsCrazy123',
        ]);

//        if(User::all()->where('email', $userEmail)!=[])
//            User::all()->where('email', $userEmail)[0] -> assignRole('admin');
    }

//    public function run()
//    {
//        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz
//                            0123456789abcdefghijklmnopqrstuvwxy
//                            0123456789abcdefghijklmnopqrstuvwxy
//                            0123456789abcdefghijklmnopqrstuvwxyz';
//
//        //include '../../public/names.blade.php';
//
//        //$userName = array_rand(GetNamesStr());
//        $userName = substr(str_shuffle($permitted_chars), 0, 10);
//        $userEmail = $userName.'@'.'og_mail.com';
//        $userPass = Hash::make(substr(str_shuffle($permitted_chars), 0, 10));
//
//        $userEmailAddNumber = 1;
//
//        while(User::all()->where('email', $userEmail)!=[]) {
//            $userEmail = $userName . $userEmailAddNumber . '@' . 'og_mail.org';
//            $userEmailAddNumber++;
//        }
//
//        DB::table('users')->insert([
//            'name' => $userName ,
//            'email' => $userEmail,
//            'password' => $userPass,
//        ]);
//
//        if(User::all()->where('email', $userEmail)!=[])
//            User::all()->where('email', $userEmail)[0] -> assignRole('user');
//    }
}
