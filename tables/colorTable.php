<?php
// 4.3 Top Table: Color Grid
// variables in file: $num_colors, $colorOptions (array of available OR selected colors)
echo "<table class='color-table'>";

for ($i = 0; $i < $num_colors; $i++) {
    echo "<tr>";

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

    echo "<td class='preview' style='background-color:" . strtolower($currentColor) . ";'>";
    echo $currentColor;
    echo "</td>";

    echo "</tr>";
}

echo "</table>";
?>