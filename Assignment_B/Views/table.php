<?php


echo "<table border='1'>";
$record_index = 0;
// echo "<pre>";
// print_r($glasses);
// echo "<pre>";
// die();

foreach ($glasses as $glass) {
    if ($record_index === 0) {
        echo "<tr>";
        foreach ($glass as $key => $value) {
            echo "<td> $key </td>";
        }
        echo "<td> Details </td>";
    }
    echo "</tr>";
    echo "<tr>";
    foreach ($glass as $key => $value) {
        echo "<td> $value </td>";
    }
    
    // echo "<td><a href='Views/table.php?id=$glass->id'>Show Details</a></td>";
    echo "<td><a href='Views/show_details.php?id=$glass->id'>Show Details</a></td>";
    echo "</tr>";


    //     echo "<td". ."</td>";
    //     echo "<td>". ."</td>";
    //     echo "<td>". ."</td>";
    // echo "</tr>";

    $record_index++;
}


echo "</table>";
?>
<div>
    <a href="<?php echo $previous_link;  ?>">
        << Prev </a> | <a href="<?php echo $next_link;  ?>"> Next >> </a>
</div>