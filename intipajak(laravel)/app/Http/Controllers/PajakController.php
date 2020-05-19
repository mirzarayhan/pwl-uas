<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PajakController extends Controller
{

    public function index()
    {
        $response = Http::get('http://localhost/intipajak/api/pajak');
        $result = json_decode($response->getBody()->getContents(), true);
        return view('pajak', ['pajak' => $result['data']]);
    }

    public function indexbyId($id)
    {
        $response = Http::get('http://localhost/intipajak/api/pajak?idobjekpajak=' . $id);
        $result = json_decode($response->getBody()->getContents(), true);
        return view('detail', ['pajak' => $result['data']]);
    }

    public function delete($id)
    {
        $response = Http::delete('http://localhost/intipajak/api/pajak?idobjekpajak='.$id );
        $result = json_decode($response->getBody()->getContents(), true);
        return view('pajak', ['pajak' => $result['data']]);
    }

    /*public function destroy(Request $request)
    {
        $response = $this->_client->request('DELETE', 'pajak', [
            'form_params' => [
                'id' => $request->id,
            ]
        ]);

        return redirect('/admin/courses');
    }*/
}
