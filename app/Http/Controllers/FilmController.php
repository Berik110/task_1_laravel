<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function deletePage($id){
        $film = Film::find($id);
        return view('deletepage', compact('film'));
    }

    public function delete(Request $request){
        $id = $request->get('film_id');
        Film::destroy($id);
        return redirect('/');
    }

    public function search(Request $request){
        $key = $request->get('key');
        $films = Film::where('name', 'like', '%'. $key . '%')->paginate(5);
        return view('main', compact('films'));
    }

    public static function curl_get($url, $referer='http://www.google.com'){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36");
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }


}
