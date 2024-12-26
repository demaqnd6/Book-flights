<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'success') {
        echo "<script>
            alert('تم تسجيل الحساب بنجاح!');
            window.location.href = '../class/login.php'; // التوجيه إلى صفحة تسجيل الدخول
        </script>";
        exit();
    } elseif ($_GET['msg'] == 'exists') {
        echo "<script>
            alert('اسم المستخدم موجود بالفعل. يرجى اختيار اسم آخر.');
        </script>";
    } elseif ($_GET['msg'] == 'error') {
        echo "<script>
            alert('حدث خطأ أثناء التسجيل. يرجى المحاولة مرة أخرى لاحقًا.');
        </script>";
    }
}
?>

<?php
include('../database/config.php');

if (isset($_REQUEST['btnSingUp'])) {
    $NAME = $_REQUEST['name'];
    $PASSWORD = $_REQUEST['password'];
    $DATE = $_REQUEST['date'];
    $PHONE = $_REQUEST['phone'];
    $hach_password = password_hash($PASSWORD, PASSWORD_DEFAULT);

    // التحقق من وجود اسم المستخدم مسبقاً
    $check_query = "SELECT * FROM users WHERE name = '$NAME'";
    $result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // إذا كان اسم المستخدم موجود مسبقاً
        header('location: register.php?msg=exists');
    } else {
        // إذا لم يكن موجوداً، قم بإدخال البيانات
        $insert = "INSERT INTO users (name, password, date, phone) VALUES ('$NAME', '$hach_password', '$DATE', '$PHONE')";
        if (mysqli_query($con, $insert)) {
            header('location: register.php?msg=success');
        } else {
            header('location: register.php?msg=error');
        }
    }
    exit(); // إنهاء البرنامج بعد التوجيه
}
?>
