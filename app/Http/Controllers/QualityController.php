<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;


class QualityController extends Controller
{
    public function qualityCheck(Request $request){
        $client = new Client();
        $name = $request->name;
        // dd($name);
        // Go to the symfony.com website
        $crawler = $client->request('GET', 'https://www.2embed.to/library/search?keyword=' . $name);
        // dd($crawler);
        // Get the latest post in this category and display the titles
        $resolution = $crawler->filter('div.film-poster-quality')->first()->text();   
        // dd($resolution);
        $resolution = json_encode($resolution);
        // dd($resolution);
        return $resolution;
        // return '404 not found';
    }

    public function availableMovieCheck(Request $request){
        $client = new Client();
        $id = $request->id;
        // dd($name);
        // Go to the symfony.com website
        $crawler = $client->request('GET', 'https://www.2embed.to/embed/tmdb/movie?id=' . $id);
        // dd($crawler);
        // Get the latest post in this category and display the titles
        $message = $crawler->filter('h3.heading-large')->first()->text('Default text content');   
        // print ($message->text('Default text content'));
        if($message != 'Default text content'){
            // print ('movie not available');
            return 0;
        } else{
            return 1;
            // print('movie available');
        }
        // return '404 not found';
    }

    public function availableSerieCheck(Request $request){
        $client = new Client();
        $id = $request->id;
        // dd($name);
        // Go to the symfony.com website
        $crawler = $client->request('GET', 'https://www.2embed.to/embed/tmdb/tv?id=' . $id . '&s=1&e=1');
        // dd($crawler);
        // Get the latest post in this category and display the titles
        $message = $crawler->filter('h3.heading-large')->first()->text('Default text content');   
        // print ($message->text('Default text content'));
        if($message != 'Default text content'){
            // print ('movie not available');
            return 0;
        } else{
            return 1;
            // print('movie available');
        }
        // return '404 not found';
    }
}
