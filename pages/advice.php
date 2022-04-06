<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    function display_all_questions() {
        
    }
    
    require '../php/connect-database.php';
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
                <form action="../php/form-submission.php" method="POST">
                    <label for="name">Name (required): </label>
                    <input type="text" name="name" required>
                    <label for="topic">Topic:</label>
                    <select name="topic">
                        <option value="Tools">Tools</option>
                        <option value="Plants">Plants</option>
                        <option value="Seasons">Seasons</option>
                        <option value="General Help/Advice">General Help/Advice</option>
                    </select>
                    <label for="advice">Your Question/Advice: </label>
                    <textarea type="text" name="advice" rows="10" cols="50" required>Place your question here!</textarea>
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