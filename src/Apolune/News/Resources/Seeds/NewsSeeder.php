<?php

namespace Apolune\News\Resources\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('__pandaac_news')->first()) {
            return null;
        }

        DB::table('__pandaac_news')->insert([
            [
                'slug'          => 'demo-site-pandaac',
                'title'         => 'This is a demo-site of pandaac',
                'type'          => 'news',
                'icon'          => 'community',
                'content'       => '<p>
                                        <span class="first-letter">W</span>e would like to give you the opportunity to explore <a href="https://pandaac.io" target="_blank">pandaac</a> and all of its features before using it as your very own automatic account creator. Your server deserves the absolute best, and we hope we can help you reach that level &ndash; but ultimately, the choice lands in your hands.
                                    </p>
                                    <p>
                                        <strong>pandaac</strong> is still in an early development stage and thus may be missing a lot of the functionality that you would expect. We are however progressing steadily and aim for perfection rather than a quick development process. In the end, this will benefit all of us.
                                    </p>
                                    <p>
                                        If you have a feature you think we should implement, or if you managed to stumble upon a bug, please report it using the <a href="https://github.com/pandaac/pandaac/issues" target="_blank">issue tracker</a> over at our GitHub repository.
                                    </p>
                                    <p>
                                        For any other enquiries, please send a private message to <a href="https://otland.net/members/chris.13882/" target="_blank">@Chris</a> through OtLand.
                                    </p>
                                    <p>
                                        To a bright future together!
                                    </p>',
                'excerpt'       => null,
                'image'         => null,
                'created_at'    => '2015-07-30 12:00:00',
            ],
            [
                'slug'          => 'premium-points-store',
                'title'         => 'Premium Points and the Store',
                'type'          => 'article',
                'icon'          => 'community',
                'content'       => '<p>
                                        <span class="first-letter">L</span>orem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ullamcorper nisl turpis, id pulvinar nunc lobortis a. Duis viverra ultricies lacus, nec finibus turpis elementum pellentesque. Suspendisse quis turpis massa. Mauris quis hendrerit urna, eget convallis nibh. Nullam eu sodales mauris. Vestibulum ut odio nec elit vulputate ultrices. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam pharetra massa vel libero aliquam, vel malesuada nulla interdum. Curabitur nunc risus, suscipit a varius nec, condimentum vitae leo. Vestibulum rutrum eget mi aliquam dapibus. Aliquam sodales ex vitae urna facilisis ornare.
                                    </p>
                                    <p>
                                        Donec quis tellus nec nulla maximus efficitur. Maecenas ut tellus est. Vestibulum pellentesque risus non lectus efficitur laoreet. Sed pretium viverra justo, vitae convallis sapien iaculis vestibulum. Quisque quis ullamcorper ligula, a consectetur lorem. Sed lacinia interdum risus eu finibus. Etiam pulvinar, ante ac molestie sagittis, ipsum justo egestas lectus, quis sagittis enim elit eget massa. Praesent convallis eros eros, at faucibus justo luctus id. Fusce eros sem, tempus nec facilisis ac, faucibus nec nunc. In id ullamcorper erat, id ultricies erat. Praesent elit elit, elementum vel urna efficitur, commodo luctus nisi. Phasellus interdum at leo quis tincidunt. Maecenas sit amet laoreet tortor. Quisque nec nibh tincidunt, bibendum ante sed, molestie nibh. Sed ultricies efficitur dui, eu efficitur lorem iaculis ut.
                                    </p>
                                    <p>
                                        Sed finibus id massa ut pretium. Sed laoreet ultrices elit, at cursus sem egestas et. Nam nec lacus in mi gravida laoreet quis posuere quam. Vivamus hendrerit, enim ut ultrices hendrerit, nisl mauris auctor velit, sed rhoncus erat metus ut diam. Pellentesque scelerisque convallis urna, vel posuere urna scelerisque maximus. Vivamus vel purus et libero lobortis bibendum. Donec vulputate diam sed aliquet elementum. Proin malesuada est ligula, id lacinia metus cursus a.
                                    </p>
                                    <p>
                                        Quisque et eros eu neque consectetur egestas. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras et tempor justo. Sed consectetur diam turpis, non auctor velit scelerisque eu. Aenean sed porta nisl, vitae finibus ex. Donec ante elit, interdum vitae mollis id, pellentesque sed diam. Nullam iaculis imperdiet orci vel pharetra. Mauris eget dictum mi. Sed lobortis diam sit amet odio fermentum, et gravida eros dignissim.
                                    </p>',
                'excerpt'       => 'This month, we would like to share some information about an important new feature which will be 
                                    released in July: Premium Points, a special new currency. Along with it, the ingame Store will open 
                                    its doors. Read on to find out more!',
                'image'         => '/pandaac/theme-tibia/img/featuredthumb_3238.jpg',
                'created_at'    => '2015-07-27 12:00:00',
            ],
            [
                'slug'          => 'welcome-to-pandaac',
                'type'          => 'ticker',
                'icon'          => 'staff',
                'title'         => 'Welcome to the demo site of pandaac! Please be aware that this site is constantly updated without any 
                                    warning. Thank you for understanding!',
                'content'       => null,
                'excerpt'       => null,
                'image'         => null,
                'created_at'    => '2015-07-25 12:00:00',
            ],
            [
                'slug'          => 'database-migrations-deployments',
                'type'          => 'ticker',
                'icon'          => 'development',
                'title'         => 'Database migrations are refreshed whenever I deploy new code to this demo site. This will undo any
                                    custom configurations you have made (e.g. deleted a character or verified your email).',
                'content'       => null,
                'excerpt'       => null,
                'image'         => null,
                'created_at'    => '2015-09-04 12:00:00',
            ],
            [
                'slug'          => 'cleared-cache-deployments',
                'type'          => 'ticker',
                'icon'          => 'development',
                'title'         => 'Cache is cleared every time a new deployment is made to this demo site. This is why the site sometimes
                                    loads slowly/in sections the first time you visit the page inbetween deployments.',
                'content'       => null,
                'excerpt'       => null,
                'image'         => null,
                'created_at'    => '2015-09-04 12:00:00',
            ],
            [
                'slug'          => 'news-archive',
                'type'          => 'ticker',
                'icon'          => 'technical',
                'title'         => 'Today we implemented a working news system, along with the archive functionality.',
                'content'       => null,
                'excerpt'       => null,
                'image'         => null,
                'created_at'    => '2015-09-05 22:00:00',
            ],
        ]);
    }
}
