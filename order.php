include 'db.php';
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>صفحة الطلب - مطعم البرقر</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            direction: rtl;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            border-radius: 5%;
            background-color: rgba(238, 205, 205, 0.702);
            padding: 3%;
            color: rgb(138, 69, 69);
            font-size: 35px;
            margin-top: 20px;
        }
        form {
            background-color: rgba(238, 205, 205, 0.5);
            width: 400px;
            margin: 30px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: rgb(138, 69, 69);
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin-top: 15px;
        }
        input[type="submit"]:hover {
            background-color: rgb(100, 50, 50);
        }
        .success {
            text-align: center;
            color: green;
            font-size: 20px;
            margin-top: 20px;
        }
        nav {
            text-align: center;
            margin: 20px;
        }
        nav a {
            text-decoration: none;
            color: rgb(138, 69, 69);
            font-weight: bold;
            margin: 0 10px;
        }
        hr {
            border: none;
            height: 2px;
            background-color: pink;
        }
    </style>
</head>
<body>

    <div class="header">صفحة الطلب</div>

    <nav>
        <a href="index.html">الصفحة الرئيسية</a> |
        <a href="menu.php">قائمة الطعام</a>
    </nav>

    <hr><hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $item = $_POST['item'];
        $quantity = $_POST['quantity'];

        echo "<div class='success'>";
        echo "✅ تم استلام طلبك بنجاح يا <b>$name</b><br>";
        echo "الطلب: <b>$item</b> × $quantity<br>";
        echo "سيتم التواصل معك على الرقم: <b>$phone</b>";
        echo "</div>";
    } else {
    ?>
    <form method="POST" action="">
        <label for="name">الاسم الكامل:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">رقم الجوال:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="item">اختر الصنف:</label>
        <select id="item" name="item" required>
            <option value="">-- اختر --</option>
            <option value="برقر كلاسيك">برقر كلاسيك</option>
            <option value="برقر جبن">برقر جبن</option>
            <option value="برقر دجاج">برقر دجاج</option>
            <option value="برقر سبايسي">برقر سبايسي</option>
            <option value="كوكا كولا">كوكا كولا</option>
            <option value="سبرايت">سبرايت</option>
            <option value="عصير برتقال">عصير برتقال</option>
            <option value="عصير مانجو">عصير مانجو</option>
        </select>

        <label for="quantity">الكمية:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>

        <input type="submit" value="إرسال الطلب">
    </form>
    <?php } ?>

</body>
</html>
