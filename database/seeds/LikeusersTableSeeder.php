<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeusersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('likeusers')->insert([
        'user_id' => 2,
        'likeuser_id' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
          ]);

      DB::table('likeusers')->insert([
        'user_id' => 3,
        'likeuser_id' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
          ]);
        //
    }
}
