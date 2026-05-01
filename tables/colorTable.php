<?php
// 4.3 Top Table: Color Grid
// variables in file: $num_colors, $colorOptions (array of available OR selected colors)

//2.1 Color name and hex code
$hexMap = array(
    "Red" => "#FF0000",
    "Orange" => "#FFA500",
    "Yellow" => "#FFFF00",
    "Green" => "#008000",
    "Blue" => "#0000FF",
    "Purple" => "#800080",
    "Grey" => "#808080",
    "Brown" => "#A52A2A",
    "Black" => "#000000",
    "Teal" => "#008080"
);
echo "<table class='color-table'>";

for ($i = 0; $i < $num_colors; $i++) {
    echo "<tr>";

    if (!$isPrint) {
        // radio button for active color. using i for row number in value
        echo "<td style='width:unset;'>";
        if ($i == 0) {
            echo "<input type='radio' name='active_color' value='$i' checked>";
        } else {
            echo "<input type='radio' name='active_color' value='$i'>";
        }
        echo "</td>";
    }

    echo "<td>";
    // color visual
    $currentColor = $colorOptions[$i];
    //2.1 Hex color code and remove dropdown
    if ($isPrint) {
        echo "<span class='color-name'>$currentColor</span> ";
        echo "<span class='color-dash'>—</span>";
        echo "<span class='color-hex'>" . $hexMap[$currentColor] . "</span>";
    } else {

        echo "<select class='color-dropdown' name='selected_colors[]'>";

        for ($j = 0; $j < count($colorOptions); $j++) {

            // row selected color
            if ($colorOptions[$j] == $colorOptions[$i]) {
                echo "<option selected>" . $colorOptions[$j] . "</option>";
            } else {
                echo "<option>" . $colorOptions[$j] . "</option>";
            }
        }
        echo "</select>";
    }
    echo "</td>";

    // 1.3 Coordinate Tracking
    echo "<td id='coords-$i' class='preview outline-shadow' style='background-color:" . strtolower($currentColor) . ";'></td>";

    echo "</tr>";
}

echo "</table>";
?>