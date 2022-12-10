
<!DOCTYPE html>
<html lang="ar" dir="rtl">
	<head>
        <base href="../../">
        <meta charset="utf-8" />
        <title>{{ env('APP_NAME') }} - {{ $title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Vendors Styles(used by this page)-->
        <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{ asset('plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.rtl.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/style.bundle.rtl.css') }}" rel="stylesheet" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <link href="{{ asset('css/themes/layout/header/base/light.rtl.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/themes/layout/header/menu/light.rtl.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/themes/layout/brand/dark.rtl.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/themes/layout/aside/dark.rtl.css') }}" rel="stylesheet" />
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
        <link rel="stylesheet" href="{{ asset('css/hijri.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: 'Tajawal', sans-serif;
                font-size: 20px
            }
        </style>
        @yield('styles')
        @livewireStyles
    </head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		@include('layouts.includes._header_mobile')
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					@include('layouts.includes._header')
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						@include('layouts.includes._sub_header')
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="container">
                             <!--begin::Container-->
                        <div class="container">
                            @if (session('delete'))
                                <div class="flash-msg alert alert-warning">
                                    {{ session('delete') }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="flash-msg alert alert-info">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('update'))
                                <div class="flash-msg alert alert-primary">
                                    {{ session('update') }}
                                </div>
                            @endif
                            @if (session('create'))
                                <div class="flash-msg alert alert-success">
                                    {{ session('create') }}
                                </div>
                            @endif
                            <!--begin::Container-->
                            @yield('content')
                            <!--end::Container-->
                        </div>
                        <!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">2021©</span>
								<a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Keenthemes</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Nav-->
							<div class="nav nav-dark">
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">About</a>
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Team</a>
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">Contact</a>
							</div>
							<!--end::Nav-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!-- begin::User Panel-->
        @include('layouts.includes._user_panel')
        <!-- end::User Panel-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop">
            <span class="svg-icon">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                        <path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000" fill-rule="nonzero" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </div>
        <!--end::Scrolltop-->
		<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
        <script src="{{ asset('js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
        <script src="{{ asset('js/pages/widgets.js') }}"></script>
        <script>
            $(function() {
                setTimeout(function() {
                    $('.flash-msg').hide();
                }, 3000)
            });
        </script>
        @livewireScripts
        @yield('scripts')
	</body>
</html>
