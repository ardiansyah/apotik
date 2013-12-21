<?php

class ObatController extends BackendController {

	public function getObat(){

		$obat = Obat::all();

		return View::make('main.data-obat')
				->with('obat', $obat);
	}

	public function getPenjualan(){
		/*$value = session_id();
		echo $value;*/
		$temp = DB::select('select * from pembelian_temp where session_id=?', array(session_id()));
		$obat = Obat::all();
		return View::make('main.pembelian')
				->with('temp', $temp)
				->with('obat', $obat);
	}

	public function getDetailobat(){
		$kode = Input::get('kode');
		//$kode = '1';
		//$obat = User::find(1);
		$obat = Obat::where('kd_obat','=',$kode);
		//$obat = DB::select('select * from obat where kd_obat=?', array($kode));
		/*$obat = DB::table('obat')
					->select(DB::raw('*'))
					->where('kd_obat', $kode)
					->get();*/

		//return Response::view('ajax.detailobat')->header('Content-Type', 'text');

		return View::make('ajax.detailobat')
				->with('obat', $obat);
	}
}