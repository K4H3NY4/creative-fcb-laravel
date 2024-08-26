<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlaceholderController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Make a GET request to the JSONPlaceholder API
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        // Check if the request was successful
        if ($response->successful()) {
            // Return the JSON response from the API
            return response()->json($response->json());
        }

        // Handle errors
        return response()->json([
            'error' => 'Unable to fetch posts'
        ], $response->status());
    }
}
