<?php

$releasesql = "SELECT `r`.*, `e`.* FROM `request` AS `r` 
        JOIN `exam` AS `e` ON `r`.`Request_ID` = `e`.`Request_ID` WHERE `Is_Published` = 'No'";

$relqry = mysqli_query($conn, $releasesql);





?>