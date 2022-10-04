<?php
/**
 *                         ts3admin banner php
 *                         ------------------                    
 *   begin                : Tuesday, October 4, 2022
 *   copyright            : pludasDevTK Hosting Solutions(C)2022
 *   email                : pludasDevTK@gmail.com
 *   version              : 0.1
 *
 *  This file is a powerful library for querying TeamSpeak3 servers.
 *  
 */
set_time_limit(0);

date_default_timezone_set("Asia/Colombo");

$config = array (
	'login' => array (
		'ip' => "168.138.185.21",
		'tport' => '9987',
		'qport' => '10011',
		'name' => "Banner-Bot",
		'qlogin' => 'serveradmin',
		'qpass' => "zjnhwYof",
)
);
header('Content-Type: image/png');
require_once("src/ts3admin.class.php");
global $tsAdmin;
$tsAdmin = new ts3admin($config['login']['ip'], $config['login']['qport']);
if($tsAdmin->succeeded($tsAdmin->connect())) {
        	
	        $tsAdmin->login($config['login']['qlogin'], $config['login']['qpass']);
	        $tsAdmin->selectServer($config['login']['tport']);
	        $tsAdmin->login($config['login']['qlogin'], $config['login']['qpass']);
	        $tsAdmin->setName($config['login']['name']);
			
            $info = $tsAdmin->getElement('data', $tsAdmin->serverInfo());			
			
            $online = $info['virtualserver_clientsonline'] - $info['virtualserver_queryclientsonline'];
						
			$channels = $info['virtualserver_channelsonline'];
			
			
			$tsAdmin->logout();
}

$img = imagecreatefrompng("banner.png");

$color = ImageColorAllocate($img, 242, 242, 242);

$hour = date("h:i");

$date = date("Y/m/d");

$message_online = "Online";

$message_Channels = "Channels";

imagettftext($img, 30, 0, 680, 50, $color, "./src/font_1.ttf", $hour);

imagettftext($img, 30, 0, 550, 100, $color, "./src/font_1.ttf", $date);

imagettftext($img, 29, 0, 95, 80, $color, "./src/font_2.ttf", $online);

imagettftext($img, 29, 0, 80, 160, $color, "./src/font_2.ttf", $channels);

imagettftext($img, 20, 0, 60, 40, $color, "./src/font_1.ttf", $message_online);

imagettftext($img, 20, 0, 40, 120, $color, "./src/font_1.ttf", $message_Channels);


imagepng($img);
imagedestroy($img);

?>