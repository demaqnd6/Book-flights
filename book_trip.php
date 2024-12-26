<?php
require_once('../database/config.php');
session_start();

// الحجز
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trip_id = $_POST['trip_id'];
    $user_id = $_SESSION['user_id'];

    // التحقق من وجود مقاعد كافية
    $sql = "SELECT seats_available FROM trips WHERE id = $trip_id";
    $result = $con->query($sql);
    $trip = $result->fetch_assoc();

    if ($trip['seats_available'] > 0) {
        // تحديث المقاعد
        $sql = "UPDATE trips SET seats_available = seats_available - 1 WHERE id = $trip_id";
        $con->query($sql);

        // إضافة الحجز
        $sql = "INSERT INTO bookings (user_id, trip_id) VALUES ($user_id, $trip_id)";
        if ($con->query($sql) === TRUE) {
            echo "تم الحجز بنجاح!";
        } else {
            echo "خطأ أثناء الحجز.";
        }
    } else {
        echo "عذرًا، لا توجد مقاعد متاحة.";
    }
}
?>
