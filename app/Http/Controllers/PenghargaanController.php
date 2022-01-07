<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penghargaan;

class PenghargaanController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$penghargaan_list=Penghargaan::all();
		$penghargaan1= Penghargaan::where('kategori','i')->get();
		$penghargaan2= Penghargaan::where('kategori','ii')->get();
		$penghargaan3= Penghargaan::where('kategori','iii')->get();
		return view('penghargaan.index', compact('penghargaan_list','penghargaan1','penghargaan2','penghargaan3'));
	}

	public function create()
	{
		return view('penghargaan.create', compact('halaman'));
	}
	public function store(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
		'kode_penghargaan' => 'required|string|max:9|unique:penghargaan,kode_penghargaan',
		'kategori' => 'required',
		'jenis_penghargaan' => 'required|string',
		'poin' => 'required|integer',
		]);
		$penghargaan=Penghargaan::create($input);
		//Pelanggaran::create($request->all());
		return redirect('penghargaan');
	}
	public function destroy($id) {
		$penghargaan = Penghargaan::findOrFail($id);
		$penghargaan->delete();
		return redirect('penghargaan');
	}
}