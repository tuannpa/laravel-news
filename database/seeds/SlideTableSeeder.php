<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlideTableSeeder extends Seeder
{
    public function run()
    {
        for($i = 1; $i <= 2; $i++) {
            DB::table('slide')->insert(
                [
                    'Ten' => 'Slide'.$i,
                    'Hinh' => $i.'.jpg',
                    'NoiDung' => 'NoiDung',
                    'link' => 'google.com',
                    'created_at' => new DateTime()
                ]

            );
        }

    }
}