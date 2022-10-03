<?php
    $searchCriteria = htmlspecialchars(trim($_POST['search']));

    header("location: user_directory.php?s=$searchCriteria")
?>