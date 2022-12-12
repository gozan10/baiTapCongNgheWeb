<?php
    $n = 7;
    $arrValue = [];
    if(isset($_POST['calculate_total_oda'])) {
        for ($i = 1; $i <= $n; $i++) {
            // echo $_POST['value_'.$i];
            array_push($arrValue, $_POST['value_'.$i]);
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
    <style>
    .value_arr {
        margin-top: 10px;
        max-width: 50px;
        margin-right: 5px;
    }

    .result-oda {
        align-self: flex-start;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <div class="one-dimensional-array-container">
        <form method="POST" action="">
            <?php
            if($n && $arrValue) {
                for($i=1;$i<=$n; $i++) {
                    $index_value = $i-1;
                    echo "<input class='value_arr' type='number' name='value_$i' value='$arrValue[$index_value]' />";
                }
            }
            else {
                for($i=1;$i<=$n; $i++) {
                    $index_value = $i-1;
                    echo "<input class='value_arr' type='number' name='value_$i' value='' />";
                }
            }
            ?>
            <div class="mt-3">
                <input class="btn btn-primary" type="submit" name="calculate_total_oda" value="Calculate">
                <input class="btn btn-danger" type="submit" name="reset_total_oda" value="Reset">
            </div>
        </form>
        <div class="result-oda">
            <h3>KẾT QUẢ</h3>
            <p>Tổng: <?php if($n && $arrValue) echo array_sum($arrValue)?></p>
            <p>Trung bình: <?php if($n && $arrValue) echo array_sum($arrValue)/$n?></p>
            <p>Min: <?php if($n && $arrValue) echo min($arrValue)?></p>
            <p>Max: <?php if($n && $arrValue) echo max($arrValue)?></p>

        </div>
    </div>
</body>

</html>