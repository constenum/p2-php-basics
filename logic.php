<?php

# Arrays of words, numbers, and sybols
$word_list = ['Beet', 'Corn', 'Dill', 'Guar', 'Kale', 'Leek', 'Okra', 'Peas', 'Pear', 'Yams', 'Anise', 'Apple', 'Beans', 'Chaya', 'Chufa', 'Grape', 'Guava', 'Mango', 'Onion', 'Orach', 'Pecan', 'Bamboo', 'Banana', 'Capers', 'Carrot', 'Celery', 'Chives', 'Citron', 'Endive', 'Fennel', 'Garlic', 'Ginger', 'Gourds', 'Longan', 'Loquat', 'Lovage', 'Lychee', 'Papaya', 'Pepper', 'Pitaya', 'Potato', 'Radish', 'Rakkyo', 'Squash', 'Tomato', 'Turnip', 'Atemoya', 'Avocado', 'Burdock', 'Cabbage', 'Cardoon', 'Celtuce', 'Chayote', 'Chicory', 'Comfrey', 'Eugenia', 'Ginseng', 'Lentils', 'Lettuce', 'Mustard', 'Paprika', 'Parsley', 'Parsnip', 'Pumpkin', 'Rampion', 'Rhubarb', 'Roselle', 'Saffron', 'Shallot', 'Skirret', 'Spinach', 'Achoccha', 'Amaranth', 'Angelica', 'Arrugula', 'Broccoli', 'Celeriac', 'Cilantro', 'Collards', 'Cucumber', 'Cushcush', 'Eggplant', 'Garbanzo', 'Kangkong', 'Kohlrabi', 'Martynia', 'Mushroom', 'Pimiento', 'Pokeweed', 'Purslane', 'Rutabaga', 'Seagrape', 'Truffles', 'Zucchini', 'Arrowroot', 'Artichoke', 'Asparagus', 'Blueberry', 'Dandelion', 'Jackfruit', 'Macadamia', 'Momordica', 'Persimmon', 'Pineapple', 'Radicchio', 'Raspberry', 'Sapodilla', 'Tomatillo', 'Blackberry', 'Jaboticaba', 'Naranjillo', 'Sassafrass', 'Scorzonera', 'Watercress', 'Watermelon'];
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