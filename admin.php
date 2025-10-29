<?php
include 'db.php';

// جلب البيانات
$الحجوزات = الحجوزات_عرض($conn);
$الطلبات = الطلبات_عرض($conn);

// حساب الإحصائيات
$totalReservations = $الحجوزات->num_rows;
$totalOrders = $الطلبات->num_rows;
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>لوحة التحكم - Marina Luxe</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 0;
        direction: rtl;
    }
    header {
        background-color: #6c63ff;
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
    }
    .stats {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 20px;
    }
    .card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        text-align: center;
        width: 200px;
    }
    .card h3 {
        margin: 10px 0;
        color: #6c63ff;
    }
    h2 {
        text-align: center;
        margin-top: 30px;
        color: #333;
    }
    table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    th {
        background-color: #6c63ff;
        color: white;
        padding: 12px;
    }
    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
</style>
</head>
<body>
<header>لوحة التحكم - Marina Luxe</header>

<div class="stats">
    <div class="card">
        <h3>الحجوزات</h3>
        <p><?= $totalReservations ?> حجز</p>
    </div>
    <div class="card">
        <h3>الطلبات الخارجية</h3>
        <p><?= $totalOrders ?> طلب</p>
    </div>
</div>

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
    <?php while($row = $الحجوزات->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['customer_name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= $row['guests_count'] ?></td>
        <td><?= $row['reservation_date'] ?></td>
        <td><?= $row['reservation_time'] ?></td>
        <td><?= $row['status'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<h2>الطلبات الخارجية</h2>
<table>
    <tr>
        <th>الاسم</th>
        <th>البريد الإلكتروني</th>
        <th>وقت التوصيل</th>
        <th>طريقة الدفع</th>
        <th>الحالة</th>
    </tr>
    <?php while($row = $الطلبات->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['customer_name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= $row['delivery_time'] ?></td>
        <td><?= $row['payment_method'] ?></td>
        <td><?= $row['status'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
