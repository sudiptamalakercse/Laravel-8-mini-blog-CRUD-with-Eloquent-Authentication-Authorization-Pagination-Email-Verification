<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {

            $a = rand(1, 2);
            $b = rand(1, 2);

            if ($a == 1) {
                $t_b = 'My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.';
            } else {
                $t_b = 'Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.
                Then she teaches me and I learned pretty much everything about cooking.';
            }

            Post::create([
                'title' => 'Title ' . $i,
                'body' => 'Body ' . $i . ' ' . $t_b,
                'admin_id' => $a,
                'blogger_id' => $b,
            ]);

        }
    }
}
