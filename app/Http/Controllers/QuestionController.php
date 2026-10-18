<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'nama'  => 'required|max:10',
            'email' => ['required', 'email'],
            'pertanyaan' => 'required|max:300|min:8',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'email.email' => 'Email Tidak valid'
        ]);

        $pesanInfo = "Terimakasih <b>{$request->nama}</b>!
        Pertanyaan ini: <b>{$request->pertanyaan}</b> akan segera direspon melalui email
        <b>{$request->email}</b>";

        return redirect('/home')->with('info', $pesanInfo);
    }

    /**
     * Menampilkan halaman respon.
     */
    public function respon()
    {
        $data = session('respon_data');

        if (!$data) {
            return redirect('/home');
        }

        return view('home-question-respon', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
