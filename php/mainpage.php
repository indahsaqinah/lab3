<?php

include_once("dbconnect.php");
$sqlagents = "SELECT * FROM tbl_agent ORDER BY regdate DESC";

$results_per_page = 10;
if (isset($_GET['pageno'])) {
    $pageno = (int)$_GET['pageno'];

    $page_first_result = ($pageno - 1) * $results_per_page;
} else {
    $pageno = 1;
    $page_first_result = ($pageno - 1) * $results_per_page;
}

$stmt = $conn->prepare($sqlagents);
$stmt->execute();
$number_of_result = $stmt->rowCount();
$number_of_page = ceil($number_of_result / $results_per_page);

$sqlagents = $sqlagents . " LIMIT $page_first_result , $results_per_page";
$stmt = $conn->prepare($sqlagents);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2019.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2020.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/script.js"></script>
    <title>Frozen Cartoon Pau - Main Page</title>
</head>

<body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar" id="myNavbar">
            <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
                <i class="fa fa-bars"></i>
            </a>
            <a href="mainpage.php" class="w3-bar-item w3-button">MAIN PAGE</a>
            <a href="../../cartoonpaumobile/admin/php/newagent.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user-o"></i> NEW AGENT</a>
            <a href="../../cartoonpaumobile/index.html" class="w3-bar-item w3-button w3-hide-small w3-right"><i class="fa fa-sign-out"></i> LOGOUT</a>
            </a>
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
            <a href="../../cartoonpaumobile/admin/php/newagent.php" class="w3-bar-item w3-button" onclick="toggleFunction()">NEW AGENT</a>
            <a href="../../cartoonpaumobile/index.html" class="w3-bar-item w3-button" onclick="toggleFunction()">LOGOUT</a>
        </div>
    </div>

    <!--Main-->
    <div class="w3-main w3-2019-sweet-corn">
        
        <!--Header-->
        <div class="w3-header w3-display-container w3-2019-creme-de-peche w3-padding-8 w3-center">
            <img src="../logo.png" width="280" height="180" class="responsive">
        </div>

        <!--Title-->
        <div class="w3-center w3-padding-32">
            <h1><strong>CARTOON PAU AGENT LIST</strong></h1>
        </div>

        <!--Grid Content-->
        <div class="w3-grid-template">
            <?php
            foreach ($rows as $agents) {
                $name = $agents['name'];
                $email = $agents['email'];
                $phone = $agents['phone'];
                $address = $agents['address'];

                echo "<div class='w3-center w3-padding'>";
                echo "<div class='w3-card-4 w3-2020-rose-tan'>";
                echo "<header class='w3-container w3-padding-16 w3-2020-rose-tan'";
                echo "<h5><strong>$name</strong></h5>";
                echo "</header>";
                echo "<img class='w3-image' src=../../cartoonpaumobile/admin/res/users/$phone.jpg" . " onerror=this.onerror=null;this.src='../../cartoonpaumobile/admin/res/users/profile.png'" . " style='width:100%;height:250px'>";
                echo "<div class='w3-container w3-left-align'><hr>";
                echo "<p><i class='fa fa-phone' style='font-size:16px'></i>&nbsp&nbsp$phone<br>
                        <i class='fa fa-envelope-o' style='font-size:16px'></i>&nbsp&nbsp$email<br>
                        <i class='fa fa-home' style='font-size:16px'></i>&nbsp&nbsp$address</p><hr>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>

        <?php
        $num = 1;
        if ($pageno == 1) {
            $num = 1;
        } else if ($pageno == 2) {
            $num = ($num) + 10;
        } else {
            $num = $pageno * 10 - 9;
        }
        echo "<div class='row-pages w3-padding-32'>";
        echo "<center>";
        for ($page = 1; $page <= $number_of_page; $page++) {
            echo '<a href = "mainpage.php?pageno=' . $page . '" style="text-decoration: none">&nbsp&nbsp' . $page . ' </a>';
        }
        echo " ( " . $pageno . " )";
        echo "</center>";
        echo "</div>";
        ?>

    </div>

    <!--Footer-->
    <footer class="w3-footer w3-container w3-center w3-2019-creme-de-peche">
        <p>Powered by FROZEN CARTOON PAU</p>
    </footer>

</body>
</html>