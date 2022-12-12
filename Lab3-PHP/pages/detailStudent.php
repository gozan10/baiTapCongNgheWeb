<?php
    $stt = "";
    if(isset($_POST['detail_student'])) {
        $stt = $_POST['stt2'];
        // echo (int)$stt;
    }
    $myfile2 = fopen("../student.txt", "r") or die("Unable to open file!");
    $j = 0;
    $z = 0;
    clearstatcache();
    if(filesize("../student.txt")) {
        $listStudent2 = [];
        while(!feof($myfile2)) { 
            $listStudent2[$j][$z] = fgets($myfile2);
            $z++;
            if($z % 4 ===0) {
                $j++;
                    $z = 0;
            }                             
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://localhost:8888/Lab3-PHP/css/center.css">
</head>

<body>
    <div class="container-app">
        <?php include '../pages/head.php' ;?>
        <div class="content">
            <?php include '../pages/left.php' ;?>
            <div class="content-right">
                <div class="detail-student-container">
                    <h3>Chi tiết sinh viên</h3>
                    <?php
                            echo "Tên: ".$listStudent2[(int)$stt][0]."</br>";
                            echo "Địa chỉ: ".$listStudent2[(int)$stt][1]."</br>";
                            echo "Tuổi: ".$listStudent2[(int)$stt][2]."</br>";
                            echo "Lớp: ".$listStudent2[(int)$stt][3]."</br>";
                    ?>
                </div>
            </div>
        </div>
        <?php include '../pages/footer.php' ;?>
    </div>

</body>

</html>