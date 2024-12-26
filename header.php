<?php
session_start(); // بدء الجلسة
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../photo/plane.png">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/signup.css">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/call-me.css">
  <link rel="stylesheet" href="../css/available_trips.css">
  <link rel="stylesheet" href="../css/manage_bookings.css">
  <link rel="stylesheet" href="../css/textSection.css">
  <link rel="stylesheet" href="../css/all.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/normalize.css">
  <!-- <link rel="stylesheet" href="../css/home.css"> -->
  <!-- <link rel="stylesheet" href="../css/Domestic_tours&foreign_tours.css"> -->
  <link rel="stylesheet" href="../css/touristAreas.css">
  

  




    
  

  <title>Demafly | موقع حجوزات السفر</title>
</head>
<body>

<!-- الهيدر -->
<header>
    <!-- أزرار تسجيل الدخول وإنشاء الحساب -->
    <div class="auth-buttons">
    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="../class/logout.php"><button>تسجيل الخروج</button></a>
    <?php else: ?>
      <a href="../class/login.php"><button>تسجيل الدخول</button></a>
      <a href="../class/signup.php"><button>إنشاء حساب</button></a>
    <?php endif; ?>
  </div>


  <!-- الروابط -->
  <nav class="nav-links">
    <a href="../home/index.php">الصفحة الرئيسية</a>
    <a href="../class/available_trips.php">وجهات السفر</a>
    <a href="../class/offers.php">العروض</a>
    <a href="../class/call-me.php">تواصل معنا</a>
  </nav>

    <!-- الشعار -->
    <div class="logo">
    <h3>Dema<span>Fly</span></h3>
    <img src="../photo/plane.png" alt="شعار الموقع">
  </div>

</header>
