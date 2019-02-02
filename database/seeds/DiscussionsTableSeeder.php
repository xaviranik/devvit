<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title_1 = "Default discussion title (first)";

        $discussion_1 = [
            'title' => $title_1,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris enim felis, auctor nec varius et, pharetra quis dui. Proin vel mollis lectus. Nulla non cursus ligula, ut interdum turpis. Duis rutrum erat quis ante scelerisque finibus.',
            'channel_id' => 1,
            'user_id' => 1,
            'slug' => str_slug($title_1)
        ];

        $title_2 = "Default discussion title (second)";

        $discussion_2 = [
            'title' => $title_2,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris enim felis, auctor nec varius et, pharetra quis dui. Proin vel mollis lectus. Nulla non cursus ligula, ut interdum turpis. Duis rutrum erat quis ante scelerisque finibus.',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($title_2)
        ];

        Discussion::create($discussion_1);
        Discussion::create($discussion_2);
    }
}
