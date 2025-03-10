<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PengalamanKerja;

class PengalamanKerjaController extends Controller
{
    public function index()
    {
        $pengalaman_kerja = PengalamanKerja::all();
        return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
    }

    public function create()
    {
        return view('backend.pengalaman_kerja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'jabatan' => 'required|string|min:2',
            'tahun_masuk' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'tahun_keluar' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        PengalamanKerja::create($request->all());

        return redirect()->route('pengalaman_kerja.index')
            ->with('success', 'Data pengalaman kerja berhasil disimpan');
    }

    public function edit(PengalamanKerja $pengalaman_kerja)
    {
        return view('backend.pengalaman_kerja.edit', compact('pengalaman_kerja'));
    }

    public function update(Request $request, PengalamanKerja $pengalaman_kerja)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'jabatan' => 'required|string|min:2',
            'tahun_masuk' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'tahun_keluar' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        $pengalaman_kerja->update($request->all());

        return redirect()->route('pengalaman_kerja.index')
            ->with('success', 'Data pengalaman kerja berhasil diperbarui');
    }

    public function destroy(PengalamanKerja $pengalaman_kerja)
    {
        $pengalaman_kerja->delete();

        return redirect()->route('pengalaman_kerja.index')
            ->with('success', 'Data pengalaman kerja berhasil dihapus');
    }
}
