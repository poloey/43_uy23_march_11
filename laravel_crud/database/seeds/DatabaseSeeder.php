<?php

use App\Note;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
      $users = [
        [
          'name' => 'nur',
          'email' => 'nur@gmail.com'
        ],
        [
          'name' => 'monjur',
          'email' => 'monjur@gmail.com'
        ],
        [
          'name' => 'farhana',
          'email' => 'farhana@gmail.com'
        ],
        [
          'name' => 'towhid',
          'email' => 'towhid@gmail.com'
        ],
        [
          'name' => 'majedul',
          'email' => 'majedul@gmail.com'
        ],
        [
          'name' => 'mobarok',
          'email' => 'mobarok@gmail.com'
        ],
        [
          'name' => 'jahed',
          'email' => 'jahed@gmail.com'
        ],
        [
          'name' => 'jb',
          'email' => 'jb@gmail.com'
        ],
      ];
      foreach ($users as $user) {
        factory(User::class)->create([
          'name' => $user['name'],
          'email' => $user['email']
        ]);
      }
      factory(Note::class, 30)->create();
    }
}
