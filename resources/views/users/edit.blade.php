@extends('layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="card card-custom card-stretch">
    <form action="{{ route('users.update',['id' => $user->id]) }}" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header py-3">
            <div class="card-toolbar">
                <button type="submit" class="btn btn-success mr-2">حفظ المعلومات</button>
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
                                        @if($user->avatar)
                                            {{ $user->avatar }}
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
                            @if($user->milaf_howiya)
                            <a href="{{ $user->milaf_howiya }}" target="_blank"
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
                            @if($user->milaf_wadifi)
                            <a href="{{ $user->milaf_wadifi }}" target="_blank"
                                class="badge badge-info d-block mx-auto mb-2">الملف
                                الوظيفي</a>
                            <input type="file" name="milaf_wadifi">
                            @else
                            <input type="file" name="milaf_wadifi">
                            @endif
                        </div>
                    </div><!-- الملف الوظيفي -->
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="al_jadwal_dirassi">الجدول الدراسي</label>
                        </div>
                        <div class="col-12">
                            @if($user->al_jadwal_dirassi)
                            <a href="{{ $user->al_jadwal_dirassi }}" target="_blank"
                                class="badge badge-info d-block mx-auto mb-2">
                                الجدول الدراسي
                            </a>
                            <input type="file" name="al_jadwal_dirassi">
                            @else
                            <input type="file" name="al_jadwal_dirassi">
                            @endif
                        </div>
                    </div><!-- الجدول الدراسي -->
                    <div class="form-group row">
                        <label class="col-12">الإسم الكامل</label>
                        <div class="col-12">
                            <input name="name" class="form-control form-control-lg form-control-solid" type="text"
                                value="{{ $user->name }}">
                        </div>
                    </div><!-- الإسم الكامل -->
                    <div class="form-group row">
                        <label class="col-12">البريد الالكتروني</label>
                        <div class="col-12">
                            <input name="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="text"
                                value="{{ $user->email }}">
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
                                type="text" value="{{ $user->rakm_howiya }}">
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
                                value="{{ $user->mobile }}">
                        </div>
                    </div><!-- رقم الجوال -->
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-12">العنوان</label>
                        <div class="col-12">
                            <input name="address" class="form-control form-control-lg form-control-solid" type="text"
                                value="{{ $user->address }}">
                        </div>
                    </div><!-- العنوان -->
                    <div class="form-group row">
                        <label class="col-12">الجامعة</label>
                        <div class="col-12">
                            <input name="university" class="form-control form-control-lg form-control-solid" type="text"
                                value="{{ $user->university }}">
                        </div>
                    </div><!-- الجامعة -->
                    <div class="form-group row">
                        <label class="col-12">التخصص</label>
                        <div class="col-12">
                            <input name="takhasos" class="form-control form-control-lg form-control-solid" type="text"
                                value="{{ $user->takhasos }}">
                        </div>
                    </div><!-- التخصص -->
                    <div class="form-group row">
                        <label class="col-12">تاريخ الميلاد</label>
                        <div class="col-12">
                            <input name="date_birth"
                                class="form-control hijri-date-default form-control-solid form-control-lg" type="text"
                                value="{{ $user->date_birth }}">
                        </div>
                    </div><!-- تاريخ الميلاد -->
                    <div class="form-group row">
                        <label class="col-12">تاريخ التخرج</label>
                        <div class="col-12">
                            <input name="date_graduation"
                                class="form-control hijri-date-default form-control-solid form-control-lg" type="text"
                                value="{{ $user->date_graduation }}">
                        </div>
                    </div><!-- تاريخ التخرج -->
                    <div class="form-group row">
                        <label class="col-12">تاريخ بدء العمل</label>
                        <div class="col-12">
                            <input name="date_job"
                                class="form-control hijri-date-default form-control-solid form-control-lg" type="text"
                                value="{{ $user->date_job }}">
                        </div>
                    </div><!-- تاريخ بدء العمل -->
                    <div class="form-group row">
                        <label class="col-12">الرقم الوظيفي</label>
                        <div class="col-12">
                            <input name="rakm_wadifi" class="form-control form-control-lg form-control-solid"
                                type="text" value="{{ $user->rakm_wadifi }}">
                        </div>
                    </div><!-- الرقم الوظيفي -->
                    <div class="form-group row">
                        <label class="col-12">الوظيفة الحالية</label>
                        <div class="col-12">
                            <input name="current_job" class="form-control form-control-lg form-control-solid"
                                type="text" value="{{ $user->current_job }}">
                        </div>
                    </div><!-- الوظيفة الحالية -->

                    @if ($user->hasRole('معلم'))
                        <div class="form-group row">
                            <label>الفصول</label>

                            <select class="js-example-basic-multiple form-control form-control-lg form-control-solid" name="classes[]" class="py-2" multiple="" data-select2-id="select2-data-61-oh5p" tabindex="-1" aria-hidden="true">
                                @foreach ($years as $year)
                                    <optgroup label="{{ $year->name }}">
                                        @foreach (json_decode($year->classes) as $class)
                                            <option value="{{ $year->id }}_{{ $class }}" {{ in_array($year->id . '_' . $class, json_decode($user->classes) ?? []) ? 'selected' : '' }}>{{ $year->number }}/{{ $class }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div><!-- الفصول -->
                    @endif
                    <div class="form-group">

                        <label>المجال</label>

                        <select name="field" class="form-control form-control-solid form-control-lg">
                            <option value="{{ $user->field }}">{{ $user->field }}</option>
                            <option value="علمي">علمي</option>
                            <option value="رياضي">رياضي</option>
                            <option value="اجتماعي">اجتماعي</option>
                            <option value="فني">فني</option>
                            <option value="ثقافي">ثقافي</option>
                            <option value="كشفي">كشفي</option>
                        </select>
                    </div>
                    <div class="form-group">

                        <label>المدرسة</label>

                        <select class="form-control form-control-lg form-control-solid py-2" name="school">
                            <option value="{{ $user->school }}">{{ $user->school }}</option>
                            @foreach ($schools as $school)
                            <option value="{{ $school }}">
                                {{ $school }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="col-12">المجموعة</label>
                        <div class="col-12">
                            <div class="d-flex">
                                @foreach ($roles as $role)
                                    @if($user->hasRole($role->name))
                                        <label class="bg-info rounded p-2 text-white mr-2 d-flex align-items-center justify-content-between">
                                            {{ $role->name }}
                                            <input class="ml-2" name="role" type="radio" value="{{ $role->name }}" checked>
                                        </label>
                                        @else
                                        <label class="bg-info rounded p-2 text-white mr-2 d-flex align-items-center justify-content-between">
                                            {{ $role->name }}
                                            <input class="ml-2" name="role" type="radio" value="{{ $role->name }}">
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div><!-- المجموعات -->
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endsection
