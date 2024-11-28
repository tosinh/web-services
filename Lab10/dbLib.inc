<?php

$db_msg = "";

function connectDatabase()
{
    $username = "root";
    $password = "";
    try {
        $db = new PDO("mysql:dbname=sensors;host=localhost;port=3306", $username, $password);
    } catch (PDOException $e) {
        $db = -1;
        $db_msg = "Khong ket noi duoc co so du lieu" . $e->getMessage();
    }
    return $db;
}

function recordSensor($name, $value, $status)
{
    $db = connectDatabase();
    if ($db) {
        $sql = "INSERT INTO SensorsInfo(SensorName, SensorValue, SensorStatus) VALUES (\"$name\", \"$value\", $status)";
        try {
            $r = $db->query($sql);
        } catch (PDOException $e) {
            echo "Loi trong qua trinh ghi du lieu" . $e->getMessage();
        }
    } else {
        echo $db_msg;
    }
}
