<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="author" content="Group 19">
        <meta name="description" content="color page">
        <meta name="keywords" contents="HTML, php, css">
        <title>Color Coodinate Page</title>
    </head>
    <body>

        <header>
        <nav>
           <a href="index.php">Home</a> |
           <a href="about.php">About</a> |
           <a href="color.php">Color</a> 
        </nav>

        <h1> Color Coordinator</h1>

        </header>

        <form method = "post" action = "color.php">
            <label for = "gridsize"> Rows and Columns (1-26):</label>
            <input type = "number" name = "grid_size" id="gridsize" min="1" max="26">
            <br><br>

            <label for = "num_colors"> Number Of Colors (1-10): </label>
            <input type="number" name="numColors" id="numColors" min="1" max="10">
            <br><br>

            <button type = "submit">Generate</button>

        </form>


        <footer>
        </footer>
    </body>
</html>