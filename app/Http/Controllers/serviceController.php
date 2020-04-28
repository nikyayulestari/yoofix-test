<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Carbon\Carbon;
use App\Service;

class serviceController extends Controller {
	public function index(){
		$data_service= \App\Service::all();
		return view('service',['data_service'=> $data_service]);

	}

	public function create(Request $request){
		$cariakun = Service::where('nameService', request('nameService'))->first();
		if(!empty($cariakun)){
			return redirect('/service')->with('gagal','Add a new service was failed! Please try again.');
		}else{
			\App\Service::create([
				'nameService'=>request('nameService'),
				'priceService'=>request('priceService')
			]);
			return redirect('/service')->with('sukses','Success to add '.request('nameService').' as a new service.');
		}
	}

	public function update(Request $request, $IDService){
		$service = Service::find($IDService);
		$service->update([
			'nameService' => $request->nameService,
			'priceService' => $request->priceService
		]);
		return redirect('/service')->with('sukses','Service berhasil diubah.');
	}

	public function delete($IDService){
		$service = \App\Service::where('IDService', $IDService);
		$service->delete($service);
		return redirect('/service/')->with('sukses','Service berhasil dihapus.');
	}

}