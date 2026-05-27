<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExternalTaskService
{
    protected $baseUrl = 'https://jsonplaceholder.typicode.com';

    public function getPosts()
    {
        $startTime = microtime(true);
        $response = Http::get("{$this->baseUrl}/posts");
        $executionTime = round((microtime(true) - $startTime) * 1000);

        if ($response->successful()) {
            Log::info("Successful GET request getPosts. Time: {$executionTime} ms");
            return $response->json();
        }

        if ($response->failed()) {
            Log::error("GET request error getPosts. HTTP Status: {$response->status()}");
            return ['error' => 'Failed to fetch'];
        }
    }

    public function getPostById($id)
    {
        $startTime = microtime(true);
        $response = Http::get("{$this->baseUrl}/posts/{$id}");
        $executionTime = round((microtime(true) - $startTime) * 1000);

        if ($response->successful()) {
            Log::info("Successful GET request getPostById for ID: {$id}. Time: {$executionTime} ms");
            return $response->json();
        }

        if ($response->failed()) {
            Log::error("GET request error getPostById for ID: {$id}. Status: {$response->status()}");
            return ['error' => 'Not found'];
        }
    }

    public function createPost(array $data)
    {
        $startTime = microtime(true);
        $response = Http::post("{$this->baseUrl}/posts", $data);
        $executionTime = round((microtime(true) - $startTime) * 1000);

        if ($response->successful()) {
            Log::info("Successful POST request createPost. Time: {$executionTime} ms");
            return [
                'http_status' => $response->status(),
                'data' => $response->json()
            ];
        }

        if ($response->failed()) {
            Log::error("POST request error createPost. Status: {$response->status()}");
            return ['error' => 'Failed to create'];
        }
    }
}
