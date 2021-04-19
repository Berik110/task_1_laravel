<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $genres = Genre::all();
        $films = Film::paginate(5); // или так simplePaginate(5);
        return view("main", compact('genres', 'films'));
    }

//    public function index(){
//        include_once('simple_html_dom.php');
//        $html = self::curl_get('https://gidonline.io/new/');
//        $dom  = str_get_html($html);
//
//        $movies = $dom->find('#posts');
//        return view('main', compact('movies'));
//    }


//    public function curl_get($url, $referer='http://www.google.com'){
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36");
//        curl_setopt($ch, CURLOPT_REFERER, $referer);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $data = curl_exec($ch);
//        curl_close($ch);
//        return $data;
//    }

    public function video($id){
        $film = Film::find($id);
//        $film = Film::query()->find($id);
        return view("video", compact('film'));
    }

}
