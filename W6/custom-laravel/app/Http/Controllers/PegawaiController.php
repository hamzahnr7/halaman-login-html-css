<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PegawaiModel;

class PegawaiController extends Controller
{
    public function index()
    {
    	$pegawai = DB::table('pegawai')->get();
 
    	return view('homepage', ['pegawai' => $pegawai]);
 
    }
	public function createData(Request $req)
	{
		$valid = $req->validate([
			'nama' => 'required|string',
			'jabatan' => 'required|string',
			'umur' => 'required|numeric|digits_between:0,2',
			'alamat' => 'required|string',
		]);

		if (!$valid) {
			return 'Input Invalid';
		}

		$data = $req->only(['nama','jabatan','umur','alamat']);
		
		PegawaiModel::create($data);

		return redirect()->back();
	}
	public function getData($id)
	{
		$data = PegawaiModel::find($id);
		return $data;
	}
	public function updateData(Request $req, $id)
	{
		$valid = $req->validate([
			'nama' => 'required|string',
			'jabatan' => 'required|string',
			'umur' => 'required|numeric|digits_between:0,2',
			'alamat' => 'required|string',
		]);
		$data = DB::table('pegawai')->where('id', $id)->first();
		if ($data) {
			$updated = DB::table('pegawai')->where('id', $id)->update([
				'nama' => $req->nama,
				'jabatan' => $req->jabatan,
				'umur' => $req->umur,
				'alamat' => $req->alamat,
			]);
			return $updated;
		}
		return false;

	}
	public function deleteData($id)
	{
		$data = PegawaiModel::findOrFail($id);

		$data->delete();

		return redirect()->back();
	}
}
