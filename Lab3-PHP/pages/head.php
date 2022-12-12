<?php
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost:8888/Lab3-PHP/css/head.css">



</head>

<body>
    <div class="header-container">
        <img class="img-header" src="http://localhost:8888/Lab3-PHP/images/header-small.jpg" alt="">
        <nav class="pages">
            <form method="post" action="http://localhost:8888/Lab3-PHP/pages/center.php">
                <input type="submit" value="7.2 Calculate" name="submit_calculate">




                <input type="submit" value="7.6 Register" name="submit_register">


                <!-- <input type="submit" value="Contact" name="submit_contact"> -->
                <input type="submit" value="7.4 May tinh" name="submit_calculate2">
                <input type="submit" value="7.4 Tinh diem" name="submit_totalScore">
                <input type="submit" value="7.5 Mang 1 chieu" name="submit_oneDimensionalArray">
                <input type="submit" value="7.5 Matrix" name="submit_matrix">
                <input type="submit" value="7.5 AssociateArr" name="submit_associateArr">
                <input type="submit" value="7.10 ListStudent" name="submit_listStudent">
                <input type="submit" value="7.10 AddStudent" name="submit_addStudent">
                <input type="submit" value="7.10 Yahoo" name="submit_yahoo">
            </form>
            <form method="get" action="http://localhost:8888/Lab3-PHP/pages/center.php">
                <input type="submit" value="Home" name="page">
                <input type="submit" value="7.3 DrawTable" name="page">
                <input type="submit" value="7.3 Loop" name="page">
            </form>
        </nav>
    </div>
</body>

</html>