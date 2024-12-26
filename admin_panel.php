<?php
require_once('../database/config.php');

// إضافة رحلة جديدة
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trip_name = $_POST['trip_name'];
    $destination = $_POST['destination'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $seats_available = $_POST['seats_available'];
    $trip_date = $_POST['trip_date'];

    $sql = "INSERT INTO trips (trip_name, destination, description, price, seats_available, trip_date) 
            VALUES ('$trip_name', '$destination', '$description', '$price', '$seats_available', '$trip_date')";

    if ($con->query($sql) === TRUE) {
        echo "تمت إضافة الرحلة بنجاح!";
    } else {
        echo "خطأ: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_panel.css">
    <title>لوحة تحكم الأدمن</title>

</head>
<body>
    <h1>لوحة تحكم الأدمن</h1>
    <form method="POST">
        <label>اسم الرحلة:</label>
        <input type="text" name="trip_name" required>

        <label>الوجهة:</label>
        <input type="text" name="destination" required>

        <label>وصف الرحلة:</label>
        <textarea name="description" rows="5" required></textarea>

        <label>السعر:</label>
        <input type="number" name="price" step="0.01" required>

        <label>عدد المقاعد المتاحة:</label>
        <input type="number" name="seats_available" required>

        <label>تاريخ الرحلة:</label>
        <input type="date" name="trip_date" required>

        <button type="submit">إضافة الرحلة</button>
    </form>
</body>
</html>
