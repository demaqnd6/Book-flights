<?php require_once('../include/header.php'); ?>
<section class="main">
    <div class="promo-container">
        <p class="promo-text">
            اكتشف أفضل العروض والوجهات المثيرة مع <span class="highlight">DemaFly</span>! 
            انضم الآن للحصول على تجربة سفر مميزة وعروض حصرية مصممة خصيصًا لك.
        </p>
        <button class="signup-button" onclick="window.location.href='../class/signup.php';">اشترك الآن</button>
    </div>
</section>
<!-- start who are we section -->

<section class="textSection">
        <div class="container">
            <div class="textSection-content">
                <h3 class="section-title">من نحن</h3>
                <p>تقدم الشركة كافة خدمات الطيران في فلسطين وحجز فنادق محليه وعالمية وتوفير تجارب سياحية مميزة وتقدم
                    عروضا هائلة في اسعار التذاكر،خدماتنا تقدم بإشراف عالي المستوى وبإدارة لكامل التفاصيل والهدف هو
     رضائكم بالإضافة إلى البرامج السياحية جذابة داخل وخارج فلسطين</p>
            </div>
            <div class="textSection-img">
                <img src="../photo/whoAreWe.svg" alt="">
            </div>
        </div>
    </section>
    <!-- end who are we section -->
    
     <!-- start services section -->
     <section class="services">
     <center><h2>ابدأ عطلتك بالكتير من الخدمات</h2></center> 
        <div class="container">
           
            <div class="cards">
                <a href="#" target="_blank">
                    <div class="card">
                        <img src="../photo/around.png" alt="mountain">
                        <p> جولات سياحية
                            داخل وخارج فلسطين
                        </p>
                    </div>
                </a>
                <a href="#" target="_blank">
                    <div class="card">
                        <img src="../photo/hotelIcon.png" alt="mountain">
                        <p>حجز فنادق
                            محليه وعالمية
                        </p>
                    </div>
                </a>
                <a href="#" target="_blank">
                    <div class="card">
                        <img src="../photo/mountain.png" alt="mountain">
                        <p> توفير تجارب
                            سياحية مميزة
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- end services section -->


     <!-- start tourist destinations section -->
     <section class="destinations">
     <h2 class="section-title">أفضل الوجهات السياحية حول العالم </h2>
        <div class="container">
            <div class="cards">
                <a href="../pages/Baly.php" target="_blank">
                    <div class="card">
                        <div class="card-img">
                            <img src="../photo/destinations/paly.jpg" draggable="false" alt="">
                        </div>
                        <h3>أرض الطبيعة</h3>
                    </div>
                </a>
                <a href="../pages/Amsterdam.php" target="_blank">
                    <div class="card">
                        <div class="card-img">
                            <img src="../photo/destinations/amstrdam.jpg" draggable="false" alt="">
                        </div>
                        <h3>عاصمة السالم</h3>
                    </div>
                </a>
                <a href="../pages/polnda.php" target="_blank">
                    <div class="card">
                        <div class="card-img">
                            <img src="../photo/destinations/polnd 1.jpg" draggable="false" alt="">
                        </div>
                        <h3>عالم آخر</h3>
                    </div>
                </a>
                <a href="../pages/London.php" target="_blank">
                    <div class="card">
                        <div class="card-img">
                            <img src="../photo/destinations/london 3.jpg" draggable="false" alt="">
                        </div>
                        <h3>حضارة تتجدد</h3>
                    </div>
                </a>
                <a href="../pages/Korea.php" target="_blank">
                    <div class="card">
                        <div class="card-img">
                            <img src="../photo/destinations/korya 2.jpg" draggable="false" alt="">
                        </div>
                        <h3>أرض الفنون</h3>
                    </div>
                </a>
                <a href="../pages/Cairo.php" target="_blank">
                    <div class="card">
                        <div class="card-img">
                            <img src="../photo/destinations/ciro.jpg" draggable="false" alt="">
                        </div>
                        <h3>موطن التجارب</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- end tourist destinations section -->
<?php require_once('../include/footer.php'); ?>
