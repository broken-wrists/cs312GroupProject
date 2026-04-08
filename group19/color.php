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

        <?php
        $grid_size = 0;
        $num_colors = 0;
        $valid = false;

        if(isset(($_POST['generate']))){
            $grid_size = $_POST['grid_size'];
            $num_colors = $_POST['numColors'];

            $valid_grid = false;
            $valid_color = false;

            if(!is_numeric($grid_size) || $grid_size < 1 || $grid_size > 26){
                echo "<p>Error: Rows and Columns cannot be less than 1 or more than 26.</p>";
            } else{
                $valid_grid = true;
            }

            if(!is_numeric($num_colors) || $num_colors < 1 || $num_colors > 10){
                echo "<p>Error: Number Of Colors cannot be less than 1 or more than 10.</p>";
            } else{
                $valid_color = true;
            }


            if($valid_grid == true && $valid_color == true){
                $valid = true;
            }
        }
        ?>

        <form method = "post" action = "color.php">
            <label for = "gridsize"> Rows and Columns (1-26):</label>
            <input type = "number" name = "grid_size" id="gridsize">
            <br><br>

            <label for = "num_colors"> Number Of Colors (1-10): </label>
            <input type="number" name="numColors" id="numColors">
            <br><br>

            <button type = "submit" name = "generate">Generate</button>

        </form>


        <footer>
        </footer>
    </body>
</html>
