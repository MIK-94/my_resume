<?php
require_once("includes/db_config.php");
    or die("Ошибка " . mysqli_error($link));
 

$sql = "SELECT * FROM `visitors`"; 
$result = $link->query($sql);
echo "<table>";
while ($row=$result->fetch_assoc()) {
echo "<td>";
    echo "<tr>";
    echo $row["time"];
    echo "</tr>";
    
    echo "<tr>";
    echo $row["ip"];
    echo "</tr>";
    
    echo "<tr>";
    echo $row["Region"];
    echo "</tr>";
    
    echo "<tr>";
    echo $row["City"];
    echo "</tr>";
    
    echo "<tr>";
    echo $row["browser"];
    echo "</tr>";
    
    echo "<tr>";
    echo $row["i_saw_that"];
    echo "</tr>";

echo "</td>";
}
echo "</table>";

mysqli_close($link); 

?>