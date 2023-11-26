<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل جديد</title>

    <!-- global  -->
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/global.css" />

    <!-- only for page -->
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/new-user.css" />
</head>

<body dir="rtl">
    <div class="layout">
        <nav class="sidebarApp">
            <div class="head">
                <a href="index.html">
                    <img src="{{ asset('dashboard/') }}/assets/images/logo.svg" alt="logo" />
                </a>
            </div>

            <button class="close"><span>x</span></button>

            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.html" class="active">
                            <div>
                                <img src="{{ asset('dashboard/') }}/assets/icons/home.svg" alt="" />
                            </div>
                            <span class="text nav-text">الصفحة الرئيسية</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="sales.html">
                            <div>
                                <img src="{{ asset('dashboard/') }}/assets/icons/sales.svg" alt="" />
                            </div>
                            <span class="text nav-text">المبيعات</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="inquiries-and-complaints.html">
                            <div>
                                <img src="{{ asset('dashboard/') }}/assets/icons/questions.svg" alt="" />
                            </div>
                            <span class="text nav-text">الاستفسارات والشكاوى</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="members.html">
                            <div>
                                <img src="{{ asset('dashboard/') }}/assets/icons/users.svg" alt="" />
                            </div>
                            <span class="text nav-text">الاعضاء</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="partners.html">
                            <div>
                                <img src="{{ asset('dashboard/') }}/assets/icons/partners.svg" alt="" />
                            </div>
                            <span class="text nav-text">الشركاء</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="subscription.html">
                            <div>
                                <img src="{{ asset('dashboard/') }}/assets/icons/subscriptions.svg" alt="" />
                            </div>
                            <span class="text nav-text">الباقات والاشتراكات</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="index.html">
                            <div>
                                <img src="{{ asset('dashboard/') }}/assets/icons/reports.svg" alt="" />
                            </div>
                            <span class="text nav-text">التقارير</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="gifts.html">
                            <div>
                                <img src="{{ asset('dashboard/') }}/assets/icons/gifts.svg" alt="" />
                            </div>
                            <span class="text nav-text">اسعاد العملاء</span>
                        </a>
                    </li>
                </ul>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="settings.html">
                            <div class="icon">
                                <img src="{{ asset('dashboard/') }}/assets/icons/settings.svg" alt="" />
                            </div>
                            <span>الاعدادات</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="settings.html">
                            <div class="icon">
                                <img src="{{ asset('dashboard/') }}/assets/icons/help.svg" alt="" />
                            </div>
                            <span>مركز المساعدة</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main>
            <header class="headerOptions">
                <button class="open-sidebar"><img src="{{ asset('dashboard/') }}/assets/icons/menu.svg"
                        alt="" /></button>

                <div class="headerActions">
                    <a class="addNewBtn" href="new-user.html"><span>+</span> تسجيل جديد</a>
                    <div class="notifacationAndSearchBtn">
                        <img src="{{ asset('dashboard/') }}/assets/icons/notifications.svg" alt="notifacation icon" />
                    </div>
                    <div class="notifacationAndSearchBtn">
                        <img src="{{ asset('dashboard/') }}/assets/icons/search.svg" alt="search icon" />
                    </div>
                    <div class="userImage">
                        <img src="{{ asset('dashboard/') }}/assets/images/user.png" alt="userImage" />
                    </div>
                </div>
            </header>

            <section class="newUserPage">
                <form action="">
                    <div class="content">
                        <div class="gymSlug">
                            <h5> </h5>
                            <div class="addGallary">
                                <img src="{{ asset('dashboard/') }}/assets/icons/addGallary.svg" alt="" />
                                <p>رفع الصورة</p>
                                <input type="file" />
                            </div>
                        </div>
                        <div>
                            <label for="username">اسم المستخدم</label>
                            <div class="inputS1">
                                <input type="text" />
                            </div>
                        </div>
                        <div>
                            <label for="username">رقم الجوال</label>
                            <div class="inputS1 phone">
                                <input type="text" />
                                <span>+966</span>
                            </div>
                        </div>
                        <div>
                            <label for="username">الاسم الاول</label>
                            <div class="inputS1">
                                <input type="text" />
                            </div>
                        </div>
                        <div>
                            <label for="username">الايميل</label>
                            <div class="inputS1">
                                <input type="text" />
                            </div>
                        </div>
                        <div>
                            <label for="username">تحديد الصلاحيات</label>
                            <div class="inputS1">
                                <select name="" id="">
                                    <option value="">ادمن رئيسي</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="button">
                        <button class="addNewBtn"><span>+</span> تسجيل جديد</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
    <script src="{{ asset('dashboard/') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dashboard/') }}/js/scripts.js"></script>
</body>

</html>
