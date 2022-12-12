<?php 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost:8888/Lab3-PHP/css/center.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .table-list-student {
        width: 100%;
    }

    .table-list-student tr {
        background: none !important;
    }

    .table-list-student tr td {
        text-align: center;
    }

    .manipulation {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
    }
    </style>
</head>

<body>
    <div class="list-student-container">
        <?php
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

                echo "<table class='table-list-student table-bordered mt-3>'";
                echo "<tr>";
                echo "<td>STT</td>";
                echo "<td>Tên</td>";
                echo "<td>Địa chỉ</td>";
                echo "<td>Tuổi</td>";
                echo "<td>Lớp</td>";
                echo "<td>Thao tác</td>";
                echo "</tr>";
                for($j = 0;$j<count($listStudent2);$j++) {
                    echo "<tr>";
                        $stt2 = $j + 1;
                        echo "<td>$stt2</td>";
                        for($z = 0; $z<4;$z++){
                            $valueTd = $listStudent2[$j][$z];
                            echo "<td>$valueTd</td>";
                        }
                        echo "<td class='manipulation'>";
                        echo "<form method='POST' action='../pages/detailStudent.php'>";
                                echo "<input type='text' hidden name='stt2' value=$j />";
                                echo "<input class = '' type='submit' name='detail_student' value='Detail' />";
                            echo "</form>";
                            echo "<form method='POST' action='../pages/editStudent.php'>";
                                echo "<input type='text' hidden name='stt2' value=$j />";
                                echo "<input class = '' type='submit' name='edit_student' value='Edit' />";
                            echo "</form>";
                            echo "<form method='POST' action='../pages/deleteStudent.php'>";
                                echo "<input type='text' hidden name='stt2' value=$j />";
                                echo "<input class = '' type='submit' name='delete_student' value='Delete' />";
                            echo "</form>";
                        echo "</td>";
                    echo "</tr>";
                }  
                echo "</table>";
                
                fclose($myfile2);
            }   
         
        ?>
    </div>
</body>

</html>