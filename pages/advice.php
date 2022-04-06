<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    // require '../php/connect-database.php';
    require_once '../php/form-submission.php';

    $pdo = db_connect();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        submit();
    }
    
    function display_all_questions() {
        try {
            global $pdo;
            $display = 'SELECT * FROM Inquiries';

            $result = $pdo->query($display);

            // $result->execute();
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
            <p>Subtitle</p>
        </header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="advice.php">Advice</a></li>
                <li><a href="documentation.html">Documentation</a></li>
            </ul>
        </nav>
        <main>
            <section>
                <h2>Got a question or want to share some advice? Go ahead and let us know!</h2>
                <form method="POST">
                    <label for="name">Name (required): </label>
                    <input type="text" name="name" required>
                    <label for="topic">Topic:</label>
                    <select name="topic">
                        <option value="Tools">Tools</option>
                        <option value="Plants">Plants</option>
                        <option value="Seasons">Seasons</option>
                        <option value="General Help/Advice">General Help/Advice</option>
                    </select>
                    <label for="inquiry">Your Question/Advice: </label>
                    <textarea type="text" name="inquiry" rows="10" cols="50" required></textarea>
                    <button type="submit" name="submit">Submit</button>
                </form>
            </section>
            <?php
                display_all_questions();
            ?>
        </main>
        <footer>
        <p>Developed and designed by Lucas Lee. See sources in the Documentation page.</p>
            <a href="https://github.com/LucasDLee" target="_blank"><img src="../images/github.png" alt="github" height="50" width="50"></a>
        </footer>
    </body>
</html>