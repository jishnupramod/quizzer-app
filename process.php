<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
    if(!isset($_SESSION['score']))
        $_SESSION['score'] = 0;

    if($_POST) {
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];

        $query = "select * from questions";
        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total = $results->num_rows;

        $query = "select * from choices where
                    question_number = $number and
                    is_correct = 1";

        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $row = $result->fetch_assoc();
        $correct_choice = $row['id'];

        $next = ++$number;

        if($selected_choice == $correct_choice) {
            $_SESSION['score']++;
        }
        if($number == $total+1)
            header("Location: final.php");
        else
            header("Location: question.php?n=".$next);
    }
