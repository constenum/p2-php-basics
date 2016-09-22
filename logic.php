<?php

# Arrays of words, numbers, and symbols

# Convert CSV file to an array of single words
$word_list = [];
$file = file_get_contents("word_list.csv");
$lines = explode(PHP_EOL, $file);
foreach ($lines as $line) {
    $word_list = str_getcsv($line);
}

$numbers_list = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
$symbols_list = ["(", ")", "`", "~", "!", "@", "#", "$", "%", "^", "&", "*", "-", "+", "=", "|", "\\", "{", "}", "[", "]", ":", ";", "\"", "'", "<", ">", ",", ".", "?", "/"];

# Variables displayed in HTML
$xkcd_password = "";
$errors = "";

# Logic to generate xkcd password
if ($_GET) {
	$number_of_words = rand(intval($_GET["min"]), intval($_GET["max"]));
	$number_of_digits = intval($_GET["numbers"]);
	$number_of_symbols = intval($_GET["symbols"]);

	# Error checking
	if ($_GET["min"] == "" && $_GET["max"] == "") {
		$errors .= "You must select a minimum and maximum number of words." . "<br>";
	}
	elseif ($_GET["min"] == "") {
		$errors .= "You must select a minimum number of words." . "<br>";
	}
	elseif ($_GET["max"] == "") {
		$errors .= "You must select a maximum number of words." . "<br>";
	}
	elseif (intval($_GET["max"]) < intval($_GET["min"])) {
		$errors .= "Maximum number of words cannot be less than minimum number of words." . "<br>";
	}

	if (!isset($_GET["number"]) && $number_of_digits > 0) {
		$errors .= "You must check the box to add numbers." . "<br>";
	}
	elseif (isset($_GET["number"]) && $number_of_digits == 0) {
		$errors .= "You must select the number of digits to be added." . "<br>";
	}

	if (!isset($_GET["symbol"]) && $number_of_symbols > 0) {
		$errors .= "You must check the box to add symbols." . "<br>";
	}
	elseif (isset($_GET["symbol"]) && $number_of_symbols == 0) {
		$errors .= "You must select the number of symbols to be added." . "<br>";
	}
	
	# Generate password
	if(empty($errors)) {
		$rand_words = "";
		for ($i = 1; $i <= $number_of_words; $i++) {
	    	$rand_keys = array_rand($word_list, 1);
	    	$rand_words .= $word_list[$rand_keys]. " ";
		}
	
	$xkcd_password = rtrim($rand_words);

		if (isset($_GET["number"]) && isset($_GET["numbers"])) {
			for ($i = 1; $i <= $number_of_digits; $i++) {
		    	$rand_keys = array_rand($numbers_list, 1);
		    	$xkcd_password .= $numbers_list[$rand_keys];
			}
		}

		if (isset($_GET["symbol"]) && isset($_GET["symbols"])) {
			for ($i = 1; $i <= $number_of_symbols; $i++) {
		    	$rand_keys = array_rand($symbols_list, 1);
		    	$xkcd_password .= $symbols_list[$rand_keys];
			}
		}

		if (isset($_GET["capitalize"])) {
			$xkcd_password = ucwords($xkcd_password);
		}
	}
}