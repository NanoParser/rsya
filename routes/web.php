<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $rows = DB::select('SELECT domains.`domain_name`, cards.`title`, cards.`image`, cards.`text` FROM domains,cards WHERE domains.`id`=cards.`domain_id`');

    class Card
    {
        public $title;
        public $image;
        public $text;
        public $domain_name;
    }

    //return $rows;
    $domains = array();

    foreach ($rows as $item)
    {
        $card = new Card();

        $card->title = $item->title;
        $card->image = $item->image;
        $card->text = $item->text;
        $card->domain_name = $item->domain_name;

        $domains[$item->domain_name][] = $card;
    }
  //  return $domains;

    return view('index', compact('domains'));
});
