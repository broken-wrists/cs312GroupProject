<!DOCTYPE html>
<html>
    <head class="grayscale">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="author" content="Group 19">
        <meta name="description" content="print page">
        <meta name="keywords" contents="HTML, php, css">
        <title>Print Page</title>
    </head>
    <body class="grayscale">
        <header>
            <form action="color.php" method="get">
                <input type="submit" value="Back to Color Coordinator">
            </form>
            <img src="img/Hueflutter.png" alt="company logo" class="gray">
            <h1>Hueflutter</h1>
        </header>

        <?php
        if (isset($_POST['num_colors'])){
            $num_colors = $_POST['num_colors'];
            // Add color selection table
        }

        if (isset($_POST['grid_size'])){
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
        ?>

        <footer>
        </footer>
    </body>
</html>