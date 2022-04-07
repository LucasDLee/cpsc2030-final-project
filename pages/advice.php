<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require_once '../php/form-submission.php';

    $pdo = db_connect();
    
    function display_all_inquiries() {
        try {
            global $pdo;
            $display = 'SELECT * FROM Inquiries ORDER BY id DESC'; //most recent comment

            $result = $pdo->query($display);

            $inquries = array();

            while($row = $result->fetch()) {
                $inquries[] = $row;
            }

            for($i = 0; $i < count($inquries); $i++) {
                echo "<div aria-label='section with a person&apos;s inquiry' class='inquiry'> 
                        <h3>" . $inquries[$i]['name'] . "</h3>
                        <h4>" . $inquries[$i]['topic'] . "</h4>
                        <p>" . $inquries[$i]['date'] . "</p>
                        <p>" . $inquries[$i]['inquiryText'] . "</p>
                    </div>";
            }
        } catch(PDOException $e) {
            echo "<p aria-label='database error' class='alert'>Sorry, we couldn't get the messages. " . $e->getMessage() . "</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Advice and Questions</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <header>
            <h1>Advice and Questions</h1>
            <p>We're here to help!</p>
        </header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="advice.php">Advice</a></li>
                <li><a href="documentation.html">Documentation</a></li>
            </ul>
        </nav>
        <main>
            <section class='form'>
                <h2>Got a question or want to share some advice? Go ahead and let us know!</h2>
                <form method="POST">
                    <label for="name">Name (required): </label>
                    <input type="text" name="name" required>
                    <?php validate('name') ?>
                    <label for="topic">Topic:</label>
                    <select name="topic">
                        <option value="Tools">Tools</option>
                        <option value="Plants">Plants</option>
                        <option value="Seasons">Seasons</option>
                        <option value="General Help/Advice">General Help/Advice</option>
                    </select>
                    <label for="inquiry">Your Question/Advice (required): </label>
                    <textarea type="text" name="inquiry" rows="10" cols="50" required></textarea>
                    <?php validate('inquiry') ?>
                    <button type="submit" name="submit">Submit</button>
                </form>
            </section>
            <?php
                submit();
                display_all_inquiries();
            ?>
        </main>
        <footer>
            <p>Developed and designed by Lucas Lee. See sources in the Documentation page.</p>
        </footer>
    </body>
</html>