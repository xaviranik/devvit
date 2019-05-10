<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profle_admin = [
            'user_id' => '1',
            'university' => 'Northern University Bangladesh',
            'profile_description' => 'Pellentesque magna dolor, tincidunt in eu laoreet nibh convallis. Sed laoreet ultrices purus tempor malesuada. Nulla et metus varius, convallis quam et, tempus nisl. Phasellus aliquet consequat neque at dignissim. Cras ac ornare elit, eu fermentum purus. Nunc aliquet dictum interdum. Aenean sollicitudin molestie erat eget mattis. Phasellus elit ante, ornare vel condimentum quis, eleifend a lacus.',
            'website' => 'admin.devvit.com'

        ];

        $profle_user = [
            'user_id' => '2',
            'university' => 'Bangladesh University of Engineering and Technology',
            'profile_description' => 'In lobortis mi ac lorem faucibus, eu laoreet nibh convallis. Sed laoreet ultrices purus tempor malesuada. Nulla et metus varius, convallis quam et, tempus nisl. Phasellus aliquet consequat neque at dignissim. Cras ac ornare elit, eu fermentum purus. Nunc aliquet dictum interdum. Aenean sollicitudin molestie erat eget mattis. Phasellus elit ante, ornare vel condimentum quis, eleifend a lacus.',
            'website' => 'user.devvit.com'

        ];

        Profile::create($profle_admin);
        Profile::create($profle_user);
    }
}
