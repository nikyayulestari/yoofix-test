<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Carbon\Carbon;
use App\Fixer;
use App\Service;
use GuzzleHttp\Client;

class fixerController extends Controller {
	public function index(){
		//API Provinsi
		$client = new Client();
		try{
			$response = $client->get('https://api.rajaongkir.com/starter/province',
				array(
					'headers' => array(
						'key' => '1afccfe7fbda1f6afea683c0e69729d3',
						)
					)
				);
		} catch(RequestException $e){
			var_dump($e->getResponse()->getBody()->getContents());
		}

		$json = $response->getBody()->getContents();

		$array_result = json_decode($json, true);
		
		//print_r($array_result);

		$data_province = $array_result["rajaongkir"]["results"];

		//API kota
		$client = new Client();
		try{
			$response = $client->get('https://api.rajaongkir.com/starter/city',
				array(
					'headers' => array(
						'key' => '1afccfe7fbda1f6afea683c0e69729d3',
						)
					)
				);
		} catch(RequestException $e){
			var_dump($e->getResponse()->getBody()->getContents());
		}

		$json = $response->getBody()->getContents();

		$array_result = json_decode($json, true);
		
		//print_r($array_result);

		$data_city = $array_result["rajaongkir"]["results"];

		//print_r($data_city);

		$data_service= \App\Service::all();
		
		return view('fixer',['data_service'=> $data_service, 'data_province'=> $data_province, 'data_city'=> $data_city]);

	}

	public function create(Request $request){
		$cariakun = Fixer::where([['nameFixer', '=', request('nameFixer')],['addressFixer', '=', request('addressFixer')]])->first();
		if(!empty($cariakun)){
			return redirect('/fixer')->with('gagal','Sign up fixer failed! Please try again.');
		}else{
			$IDService = Service::where('nameService', request('nameService'))->value('IDService');
			\App\Fixer::create([
			'nameFixer'=>request('nameFixer'),
			'cityFixer'=>request('cityFixer'),
			'provinceFixer'=>request('provinceFixer'),
			'addressFixer'=>request('addressFixer'),
			'IDService'=> $IDService
			]);
			$IDFixer = Fixer::where('nameFixer', request('nameFixer'))->value('IDFixer');
			$request->session()->put('IDFixer', $IDFixer);
			return redirect('/dashboardFixer')->with('sukses','Welcome to Yoofix'.request('nameFixer').'!');
		}
	}
}