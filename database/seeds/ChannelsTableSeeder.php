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
        $channel_default = [
            'title' => 'Default Channel',
            'slug' => str_slug('Default Channel')
        ];

        Channel::create($channel_default);
    }
}
