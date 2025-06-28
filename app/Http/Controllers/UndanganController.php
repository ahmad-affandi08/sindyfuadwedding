<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UndanganController extends Controller
{
    public function show(string $namaTamu)
    {
        $namaDenganSpasi = str_replace(['-', '_'], ' ', $namaTamu);
        $namaTamuFormatted = ucwords(strtolower($namaDenganSpasi));

        $path = storage_path('app/rsvp.json');
        $rsvps = [];
        if (File::exists($path)) {
            $rsvps = json_decode(File::get($path), true);
            $rsvps = array_reverse($rsvps);
        }

        return view('undangan', [
            'namaTamu' => $namaTamuFormatted,
            'rsvps' => $rsvps
        ]);
    }

    public function storeRsvp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'kehadiran' => 'required|in:hadir,tidak_hadir',
            'pesan' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $newRsvp = [
            'nama' => $request->input('nama'),
            'kehadiran' => $request->input('kehadiran'),
            'pesan' => $request->input('pesan'),
            'waktu' => now()->timezone('Asia/Jakarta')->toIso8601String(),
        ];

        $path = storage_path('app/rsvp.json');
        $rsvps = [];
        if (File::exists($path)) {
            $rsvps = json_decode(File::get($path), true);
        }

        $rsvps[] = $newRsvp;

        File::put($path, json_encode($rsvps, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return response()->json(['success' => true, 'rsvp' => $newRsvp]);
    }
}
