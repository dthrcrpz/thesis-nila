<?php

namespace App\Http\Controllers;

use App\Research;
use Illuminate\Http\Request;
use Storage;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Theses';
        $theses = Research::orderBy('title')->get();
        return view('theses.index', compact('title', 'theses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Thesis';
        $create = true;
        return view('theses.actions', compact('create', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $r
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $this->validate($r, [
            'title' => 'required',
            'year' => 'required',
            'authors' => 'required',
            'abstract' => 'required|mimes:pdf,docx',
        ]);

        if ($r->hasFile('abstract')) {
            $file = $r->file('abstract');
            $name = $file->getClientOriginalName();
            $filePath = 'abstracts/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
            $uploadedFile = Storage::disk('s3')->url($filePath);
        }

        $research = Research::create([
            'title' => $r->title,
            'year' => $r->year,
            'authors' => $r->authors,
            'abstract' => $uploadedFile,
        ]);

        return redirect('/theses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function show(Research $research)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function edit(Research $research)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Research $research)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function destroy(Research $research)
    {
        //
    }
}
