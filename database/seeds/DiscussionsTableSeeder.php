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

        $title_3 = 'Internal Working of HashMap in Java';

        $discussion_3 = [
            'title' => $title_3,
            'content' => 'Hashing is a process of converting an object into integer form by using the method hashCode(). Its necessary to write hashCode() method properly for better performance of HashMap. Here I am taking key of my own class so that I can override hashCode() method to show different scenarios.

            ```java
            //custom Key class to override hashCode()
            // and equals() method
            class Key
            {
              String key;
              Key(String key)
              {
                this.key = key;
              }
              
              @Override
              public int hashCode() 
              {
                 return (int)key.charAt(0);
              }
            
              @Override
              public boolean equals(Object obj)
              {
                return key.equals((String)obj);
              }
            }
            ```',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($title_3)
        ];

        Discussion::create($discussion_1);
        Discussion::create($discussion_2);
        Discussion::create($discussion_3);
    }
}
