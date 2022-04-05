<?php
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <header>
            <h1>Documentation</h1>
            <p>Links to any images, text, and other content featured on this website will be listed below.</p>
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
                <h2>Ask Away!</h2>
                <form action="php file" method="POST">
                    <label for="name">Name: </label>
                    <input type="text" name="name" />
                    <label for="email">Email: </label>
                    <input type="text" name="email" />
                    <label for="topic">Topic:</label>
                    <select name="topic">
                        <option value="Tools">Tools</option>
                        <option value="Plants">Plants</option>
                        <option value="Seasons">Seasons</option>
                        <option value="General Help/Advice">General Help/Advice</option>
                    </select>
                    <label for="advice">Advice: </label>
                    <textarea type="text" name="advice" rows="10" cols="50"></textarea>
                </form>
            </section>
        </main>
        <footer>
        <p>Developed and designed by Lucas Lee</p>
            <a href="https://github.com/LucasDLee" target="_blank"><img src="images/github.png" alt="github" height="50" width="50"></a>
        </footer>
    </body>
</html>