<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost:8888/Lab3-PHP/css/calculate.css">
    <link rel="stylesheet" href="http://localhost:8888/Lab3-PHP/css/index.css">
</head>

<body>
    <div class="calculate-container">
        <?php 
                $result = 1;
                $areaCircle = 5*pi();
                for($i=1; $i<=5; $i++) {
                    $result = $result * $i;
                } 
            ?>

        <p>Giai thừa của 5 = <?php echo $result?>
        </p>
        <p>Diện tích hình tròn bán kính 5 = <?php echo $areaCircle?>
        </p>
        <p class="text-hello">Hello Hoàng</p>
    </div>
</body>

</html>