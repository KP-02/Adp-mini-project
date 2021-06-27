<!-- This is the actual quiz page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The quiz page</title>
</head>
<body>
<header>
    <div class="heading">
    <h1 id = 'quiz_name'>The quiz name</h1>
    <p id = 'teacher_name'>Author name</p>
    </div>
</header>
<?php 
session_start();
include 'quiz_config.php';
?>
<section class="hero">
<form action="receive_data.php" method = 'POST'>
<div class="questions"></div>
<p id="question"></p>
<div class="options">
<input type="radio" name="option_list" id="a" value = 1>
<label for="a"></label>
<input type="radio" name="option_list" id="b"value = 2>
<label for="b"></label>
<input type="radio" name="option_list" id="c"value = 3>
<label for="c"></label>
<input type="radio" name="option_list" id="d"value = 4>
<label for="d"></label>
</div>
<input type="text" name="answers_string" id="important" value="" style = 'display:none'>
<input type="submit" value="submit form">
</form>
<button onclick = update_questions() id = 'next-btn'> Next</button>
</section>
<?php
include 'script.php';
?>
</body>
</html>