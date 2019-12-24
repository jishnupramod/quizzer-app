<?php session_start(); ?>
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
                <h2> You're Done! </h2>
                <p>
                    Congrats! You've completed the test
                </p>
                <p>
                    Final Score: <?php echo $_SESSION['score']; ?>
                </p>
                <a href="question.php?n=1" class="start">Take Again</a>
            </div>
        </main>
        <footer>
            Copyright &copy 2019 Hello, Quizzer
        </footer>
    </body>
</html>
