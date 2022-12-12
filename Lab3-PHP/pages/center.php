<?php
        $pageCenter = '';
    if(isset($_POST["submit_register"])){
        $pageCenter = './register.php';
    }
    
    if(isset($_POST["submit_calculate"])){
        $pageCenter = './calculate.php';
    }
    if(!empty($_POST["submit_calculate2"]) || isset($_POST['submitCalculate'])){
        $pageCenter = './calculate2.php';
    }
    if(!empty($_POST["submit_totalScore"]) || isset($_POST['submitTotalScore']) || isset($_POST['cancelTotalScore'])){
        $pageCenter = './totalScore.php';
    }
    if(!empty($_POST["submit_oneDimensionalArray"]) || isset($_POST['calculate_total_oda']) || isset($_POST['reset_total_oda'])){
        $pageCenter = './oneDimensionalArray.php';
    }
    if(isset($_POST["submit_listStudent"])){
        $pageCenter = './listStudent.php';
        // header('location: ./listStudent.php');
    }

    if(isset($_POST["submit_addStudent"])){
        header('location: ./addStudent.php');
    }
    if(isset($_POST["submit_yahoo"])){
        header('location: ./loginYahoo.php');
    }
    
    
    if(isset($_POST["submit_contact"])){
        $pageCenter = './contact.php';
    }
    if(isset($_POST["submit_matrix"]) || isset($_POST["calculate_matrix"]) || isset($_POST["reset_matrix"])){
        $pageCenter = './matrix.php';
    }
    if(isset($_POST["submit_associateArr"])){
        $pageCenter = './associateArr.php';
    }
    
    if(isset($_GET["page"])){
        if($_GET["page"] === "Home") {
            $pageCenter = './home.php';
        }
    }
    if(isset($_GET["page"])){
        if($_GET["page"] === "7.3 DrawTable") {
            $pageCenter = './drawTable.php';
        }
    }
    if(isset($_GET["page"])){
        if($_GET["page"] === "7.3 Loop") {
            $pageCenter = './loop.php';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/Lab3-PHP/css/center.css">
</head>

<body>
    <?php include './head.php' ;?>
    <div class="content">
        <?php include './left.php' ;?>
        <div class="content-right">
            <?php include $pageCenter ;?>
        </div>
    </div>
    <?php include './footer.php' ;?>
</body>

</html>