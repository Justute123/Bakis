<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Integrating PHP and R</title>

</head>
<body>

<form method="post" ACTION="">
    <input type="text" name="number">
    <input type="submit" value="submit">
</form>
<?php

if(isset($_POST['number']))
{
    $number = $_POST['number'];

    exec('Rscript /var/www/html/Rscript.R '.$number);



    echo "<img src='/temp.png'>";


}
?>
