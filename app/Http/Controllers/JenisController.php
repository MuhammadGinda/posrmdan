<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Requests\UpdateJenisRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::with('user')->latest()->get();
        return view('jenis.index', compact('jenis'));
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        Jenis::create([
            'user_id'    => Auth::id() ?? $request->user_id,
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()->route('jenis.index')
            ->with('success', 'Jenis berhasil ditambahkan.');
    }

    public function show(Jenis $jenis)
    {
        $jenis->load(['produk', 'user']);
        return view('jenis.show', compact('jenis'));
    }

    public function edit(Jenis $jenis)
    {
        $this->authorize('update', $jenis);

        $jenisList = Jenis::all();

        return view('jenis.edit', compact('jenis', 'jenisList'));
    }

    public function update(UpdateJenisRequest $request, Jenis $jenis)
    {
        $this->authorize('update', $jenis);

        $dataReq = $request->validated();

        $data = [
            'user_id'    => Auth::id() ?? $jenis->user_id,
            'nama_jenis' => $dataReq['nama_jenis'],
        ];

        $jenis->update($data);

        return redirect()->route('jenis.index')
            ->with('success', 'Jenis berhasil diperbarui.');
    }

    public function destroy(Jenis $jenis)
    {
        $this->authorize('delete', $jenis);

        if (!empty($jenis->foto) && Storage::disk('public')->exists($jenis->foto)) {
            Storage::disk('public')->delete($jenis->foto);
        }

        $jenis->delete();

        return redirect()->route('jenis.index')
            ->with('success', 'Jenis berhasil dihapus.');
    }
}