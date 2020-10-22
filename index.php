<?php
// Start the session
session_start();
$_SESSION['upload'] = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào mừng đến với tôi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">

</head>

<body>
    <div class="fluid-container">
        <div class="form">
            <h2>Lựa chọn số lượng file muốn upload:</h2>
            <form action="FileUpload.php" method="POST">
                <select id="cars" name="number" class="form-control" >
                    <option >1</option>
                    <option >2</option>
                    <option >3</option>
                    <option >4</option>
                    <option >5</option>
                    <option >6</option>
                    <option >7</option>
                    <option >8</option>
                    <option >9</option>
                    <option >10</option>
                </select>
                <input type="submit" value="GO" name="submit">
            </form>
        </div>
    </div>
</body>

</html>