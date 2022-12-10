@extends('layouts.auth')

@section('content')
<!--begin::Signin-->
<div class="login-form login-signin">
    <div class="text-center mb-10 mb-lg-20">
        <h3 class="font-size-h1">
            تسجيل الدخول - برنامج نشاطي
        </h3>
        <p class="text-muted font-weight-bold">
            خاص بالإدارة ورواد النشاط
        </p>
    </div>
    <!--begin::Form-->
    <form class="form" method="post" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-5 px-6
                @if(old('login'))
                is-invalid
                @endif" type="text" placeholder="الرقم الوظيفي" name="login"
                value="{{ old('login') }}" autocomplete="off" required />
            @if(old('login'))
            <span class="invalid-feedback">معلومات الدخول خاطئة</span>
            @endif
        </div>
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-5 px-6 @error('password')
                is-invalid
                @enderror" type="password" placeholder="كلمة المرور" name="password" autocomplete="off" required />
            @error('password')
            <span class="invalid-feedback">{{ $message }}<span>
                    @enderror
        </div>
        <!--begin::Action-->
        <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
            <a href="javascript:;" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">نسيت الرمز
                السري ?</a>
            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">تسجيل الدخول</button>
        </div>
        <!--end::Action-->
    </form>
    <!--end::Form-->
</div>
<!--end::Signin-->
@endsection
