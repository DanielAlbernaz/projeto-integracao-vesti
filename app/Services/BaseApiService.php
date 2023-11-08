<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BaseApiService
{

    public function sendPostRequestWithHeaders(string $path, array $data, array $headers)
    {
        try {
            $response = Http::withHeaders($headers)
                ->withBody(json_encode($data), 'application/json')
                ->post($path);

            return $response->body();
        } catch (\Throwable $th) {
            return "Falha na conexão com a api";
        }

    }

    public function sendGetRequestWithHeaders(string $path, array $headers)
    {
        try{
            $response = Http::withHeaders($headers)->get($path);
            return $response->json();
        } catch (\Throwable $th) {
            return "Falha na conexão com a api";
        }
    }
}
