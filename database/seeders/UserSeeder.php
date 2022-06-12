<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
USE File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
  
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
  
        $json = File::get("database/data/users.json");
        $users = json_decode($json);
  
        foreach ($users as $key => $value) {
            User::create([
                "id" => $value->id,
                "name" => $value->first_name.$value->last_name,
                "email" => $value->email,
                "password"=>'$2y$10$O591CM7rk2k0Ap/cUFUb0e4anypZsh2Qr7dB6NPy4w0M.lyeJZSqm',
            ]);
        }
    }
}
