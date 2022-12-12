<?php
    $row = '';
    $col = "";
    if(isset($_POST['row']) && $_POST['col']) {
        $row =  $_POST['row'];
        $col = $_POST['col'];
    }
    if(isset($_POST['delete'])) {
        $row =  '';
        $col = '';
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
    .table-center {
        width: 100%;
    }

    .table-center tr {
        background: none !important;
    }

    .table-center tr td {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="table-center-container">
        <div>
            <p>Form vẽ bảng</p>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="">Số dòng:</label>
                    <input class="form-control" value="" name="row" type="text" />
                </div>
                <div class="form-group mb-3">
                    <label for="">Số cột:</label>
                    <input class="form-control" value="" name="col" type="text" />
                </div>
                <button class="btn btn-danger btn-delete" type="submit" name="delete">Nhập lại</button>
                <input class="btn btn-primary" type="submit" value="Vẽ" name="submit">
            </form>
        </div>
        <table class="table-center table-bordered mt-3">
            <?php
                if(!$row || !$col ) {
                    echo "";
                }
                else {
                    $valueTd = 0;
                    for($i = 0; $i < $row; $i ++) {
                        echo "<tr>";
                        for($j = 0; $j <= $i; $j ++) {
                            $valueTd += 1;
                            echo "<td>$valueTd</td>";
                        }
                        for($j = $i+1 ; $j <$col; $j ++) {
                            $valueTd += 1;
                            echo "<td>$valueTd</td>";
                        }
                        echo "</tr>";

                    }

                }
                        ?>
        </table>
    </div>


</body>

</html>