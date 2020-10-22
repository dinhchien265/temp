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

        <div class="fluid-container listfile">
            <div class="form">
                <?php
                session_start();
                if ($_SESSION['upload'] == false) {
                    echo "Đã có lỗi xảy ra trong quá trình upload";
                    echo '<a href="index.php"><button type="button" class="btn btn-secondary">Back to reupload</button></a>';
                } else {
                    $number = $_SESSION['number'];
                    $file = $_SESSION['file'];
                    $name = $file["name"];
                    $size = $file["size"];
                    $date = $_SESSION['date'];
                    $status = $_SESSION['status'];
                    function swap(&$a, &$b) {
                        $temp = $a;
                        $a = $b;
                        $b = $temp;
                    }
                    function sortNameDesc(&$name,&$date,&$size,&$status,$number) {
                        for ($i=0 ;$i < $number-1;$i++){
                            for ($j=0; $j < $number - $i - 1;$j++){
                                if ($name[$j]<$name[$j+1]){
                                    swap($name[$j], $name[$j+1]);
                                    swap($size[$j], $size[$j+1]);
                                    swap($date[$j], $date[$j+1]);
                                    swap($status[$j], $status[$j+1]);
                                }
                            }
                        }
                    }
                    function sortNameAsc(&$name,&$date,&$size,&$status,$number) {
                        for ($i=0 ;$i < $number-1;$i++){
                            for ($j=0; $j < $number - $i - 1;$j++){
                                if ($name[$j]>$name[$j+1]){
                                    swap($name[$j], $name[$j+1]);
                                    swap($size[$j], $size[$j+1]);
                                    swap($date[$j], $date[$j+1]);
                                    swap($status[$j], $status[$j+1]);
                                }
                            }
                        }
                    }
                    function sortDateDesc(&$name,&$date,&$size,&$status,$number) {
                        for ($i=0 ;$i < $number-1;$i++){
                            for ($j=0; $j < $number - $i - 1;$j++){
                                if (strtotime($date[$j])<strtotime($date[$j+1])){
                                    swap($name[$j], $name[$j+1]);
                                    swap($size[$j], $size[$j+1]);
                                    swap($date[$j], $date[$j+1]);
                                    swap($status[$j], $status[$j+1]);
                                }
                            }
                        }
                    }
                    function sortDateAsc(&$name,&$date,&$size,&$status,$number) {
                        for ($i=0 ;$i < $number-1;$i++){
                            for ($j=0; $j < $number - $i - 1;$j++){
                                if (strtotime($date[$j])>strtotime($date[$j+1])){
                                    swap($name[$j], $name[$j+1]);
                                    swap($size[$j], $size[$j+1]);
                                    swap($date[$j], $date[$j+1]);
                                    swap($status[$j], $status[$j+1]);
                                }
                            }
                        }
                    }
                    if (isset($_POST['submit'])) {
                        if ($_POST['one']=="name"){
                            if ($_POST['two']=='asc'){
                                sortNameAsc($name, $date, $size,$status, $number);
                            }
                            else {
                                sortNameDesc($name, $date, $size,$status, $number);
                            }
                        }
                        else {
                            if ($_POST['two']=='asc'){
                                sortDateAsc($name, $date, $size,$status, $number);
                            }
                            else {
                                sortNameDesc($name, $date, $size,$status, $number);
                            }
                        }
                    }
                    echo '<h2>Danh sách các file đã upload:</h2>';
                    echo '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date Upload</th>
                            <th scope="col">File Size(KB)</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>';
                    for ($i = 0; $i < $number; $i++) {
                        echo '<tr>';
                        echo '<th scope="row">';
                        echo $i + 1;
                        echo '</th>';
                        echo '<th>';
                        echo $name[$i];
                        echo '</th>';
                        echo '<th>';
                        echo $date[$i];
                        echo '</th>';
                        echo '<th>';
                        echo  (int)$size[$i] / 1024;
                        echo '</th>';
                        echo '<th>';
                        echo  $status[$i];
                        echo '</th>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                }
                ?>
                <div class="form-group">
                    <h4>Sắp xếp lại theo:</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <select class="form-control" name="one" id="">
                            <option selected value="name">Tên</option>
                            <option value="size">Ngày tháng upload</option>
                        </select>
                        <select class="form-control" name="two" id="">
                            <option value="asc">Tăng dần</option>
                            <option selected value="desc">Giảm dần</option>
                        </select>
                        <input type="submit" name="submit" value="Sắp xếp">
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>