<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
                if (Auth::user()->level_dashboard == 1){
                        // Ambil Bearer token dari .env
                        $initialBearerToken = env('API_BEARER_TOKEN');

                        // Buat klien Guzzle
                        $client = new Client();

                        // Data yang akan dikirim dalam body
                        $email = 'hendrik@sanivokasi.com';
                        $password = 'sani2022';

                        try {
                            // Lakukan permintaan API POST dengan Bearer token dan body untuk mendapatkan access_token
                            $response = $client->request('POST', 'http://54.179.58.215:8080/api/login', [
                                'headers' => [
                                    'Authorization' => 'Bearer ' . $initialBearerToken,
                                    'Accept' => 'application/json',
                                ],
                                'json' => [
                                    'email' => $email,
                                    'password' => $password,
                                ],
                            ]);

                            // Decode respons JSON
                            $responseData = json_decode($response->getBody(), true);
                            $accessToken = $responseData['access_token'];

                            // Gunakan access_token untuk mengakses API dengan Bearer token baru
                            $dataResponse = $client->request('GET', 'http://54.179.58.215:8080/api/indexdashboard', [
                                'headers' => [
                                    'Authorization' => 'Bearer ' . $accessToken,
                                    'Accept' => 'application/json',
                                ],
                            ]);

                            // Decode respons JSON
                            $data = json_decode($dataResponse->getBody(), true);

                            // Kirim data ke tampilan
                            return view('dashboard.index', ['data' => $data]);

                        } catch (\Exception $e) {
                            // Tangani kesalahan jika permintaan API gagal
                            return view('dashboard.index', ['error' => $e->getMessage()]);
                        }

                }else{
                     return view('errors.404');
                }
    }
}
