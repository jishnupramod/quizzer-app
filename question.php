<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
    $number = (int) $_GET['n'];
    if($number == 1)
        $_SESSION['score'] = 0;
    $query = "select * from questions
                where question_number=$number";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $results->fetch_assoc();

    $query = "select * from questions";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $result->num_rows;
?>
<?php
    $number = (int) $_GET['n'];
    $query = "select * from choices
                where question_number=$number";
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
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
                <div class="current">
                    <?php echo "Question ". $number . " of ". $total; ?>
                </div>
                <p>
                    <?php echo $question['text'] ?>
                </p>
                <form method="POST" action="process.php">
                    <ul>
                        <?php while($row=$choices->fetch_assoc()) : ?>
                            <li>
                                <input name="choice" type="radio" value="<?php echo $row['id'];?>"/ />
                                <?php echo $row['text']; ?>
                            </li>
                        <?php endwhile ?>
                    </ul>
                    <input type="submit" value="Submit" / />
                    <input type="hidden" name="number" value="<?php echo $number; ?>" />
                </form>
            </div>
        </main>
        <footer>
            Copyright &copy 2019 Hello, Quizzer
        </footer>
    </body>
</html>
