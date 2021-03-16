<?php

    $source = "../../cache/custom";
    $mediaArr = array_diff(scandir($source), array('.', '..'));
    $mediaCount = count($mediaArr);
    $random_keys = array_rand($mediaArr, 1);

    $image_Name = $mediaArr[$random_keys];
    $image_FullName = "$source/$image_Name";

    echo "Random ID: $random_keys <br>";
    echo "Number of Images: $mediaCount <br>";
    echo "Image (Name): $image_Name <br>";
    echo "Image (Full Path): $image_FullName<br>";
    echo "<br><br>";

    echo '<img style="max-width: 500px; height: auto;" src="'.$image_FullName.'" />';

?>