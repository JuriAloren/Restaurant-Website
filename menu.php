<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>منيو مطعم البرقر</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }
        .header {
         text-align: center;
         border: 2px solid rgba(245, 245, 245, 0);
         border-radius: 5%;
         background-color: rgba(238, 205, 205, 0.702);
         padding: 3%;
         color: rgb(138, 69, 69);
         font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
         font-size: 40px;
         margin-top: 20px;
         margin: bottom: 20px;
        }
        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 37px;
        }
        .item-card {
            background-color: rgba(238, 205, 205, 0.5);
            border-radius: 10px;
            margin: 10px;
            width: 220px;
            text-align: center;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .item-card img {
            width: 100%;
            border-radius: 10px;
        }
        .item-name {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0 5px 0;
            color: #333;
        }
        .item-price {
            font-size: 16px;
            color: #ff3366;
        }
    </style>
  
    <link rel="stylesheet" href="style.css?v=3">

</head>
<body>

<h1>منيو مطعم البرقر</h1>


<nav>
    <!--<a href="contact.html">تواصل معنا </a>
    <a href="order.php">الطلبات</a>
    <a href="menu.php">قائمة الطعام</a>-->
    <a href="index.html">الصفحة الرئيسية</a>
</nav>
<br>
<hr color="pink"><hr color="pink">

<div class="menu-container">
    <?php
    // قائمة الأصناف
    $menu = [
        ['name' => 'برقر كلاسيك', 'price' => '15 ريال', 'image' => 'https://images.unsplash.com/photo-1550547660-d9450f859349?auto=format&fit=crop&w=500&q=60'],
        ['name' => 'برقر جبن', 'price' => '18 ريال', 'image' => 'https://images.unsplash.com/photo-1604908177524-4cc1c1dcd87f?auto=format&fit=crop&w=500&q=60'],
        ['name' => 'برقر دجاج', 'price' => '16 ريال', 'image' => 'https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=500&q=60'],
        ['name' => 'برقر سبايسي', 'price' => '20 ريال', 'image' => 'https://images.unsplash.com/photo-1617196030647-973856d0bfc7?auto=format&fit=crop&w=500&q=60'],
        ['name' => 'كوكا كولا', 'price' => '5 ريال', 'image' => 'https://images.unsplash.com/photo-1580910051076-73f8ec6a2824?auto=format&fit=crop&w=500&q=60'],
        ['name' => 'سبرايت', 'price' => '5 ريال', 'image' => 'https://images.unsplash.com/photo-1615484474204-6ee6b1b2d2d7?auto=format&fit=crop&w=500&q=60'],
        ['name' => 'عصير برتقال', 'price' => '7 ريال', 'image' => 'https://images.unsplash.com/photo-1570197783097-d2f3c7f26457?auto=format&fit=crop&w=500&q=60'],
        ['name' => 'عصير مانجو', 'price' => '8 ريال', 'image' => 'https://images.unsplash.com/photo-1598514983840-8722db98bbfb?auto=format&fit=crop&w=500&q=60'],
    ];

    // عرض الأصناف
    foreach($menu as $item) {
        echo '<div class="item-card">';
        echo '<img src="'.$item['image'].'" alt="'.$item['name'].'">';
        echo '<div class="item-name">'.$item['name'].'</div>';
        echo '<div class="item-price">'.$item['price'].'</div>';
        echo '</div>';
    }
    ?>
</div>

</body>
</html>
