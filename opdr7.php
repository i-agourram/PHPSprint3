<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST">
    startkapitaal <input type="text" name="startkapitaal">
    <br>
    rentepercentage <input type="text" name="rentepercentage">
    <br>
    jaarlijkseopname <input type="text" name="jaarlijkseopname">
    <br>
    <br>
    <br>

    <input type="submit" name="bereken" value="bereken">
</form>
</body>
</html>

<?php

if (isset($_POST['bereken'])) {
    $jaarlijkseopname = floatval($_POST['jaarlijkseopname']);
    $rente = floatval($_POST['rentepercentage']) / 100;
    $geertBedrag = floatval($_POST['startkapitaal']);
    $jaar = 0;

    while ($geertBedrag > 0) {
        $jaar++;

        $renteBedrag = $geertBedrag * $rente;
        $geertBedrag += $renteBedrag - $jaarlijkseopname;

        if ($jaar > 100) {
            echo "Geert kan het geld zijn hele leven opnemen.";
            break;
        }
    }

    if ($jaar <= 100) {
        echo "U kunt $jaar jaar lang $jaarlijkseopname euro opnemen.";
    }
}
?>




