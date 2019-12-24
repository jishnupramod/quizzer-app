<?php include 'database.php'; ?>
<?php

    if(isset($_POST['submit'])) {
        $question_number = $_POST['question_number'];
        $question_text = $_POST['question_text'];

        $choices = array();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];

        $correct_choice = $_POST['correct_choice'];

        $query = "insert into questions (question_number, text)
                    values ('$question_number', '$question_text')";
        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

        if($insert_row) {
            foreach($choices as $choice => $value) {
                if($value != '') {
                    if($correct_choice == $choice)
                        $is_correct = 1;
                    else
                        $is_correct = 0;

                    $query = "insert into choices (question_number, is_correct, text)
                                values ('$question_number', '$is_correct', '$value')";
                    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
                    if($insert_row)
                        continue;
                    else
                        die("Error : (". $mysqli->errno . ")". $mysqli->error);
                }
            }
            $msg = "Question has been added";
        }
    }
    $query = "select * from questions";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Quizzer Buddy</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" / />
    </head>
    <body>
        <header>
            <div class="container">
                <h1>Hello, Quizzer</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <h2>Add A Question</h2>
                <?php
                    if(isset($msg)) {
                        echo "<p>". $msg ."</p>";
                    }
                ?>
                <form method="post" action="add.php">
                    <p>
                        <label>Question Number: </label>
                        <input type="number" name="question_number" value="<?php echo $total+1; ?>"/ />
                    </p>
                    <p>
                        <label>Question Text: </label>
                        <input type="text" name="question_text" / />
                    </p>
                    <p>
                        <label>Choice #1: </label>
                        <input type="text" name="choice1" / />
                    </p>
                    <p>
                        <label>Choice #2: </label>
                        <input type="text" name="choice2" / />
                    </p>
                    <p>
                        <label>Choice #3: </label>
                        <input type="text" name="choice3" / />
                    </p>
                    <p>
                        <label>Choice #4: </label>
                        <input type="text" name="choice4" / />
                    </p>
                    <p>
                        <label>Correct Choice: </label>
                        <input type="number" name="correct_choice" / />
                    </p>
                    <input type="submit" name="submit" value="Submit" / />
                </form>
            </div>
        </main>
        <footer>
            Copyright &copy 2019 Hello, Quizzer
        </footer>
    </body>
</html>
