<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Pelanggaran_Siswa;
use App\Penghargaan_Siswa;
use App\Laporan;
use Carbon\Carbon;
use DB;

class LaporanController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		setlocale(LC_TIME, 'Indonesian');
		Carbon::setlocale('id');
		$dt=Carbon::now();
		$pelanggaran= Pelanggaran_Siswa::orderBy('created_at')->get();
		$penghargaan= Penghargaan_Siswa::orderBy('created_at')->get();
		//$laporan_list=$pelanggaran->union($penghargaan)->get();
		$i=0;
		$pelmax = $pelanggaran->count();
		$penmax = $penghargaan->count();
		//$siswa = Siswa::findOrFail($id);
		//$pelanggaran = Pelanggaran::findOrFail($pel);
		//$penghargaan = Penghargaan::findOrFail($pen);
		
		return view('laporan.index', compact('pelanggaran','i','penghargaan','pelmax','penmax','dt'));
	}

	public function create($id)
	{
		$siswa = Siswa::findOrFail($id);
		$list_pelanggaran = Pelanggaran::all();
		$list_penghargaan = Penghargaan::all();
		return view('laporan.create', compact('siswa', 'list_pelanggaran','list_penghargaan'));
	}
	public function store(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
		'no_induk' => 'required|string|max:9',
		'kode_pelanggaran' => 'sometimes',
		'kode_penghargaan' => 'sometimes',
		]);
		$laporan=Laporan::create($input);
		//Pelanggaran::create($request->all());
		return redirect('laporan');
	}
	public function destroy($id) {
		$pelanggaran = Pelanggaran::findOrFail($id);
		$pelanggaran->delete();
		return redirect('pelanggaran');
	}
}