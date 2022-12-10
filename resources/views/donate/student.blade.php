<!DOCTYPE html>
<html lang="ar" dir="rtl">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} - @yield('title','وقت التطوع')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('css/pages/login/classic/login-1.rtl.css') }}" rel="stylesheet" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('aplugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.rtl.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.bundle.rtl.css') }}" rel="stylesheet" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('css/themes/layout/header/base/light.rtl.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/themes/layout/header/menu/light.rtl.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/themes/layout/brand/dark.rtl.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/themes/layout/aside/dark.rtl.css') }}" rel="stylesheet" />
    <!--end::Layout Themes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Tajawal', sans-serif;
            font-size: 20px
        }
    </style>
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white"
            id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
                <!--begin::Aside Top-->
                <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                    <!--begin::Aside header-->
                    <a href="#" class="text-center mb-10">
                        <img src="{{ asset('assets/media/logos/donate.png') }}" class="max-h-70px" alt="" />
                    </a>
                    <!--end::Aside header-->
                    <!--begin::Aside title-->
                    <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">
                        وقت التطوع
                        {{-- <br />with great build tools --}}
                    </h3>

                    <!--end::Aside title-->
                </div>
                <!--end::Aside Top-->
                <!--begin::Aside Bottom-->
                <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center"
                    style="background-image: url(https://anshitah.com/nashat/assets/media/logos/donate-bg.png)"></div>
                <!--end::Aside Bottom-->
            </div>
            <!--begin::Aside-->
            <!--begin::Content-->
            <div
                class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                <!--begin::Content body-->
                <div class="d-flex flex-column-fluid flex-center">
                    <!--begin::Signup-->
                    <div class="login-form login-signin">

               <div class="alertbar py-2" style="margin-bottom: 30px;background: #519cc7;color: #FFF;">
    <div class="container">
        انتهت فترة المسابقة .. شكرًا لكم <a href="#" data-toggle="modal" data-target="#competetionRules" style="color: #FFF;"></a>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="competetionRules" tabindex="-1" role="dialog" aria-labelledby="competetionRulesTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">بنود التحكيم لمشاريع المسابقة</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                    <!--end::Signup-->
                </div>
                <!--end::Content body-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('js/pages/custom/login/login-general.js') }}"></script>
    <script>
        $(function(){
            $('#school').change(function(){
                var html1 = `<option value="-1">اختر الصف</option>
        <option value="الأول ابتدائي">
            الأول ابتدائي
        </option>
        <option value="الثاني ابتدائي">
            الثاني ابتدائي
        </option>
        <option value="الثالث ابتدائي">
            الثالث ابتدائي
        </option>
        <option value="الرابع ابتدائي">
            الرابع ابتدائي
        </option>
        <option value="الخامس ابتدائي">
            الخامس ابتدائي
        </option>
        <option value="السادس ابتدائي">
            السادس ابتدائي
        </option>`;
                var html2 = `<option value="-1">اختر الصف</option>
                            <option value="الأول متوسط">
                                                الأول متوسط
                                </option>
                        <option value="الثاني متوسط">
                                                الثاني متوسط
                                 </option>
                 <option value="الثالث متوسط">
                                                الثالث متوسط
                        </option>`;
                var html3 = `<option value="-1">اختر الصف</option>
                                                                                        <option value="الأول ثانوي">
                                                الأول ثانوي
                                            </option>
                                                                                        <option value="الثاني ثانوي">
                                                الثاني ثانوي
                                            </option>
                                                                                        <option value="الثالث ثانوي">
                                                الثالث ثانوي
                                            </option>`;
                var school = $(this).val();
                if(school.includes('ابتدائية')){
                    $('#sofof').html(html1);
                }
                if(school.includes('متوسطة')){
                    $('#sofof').html(html2);
                }
                if(school.includes('ثانوية')){
                    $('#sofof').html(html3);
                }
            });
        });
    </script>
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
