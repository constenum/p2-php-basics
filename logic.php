<?php

# Arrays of words, numbers, and symbols

# Convert CSV file to an array of single words
$word_list = [];
$file = file_get_contents('word_list.csv');
$lines = explode(PHP_EOL, $file);
foreach ($lines as $line) {
    $word_list = str_getcsv($line);
}

$numbers_list = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
$symbols_list = ['(', ')', '`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '-', '+', '=', '|', '\\', '{', '}', '[', ']', ':', ';', '"', '\'', '<', '>', ',', '.', '?', '/'];

# Variables displayed in HTML
$xkcd_password = '';
$errors = '';

# Logic to generate xkcd password
if ($_GET) {

	$number_of_words = rand(intval($_GET['min']), intval($_GET['max']));

	if ($_GET['min'] == '' && $_GET['max'] == '') {
		$errors = "You must select a minimum and maximum number of words.";
	}
	elseif ($_GET['min'] == '') {
		$errors = "You must select a minimum number of words.";
	}
	elseif ($_GET['max'] == '') {
		$errors = "You must select a maximum number of words.";
	}
	elseif (intval($_GET['max']) < intval($_GET['min'])) {
		$errors = 'Maximum number of words cannot be less than minimum number of words.';
	}
	else {
		$rand_words = '';
		for ($i = 1; $i <= $number_of_words; $i++) {
	    	$rand_keys = array_rand($word_list, 1);
	    	$rand_words .= $word_list[$rand_keys]. " ";
		}
	
	$xkcd_password = rtrim($rand_words);
	}

	if (isset($_GET['number'])) {
		$rand_number = strval($numbers_list[rand(0,count($numbers_list)-1)]);
		$xkcd_password .= $rand_number;
	}

	if (isset($_GET['symbol'])) {
		$rand_symbol = $symbols_list[rand(0,count($symbols_list)-1)];
		$xkcd_password .= $rand_symbol;
	}

	if (isset($_GET['capitalize'])) {
		$xkcd_password = ucwords($xkcd_password);
	}
}