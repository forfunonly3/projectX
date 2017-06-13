<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.openweathermap.org/data/2.5/weather?lat=51.232330&lon=6.717960&units=metric&appid=dfc50f2b3d10f673ff440e99f1fa267d",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {  echo "cURL Error #:" . $err;}
else {
	if($response=="[]") {echo "No data";}
	else{
		$json=json_decode($response,true);
		$test = "<pre>".json_encode($json, JSON_PRETTY_PRINT)."</pre>";
		//echo $test;
		$current = $json['main']['temp'];
		$min = $json['main']['temp_min'];
		$max = $json['main']['temp_max'];
		$description = $json['weather'][0]['description'];
		$icon = $json['weather'][0]['icon'];
	}
}
?>

  <h2 class="text-center">Forecast</h2>
  Weather in Duesseldorf, <?php echo date("H:i M d"); ?><br/>
  <img src="img/weather/<?php echo $icon; ?>.png" alt="icon"> <?php echo $min; ?> &deg;C - <?php echo $max; ?> &deg;C<br/>
  Current: <?php echo intval($current); ?> &deg;C, <?php echo $description; ?><br/>
  Powered by <a href="https://openweathermap.org/">OpenWeatherMap</a>

 
