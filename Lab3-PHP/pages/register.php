<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .gender-container,
    .skill-container {
        display: flex;
        gap: 10px;
    }

    .gender-container-child,
    .skill-container-child {
        display: flex;
        flex-direction: column;
    }
    </style>
</head>

<body>
    <div class="register-container">
        <h3>
            <b>Form Đăng Ký</b>
        </h3>
        <form method="POST" action="http://localhost:8888/Lab3-PHP/pages/registerResult.php">
            <div class="form-group col-12 mb-3">
                <label for="">Username:</label>
                <input class="form-control" type="text" name="name" value="" />
            </div>
            <div class="form-group col-12 mb-3">
                <label for="">Password:</label>
                <input class="form-control" type="password" name="password" value="" />
            </div>
            <div class="form-group col-12 mb-3 gender-container">
                <label for="">Gender:</label>
                <span class="gender-container-child">
                    <span><input type="radio" name="gender" value="Male" />Male</span>
                    <span><input type="radio" name="gender" value="Female" />Female</span>
                </span>
            </div>
            <div class="form-group col-12 mb-3">
                <label for="">Address:</label>
                <select name="address">
                    <option value="HN">Hà Nội</option>
                    <option value="TPHCM">Thành phố HCM</option>
                    <option value="DN">Nam Định</option>
                </select>
            </div>
            <div class="form-group col-12 mb-3">
                <label for="">Favorite:</label>
                <span class="ms-4"><input type="checkbox" name="programmingLanguage[]" value="PHP"> Phượt </span>
                <span class="ms-4"><input type="checkbox" name="programmingLanguage[]" value="C#"> Đá bóng </span>
                <span class="ms-4"><input type="checkbox" name="programmingLanguage[]" value="Java"> Ngủ </span>
                <span class="ms-4"><input type="checkbox" name="programmingLanguage[]" value="C++"> Ăn </span>
            </div>
            <div class="form-group col-12 mb-3 skill-container">
                <label for="">Skill:</label>
                <span class="skill-container-child">
                    <span><input type="radio" name="skill" value="Normal" />Normal</span>
                    <span><input type="radio" name="skill" value="Good" />Good</span>
                    <span><input type="radio" name="skill" value="VeryGood" />VeryGood</span>
                    <span><input type="radio" name="skill" value="Excellent" />Excellent</span>
                </span>
            </div>
            <div class="form-group col-12 mb-3">
                <label for="">Message:</label>
                <textarea class="form-control" name="note" value=""></textarea>
            </div>
            <div class="form-group col-12 mb-3">
                <label for="">Marriage Status:</label>
                <span class="ms-4"><input type="checkbox" name="marriageStatus" value="1"></span>
            </div>
            <div class="form-group mt-3 col-3">
                <button class="btn btn-danger btn-delete" type="button" name="btn-delete">Xóa</button>
                <input class="btn btn-primary" type="submit" value="Đăng ký" name="btn-submit" />
            </div>
        </form>
    </div>
</body>

<script>
var inputArr = document.querySelectorAll("input[type=text]");
var btnDelete = document.querySelector(".btn-delete")
btnDelete.onclick = () => {
    console.log(inputArr);
    for (var i = 0; i < inputArr.length; i++) {
        inputArr[i].value = ""
    }
}
</script>

</html>