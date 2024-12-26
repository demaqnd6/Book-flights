<?php require_once('../include/header.php'); ?>
<?php
// بدء الجلسة إذا لم تكن مفعلة
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// التحقق من تسجيل دخول المستخدم
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // إعادة التوجيه إلى صفحة تسجيل الدخول
    exit();
}

// تضمين ملف الاتصال بقاعدة البيانات
require_once '../database/config.php';

// جلب معرف المستخدم من الجلسة
$user_id = $_SESSION['user_id'];

// التحقق من طلب الحذف
if (isset($_POST['delete_booking'])) {
    $booking_id = $_POST['booking_id'];

    // حذف الحجز من قاعدة البيانات بشرط أن يكون للمستخدم الحالي
    $delete_query = "DELETE FROM bookings WHERE id = ? AND user_id = ?";
    $stmt = $con->prepare($delete_query);
    $stmt->bind_param("ii", $booking_id, $user_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "تم حذف الحجز بنجاح.";
    } else {
        $_SESSION['error'] = "حدث خطأ أثناء حذف الحجز.";
    }

    // إعادة تحميل الصفحة لتحديث البيانات
    header("Location: manage_bookings.php");
    exit();
}

// جلب الحجوزات الخاصة بالمستخدم الحالي
$query = "SELECT * FROM bookings WHERE user_id = ? ORDER BY booking_date DESC";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<section>
   <center><h1 class="tit-section">حجوزاتي</h1></center> 

    <!-- عرض رسائل الجلسة -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert success">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert error">
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <table>
        <tr>
            <th>رقم الحجز</th>
            <th>رقم الرحلة</th>
            <th>تاريخ الحجز</th>
            <th>الحالة</th>
            <th>إجراء</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['trip_id']); ?></td>
                <td><?php echo htmlspecialchars($row['booking_date']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td>
                    <form method="POST" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذا الحجز؟');">
                        <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                        <button type="submit" name="delete_booking" class="delete-btn">حذف</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>

<?php require_once('../include/footer.php'); ?>
