<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>receive data</title>
</head>
<body>
    <?php
    $answers_string = $_POST['answers_string'];
    $answers_array = str_split($answers_string);
    #not entirely sure if we need the for loop 
    for ($i = 0; $i < count($answers_array); $i++) {
        $answers_array[$i] = (int)$answers_array[$i];
    }
    $server = 'localhost';
    $user = 'root';
    $password = "";
    $dbname = 'quick_quiz';
    $connection = mysqli_connect($server, $user, $password);
    mysqli_select_db($connection, $dbname);
    if (!$connection) {
        echo 'Connection to database failed';
    }
    #inserting into the database
    $question_selection_query = 'select id from question_table where teacher_id = 1';
    $question_ids = mysqli_query($connection, $question_selection_query);
    $question_ids_array = array();
    while ( $row = mysqli_fetch_assoc($question_ids)) {
        array_push($question_ids_array,$row['id']);
    }
    $i = 0;
    while ($i < 5) {
    $insertion_query = "INSERT INTO user_input(question_id,answer_value) VALUES ('$question_ids_array[$i]','$answers_array[$i]')";
    echo $question_ids_array[$i]."-".$answers_array[$i]."<br>";
    if(!mysqli_query($connection,$insertion_query)) {
        echo "Error in insertion".mysqli_error($connection);
    }
    $i++; 
    }
    ?>
</body>
</html>