<?php
function limitText($text, $limit)
{
    if (strlen($text) > $limit) {
        $text = substr($text, 0, $limit) . '...';
    }
    return $text;
}

function tien($money)
{
    return number_format($money, 0, ',', '.');
}

function valueUnit($value)
{
    if ($value >= 1000) {
        $formatted_value = round($value / 1000, 1);
        if (floor($formatted_value) == $formatted_value) {
            $formatted_value = floor($formatted_value);
        }
        return $formatted_value . 'k';
    } else {
        return $value;
    }
}

function connectDB()
{
    $hostname = 'localhost';
    $dbuser = 'shopee';
    $dbpassword = 'Linhngu112';
    $dbname = 'xuongthphp1sum24';
    try {
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $dbuser, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn; // Trả về đối tượng kết nối
    } catch (PDOException $e) {
        echo 'Kết nối thất bại: ' . $e->getMessage();
        return null; // Trả về null nếu kết nối không thành công
    }
}
