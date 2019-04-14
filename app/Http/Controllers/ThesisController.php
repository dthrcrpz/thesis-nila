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
            'abstract' => 'required|mimes:docx',
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

        session()->flash('message', 'Thesis has been added');
        return redirect('/theses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function show(Research $thesis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function edit(Research $thesis)
    {
        $title = 'Edit Thesis';
        $create = false;
        return view('theses.actions', compact('create', 'title', 'thesis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $r
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Research $thesis)
    {
        $this->validate($r, [
            'title' => 'required',
            'year' => 'required',
            'authors' => 'required',
            'abstract' => 'sometimes|mimes:docx',
        ]);

        $thesis->update([
            'title' => $r->title,
            'year' => $r->year,
            'authors' => $r->authors,
        ]);

        if ($r->hasFile('abstract')) {
            $file = $r->file('abstract');
            $name = $file->getClientOriginalName();
            $filePath = 'abstracts/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
            $uploadedFile = Storage::disk('s3')->url($filePath);

            $thesis->update([
                'abstract' => $uploadedFile,
            ]);
        }

        session()->flash('message', 'Thesis has been updated.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function destroy(Research $thesis)
    {
        $thesis->delete();
        session()->flash('message', 'Thesis has been deleted');
        return back();   
    }

    public function download (Research $thesis) {
        $thesis->update([
            'total_downloads' => $thesis->total_downloads + 1
        ]);
        session()->put('link', $thesis->abstract);

        // return response()->download($thesis->abstract);
        return response()->streamDownload(function () {
            echo file_get_contents(session('link'));
        }, $thesis->title . '.docx');
    }
}
