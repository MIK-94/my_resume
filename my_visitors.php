<?php
require_once("includes/db_config.php"); 
include "tpl/head.html";


$sql = "SELECT * FROM `visitors`"; 
$result = $link->query($sql);
echo "<div class='panel text_container my_visitors'>";
echo "<table>";
while ($row=$result->fetch_assoc()) {
echo "<tr>";
    echo "<td>";
    echo $row["time"];
    echo "</td>";
    
    echo "<td>";
    echo $row["ip"];
    echo "</td>";
    
    echo "<td>";
    echo $row["Region"];
    echo "</td>";
    
    echo "<td>";
    echo $row["City"];
    echo "</td>";
    
    echo "<td>";
    echo $row["browser"];
    echo "</td>";
    
    echo "<td>";
    echo $row["i_saw_that"];
    echo "</td>";

echo "</tr>";
}
echo "</table>";
echo "</div>";

mysqli_close($link); 

?>