<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      foreach(range(1,3)as $num){
        DB::table('tweets')->insert([
          'user_id' => 1,
          'tweet' => "サンプルtweet{$num}",
          'photo' => "サンプルphoto{$num}",
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),



        ]);

      }
        //
    }
}
