<?php include 'database.php'; ?>
<?php
    $query = "select * from questions";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);

    $total = $results->num_rows;
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
                <h2>Test Your Knowledge</h2>
                <p>
                    This is a multiple choice quiz to test your knowledge.
                </p>
                <ul>
                    <li>
                        <strong>Number of Questions: </strong><?php echo $total; ?>
                    </li>
                    <li>
                        <strong>Type: </strong>Multiple Choice
                    </li>
                    <li>
                        <strong>Estimated Time: </strong>
                        <?php echo $total * 0.5 ?> Minute(s)
                    </li>
                </ul>
                <a href="question.php?n=1" class="start">START QUIZ</a>
            </div>
        </main>
        <footer>
            Copyright &copy 2019 Hello, Quizzer
        </footer>
    </body>
</html>
