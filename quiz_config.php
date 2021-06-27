<!-- this file contains code for selecting the appropriate questions,quiz-name,teacher-name from the database table-->
    <?php
    $server = 'localhost';
    $user = 'root';
    $password = "";
    $dbname = 'quick_quiz';
    $connection = mysqli_connect($server, $user, $password);
    mysqli_select_db($connection, $dbname);
    if (!$connection) {
        echo 'Connection to database failed';
    }
    $select_questions_query = "SELECT question AS q,option_a AS a,option_b AS b,option_c AS c,option_d AS d FROM question_table where teacher_id = 1";
    $select_teacher_query = "SELECT quiz_name AS qn , teacher_name AS tn FROM teacher WHERE id = 1";
    $result1 = mysqli_query( $connection, $select_questions_query);
    $result2 = mysqli_query($connection,$select_teacher_query);
    $multi_assoc_array = array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
    array_push($multi_assoc_array, $row1);
    }
    $row2 = mysqli_fetch_assoc($result2);//as we are selecting only one row no loop is needed
    $_SESSION['questions_array'] = $multi_assoc_array;//passing the question table rows as a multidimensional associative array to script.php
    $_SESSION['names_array'] = $row2;
    ?>