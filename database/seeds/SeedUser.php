<?php

use App\User;
use Illuminate\Database\Seeder;

class SeedUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->id  = 1;
      $user->name = "Victor Steven";
      $user->email = "chikodi543@gmail.com";
      $user->password = bcrypt("password");
      $user->role = "admin";
      $user->save();
    }
}
