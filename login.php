<?php require_once('../include/header.php');?>
   
<section>
<div class="form-container">
        <h2>تسجيل الدخول</h2>
        <form method="POST" action="../database/login_process.php">
            <div class="form-group">
                <label for="username">اسم المستخدم</label>
                <input type="text" id="username" name="username" placeholder="أدخل اسم المستخدم" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" required>
            </div>
            <div class="form-group">
                <input type="submit" value="تسجيل الدخول">
            </div>
        </form>
        <div class="form-footer">
            <p>ليس لديك حساب؟ <a href="../class/signup.php">إنشاء حساب جديد</a></p>
        </div>
    </div>
</section>

<?php require_once('../include/footer.php');?>