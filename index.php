<?php
require 'logic.php';
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>xkcd Password Generator</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
  <div>
    <div>
    <h1>xkcd Password Generator</h1>
      <h2>Your new password is:</h2>
    </div>
    <div>
      <?php echo $xkcd_password ?>
    </div>
  </div>

  <div>
    <?php echo $errors ?>
  </div>

  <div>
    <form action="index.php" method="GET">
      <fieldset>
        <legend><h3>xkcd Password Configuration</h3></legend>
        <p>
          <label for="min" class="block">Minimum number of words <em>(no less than 4)</em></label>
          <input type="number" id="min" name="min" min="4" max="8" autofocus="autofocus">
        </p>
        <p>
          <label for="max" class="block">Maximum number of words <em>(no more than 8)</em></label>
          <input type="number" id="max" name="max" min="4" max="8">
        </p>
      </fieldset>
      
      <fieldset>
        <legend><h3>xkcd Password Extras</h3></legend>
        <p>
          <input type="checkbox" id="number" name="number">
          <label for="number">Add a number to the last word</label>
        </p>
        <p>
          <input type="checkbox" id="symbol" name="symbol">
          <label for="symbol">Add symbol(s) to the last word</label>
        </p>
        <p>
          <input type="checkbox" id="capitalize" name="capitalize">
          <label for="capitalize">Capitalize the first letter of each word</label>
        </p>
      </fieldset>
      
      <input type="submit" id="submit" name="submit" value="Generate Password">
    </form>
  </div>
  
</body>
</html>