<?php
session_start(); // بدء الجلسة
session_unset(); // إزالة جميع بيانات الجلسة
session_destroy(); // تدمير الجلسة
header('Location: ../class/login.php'); // إعادة التوجيه إلى صفحة تسجيل الدخول
exit();
?>
