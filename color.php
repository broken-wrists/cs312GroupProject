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
        <img src="img/Hueflutter.png" alt="company logo" class="logo" width="100" height="100">
        <h1> Color Coordinator</h1>

        <nav>
            <a href="index.php">Home</a> |
            <a href="about.php">About</a> |
            <a href="color.php">Color</a>
        </nav>
    </header>

    <div class="box">

        <!-- 4.2 Input Validation -->
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
                echo "<p class='error'>Error: Rows and Columns cannot be less than 1 or more than 26.</p>";
            } else {
                $valid_grid = true;
            }

            if (!is_numeric($num_colors) || $num_colors < 1 || $num_colors > 10) {
                echo "<p class='error'>Error: Number Of Colors cannot be less than 1 or more than 10.</p>";
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

        if (isset($_POST['generate']) && $valid) {
            $num_colors = (int) $_POST['numColors'];
            $grid_size = (int) $_POST['grid_size'];
            ?>

            <form action="print.php" method="post">
                <input type="hidden" name="num_colors" value="<?= $num_colors ?>">
                <input type="hidden" name="grid_size" value="<?= $grid_size ?>">

                <?php
                //2.1 Adjust style for print page
                $isPrint = false;
                // Put this table inside the print form so the current selected dropdown values get sent to print.php
                // 4.3 Top Table: Color Grid
                include 'tables/colorTable.php';
                ?>

                <?php
                // 4.4 Bottom Table: Coordinate Grid
                $letters = 'A';
                echo "<table class='coordinate-grid'>";
                for ($r = 0; $r <= $grid_size; $r++) {
                    echo "<tr>";

                    for ($c = 0; $c <= $grid_size; $c++) {
                        echo "<td>";

                        if ($r == 0 && $c == 0) {
                            echo "";
                        } elseif ($r == 0 && $c == 1) {
                            echo $letters;
                        } elseif ($r == 0) {
                            echo ++$letters;
                        } elseif ($c == 0) {
                            echo $r;
                        } else {
                            echo "";
                        }

                        echo "</td>";
                    }

                    echo "</tr>";
                }
                echo "</table>";
                ?>

                <input type="submit" value="View Printable Version">
            </form>

            <?php
        }
        ?>

    </div>

    <footer>
        <p>Hueflutter Inc.</p>
    </footer>
    <script type="text/javascript" src="color.js"></script>

</body>

</html>