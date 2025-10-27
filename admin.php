<?php
include 'db.php';

$reservations = getReservations($conn);

$orders = getOrders($conn);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>لوحة التحكم - Marina Luxe</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 20px;
    }
    h1 {
        text-align: center;
        color: #4b0082;
    }
    table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #e6e6fa;
    }
    .status {
        font-weight: bold;
    }
</style>
</head>
<body>
<h1>لوحة التحكم - الحجوزات والطلبات</h1>

<!-- عرض الحجوزات -->
<h2>الحجوزات</h2>
<table>
    <tr>
        <th>الاسم</th>
        <th>البريد الإلكتروني</th>
        <th>عدد الضيوف</th>
        <th>التاريخ</th>
        <th>الوقت</th>
        <th>الحالة</th>
    </tr>
    <?php while($row = $reservations->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['customer_name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= $row['guests_count'] ?></td>
        <td><?= $row['reservation_date'] ?></td>
        <td><?= $row['reservation_time'] ?></td>
        <td class="status"><?= $row['status'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<!-- عرض الطلبات -->
<h2>الطلبات الخارجية</h2>
<table>
    <tr>
        <th>الاسم</th>
        <th>البريد الإلكتروني</th>
        <th>وقت التوصيل</th>
        <th>طريقة الدفع</th>
        <th>الحالة</th>
    </tr>
    <?php while($row = $orders->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['customer_name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= $row['delivery_time'] ?></td>
        <td><?= $row['payment_method'] ?></td>
        <td class="status"><?= $row['status'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
