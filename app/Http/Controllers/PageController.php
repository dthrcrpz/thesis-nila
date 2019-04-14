<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index () {
    	$title = 'Dashboard';
    	return view('index', compact('title'));
    }

    public function changePassword () {
    	$title = 'Change Password';
    	return view('change-password', compact('title'));
    }
}
