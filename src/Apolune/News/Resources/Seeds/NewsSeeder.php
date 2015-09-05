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
                'image'         => null,
                'created_at'    => '2015-07-30 12:00:00',
            ],
            [
                'title'         => 'Tibia Coins and the Store',
                'type'          => 'article',
                'icon'          => null,
                'content'       => 'This month, we would like to share some information about an important new feature which will be 
                                    released in July: Tibia Coins, a special new currency. Along with it, the ingame Store will open 
                                    its doors. Read on to find out more!',
                'image'         => '/pandaac/theme-tibia/img/featuredthumb_3238.jpg',
                'created_at'    => '2015-07-27 12:00:00',
            ],
            [
                'type'          => 'ticker',
                'icon'          => 'technical',
                'title'         => 'The server save on some game worlds took longer than usual today due to an unexpected technical issue. 
                                    We are sorry for the inconvenience this may have caused you.',
                'content'       => null,
                'image'         => null,
                'created_at'    => '2015-07-27 12:00:00',
            ],
            [
                'type'          => 'ticker',
                'icon'          => 'community',
                'title'         => 'TibiaVenezuela.com has published a new article, yet again! This time, they take you on a journey back 
                                    in time. Ready for some nostalgia? Head on over there to read the article which is available in Spanish!',
                'content'       => null,
                'image'         => null,
                'created_at'    => '2015-07-28 12:00:00',
            ],
            [
                'type'          => 'ticker',
                'icon'          => 'support',
                'title'         => 'A thorough check of the compensation handed out on July 15 revealed that 0.3% of all 400,000 accounts 
                                    that were compensated in any way have not yet received their full compensation. These 0.3% have 
                                    received their missing compensation today.',
                'content'       => null,
                'image'         => null,
                'created_at'    => '2015-07-28 13:00:00',
            ],
            [
                'type'          => 'ticker',
                'icon'          => 'community',
                'title'         => 'Due to lack of entries, the event board will be deleted on August 5. While you can still view this 
                                    board until that date, you can no longer post there. Please use your world board or the gameplay board 
                                    to advertise your ingame events from now on.',
                'content'       => null,
                'image'         => null,
                'created_at'    => '2015-07-28 14:00:00',
            ],
            [
                'type'          => 'ticker',
                'icon'          => 'technical',
                'title'         => 'With today\'s server save, unusable sudden death runes that were looted erroneously from several 
                                    monsters after the update release have been removed from the game.',
                'content'       => null,
                'image'         => null,
                'created_at'    => '2015-07-29 12:00:00',
            ],
        ]);
    }
}
