<nav class="sidebarApp">
    <div class="head">
        <a href="{{ route('gyms.index') }}">
            <img src="{{ asset('dashboard/') }}/assets/images/logo.svg" alt="logo" />
        </a>
    </div>

    <button class="close"><span>x</span></button>

    <div class="menu">
        <ul class="menu-links">
            <li class="nav-link">
                <a href="{{ route('gyms.index') }}" class="{{ prefixActive('index') }}">
                    <div>
                        <img src="{{ asset('dashboard/') }}/assets/icons/home.svg" alt="" />
                    </div>
                    <span class="text nav-text">الصفحة الرئيسية</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('gyms.sales') }}" class="{{ prefixActive('sales') }}">
                    <div>
                        <img src="{{ asset('dashboard/') }}/assets/icons/sales.svg" alt="" />
                    </div>
                    <span class="text nav-text">المبيعات</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('gyms.contactus') }}" class="{{ prefixActive('contactus') }}">
                    <div>
                        <img src="{{ asset('dashboard/') }}/assets/icons/questions.svg" alt="" />
                    </div>
                    <span class="text nav-text">الاستفسارات والشكاوى</span>
                </a>
            </li>



            <li class="nav-link">
                <a href="{{ route('users.gyms.index') }}" class="{{ prefixActive('users') }}">
                    <div>
                        <img src="{{ asset('dashboard/') }}/assets/icons/users.svg" alt="" />
                    </div>
                    <span class="text nav-text">الاعضاء</span>
                </a>
            </li>




            {{-- <li class="nav-link">
          <a href="{{ route('gyms.gifts.index') }}" class="{{ prefixActive('gifts') }}">
            <div>
              <img src="{{ asset('dashboard/') }}/assets/icons/gifts.svg" alt="" />
            </div>
            <span class="text nav-text">اسعاد العملاء</span>
          </a>
        </li> --}}
        </ul>

        <ul class="menu-links">
            <li class="nav-link">
                <a href="{{ route('gyms.settings') }}" class="{{ prefixActive('settings') }}">
                    <div class="icon">
                        <img src="{{ asset('dashboard/') }}/assets/icons/settings.svg" alt="" />
                    </div>
                    <span>الاعدادات</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="#">
                    <div class="icon">
                        <img src="{{ asset('dashboard/') }}/assets/icons/help.svg" alt="" />
                    </div>
                    <span>مركز المساعدة</span>
                </a>
            </li>
            <li class="nav-link mb-5">
                <a href="{{ route('gyms.logout') }}">
                    <span>تسجيل الخروج</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
