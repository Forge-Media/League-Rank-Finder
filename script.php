<?php
chdir(__DIR__);

/*
lolrank/index.php

Is a small script which gets your teams League of Legends League Teir and displays it as a image.
Images are stored in 'members/summonername.jpg'
by Jeremy Paton - Forge Media

Requires: php-riot-api.php (https://github.com/kevinohashi/php-riot-api)

Please note this script uses CRON. Please settup a cron-job to call this, ideally 24hr intervals.
*/

include("php-riot-api.php");

//SumRegion
$summoner_region = 'euw';
$validation = 0;

//All your members array
//Max of 10 members if hosting on Heroku (30Sec Timeout rull, sigh)
$members = array("","","");
//Create new Riot API Session 
$test = new riotapi($summoner_region);
	//Loop through members array
	foreach ($members as $value) {
		//Get sumID from SumName
		$summoner_id = $test->getSummonerId($value);
		//Get all sumRANKED data
		$summoner_league_array = $test->getLeague($summoner_id, "entry");
		//Get sumLeague Tier
		$summoner_league = $summoner_league_array[$summoner_id][0/* thread id */]["tier"/* thread key */];
		//create League image from originals
	    if (!empty($summoner_league)) {
   			$file = "icons/".$summoner_league.".jpg";
			$newfile = "members/".$value.".jpg";
			$validation++;
			//Echo debug
			if (!copy($file, $newfile)) {
    			echo "failed to copy";
			}
		}
	}
//Echo errors
	if ($validation != count($members)) {
		$error_count = count($members) - $validation;
		echo "Members Array contains ".$error_count." invalid summoner name(s), please verify spelling!";	
	}
	else {
		echo "Operation successful all summoners matched with corresponding leagues";	
	}
?>