<?php
require 'db.php';
$message = "";

if (isset($_POST['confirm_delete'])) {
    $result = $conn->query("SELECT COUNT(*) AS total FROM colors");
    $row = $result->fetch_assoc();
    $total_colors = $row['total'];

    if ($total_colors <= 2) {
        $message = "<p class='error'>Error: Cannot delete color. There must be at least 2 colors left.</p>";
    } else {
        $id = (int)$_POST['color_id']; 
        $conn->query("DELETE FROM colors WHERE id = $id");
        
        $message = "<p>Color deleted successfully.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Color Selection</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <img src="img/Hueflutter.png" alt="company logo" class="logo" width="100" height="100">
        <h1>Hueflutter</h1>
        <nav>
            <a href="index.php">Home</a> |
            <a href="about.php">About</a> |
            <a href="color.php">Color</a> |
            <a href="colors.php">Color Selection</a>
        </nav>
    </header>

    <div class="box">
        <h2>Color Selection</h2>
        <p>Manage the colors available in the Color Coordinator. You can add, edit, or remove colors from the list.</p>

        <?php echo $message; ?>

        <div>
            <h3>Add a Color</h3>
            <hr>
            <!-- Add a color functionality goes here -->
        </div>

        <div>
            <h3>Edit a Color</h3>
            <hr>
            <!-- Edit a color functionality goes here -->
        </div>      

        <div>
            <h3>Delete a Color</h3>
            <hr>
            <?php
            if (isset($_POST['delete_selected']) && isset($_POST['color_id'])) {
                $id_to_delete = $_POST['color_id'];

                echo "<form method='POST' action='colors.php'>";
                echo "<p class='error'>Are you sure you want to completely delete this color?</p>";
                echo "<input type='hidden' name='color_id' value='" . $id_to_delete . "'>";
                echo "<input type='submit' name='confirm_delete' value='Yes, Delete'> ";
                echo "<a href='colors.php'>Cancel</a>";
                echo "</form>";

            } else {
                echo "<form method='POST' action='colors.php'>";
                echo "<p>Select Color: ";
                echo "<select name='color_id' required>";
                echo "<option value=''>-- Choose a color --</option>";

                $result = $conn->query("SELECT * FROM colors ORDER BY name");
                
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }

                echo "</select></p>";
                echo "<input type='submit' name='delete_selected' value='Delete Selected'>";
                echo "</form>";
            }
            ?>
        </div>

        <br><br>

        <h3>Current Colors</h3>
        <table class="color-table">
            <tr>
                <th>Name</th>
                <th>Hex Value</th>
                <th>Preview</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM colors ORDER BY name");
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['hex_value'] . "</td>";
                echo "<td><div style='width: 50px; height: 20px; background-color: " . $row['hex_value'] . "; border: 1px solid #ccc;'></div></td>";
                echo "</tr>";
            }
            ?>
        </table>

    </div>

    <footer>
        <p>Hueflutter Inc.</p>
    </footer>
</body>
</html>