<?php
    $rootDir = realpath($_SERVER["DOCUMENT_ROOT"])."/Lab3-PHP/";
    if(isset($_POST["submitUpload"])) {
        if(isset($_FILES['fileToUpload'])){
            $files = $_FILES['fileToUpload'];
        
        $names = $files['name'];
        $types = $files['type'];
        $tmp_names = $files['tmp_name'];
        $errors = $files['error'];
        $sizes = $files['size'];

        //Số file được upload
        $numitems = count($names);
        $numfiles = 0;
        
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
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/center.css">

</head>

<body>
    <div class="container-app">
        <?php include $rootDir.'pages/head.php' ;?>
        <a href="../uploads/"></a>
        <div class="content">
            <?php include $rootDir.'pages/left.php' ;?>
            <div class="content-right">
                <div class="upload-container">
                    Danh sách file đã Upload:
                    <div>
                        <?php
                        for ($i = 0; $i < $numitems; $i++) {
                            if ($errors[$i] == 0) {
                                $numfiles++;
                                // $pathDownloadFile = '../uploads/'.$names[$i];
                                // echo "<a href='$pathDownloadFile'>Download File: $names[$i]</a><br>";

                                $pathDownloadFile = 'download.php?path=../uploads/'.$names[$i];
                                echo "<a href='$pathDownloadFile'>Download File: $names[$i]</a><br>";
                                

                                // echo "<b>Uploaded file $numfiles:</b><br>";
                                // echo "Name: $names[$i] <br>";
                                // echo "Temporary saved at: $tmp_names[$i] <br>";
                                // echo "Size: $sizes[$i] bytes<br><hr>";
                                move_uploaded_file($tmp_names[$i], $rootDir.'uploads/'.$names[$i]);
                            }
                        }
                        // echo "Number of uploaded files: " .$numfiles;
                        
                        }else {
                            echo "No files selected."; 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include $rootDir.'pages/footer.php' ;?>
    </div>

</body>

</html>