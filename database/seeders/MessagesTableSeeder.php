<?php

// database/seeders/MessagesTableSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MessagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('messages')->insert([
            'message' => 'Ceci est un faux message.',
            'photo' => null,
            'token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

