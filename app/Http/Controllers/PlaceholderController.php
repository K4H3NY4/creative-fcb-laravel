<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PlaceholderController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Make a GET request to the JSONPlaceholder API
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        // Log the response to check if it's being fetched correctly
        Log::info('API Response:', ['response' => $response->json()]);

        // Check if the request was successful
        if ($response->successful()) {
            // Pass the posts data to the view
            $posts = $response->json();
            return view('index', ['posts' => $posts]);
        }

        // Handle errors (optional: you can also return a different view for errors)
        return view('index', ['posts' => []]);
    }
}
