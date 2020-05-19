<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PetugasController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost/intipajak/api/petugaspajak');
        $result = json_decode($response->getBody()->getContents(), true);
        return view('petugas', ['petugas' => $result['data']]);
    }

    public function indexbyId($id)
    {
        $response = Http::get('http://localhost/intipajak/api/petugaspajak?idpetugas=' . $id);
        $result = json_decode($response->getBody()->getContents(), true);
        return view('detail', ['pajak' => $result['data']]);
    }

    public function delete($id)
    {
        $response = Http::delete('http://localhost/intipajak/api/petugaspajak?idpetugas='.$id );
        $result = json_decode($response->getBody()->getContents(), true);
        return view('petugas', ['petugas' => $result['data']]);
    }
}
