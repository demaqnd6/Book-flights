<?php
require_once('../include/header.php');
require_once('../database/config.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// التحقق من إرسال النموذج
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // التحقق إذا كان المستخدم مسجل الدخول
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../class/login.php"); // إعادة التوجيه إلى صفحة تسجيل الدخول
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $trip_id = isset($_POST['trip_id']) ? intval($_POST['trip_id']) : 0;

    if ($trip_id > 0) {
        // استعلام للتحقق من المقاعد وإدخال الحجز
        $booking_query = "
            INSERT INTO bookings (user_id, trip_id, booking_date, status)
            SELECT ?, ?, NOW(), 'confirmed'
            FROM trips
            WHERE id = ? AND seats_available > 0
        ";

        $stmt = $con->prepare($booking_query);
        $stmt->bind_param("iii", $user_id, $trip_id, $trip_id);

        if ($stmt->execute() && $stmt->affected_rows > 0) {
            // تحديث المقاعد المتاحة
            $update_seats_query = "UPDATE trips SET seats_available = seats_available - 1 WHERE id = ?";
            $stmt = $con->prepare($update_seats_query);
            $stmt->bind_param("i", $trip_id);
            $stmt->execute();

            $_SESSION['message'] = "تم حجز الرحلة بنجاح!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "لا توجد مقاعد متاحة أو حدث خطأ أثناء الحجز.";
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "طلب غير صالح.";
        $_SESSION['message_type'] = "error";
    }

    // إعادة توجيه الصفحة إلى نفسها
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<div class="trips-container">
    <h1 class="tit-section">الرحلات المتاحة</h1>

    <!-- زر للذهاب إلى الرحلات المحجوزة -->
    <a href="../class/manage_bookings.php">
        <button class="btn-my-trip">الرحلات المحجوزة</button>
    </a>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="message <?php echo $_SESSION['message_type']; ?>">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
    <?php endif; ?>

    <div class="trips-grid">
        <?php
        $sql = "SELECT * FROM trips WHERE seats_available > 0";
        $result = $con->query($sql);

        if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()): ?>
                <div class="trip-card">
                    <h2 class="name-trip"><?php echo htmlspecialchars($row['trip_name']); ?></h2>
                    <p><strong>الوجهة:</strong> <?php echo htmlspecialchars($row['destination']); ?></p>
                    <p><strong>وصف الرحلة:</strong> <?php echo htmlspecialchars($row['description']); ?></p>
                    <p><strong>السعر:</strong> <?php echo htmlspecialchars($row['price']); ?>$</p>
                    <p><strong>عدد المقاعد المتاحة:</strong> <?php echo htmlspecialchars($row['seats_available']); ?></p>
                    <p><strong>تاريخ الرحلة:</strong> <?php echo htmlspecialchars($row['trip_date']); ?></p>
                    <form method="POST" action="">
                        <input type="hidden" name="trip_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                        <button type="submit" class="btn-book">حجز</button>
                    </form>
                </div>
            <?php endwhile;
        else: ?>
            <p>لا توجد رحلات متاحة حاليًا.</p>
        <?php endif; ?>
    </div>
</div>

<?php require_once('../include/footer.php'); ?>
