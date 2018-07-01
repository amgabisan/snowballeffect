<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class UsersController extends Controller
{
    public function index()
    {
        $users = $this->callApi();

        if (!$users) {
            return view('error');
        }

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = $this->callApi($id);

        if (!$user) {
            return view('error');
        }

        return view('users.show', compact('user'));
    }

    private function callApi($id = null)
    {
        $uri = 'https://jsonplaceholder.typicode.com/users';

        if (!empty($id)) {
            $uri .= '/'.$id;
        }

        try {
            $client = new Client(['verify' => false]);
            $response = $client->get($uri);
            $result = json_decode($response->getBody(), true);
        } catch (ClientException $e) {
            return false;
        }

        return $result;
    }
}
