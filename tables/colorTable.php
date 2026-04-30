<?php
// 4.3 Top Table: Color Grid
// variables in file: $num_colors, $colorOptions (array of available OR selected colors)
echo "<table class='color-table'>";

for ($i = 0; $i < $num_colors; $i++) {
    echo "<tr>";

    // radio button for active color. using i for row number in value
    echo "<td style='width:unset;'>";
    if ($i == 0) {
        echo "<input type='radio' name='active_color' value='$i' checked>";
    } else {
        echo "<input type='radio' name='active_color' value='$i'>";
    }
    echo "</td>";

    echo "<td>";
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
    echo "</td>";

    // color visual
    $currentColor = $colorOptions[$i];

    // 1.3 Coordinate Tracking
    echo "<td id='coords-$i' class='preview' style='background-color:" .strtolower($currentColor) . ";'></td>";

    echo "</tr>";
}

echo "</table>";
?>