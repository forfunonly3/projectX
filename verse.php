<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.ourmanna.com/verses/api/get/?format=json",
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
		$text = $json['verse']['details']['text'];
		$reference = $json['verse']['details']['reference'];
		$version = $json['verse']['details']['version'];
		$verseurl = $json['verse']['details']['verseurl'];
		$notice = $json['verse']['notice'];
	}
}
?>

  <h2 class="text-center">Daily Verse</h2>
  <span align="center"><?php echo $text; ?><br/>
  - <?php echo $reference; ?> <?php echo $version; ?><br/>
  Powered by <a href="http://www.ourmanna.com/">OurManna.com</a></span>

 
