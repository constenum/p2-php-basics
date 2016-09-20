<?php

# Arrays of words, numbers, and sybols
$word_list = ['Beet', 'Corn', 'Dill', 'Guar', 'Kale', 'Leek', 'Okra', 'Peas', 'Pear', 'Yams', 'Anise', 'Apple', 'Beans', 'Chaya', 'Chufa', 'Grape', 'Guava', 'Mango', 'Onion', 'Orach', 'Pecan', 'Bamboo', 'Banana', 'Capers', 'Carrot', 'Celery', 'Chives', 'Citron', 'Endive', 'Fennel', 'Garlic', 'Ginger', 'Gourds', 'Longan', 'Loquat', 'Lovage', 'Lychee', 'Papaya', 'Pepper', 'Pitaya', 'Potato', 'Radish', 'Rakkyo', 'Squash', 'Tomato', 'Turnip', 'Atemoya', 'Avocado', 'Burdock', 'Cabbage', 'Cardoon', 'Celtuce', 'Chayote', 'Chicory', 'Comfrey', 'Eugenia', 'Ginseng', 'Lentils', 'Lettuce', 'Mustard', 'Paprika', 'Parsley', 'Parsnip', 'Pumpkin', 'Rampion', 'Rhubarb', 'Roselle', 'Saffron', 'Shallot', 'Skirret', 'Spinach', 'Achoccha', 'Amaranth', 'Angelica', 'Arrugula', 'Broccoli', 'Celeriac', 'Cilantro', 'Collards', 'Cucumber', 'Cushcush', 'Eggplant', 'Garbanzo', 'Kangkong', 'Kohlrabi', 'Martynia', 'Mushroom', 'Pimiento', 'Pokeweed', 'Purslane', 'Rutabaga', 'Seagrape', 'Truffles', 'Zucchini', 'Arrowroot', 'Artichoke', 'Asparagus', 'Blueberry', 'Dandelion', 'Jackfruit', 'Macadamia', 'Momordica', 'Persimmon', 'Pineapple', 'Radicchio', 'Raspberry', 'Sapodilla', 'Tomatillo', 'Blackberry', 'Jaboticaba', 'Naranjillo', 'Sassafrass', 'Scorzonera', 'Watercress', 'Watermelon'];
$numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
$symbols = ['@', '%', '+', '\\', '/', '\'', '!', '#', '$', '^', '?', ':', '.', '(', ')', '{', '}', '[', ']', '~', '`', '', '', '-', '_'];

# Placeholder for errors
$errors = '';

if ($_GET) {

# temporary
var_dump($_GET);

	$number_of_words = rand(intval($_GET['min']), intval($_GET['max']));

	# temporary
	echo "<br><br>" . $number_of_words;

	if (intval($_GET['max']) < intval($_GET['min'])) {
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
}