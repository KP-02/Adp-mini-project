<!-- This is the actual quiz page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The quiz page</title>
</head>
<style>
.circle {
  width: 100px;
  height: 100px;
  line-height: 100px;
  border-radius: 50%;
  font-size: 50px;
  color: #fff;
  text-align: center;
  background: #000
}
</style>
<body>
<header>
    <div class="heading">
    <h1 id = 'quiz_name'>The quiz name</h1>
    <p id = 'teacher_name'>Author name</p>
    </div>
</header>
<b>QUESTION NUMBER - <span id="qn_no"></span></b><br>
<div class="circle" id="countdown"></div><br><br>
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
<input type="submit" value="submit form" id="submit">
</form>
<button id="auto_next" onclick="auto_timer();">AUTO</button>
<button onclick = 'next_timer();' id = 'next-btn'>Next</button>
</section>
<br><br>
<?php
include 'script.php';
?>
</body>
</html>