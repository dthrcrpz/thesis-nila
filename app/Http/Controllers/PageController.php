<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index () {
    	$title = 'Thesis Book Archiving System';
    	return view('layouts.master', compact('title'));
    }
}
