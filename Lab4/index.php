<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container form-signin">
        <?php
        $msg = "";
        unset($_SESSION["valid"]);

        $users = array(
            "admin" => array("password" => "admin", "fullname" => "Quản trị viên", "score" => 10),
            "sinh" => array("password" => "sinh", "fullname" => "Tô Văn Sinh", "score" => 10)
        ); //Mảng kết hợp

        if (isset($_POST["login"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
            foreach ($users as $username => $info) {
                if ($username == $_POST["username"] && $info["password"] == $_POST["password"]) {
                    $_SESSION["fullname"] = $info["fullname"];
                    $_SESSION["score"] = $info["score"];
                    $_SESSION["valid"] = true;
                    $_SESSION["timeout"] = time();
                    $_SESSION["username"] = $username;
                }
            }
            if (empty($_SESSION["valid"])) { // Đăng nhập không thành công
                $_SESSION["valid"] = false;
                $msg = "Sai tên đăng nhập hoặc mật khẩu";
            }
        }
        ?>
    </div>
    <div class="container">
        <?php
        if (empty($_SESSION["valid"])) {
        ?>
            <h2>Nhập tên đăng nhập và mật khẩu</h2>

            <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h4 class="form-signin-heading"><?php echo $msg; ?></h4>
                <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập" required autofocus>
                <br>
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Đăng nhập</button>
            </form>
        <?php
        } else if ($_SESSION["valid"]) {
            echo "<h2>Xin chào " . $_SESSION["username"] . " đã đăng nhập thành công</h2>";
            echo "Họ và tên: <strong>" . $_SESSION['fullname'] . "</strong> <br>";
            echo "Điểm: <strong>" . $_SESSION['score'] . "</strong>";
        ?>
            <br>
            <a href="logout.php" title="Đăng xuất">Đăng xuất</a>
        <?php
        }
        ?>
    </div>
</body>

</html>