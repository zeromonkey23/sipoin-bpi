<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Penghargaan;

class LapPenghargaanController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function create($id)
	{
		$siswa = Siswa::findOrFail($id);
		$list_penghargaan = Penghargaan::all();
		return view('laporan.create_pen', compact('siswa', 'list_penghargaan'));
	}
	public function store(Request $request)
	{
		$list_penghargaan = Penghargaan::all();
		$input = $request->all();
		$penghargaan=$request->input('kode_penghargaan');
		$no=$request->input('no_induk');
		$siswa = Siswa::find($no);
		$pen= Penghargaan::find($penghargaan);
		$poin_siswa= $siswa->poin+$pen->poin;
		$pen->siswa()->attach($siswa, ['poin_ubah'=>$pen->poin,'poin_sis'=>$poin_siswa]);
		//pengurangan poin
		$siswa->update(['poin'=>$poin_siswa]);
		return redirect('siswa');
	}
}
