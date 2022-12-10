@extends('layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('content')

<div class="card card-custom card-stretch">

    <form action="{{ route('users.store') }}" class="needs-validation custom-parent" novalidate method="post"
        enctype="multipart/form-data">

        @csrf

        <div class="card-header py-3">

            <div class="card-toolbar">

                <button type="submit" class="btn btn-success mr-2">إنشاء</button>

            </div>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-12">

                    <div class="form-group">

                        <label>إسم المستخدم</label>

                        <input class="form-control" type="text" name="name" required>

                    </div>

                    <div class="form-group">

                        <label>البريد الإلكتروني</label>

                        <input class="form-control" type="email" name="email" required>

                    </div>

                    <div class="form-group">

                        <label>رقم الهوية</label>

                        <input class="form-control" type="text" name="rakm_howiya" required>

                    </div>

                    <div class="form-group">

                        <label>المجال</label>

                        <select name="field" class="form-control form-control-solid form-control-lg">
                            <option value>أدخل إجابتك</option>
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

                        <select class="form-control" name="school" class="py-2">
                            <option value="">اختر اسم المدرسة</option>
                            @foreach ($schools as $school)
                            <option value="{{ $school }}">
                                {{ $school }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">

                        <label>الفصول</label>

                        <select class="js-example-basic-multiple form-control" name="classes[]" class="py-2" multiple=""
                            data-select2-id="select2-data-61-oh5p" tabindex="-1" aria-hidden="true">
                            @foreach ($years as $year)
                            <optgroup label="{{ $year->name }}">
                                @foreach (json_decode($year->classes) as $class)
                                <option value="{{ $year->id }}_{{ $class }}">{{ $year->number }}/{{ $class }}</option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">

                        <label>المجموعة</label>

                        <div class="d-flex flex-wrap">

                            @foreach ($roles as $role)

                            <label
                                class="bg-info rounded p-2 text-white mr-2 d-flex align-items-center justify-content-between">

                                {{ $role->name }}

                                <input class="ml-2" name="roles[]" type="checkbox" value="{{ $role->name }}">

                            </label>

                            @endforeach

                        </div>

                    </div>

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
