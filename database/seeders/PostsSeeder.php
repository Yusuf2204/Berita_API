<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Hash;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'postTitle' => 'Welcome to Portal Berita',
            'postNews' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et mollitia enim adipisci, blanditiis eaque eligendi veniam laborum. Ratione, nemo dolorem. Aspernatur reprehenderit ullam tempora soluta assumenda ab, quae ipsam voluptatum eveniet totam aut molestiae quia quis voluptates mollitia, aliquam, inventore esse sit eum cum veniam eius dolorum vel dicta. Sequi nesciunt iusto, veniam fugit adipisci dolorem officiis. Aliquid expedita minus quia unde earum nulla rem, molestias vero quasi. Iure sapiente necessitatibus dolore error qui harum earum maxime rerum magni temporibus id esse, inventore atque itaque repellendus nam maiores ipsa magnam autem rem molestiae quas doloremque corrupti? Accusantium amet ipsum praesentium?',
            'postUserId' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
