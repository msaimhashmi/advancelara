<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function index()
	{
    	return view('search');
	}

    // public function search($searchKey)
    // {
    // 	// dd($req->all());
    // 	// $searchKey = trim($request->get('q'));

    // 	$users = User::search($searchKey)->get();
    // 	// return $users;
    // 	return view('search-result', compact('users'));
    // }

    public function search(Request $req)
    {
    	// dd($req->all());
    	$searchKey = trim($req->get('q'));

    	$users = User::search($searchKey)->get();
    	// return $users;
    	return view('search-result', compact('users'));
    }
}
