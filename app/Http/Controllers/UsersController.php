<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

class UsersController extends Controller
{
    public function index()
    {
        $client = new Client(['verify' => false]);
        $response = $client->get('https://jsonplaceholder.typicode.com/users');
        $users = json_decode($response->getBody(), true);

        return view('users.index', compact('users'));
    }
}
