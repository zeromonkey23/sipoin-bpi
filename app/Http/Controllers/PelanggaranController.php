<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pelanggaran;

class PelanggaranController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$pelanggaran_list=Pelanggaran::all();
		$pelanggaran_a= Pelanggaran::where('kategori', 'a')->get();
		$pelanggaran_b= Pelanggaran::where('kategori', 'b')->get();
		$pelanggaran_c= Pelanggaran::where('kategori', 'c')->get();
		$pelanggaran_d= Pelanggaran::where('kategori', 'd')->get();
		$pelanggaran_e= Pelanggaran::where('kategori', 'e')->get();
		return view('pelanggaran.index', compact('pelanggaran_list','pelanggaran_a','pelanggaran_b','pelanggaran_c','pelanggaran_d','pelanggaran_e'));
	}

	public function create()
	{
		return view('pelanggaran.create', compact('halaman'));
	}
	public function store(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
		'kode_pelanggaran' => 'required|string|max:9|unique:pelanggaran,kode_pelanggaran',
		'kategori' => 'required|',
		'jenis_pelanggaran' => 'required|string',
		'poin' => 'required|integer',
		]);
		$pelanggaran=Pelanggaran::create($input);
		//Pelanggaran::create($request->all());
		return redirect('pelanggaran');
	}
	public function destroy($id) {
		$pelanggaran = Pelanggaran::findOrFail($id);
		$pelanggaran->delete();
		return redirect('pelanggaran');
	}
}