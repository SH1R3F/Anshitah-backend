@extends('layouts.auth')

@section('content')
<!--begin::Signin-->
<div class="login-form login-signin">
    <div class="text-center mb-10 mb-lg-20">
        <h3 class="font-size-h1">
            تسجيل الدخول - برنامج موهبة
        </h3>
        <p class="text-muted font-weight-bold">
            يجب عليك تغيير كلمة السر
        </p>
    </div>
    <!--begin::Form-->
    <form class="form" method="post" action="{{ route('change.password') }}">
        @csrf
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-5 px-6 @error('password')
                is-invalid
                @enderror" type="password" placeholder="كلمة المرور" name="password" autocomplete="off" required />
            @error('password')
            <span class="invalid-feedback">{{ $message }}<span>
                    @enderror
        </div>
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-5 px-6 @error('password_confirmation')
                is-invalid
                @enderror" type="password" placeholder="تأكيد كلمة المرور" name="password_confirmation" autocomplete="off" required />
            @error('password_confirmation')
            <span class="invalid-feedback">{{ $message }}<span>
                    @enderror
        </div>
        <!--begin::Action-->
        <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">حفظ البيانات</button>
        </div>
        <!--end::Action-->
    </form>
    <!--end::Form-->
</div>
<!--end::Signin-->
@endsection
