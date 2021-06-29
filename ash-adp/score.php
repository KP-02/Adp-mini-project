<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="complete_css.css">
<title> SCORE PAGE </title>
</head>

<body>

<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "quick_quiz";
$conn = mysqli_connect ($server, $user, $password, $database);
echo "<br> <br>";
echo "<center>";
if(!$conn) {
	echo "<h3> ERROR 404. NOT FOUND </h3>";
}

// $quiz_display = "SELECT A.correct_option, B.answer_value, A.question_id, C.id, C.question, C.option_a, C.option_b, C.option_c, C.option_d FROM answer_table A, user_input B, question_table C WHERE A.question_id = B.question_id AND A.question_id = C.id ORDER BY A.question_id ASC";
$quiz_display = "SELECT A.question_id, A.correct_option, B.question,B.option_a,B.option_b,B.option_c,B.option_d ,C.user_answer FROM answer_table A,question_table B,user_input C 
WHERE  A.question_id = B.question_id AND A.question_id = C.question_id AND A.quiz_name = B.quiz_name AND C.quiz_name = A.quiz_name AND A.quiz_id = B.quiz_id AND C.quiz_id = A.quiz_id";
$result = mysqli_query ($conn, $quiz_display);
$arr = array();  
$score = 0;
$tot_score = 0;
$correct_answer = "<span style='color: GREEN'>";
$wrong_answer = "<span style='color: RED'>";
$other_answers = "<span style='color: BLACK'>";
$span_close = "</span>"; 

if($result) {
	echo "<div>";
	while($arr = mysqli_fetch_assoc($result)) {
		$user_values = array($other_answers, $other_answers, $other_answers, $other_answers);
		$user_values[$arr['correct_option']-1] = $correct_answer;
		$score = 0;
		if($arr['user_answer'] == $arr['correct_option']) {
			$score = 2;
		}
		else if ($arr['user_answer'] === 0) {
			
		}
		else {
			$user_values[$arr['user_answer']-1] = $wrong_answer;
		}
		$tot_score += $score;
		echo "<p>" . $arr['question_id']. " . "  . $arr['question'] . "<br>";
		echo $user_values[0] . $arr['option_a'] . $span_close . "<br>" . $user_values[1] . $arr['option_b'] . $span_close . "<br>" . $user_values[2] . $arr['option_c'] . $span_close . "<br>" . $user_values[3] . $arr['option_d'] . $span_close;
		echo "</p>";
	}
	echo "</div>";
	echo "<h3> YOUR TOTAL SCORE IS :  " . $tot_score . "</h3>";
}

echo "</center>";

?>

</body>

</html>