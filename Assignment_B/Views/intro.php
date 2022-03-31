<?php

// var_dump($glasses);
// echo "<h5>" . $glasses->product_name . "</h5>";
// echo "<h5>" . $glasses->Rating . "</h5>";
// echo "<h5>" . $glasses->product_name . "</h5>";
// echo "<h5>" . $glasses->product_name . "</h5>";
// echo "<h5>" . $glasses->product_name . "</h5>";

// foreach ($glasses as $key => $value) {
//     echo "<h5>" . $key . " : " . $value . "</h5>";
// }

// foreach ($searched_glasses as $key => $value) {
//     echo "<h5>" . $key . " : " . $value . "</h5>";
// }

echo "<h3> Made in USA </h3>";
// foreach ($usa_glasses as $glass) {
foreach ($usa_glasses as $key => $value) {
    echo "<h5>" . $key . " : " . $value . "</h5>";
}
echo "=====================================";
// }
