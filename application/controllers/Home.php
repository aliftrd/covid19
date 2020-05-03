<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends AT_Controller
{
	protected $indonesia = 'https://kawalcovid19.harippe.id/api/summary';
	protected $local = 'https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&orderByFields=Kasus_Posi+DESC&f=json';
	protected $globals = 'https://services1.arcgis.com/0MSEUqKaxRlEPj5g/arcgis/rest/services/ncov_cases/FeatureServer/2/query?f=json&where=Confirmed%20%3E%200&returnGeometry=false&spatialRel=esriSpatialRelIntersects&outFields=*&orderByFields=Confirmed%20desc';
	protected $summary = 'https://kawalcovid19.harippe.id/api/summary';

	// ================ CONNECT POINT ================ //

	private function connect($point, $type = 'json')
	{
		$file_gets = file_get_contents($point);
		$json_result = ($type == 'json') ? json_decode($file_gets, true) : $file_gets;
		if (!$json_result) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.47 Safari/537.36');
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $point);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$chresult = curl_exec($ch);
			curl_close($ch);
			$json_result = ($type == 'json') ? json_decode($chresult, true) : $chresult;
		}
		return $json_result;
	}

	// ================ END CONNECT POINT ================ //





	// ================ ENDPOINT EXECUTE GLOBAL ================ //

	// Global
	private function globals()
	{
		$connect = $this->connect($this->globals);

		if (isset($connect['features'][0]['attributes']['Country_Region'])) {
			$data['positive'] = 0;
			$data['recovered'] = 0;
			$data['deaths'] = 0;
			foreach ($connect['features'] as $key => $dataGlobal) {
				$data['features'][$key]['country'] = $dataGlobal['attributes']['Country_Region'];
				$data['features'][$key]['confirmed'] = $dataGlobal['attributes']['Confirmed'];
				$data['features'][$key]['deaths'] = $dataGlobal['attributes']['Deaths'];
				$data['features'][$key]['recovered'] = $dataGlobal['attributes']['Recovered'];
				$data['features'][$key]['active'] = $dataGlobal['attributes']['Active'];
			}
			foreach ($connect['features'] as $totalData) {
				$data['positive'] += $totalData['attributes']['Confirmed'];
				$data['recovered'] += $totalData['attributes']['Recovered'];
				$data['deaths'] += $totalData['attributes']['Deaths'];
			}
		} else {
			if (isset($connect['error']['message'])) {
				return ['result' => false, 'data' => null, 'message' => $connect['error']['message']];
			} else {
				return ['result' => false, 'data' => null, 'message' => 'Failed to get data.'];
			}
		}

		return $data;
	}

	// ================ ENDPOINT EXECUTE GLOBAL ================ //





	// ================ ENDPOINT EXECUTE LOCAL ================ //

	// Local
	private function local()
	{
		$connect = $this->connect($this->local);

		if (isset($connect['features'][0]['attributes']['Provinsi'])) {
			foreach ($connect['features'] as $key => $dataLocal) {
				$data[$key]['province_code'] = $dataLocal['attributes']['Kode_Provi'];
				$data[$key]['province'] = $dataLocal['attributes']['Provinsi'];
				$data[$key]['confirmed'] = $dataLocal['attributes']['Kasus_Posi'];
				$data[$key]['recovered'] = $dataLocal['attributes']['Kasus_Semb'];
				$data[$key]['deaths'] = $dataLocal['attributes']['Kasus_Meni'];
			}
		} else {
			if (isset($connect['error']['message'])) {
				return ['result' => false, 'data' => null, 'message' => $connect['error']['message']];
			} else {
				return ['result' => false, 'data' => null, 'message' => 'Failed to get data.'];
			}
		}

		return $data;
	}

	// ================ ENDPOINT EXECUTE LOCAL ================ //




	// ================ ENDPOINT EXECUTE SUMMARY ================ //

	// Summary
	private function summary()
	{
		$connect = $this->connect($this->summary);

		if (isset($connect['confirmed'])) {
			$date = substr(str_replace('T', ' ', $connect['metadata']['lastUpdatedAt']), 0, 19);
			$data['confirmed'] = $connect['confirmed']['value'];
			$data['recovered'] = $connect['recovered']['value'];
			$data['deaths'] = $connect['deaths']['value'];
			$data['activeCare'] = $connect['activeCare']['value'];
			$data['update_at'] = date('d F Y H:i:s', strtotime('+7 hours', strtotime($date)));
		} else {
			if (isset($connect['error']['message'])) {
				return ['result' => false, 'data' => null, 'message' => $connect['error']['message']];
			} else {
				return ['result' => false, 'data' => null, 'message' => 'Failed to get data.'];
			}
		}

		return $data;
	}
	// ================ ENDPOINT EXECUTE SUMMARY ================ //




	// ================ INDEX ================ //

	public function index()
	{
		$globals = $this->globals();
		$summary = $this->summary();

		$this->show('index/index', compact('globals', 'summary'));
	}

	// ================ END INDEX ================ //




	// ================ INDONESIA ================ //

	public function global()
	{
		$globals = $this->globals();
		$summary = $this->summary();

		$this->show('index/global', compact('globals', 'summary'));
	}

	// ================ END INDONESIA ================ //




	// ================ INDONESIA ================ //

	public function indonesia()
	{
		$local = $this->local();
		$globals = $this->globals();
		$summary = $this->summary();

		$this->show('index/indonesia', compact('local', 'globals', 'summary'));
	}

	// ================ END INDONESIA ================ //




	// ================ ABOUT ================ //

	public function about_us()
	{
		$this->show('index/about');
	}

	// ================ END ABOUT ================ //
}
