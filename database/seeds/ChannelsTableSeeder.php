<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel_1 = [
            'title' => 'Java',
            'slug' => str_slug('java')
        ];

        $channel_2 = [
            'title' => 'C#',
            'slug' => str_slug('c#')
        ];

        $channel_3 = [
            'title' => 'PHP',
            'slug' => str_slug('php')
        ];

        $channel_4 = [
            'title' => 'Python',
            'slug' => str_slug('python')
        ];

        $channel_5 = [
            'title' => 'Javascript',
            'slug' => str_slug('javascript')
        ];

        Channel::create($channel_1);
        Channel::create($channel_2);
        Channel::create($channel_3);
        Channel::create($channel_4);
        Channel::create($channel_5);
    }
}
