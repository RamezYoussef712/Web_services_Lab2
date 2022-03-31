<?php

require "../vendor/autoload.php";
$handler = new MYSQLHandler;
$handler->connect();


$glass_details = $handler->get_by_id($_GET["id"]);

echo "<center>";
echo "<table border='1'>";
//echo "<table>";
foreach ($glass_details as $key => $value) {
    echo "<tr>";
    
    echo "<td> $key </td>";
    if($key == "Photo"){
        echo "<td><img src='../src/Resources/images/$value' alt=''></td>";
        } else{
    echo "<td> $value </td>";
        }
    echo "</tr>";
}
//echo "</table>";
echo "</center>";

// echo "<pre>" ;
// print_r($glass_details) ;
// echo  "</pre>";
