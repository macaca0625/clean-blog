<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index(){

    }
    public function api(){

        $youtube_api_v3 = 'https://www.googleapis.com/youtube/v3/videos';
        $youtube_id = (request()->v) ? request()->v : 'Z4z756LQVOc';

        // curl get youtube data
        $ch = curl_init();
        $curl_url = $youtube_api_v3 . "?part=snippet%2CcontentDetails%2Cstatistics&id=" . $youtube_id . "&key=" . env('JUKSY_API_KEY');
        curl_setopt($ch, CURLOPT_URL, $curl_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return view('youtubeApi', compact("res", "curl_url"));
    }

}
