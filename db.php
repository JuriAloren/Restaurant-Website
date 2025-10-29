<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "marina_luxe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

$conn->set_charset("utf8");

// إضافة حجز جديد
function الحجوزات($conn, $الاسم, $البريد, $عدد_الضيوف, $التاريخ, $الوقت) {
    $stmt = $conn->prepare("INSERT INTO reservations (customer_name, email, guests_count, reservation_date, reservation_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $الاسم, $البريد, $عدد_الضيوف, $التاريخ, $الوقت);
    return $stmt->execute();
}

// إضافة طلب خارجي
function الطلبات($conn, $الاسم, $البريد, $وقت_التوصيل, $طريقة_الدفع) {
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, email, delivery_time, payment_method) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $الاسم, $البريد, $وقت_التوصيل, $طريقة_الدفع);
    return $stmt->execute();
}

// عرض الحجوزات
function الحجوزات_عرض($conn) {
    return $conn->query("SELECT * FROM reservations ORDER BY reservation_date DESC");
}

// عرض الطلبات
function الطلبات_عرض($conn) {
    return $conn->query("SELECT * FROM orders ORDER BY delivery_time DESC");
}

// عرض القائمة
function القائمة($conn) {
    return $conn->query("SELECT * FROM menu_items ORDER BY id ASC");
}
?>
