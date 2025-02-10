<?php

namespace App\Http\Controllers;

use App\Models\Kelas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('guru.kelas.index', ['kelas' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name must not exceed 3 characters.',
        ]);

        // If validation fails, redirect back with errors and old input
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator) // Pass validation errors
                ->withInput(); // Retain old input
        }

        Kelas::create([
            'nama_kelas' => $request->name
        ]);

        session()->flash('success', 'Succesfully create Class!');
        return redirect('/kelas');
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
        $kelas = Kelas::find($id); // Fetch the kelas record

        if (!$kelas) {
            return redirect()->route('kelas.index')->with('error', 'Kelas not found.');
        }

        return view('guru.kelas.edit', ['kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelas = Kelas::where('id', $id);

        if (!$kelas) {
            session()->flash('error', "Can't find specified 'Kelas'");
            return redirect('/kelas');
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name must not exceed 3 characters.',
        ]);

        // If validation fails, redirect back with errors and old input
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator) // Pass validation errors
                ->withInput(); // Retain old input
        }

        $kelas->update([
            'nama_kelas' => $request->name
        ]);

        session()->flash('success', 'succesfully edited Kelas!');
        return redirect('/kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::find($id);

        if ($kelas) {
            $kelas->delete();
            session()->flash('success', 'succesfully deleted Kelas!');
            return redirect('/kelas');
        } else {
            session()->flash('error', "can't find specified 'Kelas'");
            return redirect('kelas');
        }
    }
}
