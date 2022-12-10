@extends('layouts.app')

@section('content')

<div class="row">

    @can('قسم بياناتي')
        @livewire('btn-folder' , [
            'title' => 'بياناتي',
            'subtitle' => 'عرض بياناتي',
            'route' => 'profile',
            'color' => 'warning'
        ])
    @endcan
    <!-- بياناتي -->

    @can('عرض المجلدات')
        @livewire('btn-folder' , [
            'title' => 'مجلداتي',
            'subtitle' => 'عرض مجلداتي',
            'route' => 'folders',
            'color' => 'primary'
        ])
    @endcan
    <!-- مجلداتي -->

    @can('عرض شاشة المدير')
    <div class="btn-folder col-md-4 col-12 mb-4">
        <a href="{{ route('chachat.almodir') }}">
            <div class="card card-custom wave wave-animate-slow wave-primary mb-2">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-primary svg-icon-4x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex flex-column">
                            <label>شاشة المدير</label>
                            <div class="text-dark-75">
                                عرض شاشة المدير
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> <!-- شاشة المدير -->
    @endcan
    @can('عرض الأسابيع')
    <div class="btn-folder col-md-4 col-12 mb-4">
        <a href="{{ route('weeks') }}">
            <div class="card card-custom wave wave-animate-slow wave-info mb-2">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-info svg-icon-4x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex flex-column">
                            <label>الأسابيع</label>
                            <div class="text-dark-75">
                                عرض الأسابيع
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> <!-- الأسابيع -->
    @endcan
    @can('عرض الزيارات الخاصة بي')
        <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('ratings.my') }}">
                <div class="card card-custom wave wave-animate-slow wave-danger mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-danger svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>زياراتي</label>
                                <div class="text-dark-75">
                                    عرض زياراتي
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- زياراتي -->
    @endcan
    @can('عرض كل الخطط')
    <div class="btn-folder col-md-4 col-12 mb-4">
        <a href="{{ route('plans') }}">
            <div class="card card-custom wave wave-animate-slow wave-success mb-2">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-success svg-icon-4x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex flex-column">
                            <label>الخطة التشغيلية</label>
                            <div class="text-dark-75">
                                عرض الخطط
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> <!-- الخطط -->
    @endcan
    @can('عرض المستخدمين')
    <div class="btn-folder col-md-4 col-12 mb-4">
        <a href="{{ route('users') }}">
            <div class="card card-custom wave wave-animate-slow wave-warning mb-2">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-warning svg-icon-4x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex flex-column">
                            <label>عرض المستخدمين</label>
                            <div class="text-dark-75">
                                عرض المستخدمين
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> <!-- العناصر البشرية -->
    @endcan
    @can('حجز حضور')
    <div class="btn-folder col-md-4 col-12 mb-4">
        <a href="{{ route('hajz.hodor') }}">
            <div class="card card-custom wave wave-animate-slow wave-warning mb-2">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-warning svg-icon-4x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex flex-column">
                            <label>حجز حضور</label>
                            <div class="text-dark-75">
                                عرض شاشة حجز حضور
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> <!-- حجز حضور -->
    @endcan
    @if(Auth::user()->al_jadwal_dirassi)
    <div class="btn-folder col-md-4 col-12 mb-4">
        <a href="{{ Auth::user()->al_jadwal_dirassi }}" target="_blank">
            <div class="card card-custom wave wave-animate-slow wave-primary mb-2">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-primary svg-icon-4x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex flex-column">
                            <label>الجدول الدراسي</label>
                            <div class="text-dark-75">
                                عرض الجدول الدراسي
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> <!-- الجدول الدراسي -->
    @endif

    @can('عرض التقارير')
        <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('reports.index') }}">
                <div class="card card-custom wave wave-animate-slow wave-info mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-info svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>التقارير</label>
                                <div class="text-dark-75">
                                    عرض التقارير
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- زيارات المعلم -->
    @endcan

    @can('عرض الإختبارات')
        <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('quizzes') }}">
                <div class="card card-custom wave wave-animate-slow wave-warning mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-warning svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>الإختبارات</label>
                                <div class="text-dark-75">
                                    عرض الإختبارات
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- عرض الإختبارات -->
    @endcan


    @can('عرض خطط التدريب')
        <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('trainings') }}">
                <div class="card card-custom wave wave-animate-slow wave-primary mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-primary svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>التدريب والتطوير</label>
                                <div class="text-dark-75">
                                    عرض خطط التدريب
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- التدريب والتطوير -->
    @endcan

    @can('عرض المحتوى الإلكتروني')
        <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('onlinecontent') }}">
                <div class="card card-custom wave wave-animate-slow wave-info mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-info svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>المحتوى الإلكتروني</label>
                                <div class="text-dark-75">
                                    عرض المحتوى الإلكتروني
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- المحتوى الإلكتروني -->
    @endcan

    @can('عرض الإستبيانات')
        <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('questionnaires') }}">
                <div class="card card-custom wave wave-animate-slow wave-warning mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-warning svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>الإستبيانات</label>
                                <div class="text-dark-75">
                                    عرض الإستبيانات
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- الإستبيانات -->
    @endcan


    @can('إستعمال المحتوى الإلكتروني')
        {{-- <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('onlinecontent-users') }}">
                <div class="card card-custom wave wave-animate-slow wave-info mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-info svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>المحتوى الإلكتروني</label>
                                <div class="text-dark-75">
                                    عرض المحتوى الإلكتروني
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- المحتوى الإلكتروني --> --}}
    @endcan


    @can('عرض قياس الأداء')
        <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('quizzes') }}">
                <div class="card card-custom wave wave-animate-slow wave-warning mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-warning svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>قياس الأداء</label>
                                <div class="text-dark-75">
                                    عرض قياس الأداء
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- قياس الأداء -->
    @endcan

    @can('المادة الدراسية')
        <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('student-subjects') }}">
                <div class="card card-custom wave wave-animate-slow wave-primary mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-primary svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>المادة الدراسية</label>
                                <div class="text-dark-75">
                                    المادة الدراسية
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- قياس الأداء -->
    @endcan


    @can('إدارة الدعم الفني')
        <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('support') }}">
                <div class="card card-custom wave wave-animate-slow wave-primary mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-primary svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>الدعم الفني</label>
                                <div class="text-dark-75">
                                    الدعم الفني
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- الدعم الفني -->
    @endcan

    @can('محادثة الدعم الفني')
        {{-- <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('technical-support') }}">
                <div class="card card-custom wave wave-animate-slow wave-info mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-info svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>الدعم الفني</label>
                                <div class="text-dark-75">
                                    الدعم الفني
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- محادثة الدعم الفني --> --}}
    @endcan

    @can('إدارة الإستفسارات')
    {{-- <div class="btn-folder col-md-4 col-12 mb-4">
        <a href="{{ route('inquires') }}">
            <div class="card card-custom wave wave-animate-slow wave-primary mb-2">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-primary svg-icon-4x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex flex-column">
                            <label>الإستفسارات</label>
                            <div class="text-dark-75">
                                الإستفسارات
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> <!-- الإستفسارات --> --}}
    @endcan

    @can('إستعمال الإستفسارات')
        <div class="btn-folder col-md-4 col-12 mb-4">
            <a href="{{ route('inquires-support') }}">
                <div class="card card-custom wave wave-animate-slow wave-primary mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-primary svg-icon-4x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <label>الإستفسارات</label>
                                <div class="text-dark-75">
                                    الإستفسارات
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> <!-- محادثة الإستفسارات -->
    @endcan

    @can('قسم الخطط و النماذج')
    <div class="btn-folder col-md-4 col-12 mb-4">
        <a href="{{ route('performance') }}">
            <div class="card card-custom wave wave-animate-slow wave-info mb-2">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-info svg-icon-4x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex flex-column">
                            <label>الخطط</label>
                            <div class="text-dark-75">
                                الخطط
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> <!-- قياس الأداء -->

    <div class="btn-folder col-md-4 col-12 mb-4">
        <a href="{{ route('performance') }}">
            <div class="card card-custom wave wave-animate-slow wave-success mb-2">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <div class="mr-6">
                            <span class="svg-icon svg-icon-success svg-icon-4x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex flex-column">
                            <label>النماذج</label>
                            <div class="text-dark-75">
                                النماذج
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> <!-- قياس الأداء -->
    @endcan



</div>

@endsection
