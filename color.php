<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="author" content="Group 19">
    <meta name="description" content="color page">
    <meta name="keywords" contents="HTML, php, css">
    <link rel="stylesheet" href="style.css" />

    <title>Color Coodinate Page</title>
</head>

<body>

    <header>
        <h1> Color Coordinator</h1>

        <nav>
            <a href="index.php">Home</a> |
            <a href="about.php">About</a> |
            <a href="color.php">Color</a>
        </nav>
    </header>

    <?php
    $grid_size = 0;
    $num_colors = 0;
    $valid = false;

    if (isset($_POST['generate'])) {
        $grid_size = $_POST['grid_size'];
        $num_colors = $_POST['numColors'];

        $valid_grid = false;
        $valid_color = false;

        if (!is_numeric($grid_size) || $grid_size < 1 || $grid_size > 26) {
            echo "<p>Error: Rows and Columns cannot be less than 1 or more than 26.</p>";
        } else {
            $valid_grid = true;
        }

        if (!is_numeric($num_colors) || $num_colors < 1 || $num_colors > 10) {
            echo "<p>Error: Number Of Colors cannot be less than 1 or more than 10.</p>";
        } else {
            $valid_color = true;
        }


        if ($valid_grid == true && $valid_color == true) {
            $valid = true;
        }

    }
    ?>

    <form method="post" action="color.php">
        <label for="gridsize"> Rows and Columns (1-26):</label>
        <input type="number" name="grid_size" id="gridsize">
        <br><br>

        <label for="num_colors"> Number Of Colors (1-10): </label>
        <input type="number" name="numColors" id="numColors">
        <br><br>

        <button type="submit" name="generate">Generate</button>         
    </form>
    <div id="color-message" class="color-message"></div>

    <?php
    $num_colors = 0;
    $colorOptions = array("Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey", "Brown", "Black", "Teal");


    if (isset($_POST['generate'])) {
        $num_colors = $_POST['numColors'];

        echo "<table class='color-table'>";
        for ($i = 0; $i < $num_colors; $i++) {
            echo "<tr>
                    <td>
                        <select class='color-dropdown'>";

            for ($j = 0; $j < count($colorOptions); $j++) {
                if ($j == $i) {
                    echo "<option selected>" . $colorOptions[$j] . "</option>";
                } else {
                    echo "<option>" . $colorOptions[$j] . "</option>";
                }
            }
            echo "</select>
                    </td>";
            echo "<td class='preview' style='background-color:" . strtolower($colorOptions[$i]) . ";'>";
            echo $colorOptions[$i];
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // 4.4 Bottom Table: Coordinate Grid
        if($valid_grid){
            $grid_size = (int) $_POST['grid_size'];
            $letters = 'A';
            $count = 0;
            echo "<table class='coordinate-grid'>";
            for ($r = 0; $r <= $grid_size; $r++){
                echo "<tr>";

                for ($c = 0; $c <= $grid_size; $c++){
                    echo "<td>";

                    if ($r == 0 && $c == 0){
                        echo "";
                    }
                    elseif ($r == 0 && $c == 1){
                        echo $letters;
                    }
                    elseif ($r == 0){
                        echo ++$letters;
                    }
                    elseif ($c == 0){
                        echo $r;
                    }
                    else{
                        echo "";
                    }

                    echo " </td>";
                }

                echo "</tr>";
            }

            echo "</table>";
        }
    }
        
    ?>

    <footer>
    </footer>
    <script type="text/javascript" src="color.js"></script>

</body>

</html>