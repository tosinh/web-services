<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    exit("Trang này không hỗ trợ phương thức " . $_SERVER["REQUEST_METHOD"]);
} else if (!isset($_POST["email"]) || !isset($_POST["password"])) {
    http_response_code(400);
    exit("Thiếu trường email và/hoặc mật khẩu");
}

function authentication($user_email, $user_password)
{
    $users = array(
        "a@dlu.edu.vn" => array("email" => "a@dlu.edu.vn", "password" => "a", "fullname" => "Nguyễn Văn A", "score" => 7.5),
        "b@dlu.edu.vn" => array("email" => "b@dlu.edu.vn", "password" => "b", "fullname" => "Trần An Bình", "score" => 10)
    ); //Mảng kết hợp

    foreach ($users as $email => $info) {
        if ($email == $user_email && $info["password"] == $user_password) {
            return $info;
        }
    }
    return null;
}

try {
    $user_email =  $_POST["email"];
    $user_password =  $_POST["password"];

    $result = authentication($user_email, $user_password);
    if ($result != null) {
        $user_arr = array(
            "authen" => true,
            "data" => array(
                "email" => $result["email"],
                "fullname" => $result["fullname"],
                "score" => $result["score"]
            ),
            "message" => "Successfully login"
        );
        http_response_code(200);
    } else {
        $user_arr = array(
            "authen" => false,
            "data" => "",
            "message" => "Unsuccessfully login"
        );
        http_response_code(401);
    }
    print_r(json_encode($user_arr));
} catch (Exception $e) {
    http_response_code(500);
}
