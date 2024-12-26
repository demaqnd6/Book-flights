<?php
// بدء الجلسة لتخزين معلومات المستخدم عند تسجيل الدخول
session_start();

// تضمين ملف الاتصال بقاعدة البيانات
include('../database/config.php');

// التحقق من إرسال النموذج
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // جلب البيانات المدخلة من الفورم
    $username = $_POST['username'];
    $password = $_POST['password'];

    // التحقق من الحقول الفارغة
    if (empty($username) || empty($password)) {
        echo "<script>alert('يرجى تعبئة جميع الحقول.'); window.location.href = 'login.php';</script>";
        exit();
    }

    // الاستعلام عن المستخدم في قاعدة البيانات
    $query = "SELECT * FROM users WHERE name = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        // جلب البيانات من قاعدة البيانات
        $user = mysqli_fetch_assoc($result);

        // التحقق من كلمة المرور
        if (password_verify($password, $user['password'])) {
            // تخزين بيانات المستخدم في الجلسة
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name'];

            // إعادة توجيه إلى الصفحة الرئيسية
            header('Location: ../home/index.php');
            exit();
        } else {
            echo "<script>alert('كلمة المرور غير صحيحة.'); window.location.href = '../class/login.php';</script>";
        }
    } else {
        echo "<script>alert('اسم المستخدم غير موجود.'); window.location.href = '../class/login.php';</script>";
    }
} else {
    // إذا تم الوصول للملف بطريقة غير صحيحة
    header('Location: ../class/login.php');
    exit();
}
?>
