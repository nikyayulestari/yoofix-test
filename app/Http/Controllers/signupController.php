<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Carbon\Carbon;
use App\Usr;
use GuzzleHttp\Client;

class signupController extends Controller {
	public function index(){
		/*$data_province= \App\Province::all();
		return view('signup',['data_province'=> $data_province]);*/

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

		return view('signup',['data_province'=> $data_province, 'data_city'=> $data_city]);

	}

	public function create(Request $request){
		//$tglbergabung=Carbon::now();
		/*$testiPeng='Ini adalah pertama kalinya menggunakan seekerja.id';
		$fotoPeng='anonim.png';
		$fotoKTPPeng='';
		$ratingPeng=0;
		$emailPeng = request('emailPeng');
		*/
		
		$cariakun = Usr::where('emailUser', request('emailUser'))->first();
		if(!empty($cariakun))
			return redirect('/')->with('gagal','Sign up failed! Please try again.');
		else{
			\App\Usr::create([
			'emailUser'=>request('emailUser'),
			'nameUser'=>request('nameUser'),
			'cityUser'=>request('cityUser'),
			'provinceUser'=>request('provinceUser'),
			'addressUser'=>request('addressUser'),
			'kontakUser'=>request('kontakUser')
			]);
			$request->session()->put('emailUser', request('emailUser'));
			return redirect('/service')->with('sukses','Welcome to Yoofix '.request('nameUser').'!');
		}
	}
}