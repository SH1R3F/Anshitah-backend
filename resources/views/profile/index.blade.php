@extends('layouts.app')



@section('content')
<div class="card card-custom card-stretch">
    @can('تعديل البيانات')
        <div class="card-header py-3">
            <div class="card-toolbar">
                <a href="{{ route('profile.edit') }}" class="btn btn-success mr-2">تعديل</a>
            </div>
        </div>
    @endcan
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
                                </div>
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </div>
                </div><!-- الصورة الشخصية -->
                <div class="form-group row">
                    <div class="col-12">
                        @if(Auth::user()->milaf_howiya)
                        <a href="{{ Auth::user()->milaf_howiya }}" target="_blank" class="badge badge-primary d-block mx-auto">ملف
                            الهوية</a>
                        @else
                        <div class="badge badge-warning text-white d-block mx-auto">
                            ملف الهوية غير موجود
                        </div>
                        @endif
                    </div>
                </div><!-- ملف الهوية -->
                <div class="form-group row">
                    <div class="col-12">
                        @if(Auth::user()->milaf_wadifi)
                        <a href="{{ Auth::user()->milaf_wadifi }}" target="_blank" class="badge badge-info d-block mx-auto">الملف
                            الوظيفي</a>
                        @else
                        <div class="badge badge-warning text-white d-block mx-auto">
                            الملف الوظيفي غير موجود
                        </div>
                        @endif
                    </div>
                </div><!-- الملف الوظيفي -->
                <div class="form-group row">
                    <label class="col-12">الإسم الكامل</label>
                    <div class="col-12">
                        <input name="name" readonly class="form-control form-control-lg form-control-solid" type="text"
                            value="{{ Auth::user()->name }}">
                    </div>
                </div><!-- الإسم الكامل -->
                <div class="form-group row">
                    <label class="col-12">البريد الالكتروني</label>
                    <div class="col-12">
                        <input name="email" readonly class="form-control form-control-lg form-control-solid" type="text"
                            value="{{ Auth::user()->email }}">
                    </div>
                </div><!-- البريد الالكتروني -->
                <div class="form-group row">
                    <label class="col-12">رقم الهوية</label>
                    <div class="col-12">
                        <input name="rakm_howiya" readonly class="form-control form-control-lg form-control-solid"
                            type="text" value="{{ Auth::user()->rakm_howiya }}">
                    </div>
                </div><!-- رقم الهوية -->
                <div class="form-group row">
                    <label class="col-12">رقم الجوال</label>
                    <div class="col-12">
                        <input name="mobile" readonly class="form-control form-control-lg form-control-solid"
                            type="text" value="{{ Auth::user()->mobile }}">
                    </div>
                </div><!-- رقم الجوال -->
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-12">الجامعة</label>
                    <div class="col-12">
                        <input name="university" readonly class="form-control form-control-lg form-control-solid"
                            type="text" value="{{ Auth::user()->university }}">
                    </div>
                </div><!-- الجامعة -->
                <div class="form-group row">
                    <label class="col-12">التخصص</label>
                    <div class="col-12">
                        <input name="takhasos" readonly class="form-control form-control-lg form-control-solid"
                            type="text" value="{{ Auth::user()->takhasos }}">
                    </div>
                </div><!-- التخصص -->
                <div class="form-group row">
                    <label class="col-12">تاريخ الميلاد</label>
                    <div class="col-12">
                        <input readonly class="form-control form-control-lg form-control-solid"
                            type="text" value="{{ Auth::user()->date_birth }}">
                    </div>
                </div><!-- تاريخ الميلاد -->
                <div class="form-group row">
                    <label class="col-12">تاريخ التخرج</label>
                    <div class="col-12">
                        <input readonly class="form-control form-control-lg form-control-solid"
                            type="text" value="{{ Auth::user()->date_graduation }}">
                    </div>
                </div><!-- تاريخ التخرج -->
                <div class="form-group row">
                    <label class="col-12">تاريخ بدء العمل</label>
                    <div class="col-12">
                        <input readonly class="form-control form-control-lg form-control-solid"
                            type="text" value="{{ Auth::user()->date_job }}">
                    </div>
                </div><!-- تاريخ بدء العمل -->
                <div class="form-group row">
                    <label class="col-12">الرقم الوظيفي</label>
                    <div class="col-12">
                        <input readonly class="form-control form-control-lg form-control-solid"
                            type="text" value="{{ Auth::user()->rakm_wadifi }}">
                    </div>
                </div><!-- الرقم الوظيفي -->
                <div class="form-group row">
                    <label class="col-12">الوظيفة الحالية</label>
                    <div class="col-12">
                        <input readonly class="form-control form-control-lg form-control-solid"
                            type="text" value="{{ Auth::user()->current_job }}">
                    </div>
                </div><!-- الوظيفة الحالية -->
            </div>
        </div>
    </div>
</div>

@endsection
