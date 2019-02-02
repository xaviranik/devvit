<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reply_1 = [
            'discussion_id' => 1,
            'user_id' => 1,
            'content' => 'Sed ut luctus sapien. Phasellus accumsan viverra elit eu auctor. Aliquam porta et tellus sed aliquet. Sed sed augue.',
        ];

        $reply_2 = [
            'discussion_id' => 1,
            'user_id' => 2,
            'content' => 'Nullam eu tincidunt leo, a sollicitudin quam. Proin elit turpis, porta vel sagittis eget, tristique lobortis urna.',
        ];

        Reply::create($reply_1);
        Reply::create($reply_2);
    }
}
