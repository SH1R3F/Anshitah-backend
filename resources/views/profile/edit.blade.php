@extends('layouts.app')



@section('content')
<div class="card card-custom card-stretch">
    <form action="{{ route('profile.update') }}" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header py-3">
            <div class="card-toolbar">
                <button type="submit" class="btn btn-success mr-2">تعديل</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    {{-- <label>الصورة الشخصية</label> --}}
                                </div>
                                <div class="col-4">
                                    <div class="image-input image-input-outline"
                                        style="background-image: url(assets/media/users/blank.png)">
                                        <div class="image-input-wrapper" style="background-image: url(
                                        @if(Auth::user()->avatar)
                                            {{ Auth::user()->avatar }}
                                        @else
                                            'assets/media/users/default.jpg'
                                        @endif
                                    )">
                                        </div>
                                        <label
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="change" data-toggle="tooltip" title=""
                                            data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                        </label>
                                        <span
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="cancel" data-toggle="tooltip" title=""
                                            data-original-title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-4"></div>
                            </div>
                        </div>
                    </div><!-- الصورة الشخصية -->
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="milaf_howiya">ملف الهوية</label>
                        </div>
                        <div class="col-12">
                            @if(Auth::user()->milaf_howiya)
                            <a href="{{ Auth::user()->milaf_howiya }}" target="_blank"
                                class="badge badge-primary d-block mx-auto mb-2">ملف
                                الهوية</a>
                            <input type="file" name="milaf_howiya">
                            @else
                            <input type="file" name="milaf_howiya">
                            @endif
                        </div>
                    </div><!-- ملف الهوية -->
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="milaf_wadifi">الملف الوظيفي</label>
                        </div>
                        <div class="col-12">
                            @if(Auth::user()->milaf_wadifi)
                            <a href="{{ Auth::user()->milaf_wadifi }}" target="_blank"
                                class="badge badge-info d-block mx-auto mb-2">الملف
                                الوظيفي</a>
                            <input type="file" name="milaf_wadifi">
                            @else
                            <input type="file" name="milaf_wadifi">
                            @endif
                        </div>
                    </div><!-- الملف الوظيفي -->
                    <div class="form-group row">
                        <label class="col-12">الإسم الكامل</label>
                        <div class="col-12">
                            <input name="name" class="form-control form-control-lg form-control-solid" type="text"
                                value="{{ Auth::user()->name }}">
                        </div>
                    </div><!-- الإسم الكامل -->
                    <div class="form-group row">
                        <label class="col-12">البريد الالكتروني</label>
                        <div class="col-12">
                            <input name="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="text"
                                value="{{ Auth::user()->email }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div><!-- البريد الالكتروني -->
                    <div class="form-group row">
                        <label class="col-12">كلمة المرور</label>
                        <div class="col-12">
                            <input name="password" class="form-control form-control-lg form-control-solid" type="text"
                                placeholder="كلمة المرور">
                        </div>
                    </div><!-- كلمة المرور -->
                    <div class="form-group row">
                        <label class="col-12">رقم الهوية</label>
                        <div class="col-12">
                            <input name="rakm_howiya" class="form-control form-control-lg form-control-solid @error('rakm_howiya') is-invalid @enderror"
                                type="text" value="{{ Auth::user()->rakm_howiya }}">
                            @error('rakm_howiya')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div><!-- رقم الهوية -->
                    <div class="form-group row">
                        <label class="col-12">رقم الجوال</label>
                        <div class="col-12">
                            <input name="mobile" class="form-control form-control-lg form-control-solid" type="text"
                                value="{{ Auth::user()->mobile }}">
                        </div>
                    </div><!-- رقم الجوال -->
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-12">العنوان</label>
                        <div class="col-12">
                            <input name="address" class="form-control form-control-lg form-control-solid" type="text"
                                value="{{ Auth::user()->address }}">
                        </div>
                    </div><!-- العنوان -->
                    <div class="form-group row">
                        <label class="col-12">الجامعة</label>
                        <div class="col-12">
                            <input name="university" class="form-control form-control-lg form-control-solid" type="text"
                                value="{{ Auth::user()->university }}">
                        </div>
                    </div><!-- الجامعة -->
                    <div class="form-group row">
                        <label class="col-12">التخصص</label>
                        <div class="col-12">
                            <input name="takhasos" class="form-control form-control-lg form-control-solid" type="text"
                                value="{{ Auth::user()->takhasos }}">
                        </div>
                    </div><!-- التخصص -->
                    <div class="form-group row">
                        <label class="col-12">تاريخ الميلاد</label>
                        <div class="col-12">
                            <input name="date_birth"
                                class="form-control hijri-date-default form-control-solid form-control-lg" type="text"
                                value="{{ Auth::user()->date_birth }}">
                        </div>
                    </div><!-- تاريخ الميلاد -->
                    <div class="form-group row">
                        <label class="col-12">تاريخ التخرج</label>
                        <div class="col-12">
                            <input name="date_graduation"
                                class="form-control hijri-date-default form-control-solid form-control-lg" type="text"
                                value="{{ Auth::user()->date_graduation }}">
                        </div>
                    </div><!-- تاريخ التخرج -->
                    <div class="form-group row">
                        <label class="col-12">تاريخ بدء العمل</label>
                        <div class="col-12">
                            <input name="date_job"
                                class="form-control hijri-date-default form-control-solid form-control-lg" type="text"
                                value="{{ Auth::user()->date_job }}">
                        </div>
                    </div><!-- تاريخ بدء العمل -->
                    <div class="form-group row">
                        <label class="col-12">الرقم الوظيفي</label>
                        <div class="col-12">
                            <input name="rakm_wadifi" class="form-control form-control-lg form-control-solid"
                                type="text" value="{{ Auth::user()->rakm_wadifi }}">
                        </div>
                    </div><!-- الرقم الوظيفي -->
                    <div class="form-group row">
                        <label class="col-12">الوظيفة الحالية</label>
                        <div class="col-12">
                            <input name="current_job" class="form-control form-control-lg form-control-solid"
                                type="text" value="{{ Auth::user()->current_job }}">
                        </div>
                    </div><!-- الوظيفة الحالية -->
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
