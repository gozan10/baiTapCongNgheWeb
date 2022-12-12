<?php
    $result="";
    $firstNumber = "";
    $secondNumber = "";
    $calculation = "";
    if(isset($_POST['submitCalculate'])){
       
        if(!empty($_POST['calculation']) && isset($_POST['first_number']) && isset($_POST['second_number'])) {  
            $firstNumber = $_POST['first_number'];
            $secondNumber = $_POST['second_number'];
            foreach($_POST['calculation'] as $value){
                $calculation = $value;
            };
        }
        
        try {
            switch ($calculation){
                case "plus":
                    $result = $firstNumber + $secondNumber; break;
                case "minus":
                    $result = $firstNumber - $secondNumber; break;
                case "multiply":
                    $result = $firstNumber * $secondNumber; break;
                case "devide":
                    $result = $firstNumber / $secondNumber; break;;
                default:
                $result = "Hãy chọn đủ thông tin!"; break;        
            }
        } 
        catch(Exception $e){
            echo 'Message: '.$e;
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
    <div class="calculate2-container">
        <form method="POST" action="<?php
        echo htmlspecialchars($_SERVER['PHP_SELF']);
    ?>">

            <?php
        echo ("máy tính của Hoàng :))");
        ?>
            <table class="table-bordered">
                <tr>
                    <td>Số 1</td>
                    <td>
                        <input type="number" name="first_number"
                            value="<?php echo $firstNumber !== "" ? $firstNumber : ""?>">
                    </td>
                </tr>
                <tr>
                    <td>Số 2</td>
                    <td>
                        <input type="number" name="second_number"
                            value="<?php echo $secondNumber !== "" ? $secondNumber : ""?>">
                    </td>
                </tr>
                <tr>
                    <td>Phép tính</td>
                    <td>
                        <span class="ms-4"><input type="checkbox" name="calculation[]" value="plus"> + </span>
                        <span class="ms-4"><input type="checkbox" name="calculation[]" value="minus"> - </span>
                        <span class="ms-4"><input type="checkbox" name="calculation[]" value="multiply"> * </span>
                        <span class="ms-4"><input type="checkbox" name="calculation[]" value="devide"> / </span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="submit" name="submitCalculate" value="Calculate">
                    </td>
                </tr>
                <tr>
                    <td>Kết quả</td>
                    <td>
                        <?php                       
                            echo $result;
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>