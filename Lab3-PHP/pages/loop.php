<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost:8888/Lab3-PHP/css/center.css">
    <style>
    .loop-container-child {
        display: flex;
        gap: 20px;
    }
    </style>
</head>

<body>
    <div class="loop-container">
        <div class="loop-container-child">
            <div class="loop-for">
                <p>For:</p>
                <div>
                    <?php
                        for($i = 0; $i < 10; $i ++) {
                            for($j = (10 - $i); $j < 10; $j ++) {
                                echo "* ";
                            }
                            echo "<br>";
                        }
                    ?>
                </div>
            </div>
            <div class="loop-while">
                <p>while:</p>
                <div>
                    <?php
                        $i = 0;
                        while ( $i < 10 ) {
                            $j = (10 - $i);
                            while ( $j < 10 ) {
                                echo "* ";
                                $j ++;
                            }
                            $i ++;
                            echo "<br>";
                        }
                    ?>
                </div>
            </div>
            <div class="loop-do-whilr">
                <p>Do-While:</p>
                <div>
                    <?php
                        $i = 0;
                        do {
                            $j = (10 - $i);
                            while ( $j < 10 ) {
                                echo "* ";
                                $j ++;
                            }
                            $i ++;
                            echo "<br>";
                        }
                        while($i < 10 )
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>