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
  <header>
    <a href="http://www.clker.com/clipart-331561.html"><img src="images/computer_lock.png" width="100px" alt="Computer Lock image"></a>
    <h1>xkcd Password Generator</h1>
  </header>

  <main>
    <div>
      <div class="xkcd">
        <?php echo $xkcd_password ?>
      </div>
      <div class="<?php echo $error_class ?>">
        <?php echo $errors ?>
      </div>
    </div>

    <form action="index.php" method="GET">
      <fieldset>
        <legend><h3>xkcd Password Configuration</h3></legend>
        <p>
          <label for="min" class="block">Minimum number of words <em>(no less than 4)</em></label>
          <input type="number" id="min" name="min" min="4" max="8" value="4" autofocus="autofocus">
        </p>
        <p>
          <label for="max" class="block">Maximum number of words <em>(no more than 8)</em></label>
          <input type="number" id="max" name="max" min="4" max="8" value="8">
        </p>
      </fieldset>
      
      <fieldset>
        <legend><h3>xkcd Password Extras</h3></legend>
        <p>
          <input type="checkbox" id="number" name="number">
          <label for="number">Add digit(s) to the last word</label>
        </p>
        <p>
          <label for="numbers" class="indent">How many digits <em>(between 1 and 9)</em></label>
          <input type="number" id="numbers" name="numbers" min="1" max="9">
        </p>
        <p>
          <input type="checkbox" id="symbol" name="symbol">
          <label for="symbol">Add symbol(s) to the last word</label>
        </p>
        <p>
          <label for="symbols" class="indent">How many symbols <em>(between 1 and 3)</em></label>
          <input type="number" id="symbols" name="symbols" min="1" max="3">
        </p>
        <p>
          <input type="checkbox" id="capitalize" name="capitalize">
          <label for="capitalize">Capitalize the first letter of each word</label>
        </p>
      </fieldset>
      
      <input type="submit" id="submit" name="submit" value="Generate Password">
    </form>
  </main>

  <footer>
      <p>&copy; 2016 Mark Miller</p>
  </footer>
</body>
</html>