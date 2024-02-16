<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        $apiKey = '4824f1455f4468af791953b8c839ef01';
        $url = "https://gnews.io/api/v4/search?q=plant%20care&lang=en&sortby=relevance&apikey=$apiKey";

        $response = $client->request('GET', $url);
        $body = $response->getBody();
        $news = json_decode($body)->articles;

        $limitedNews = collect($news)->take(3); // Batasi hanya 3 berita yang ditampilkan

        $translatedNews = [];

        foreach ($limitedNews as $article) {
            $title = $article->title;

            // Menerjemahkan judul artikel menggunakan API terjemahan Azure
            $translatedTitle = $this->translateTitle($title);

            // Menyimpan judul artikel yang telah diterjemahkan bersama dengan informasi lainnya
            $translatedArticle = [
                'title' => $translatedTitle,
                'publishedAt' => $article->publishedAt,
                'url' => $article->url,
                'image' => $article->image,
                // Tambahkan atribut lainnya yang Anda perlukan di sini
            ];

            $translatedNews[] = $translatedArticle;
        }

        // Mengirimkan data berita yang telah diterjemahkan ke tampilan
        // response()->json($data);
        // return $translatedNews;
        return view('home', ['news' => $translatedNews]);
    }

    private function translateTitle($text)
    {
        $client = new Client([
            'base_uri' => 'https://api.cognitive.microsofttranslator.com/',
            'headers' => [
                'Ocp-Apim-Subscription-Key' => '58211cfd34724110a648ad8ada48c7aa',
                'Ocp-Apim-Subscription-Region' => 'japaneast',
                'Content-type' => 'application/json',
                'X-ClientTraceId' => (string) Str::uuid(),
            ],
        ]);

        $response = $client->post('/translate', [
            'query' => [
                'api-version' => '3.0',
                'from' => 'en',
                'to' => ['id'],
            ],
            'json' => [
                [
                    'text' => $text,
                ],
            ],
        ]);

        $data = json_decode((string) $response->getBody(), true);
        $translatedText = $data[0]['translations'][0]['text'];

        return $translatedText;
    }

    public function translate()
    {
        $client = new Client([
            'base_uri' => 'https://api.cognitive.microsofttranslator.com',
            'headers' => [
                'Ocp-Apim-Subscription-Key' => '58211cfd34724110a648ad8ada48c7aa',
                'Ocp-Apim-Subscription-Region' => 'japaneast',
                'Content-type' => 'application/json',
                'X-ClientTraceId' => (string) \Illuminate\Support\Str::uuid(),
            ],
        ]);

        $response = $client->post('/translate', [
            'query' => [
                'api-version' => '3.0',
                'from' => 'en',
                'to' => ['id'],
            ],
            'json' => [
                [
                    'text' => 'I would really like to drive your car around the block a few times!',
                ],
            ],
        ]);

        $data = json_decode((string) $response->getBody(), true);

        return response()->json($data);
    }
}
