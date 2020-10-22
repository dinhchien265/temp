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
                $folder = './upload/';
                session_start();
                if (!$_POST['submit']) {
                    echo "Chưa thực hiện việc upload file";
                } else {
                    if (count($_FILES['fileToUpload']['name']) == 0) {
                        echo "Không file nào được upload cả";
                    } else {
                        if ($_FILES['fileToUpload']['error'][0] != 0) {
                            echo "Upload file lỗi rồi!";
                        } else {
                            if (count($_FILES['fileToUpload']['name']) != $_SESSION['number']) {
                                echo '<h1 class="fail">Số file upload chưa chính xác</h1> ';
                                echo '<a href="index.php"><button type="button" class="btn btn-secondary">Back to reupload</button></a>';
                            } else {
                                $_SESSION['file'] = $_FILES['fileToUpload'];
                                $number = $_SESSION['number'];
                                $file = $_FILES['fileToUpload'];
                                $folder = './upload/';
                                echo '<h1 class = "success">Upload thành công</h1>
                            <a href = "ListFile.php"><button type = "button" class = "btn btn-secondary">See the list file</button></a>';
                                for ($i = 0; $i < $number; $i++) {
                                    if (file_exists($folder . basename($file['name'][$i]))) {
                                        $_SESSION['status'][$i] = "File đã upload";
                                        $_SESSION['date'][$i] = date("h:i:sa d/m/Y");
                                    } else {
                                        $_SESSION['status'][$i] = "Thành công";
                                        move_uploaded_file($file['tmp_name'][$i], $folder . basename($file['name'][$i]));
                                        $_SESSION['date'][$i] = date("h:i:sa d/m/Y");
                                    }
                                }
                                $_SESSION['upload'] = true;
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </body>

</html>