
@php

function getUserBrowser(){
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')){
		$browser = "Opera";
	}
	elseif (strpos($user_agent, 'Edge')){
		$browser = "Microsoft Edge";
	}
	elseif (strpos($user_agent, 'Chrome')){
		$browser = "Google Chrome";
	}
	elseif (strpos($user_agent, 'Safari')){
		$browser = "Safari";
	} 
	elseif (strpos($user_agent, 'Firefox')) {
		$browser = "Mozilla Firefox";
	}
	elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) {
		$browser = "Internet Explorer";
	} 
	else {
		$browser = "Other";
	}
	return $browser;
}

function getUserIpAddr(){
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

$this_ip = getUserIpAddr();
$this_browser = getUserBrowser();

$ip_details = json_decode(file_get_contents("http://ipinfo.io/".$this_ip."/geo"), true);
$all_countries = json_decode(file_get_contents("http://country.io/names.json"), true);
$c_code = $ip_details['country'];
$data['ip_address'] = $this_ip;
$data['country_code'] = $c_code;
if(array_key_exists($c_code,$all_countries))
{
    $data['country'] = $all_countries[$c_code];
}
$data['browser'] = $this_browser;
dd($data);
@endphp