<?php
date_default_timezone_set('Asia/Novokuznetsk'); 

$link = mysqli_connect('localhost', 'логин', 'пароль', 'название_базы') 
    or die("Ошибка " . mysqli_error($link));
 
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];
$browser = @$_SERVER['HTTP_USER_AGENT'];
$result  = array('country'=>'', 'city'=>'');
 
if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
else $ip = $remote;
 
$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
if($ip_data && $ip_data->geoplugin_countryName != null)
{
    $time = date('Y d-m') ." (".date("H:i:s").")";
    $region = $ip_data->geoplugin_region;
    $city = $ip_data->geoplugin_city;
}
$sql_values = "'".$time."','".$ip."','".$region."','".$city."','".$browser."'"; 

$sql = "INSERT INTO `visitors` (`id_visitor`, `time`, `ip`, `Region`, `City`, `browser`) VALUES (NULL,".$sql_values.")"; 
$result = $link->query($sql);

/*
     if($result == True) { echo "Данные записаны";}
  else {echo $sql;} 
*/  
  
    
mysqli_close($link); 

include "content.html";

?>






<?php
/*
http://cccp-blog.com/koding/opredelenie-goroda-po-ip-v-php
{
  "geoplugin_request":"195.208.128.3",
  "geoplugin_status":200,
  "geoplugin_credit":"Some of the returned data includes GeoLite data created by MaxMind, available from <a href='http:\/\/www.maxmind.com'>http:\/\/www.maxmind.com<\/a>.",
  "geoplugin_city":"Novosibirsk",
  "geoplugin_region":"Novosibirsk",
  "geoplugin_areaCode":"0",
  "geoplugin_dmaCode":"0",
  "geoplugin_countryCode":"RU",
  "geoplugin_countryName":"Russian Federation",
  "geoplugin_continentCode":"EU",
  "geoplugin_latitude":"55.09",
  "geoplugin_longitude":"82.6519",
  "geoplugin_regionCode":"53",
  "geoplugin_regionName":"Novosibirsk",
  "geoplugin_currencyCode":"RUB",
  "geoplugin_currencySymbol":"&#1088;&#1091;&#1073;",
  "geoplugin_currencySymbol_UTF8":"\u0440\u0443\u0431",
  "geoplugin_currencyConverter":58.9289
}
*/
?>