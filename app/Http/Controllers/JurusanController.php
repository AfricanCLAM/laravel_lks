<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();

        return view('guru.jurusan.index', ['jurusan' => $jurusan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();

        return view('guru.jurusan.create', ['jurusan' => $jurusan, 'kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'kelas_id' => 'required'
        ], [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name must not exceed 3 characters.',
            'kelas_id.required' => 'The Kelas field is required'
        ]);

        // If validation fails, redirect back with errors and old input
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator) // Pass validation errors
                ->withInput(); // Retain old input
        }

        Jurusan::create([
            'nama_jurusan' => $request->name,
            'kelas_id' => $request->kelas_id
        ]);

        session()->flash('success', 'Succesfully create Jurusan!');
        return redirect('/jurusan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurusan = Jurusan::find($id);
        $kelas = Kelas::all();

        if (!$jurusan) {
            return redirect()->route('jurusan.index')->with('error', 'Jurusan not found');
        }

        return view('guru.jurusan.edit', ['jurusan' => $jurusan, 'kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jurusan = Jurusan::where('id', $id);

        if (!$jurusan) {
            session()->flash('error', "Can't find specified 'jurusan'");
            return redirect('/jurusan');
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'kelas_id' => 'required'
        ], [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name must not exceed 3 characters.',
            'kelas_id.required' => 'The Kelas field is required'
        ]);

        // If validation fails, redirect back with errors and old input
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator) // Pass validation errors
                ->withInput(); // Retain old input
        }

        $jurusan->update([
            'nama_jurusan' => $request->name,
            'kelas_id' => $request->kelas_id
        ]);

        session()->flash('success', 'succesfully edited jurusan!');
        return redirect('/jurusan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::find($id);

        if ($jurusan) {
            $jurusan->delete();
            session()->flash('success', 'succesfully deleted jurusan!');
            return redirect('/jurusan');
        } else {
            session()->flash('error', "can't find specified 'jurusan'");
            return redirect('jurusan');
        }
    }
}
