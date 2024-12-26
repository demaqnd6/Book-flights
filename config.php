<?php
$con = mysqli_connect('localhost', 'root', '', 'project_php');

// تحقق من نجاح الاتصال
if (!$con) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
?>