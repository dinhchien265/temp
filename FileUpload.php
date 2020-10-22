<?php
// Start the session
session_start();
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
                <?php
                if (!isset($_POST['submit'])) {
                    echo "Chưa nhập vào số lượng file, quay lại lựa chọn!!!";
                } else {
                    $_SESSION['number'] = $_POST["number"];
                    echo '<h2>Chọn file upload:</h2> ';
                    echo '<form action="report.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload[]" multiple="multiple">
                <input type="submit" name="submit" value="GO GO">
            </form>';
                    
                }
                ?>

            </div>
        </div>
    </body>

</html>