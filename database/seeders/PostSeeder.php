<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                for ($i=0; $i <20 ; $i++) { 
         
         $t_b=rand(1,10);
         $a=rand(4,5);
         $b=rand(3,4);

         Post::create([
         'title' => 'Title'.$t_b,
         'body' => 'Body'.$t_b, 
         'admin_id' =>$a,
         'blogger_id' =>$b,
        ]);

        }
    }
}
