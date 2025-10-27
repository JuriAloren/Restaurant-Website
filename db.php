<?php
$servername = "localhost";   
$username   = "root";        
$password   = "";          
$dbname     = "marina_luxe"; // sql name


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

$conn->set_charset("utf8");

// حجز جديد
function addReservation($conn, $name, $email, $guests, $date, $time) {
    // استخدام Prepared Statement للحماية من حقن SQL
    $stmt = $conn->prepare("INSERT INTO reservations (customer_name, email, guests_count, reservation_date, reservation_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $name, $email, $guests, $date, $time);
    return $stmt->execute(); // ترجع true إذا نجحت العملية
}

//  (توصيل)طلب خارجي
function addOrder($conn, $name, $email, $delivery_time, $payment_method) {
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, email, delivery_time, payment_method) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $delivery_time, $payment_method);
    return $stmt->execute();
}

// لرؤية الحجوزات (للوحة التحكم) 
function getReservations($conn) {
    return $conn->query("SELECT * FROM reservations");
}

// لرؤية الطلبات (للوحة التحكم)
function getOrders($conn) {
    return $conn->query("SELECT * FROM orders");
}

// لرؤية قائمة الطعام
function getMenuItems($conn) {
    return $conn->query("SELECT * FROM menu_items");
}
?>
