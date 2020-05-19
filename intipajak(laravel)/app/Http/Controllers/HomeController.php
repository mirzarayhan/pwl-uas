<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost/intipajak/api/pembayaran');
        $result = json_decode($response->getBody()->getContents(), true);
        return view('home', ['pembayaran' => $result['data']]);
    }
}
