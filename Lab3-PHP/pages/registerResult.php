<?php 
    $name = '';
    $note ="";
    $password ='';
    $gender = "";
    $address = "";
    $programmingLanguage = "";
    $skill = "";
    $marriageStatus = "";
    $validate = false;
    // $address = '';
    // $job = "";
    // if(isset($_POST["name"]) && isset($_POST["address"])  && isset($_POST["job"]) && isset($_POST["note"]) ) { 
        if(!empty($_POST["name"]) && isset($_POST["note"]) && ($_POST["note"]!=="") && isset($_POST["password"]) && ($_POST["password"]!=="") && !empty($_POST["gender"]) && !empty($_POST["programmingLanguage"]) && !empty($_POST["skill"]) ) { 
        $validate = true;
        $name = $_POST["name"];
        $note = $_POST["note"];
        $password = $_POST["password"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        for($i = 0; $i <count($_POST["programmingLanguage"]); $i++) {
            if($i === 0) {
                $programmingLanguage = $_POST["programmingLanguage"][$i];
            }
            else {
                $programmingLanguage = $programmingLanguage.",".$_POST["programmingLanguage"][$i];
            }
        }
        $skill = $_POST["skill"];
        $marriageStatus =  isset($_POST["marriageStatus"]) && $_POST["marriageStatus"] === "1" ? "Đã kết hôn" : "Chưa kết hôn";
        
        // $address = $_POST["address"];
        // $job = $_POST["job"];
     } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://localhost:8888/Lab3-PHP/css/center.css">
</head>

<body>
    <?php include './head.php' ;?>
    <div class="content">
        <?php include './left.php' ;?>
        <div class="content-right">
            <div class="register-result-container">
                <?php
                    if($validate) {
                        echo "<h3><b>Kết quả đăng ký</b></h3>";
                        echo "<div>";
                        echo "Username: <span>$name</span>";
                        echo "</div>";           
                        echo "<div class='mt-3'>";
                        echo "Password: <span>$password</span>";
                        echo " </div>";
                        echo "<div class='mt-3'>";
                        echo "Gender: <span>$gender</span>";
                        echo " </div>";
                        echo "<div class='mt-3'>";
                        echo "Address: <span>$address</span>";
                        echo " </div>";
                        echo "<div class='mt-3'>";
                        echo "Enable Programming Language: <span>$programmingLanguage</span>";
                        echo " </div>";
                        echo "<div class='mt-3'>";
                        echo "Skill: <span>$skill</span>";
                        echo " </div>";
                        echo "<div class='mt-3'>";
                        echo "Note: <span>$note</span>";
                        echo " </div>";
                        echo "<div class='mt-3'>";
                        echo "Marriage Status: <span>$marriageStatus</span>";
                        echo " </div>";
                    }
                ?>
                <!-- <h3><b>Kết quả đăng ký</b></h3>
                <div>
                    Tên: <span><?php echo $name?></span>
                </div>
                <div class="mt-3">
                    Ghi chú: <span><?php echo $note?></span>
                </div>
                <div class="mt-3">
                    Địa chỉ: <span><?php echo $address?></span>
                </div>
                <div class="mt-3">
                    Nghề: <span><?php echo $job?></span>
                </div> -->
            </div>
        </div>
    </div>
    <?php include './footer.php' ;?>

</body>

</html>