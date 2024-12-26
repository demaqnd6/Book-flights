
<?php
require_once('../database/config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];

    // إلغاء الحجز
    $sql = "UPDATE bookings SET status = 'cancelled' WHERE id = $booking_id";
    if ($con->query($sql) === TRUE) {
        echo "تم إلغاء الحجز بنجاح!";
    } else {
        echo "خطأ أثناء الإلغاء.";
    }
}
?>
