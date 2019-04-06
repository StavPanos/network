<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TomLingham\Searchy\Facades\Searchy;

class SearchController extends Controller
{
    public function search()
    {
        $users = Searchy::users('name', 'email')->query(request()->search)->get();

        return view('search/results', compact('users'));
    }
}
