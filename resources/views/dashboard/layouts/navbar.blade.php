<nav class="sidebarApp">
    <div class="head">
      <a href="{{ route('dashboard.index') }}">
        <img src="{{ asset('dashboard/') }}/assets/images/logo.svg" alt="logo" />
      </a>
    </div>

    <button class="close"><span>x</span></button>

    <div class="menu">
      <ul class="menu-links">
        <li class="nav-link">
          <a href="{{ route('dashboard.index') }}" class="{{ prefixActive('index') }}">
            <div>
              <img src="{{ asset('dashboard/') }}/assets/icons/home.svg" alt="" />
            </div>
            <span class="text nav-text">الصفحة الرئيسية</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="{{ route('dashboard.sales') }}" class="{{ prefixActive('sales') }}">
            <div>
              <img src="{{ asset('dashboard/') }}/assets/icons/sales.svg" alt="" />
            </div>
            <span class="text nav-text">المبيعات</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="{{ route('dashboard.contactus') }}" class="{{ prefixActive('contactus') }}">
            <div>
              <img src="{{ asset('dashboard/') }}/assets/icons/questions.svg" alt="" />
            </div>
            <span class="text nav-text">الاستفسارات والشكاوى</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="{{ route('dashboard.users.index') }}" class="{{ prefixActive('users') }}">
            <div>
              <img src="{{ asset('dashboard/') }}/assets/icons/users.svg" alt="" />
            </div>
            <span class="text nav-text">الاعضاء</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="{{ route('dashboard.gyms.index') }}" class="{{ prefixActive('gyms') }}">
            <div>
              <img src="{{ asset('dashboard/') }}/assets/icons/partners.svg" alt="" />
            </div>
            <span class="text nav-text">الشركاء</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="{{ route('dashboard.packages.index') }}" class="{{ prefixActive('packages') }}">
            <div>
              <img src="{{ asset('dashboard/') }}/assets/icons/subscriptions.svg" alt="" />
            </div>
            <span class="text nav-text">الباقات والاشتراكات</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="pakages.html">
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
