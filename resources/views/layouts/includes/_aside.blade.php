<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        <a href="index.html" class="brand-logo">
            <img alt="Logo" src="assets/media/logos/logo-light.png" />
        </a>
        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                        <i class="menu-icon flaticon-home"></i>
                        <span class="menu-text">الصفحة الرئيسية</span>
                    </a>
                </li>

                @canany('قسم بياناتي', 'عرض المجلدات')
                @component('components.menu-item' , ['title' => 'بياناتي'])
                @can('قسم بياناتي')
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('profile') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">ملفي الشخصي</span>
                    </a>
                </li>
                @endcan
                @can('عرض المجلدات')
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('folders') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">مجلداتي</span>
                    </a>
                </li>
                @endcan
                @endcomponent
                @endcanany


                @can('قسم الحجوزات')
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">الحجوزات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الحجوزات</span>
                                </span>
                            </li>
                            @can('عرض شاشة المدير')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('ziyaras') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">جدول الزيارات</span>
                                </a>
                            </li>
                            @endcan
                            @can('عرض شاشة حجز حضور')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('ziyara.create') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">حجز زيارة</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @can('عرض الأسابيع')
                {{-- <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">إدارة الأسابيع</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">إدارة الأسابيع</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('weeks') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">الأسابيع</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                @endcan
                @endcan
                {{-- @can('قسم الزيارات')
                <!-- الزيارات -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">الزيارات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الزيارات</span>
                                </span>
                            </li>
                            @can('عرض كل الزيارات')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('ratings') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">كل الزيارات</span>
                                </a>
                            </li>
                            @endcan
                            @can('عرض الزيارات الخاصة بي')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('ratings.my') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">زياراتي</span>
                                </a>
                            </li>
                            @endcan
                            @can('عرض زيارات المعلم')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('all.ratings.teacher') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">زياراتي</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- الزيارات -->
                @endcan --}}
                @can('قسم الزيارات')
                <!-- الزيارات -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">الزيارات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الزيارات</span>
                                </span>
                            </li>
                            @can('عرض كل الزيارات')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('ziyaratmochrif') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">كل الزيارات</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('ziyaratmochrif.create') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">إنشاء زيارة</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- الزيارات -->
                @endcan
                @can('قسم الخطة الإسترتيجية')
                <!-- الخطة الإستراتيجية و التشغيلية -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">الخطة الإستراتيجية</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الخطة الإستراتيجية</span>
                                </span>
                            </li>
                            @can('عرض كل الخطط')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('plans') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">الخطط</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- الخطة الإستراتيجية و التشغيلية -->
                @endcan

                {{-- الخطط و النماذج --}}
                @canany('قسم الخطط و النماذج')
                @component('components.menu-item' , ['title' => 'الخطط و النماذج'])
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('khotats') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">الخطط</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('namadijs') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">النماذج</span>
                    </a>
                </li>
                @endcomponent
                @endcanany


                @can('قسم المستخدمين')
                <!-- قسم المستخدمين -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">المستخدمين</span>
                        <i class="menu-arrow"></i>
                    </a>
                    @canany('عرض المستخدمين', 'عرض الصفوف')
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">المستخدمين</span>
                                </span>
                            </li>
                            @can('عرض المستخدمين')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('users') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">المستخدمين</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('students') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">الطلاب</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('roadalnashat') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">رواد النشاط</span>
                                </a>
                            </li>
                            @endcan
                            @can('عرض الصفوف')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('years') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">الصفوف</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                    @endcanany
                </li> <!-- قسم المستخدمين -->
                @endcan

                
                            @can('إعطاء الصلاحيات')
                <!-- قسم الصلاحيات -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">المجموعات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">المجموعات</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('roles') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">المجموعات</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- قسم الصلاحيات -->
                            @endcan

                @can('عرض التقارير')
                <!-- قسم التقارير -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">التقارير</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            @can('عرض التقارير')
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">التقارير</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('reports.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">تقارير الأنشطة</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('reports.monthly.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">التقرير الشهري و النهائي</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('performance') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">تقرير المشرفين</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- قسم التقارير -->
                @endcan

                @can('عرض الإختبارات')
                <!-- قسم الإختبارات -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">الإختبارات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            @can('عرض الإختبارات')
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الإختبارات</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('quizzes') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">الإختبارات</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- قسم الإختبارات-->
                @endcan

                @can('عرض خطط التدريب')
                <!-- التدريب والتطوير -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">خطط التدريب</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            @can('عرض خطط التدريب')
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">خطط التدريب</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('trainings') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">خطط التدريب</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- التدريب والتطوير-->
                @endcan

                @can('عرض الإستبيانات')
                <!-- الإستبيانات -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">الإستبيانات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            @can('عرض الإستبيانات')
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الإستبيانات</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('questionnaires') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">الإستبيانات</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- الإستبيانات-->
                @endcan

                @can('عرض المحتوى الإلكتروني')
                <!-- المحتوى الإلكتروني -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">المحتوى الإلكتروني</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            @can('عرض المحتوى الإلكتروني')
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">المحتوى الإلكتروني</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('onlinecontent') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">المحتوى الإلكتروني</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- المحتوى الإلكتروني-->
                @endcan

                {{-- @can('إستعمال المحتوى الإلكتروني')
                <!-- المحتوى الإلكتروني -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">المحتوى الإلكتروني</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            @can('إستعمال المحتوى الإلكتروني')
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">المحتوى الإلكتروني</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('onlinecontent-users') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">المحتوى الإلكتروني</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- المحتوى الإلكتروني-->
                @endcan --}}

                @can('عرض قياس الأداء')
                <!-- قياس الأداء -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">قياس الأداء</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            @can('عرض قياس الأداء')
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">قياس الأداء</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('qiasadaas') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">قياس الأداء</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- قياس الأداء-->
                @endcan

                @can('المادة الدراسية')
                <!-- المادة الدراسية -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">المادة الدراسية</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            @can('المادة الدراسية')
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">المادة الدراسية</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('student-subjects') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">المادة الدراسية</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- المادة الدراسية-->
                @endcan

                @canany('إدارة الدعم الفني', 'إدارة الإستفسارات')
                {{-- <li class="menu-section">
                    <h4 class="menu-text">الدعم الفني والإستفسارات</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li> --}}
                <!-- الدعم الفني والإستفسارات -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">الدعم الفني والإستفسارات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الدعم الفني والإستفسارات</span>
                                </span>
                            </li>
                            @can('إدارة الإستفسارات')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('inquires') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">الإستفسارات</span>
                                </a>
                            </li>
                            @endcan
                            @can('إدارة الدعم الفني')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('support') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">الدعم الفني</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- الدعم الفني والإستفسارات-->
                @endcanany

                <!-- Users Sections -->
                {{-- @canany('محادثة الدعم الفني', 'إستعمال الإستفسارات')
                <!-- الدعم الفني والإستفسارات -->
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-graphic"></i>
                        <span class="menu-text">الدعم الفني والإستفسارات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الدعم الفني والإستفسارات</span>
                                </span>
                            </li>
                            @can('محادثة الدعم الفني')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('technical-support') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">الدعم الفني</span>
                                </a>
                            </li>
                            @endcan
                            @can('إستعمال الإستفسارات')
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('inquires-support') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">الإستفسارات</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- الدعم الفني والإستفسارات-->
                @endcanany --}}

                {{-- النشاط --}}
                @canany('قسم النشاط')
                @component('components.menu-item' , ['title' => 'النشاط'])
                @can('توزيع المعلمين على النشاط')
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('teachernashats') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">توزيع المعلمين على النشاط</span>
                    </a>
                </li>
                @endcan
                @can('توزيع الطلاب على المجالات')
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('studentfields') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">توزيع الطلاب على المجالات</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('schoolnashats') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">مجلس النشاط المدرسي</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('tolabnashats') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">مجلس النشاط الطلابي</span>
                    </a>
                </li>
                @endcan
                @endcomponent
                @endcanany

                {{-- المراكز و المنجزات --}}
                @canany('قسم المراكز و المنجزات')
                @component('components.menu-item' , ['title' => 'المراكز و المنجزات'])
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('achievements') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">المراكز و المنجزات</span>
                    </a>
                </li>
                @endcomponent
                @endcanany

                {{-- المؤشر --}}
                @canany('قسم المؤشر')
                @component('components.menu-item' , ['title' => 'المؤشر'])
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('performance') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">المؤشر</span>
                    </a>
                </li>
                @endcomponent
                @endcanany

                {{-- أجندة --}}
                @canany('قسم أجندة')
                @component('components.menu-item' , ['title' => 'أجندة'])
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('agendas') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">أجندة</span>
                    </a>
                </li>
                @endcomponent
                @endcanany


                {{-- أجندة --}}
                @canany(
                'قسم المشاركات',
                'المشاركات الموافق عليها',
                'المشاركات غير الموافق عليها'
                )
                @component('components.menu-item' , ['title' => 'المشاركات'])
                
                @can('مشاركات المعلمين')
                @if(!auth()->user()->hasRole('رائد نشاط'))
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('donate.teacher.active') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">مشاركات المعلمين</span>
                    </a>
                </li>
                @endif
                @endcan
                
                @can('المشاركات غير الموافق عليها')
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('donate.noactive') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text"> المشاركات غير الموافق عليها</span>
                    </a>
                </li>
                @endcan
                @can('المشاركات الموافق عليها')
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('donate.active') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text"> المشاركات الموافق عليها</span>
                    </a>
                </li>
                @endcan
                @endcomponent
                @endcanany


            </ul>
        </div>
    </div>
</div>
