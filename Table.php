<?php
$data = $_GET['data'];

echo "<table>";
$coun=count($data);
for($i = 0; $i < $coun ; $i++) {
    echo "<tr>";
    echo "<td>$data[i].['id']</td>";
    echo "<td>$data[i].['name']</td>";
    echo "</tr>";
}

echo "</table>";