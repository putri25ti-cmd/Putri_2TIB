<?php
namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPortofolio'] = Portofolio::all();
        return view('admin.portofolio.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portofolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['nama']          = $request->nama;
        $data['alamat']        = $request->alamat;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['usia']          = $request->usia;
        $data['jenis_kelamin'] = $request->jenis_kelamin;
        $data['pendidikan']    = $request->pendidikan;
        $data['pengalaman']    = $request->pengalaman;
        $data['keterampilan']  = $request->keterampilan;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_portofolio', 'public');
        }

        Portofolio::create($data);

        return redirect()->route('portofolio.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $portofolio = Portofolio::findOrFail($id);
        return view('admin.portofolio.show', compact('portofolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataPortofolio'] = Portofolio::findOrFail($id);
        return view('admin.portofolio.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portofolio = Portofolio::findOrFail($id);

        $data = [
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia'          => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan'    => $request->pendidikan,
            'pengalaman'    => $request->pengalaman,
            'keterampilan'  => $request->keterampilan,
        ];

        if ($request->hasFile('foto')) {
            if ($portofolio->foto && Storage::disk('public')->exists($portofolio->foto)) {
                Storage::disk('public')->delete($portofolio->foto);
            }

            $data['foto'] = $request->file('foto')->store('foto_portofolio', 'public');
        }

        $portofolio->update($data);

        return redirect()->route('portofolio.index')->with('success', 'Pembaruan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portofolio = Portofolio::findOrFail($id);
        if ($portofolio->foto && Storage::disk('public')->exists($portofolio->foto)) {
            Storage::disk('public')->delete($portofolio->foto);
        }
        $portofolio->delete();
        return redirect()->route('portofolio.index')->with('success', 'Data Portofolio Berhasil Dihapus!');

    }
}
