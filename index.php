<?php
session_start();
if (!isset($_SESSION['cijfers'])) {
    $_SESSION['cijfers'] = array();
}

function berekenGemmidelde($array) {
    if (count($array) === 0) {
        return 0;
    }
    return array_sum($array) / count($array);
}



if (isset($_POST['cijfer'])) {
    $ingevoerdCijfer = ($_POST['cijfer']);

    if ($ingevoerdCijfer >= 1.0 && $ingevoerdCijfer <= 10.0) {
        $_SESSION['cijfers'] [] = $ingevoerdCijfer;
    }
}

$gemiddelde = berekenGemmidelde($_SESSION['cijfers']);
?>

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
    Voer een cijfer in (tussen 1.0 en 10.0)

    <input type="text" name="cijfer">
    <br>
    <input type="submit" value="Toevoegen">
</form>


<?php
if (!empty($_SESSION['cijfers'])) {
    echo "<p> ingevoerde cijfers: " . implode(", ", $_SESSION['cijfers']) . "</p>";
    echo "<p> gemmidelde: " . number_format($gemiddelde, 2) . "</p>";
} else {
    echo "<p> Voer een geldig cijfer in tussen de 1.0 en 10.0! </p>";
}



?>


</body>
</html>
