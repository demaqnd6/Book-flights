<?php require_once('../include/header.php');?>

<section>
<div class="form-container">
  <h2>تسجيل حساب جديد</h2>
  <form action="../database/register.php" method="post">
    <div class="form-group">
      <label for="name">اسم المشترك</label>
      <input type="text" id="name" name="name" placeholder="أدخل اسمك" required>
    </div>
    <div class="form-group">
      <label for="password">كلمة المرور</label>
      <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" required>
    </div>
    <div class="form-group">
      <label for="birthdate">تاريخ الميلاد</label>
      <input type="date" id="birthdate" name="date" required>
    </div>
    <div class="form-group">
      <label for="phone">رقم الهاتف</label>
      <input type="tel" id="phone" name="phone" placeholder="أدخل رقم هاتفك" pattern="[0-9]{10}" required>
      <small class="helper-text">* رقم الهاتف يجب أن يحتوي على 10 أرقام</small>
    </div>
    <div class="form-group">
      <input type="submit" name="btnSingUp" value="تسجيل">
    </div>
  </form>
  <div class="form-footer">
    <p>هل لديك حساب بالفعل؟ <a href="../class/login.php">تسجيل الدخول</a></p>
  </div>
</div>
</section>

<?php require_once('../include/footer.php');?>