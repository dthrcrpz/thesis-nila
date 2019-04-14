<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;
use App\User;

class PageController extends Controller
{
    public function index () {
    	$title = 'Dashboard';
    	$thesesCount = Research::count();
    	$usersCount = User::count();
    	return view('index', compact('title', 'thesesCount', 'usersCount'));
    }

    public function changePassword () {
    	$title = 'Change Password';
    	return view('change-password', compact('title'));
    }
}
