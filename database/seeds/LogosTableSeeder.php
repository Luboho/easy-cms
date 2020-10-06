<?php

use App\Logo;
use Illuminate\Database\Seeder;

class LogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Logo::create([
            'user_id' => 1,
            'image' => 'default-pics/defaultLogo.jpg',
            'text' => '<h2>Dobrý deň.</h2><br> <h3>&nbsp;&nbsp;&nbsp;&nbsp;Som vaša webová aplikácia.<br> Po prihlásení a stlačení ikony ceruzky môžete upravovať pôvodné príspevky. </h3>'
        ]);
    }
}
