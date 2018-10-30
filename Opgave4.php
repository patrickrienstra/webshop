<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Opgave 4</title>
    </head>
    <body>
        <?php
        $minimum = 3;
        $maximum = 5;
        $aantalPersonen = 3;
        if ($aantalPersonen >= $minimum && $aantalPersonen <= $maximum) {
            print($aantalPersonen . " personen kunnen samen in een groep");
        }
        else {
            print($aantalPersonen . " personen komt niet goed uit.");
        }
        ?>
    </body>
</html>
