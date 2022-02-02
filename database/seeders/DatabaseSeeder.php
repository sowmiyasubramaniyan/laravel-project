<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 
use App\Models\Category; 
use App\Models\Post;   
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // User::truncate();
         // Category::truncate();  
         // Post::truncate();

        $user = User::factory()->create([
            'name' => 'sowmiya'
        ]);

        Post::factory(5)->create([
             'user_id' => $user->id
        ]);

         // $user = User::factory()->create();

         // $personal = Category::create([
         //    'name' => 'Personal',
         //    'slug' => 'personal'
         // ]);

         // $family = Category::create([
         //    'name' => 'Family',
         //    'slug' => 'family'
         // ]);

         // $work = Category::create([
         //    'name' => 'Work',
         //    'slug' => 'work'
         // ]);

         // Post::create([
         //    'user_id' => $user->id,
         //    'category_id' => $family->id,
         //    'title' => 'My Family Post',
         //    'slug' => 'my-family-post',
         //    'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
         //    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem aliquet urna tincidunt auctor id mattis nunc. In ac est et est efficitur blandit ut vel eros. Pellentesque laoreet leo sed massa venenatis, imperdiet hendrerit sapien sodales. Morbi in purus imperdiet, pretium est eu, finibus purus. Proin in tortor efficitur, accumsan diam in, luctus felis. Nullam non tempus justo. Aenean ac laoreet erat, in blandit dolor. Ut tincidunt ex eros, non convallis lectus pellentesque vitae. Quisque mollis libero enim, viverra placerat neque varius non. Sed vel nisl sed mauris pulvinar eleifend. Nullam nec pulvinar leo, maximus ultrices est. Nunc vitae erat vitae risus luctus consectetur in in sapien. Aliquam eu enim a augue eleifend luctus.'
         // ]);
         //  Post::create([
         //    'user_id' => $user->id,
         //    'category_id' => $work->id,
         //    'title' => 'My Work Post',
         //    'slug' => 'my-work-post',
         //    'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
         //    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem aliquet urna tincidunt auctor id mattis nunc. In ac est et est efficitur blandit ut vel eros. Pellentesque laoreet leo sed massa venenatis, imperdiet hendrerit sapien sodales. Morbi in purus imperdiet, pretium est eu, finibus purus. Proin in tortor efficitur, accumsan diam in, luctus felis. Nullam non tempus justo. Aenean ac laoreet erat, in blandit dolor. Ut tincidunt ex eros, non convallis lectus pellentesque vitae. Quisque mollis libero enim, viverra placerat neque varius non. Sed vel nisl sed mauris pulvinar eleifend. Nullam nec pulvinar leo, maximus ultrices est. Nunc vitae erat vitae risus luctus consectetur in in sapien. Aliquam eu enim a augue eleifend luctus.'
         // ]);
    }
}
