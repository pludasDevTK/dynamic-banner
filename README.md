TeamSpeak Dynamic Banner
========================

A TeamSpeak3 Server Dynamic PHP Banner 


## Installation

``` bash
sudo apt-get install php5.6

sudo apt-get install apache2 php5.6 libapache2-mod-php5.6

sudo apt-get install php5.6-gd

sudo systemctl restart apache2
```


## Config

The following example shows the most basic setup possible. Note that it 
config.

``` js
$config = array (
	'login' => array (
		'ip' => "127.0.0.1",
		'tport' => '9987',
		'qport' => '10011',
		'name' => "Banner",
		'qlogin' => 'serveradmin',
		'qpass' => "password",
)
);
```

WEB SITE [pludasDevTK].
