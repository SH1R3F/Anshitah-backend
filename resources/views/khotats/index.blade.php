@extends('layouts.app')

@section('action')
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#create-trainingplan">إضافة خطة</button>
@endsection

@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>الخطة</td>
                                <td>الملف</td>
                                <td>المدارس</td>
                                <td>العمليات</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($khotats as $khota)
                            <tr>
                                <td>{{ $khota->name }}</td>
                                <td>
                                    <a target="_blank" class="btn btn-success" href="{{ asset($khota->file) }}">عرض
                                        خطة</a>
                                </td>
                                <td>

                                    @foreach (json_decode($khota->schools) as $school)
                                    {{ $school }} -
                                    @endforeach
                                </td>
                                <td class="d-flex">
                                    {{-- @can('تعديل خطة تدريب') --}}
                                    <button data-id="{{ $khota->id }}" data-name="{{ $khota->name }}"
                                        data-schools="{{ $khota->schools }}" type="button"
                                        class="btn-update btn btn-info mr-2" data-toggle="modal"
                                        data-target="#update-trainingplan">
                                        تعديل
                                    </button>
                                    {{-- @endcan --}}

                                    {{-- @can('حذف خطة تدريب') --}}
                                    <form action="{{ route('delete.khotats', [ 'id' => $khota->id ]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            حذف
                                        </button>
                                    </form>
                                    {{-- @endcan --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>

<!-- Update trainingplan Modal -->
<div class="modal fade" id="update-trainingplan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل الخطة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('update.khotats') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input id="training-id" type="text" name="id" class="form-control" hidden>
                <div class="modal-body">
                    <div class="form-group">
                        <label>الخطة</label>
                        <input id="training-name" type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>الملف</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>المدارس</label>
                        <br>
                        <button type="button" id="btn-all" class="btn btn-info">الكل</button>
                        <br>
                        <div id="training-schools">

                        </div>
                        {{-- <div class="d-flex flex-wrap">
                            @foreach ($schools as $school)
                            <span class="badge badge-danger mb-2 mr-2">
                                <label
                                    class="bg-danger rounded p-1 text-white mr-2 d-flex align-items-center justify-content-between">
                                    {{ $school }}
                                    <input class="ck-user" name="schools[]" type="checkbox" value="{{ $school }}">
                                </label>
                            </span>
                            @endforeach
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">حفظ المعلومات</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Create training plan Modal -->
<div class="modal fade" id="create-trainingplan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة خطة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('create.khotats') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>الخطة</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>الملف</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>المدارس</label>
                        <br>
                        <button type="button" id="btn-all" class="btn btn-info">الكل</button>
                        <br>
                        <div class="d-flex flex-wrap">
                            @foreach ($schools as $school)
                            <span class="badge badge-danger mb-2 mr-2">
                                <label
                                    class="bg-danger rounded p-1 text-white mr-2 d-flex align-items-center justify-content-between">
                                    {{ $school }}
                                    <input class="ck-user" name="schools[]" type="checkbox" value="{{ $school }}">
                                </label>
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">حفظ المعلومات</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $(function(){
            $('.btn-update').click(function(){
                var id      = $(this).data('id');
                var name    = $(this).data('name');
                var data = [
                    'ابتدائية الأندلس',
                    'ابتدائية الإمام عاصم لتحفيظ القرآن',
                    'ابتدائية الجزيرة',
                    'ابتدائية الحويلات',
                    'ابتدائية الدانة',
                    'ابتدائية الدفي',
                    'ابتدائية الرياض',
                    'ابتدائية الفناتير',
                    'ابتدائية الفيحاء',
                    'ابتدائية المرجان',
                    'ابتدائية المطرفية',
                    'ابتدائية الواحة',
                    'ابتدائية جلمودة',
                    'ابتدائية حراء',
                    'ابتدائية نجد',
                    'ابتدائية هجر',
                    'ثانوية أم القرى - مقررات',
                    'ثانوية الأحساء - مقررات',
                    'ثانوية الدفي - مقررات',
                    'ثانوية الرواد',
                    'ثانوية العلا',
                    'ثانوية نجد - مقررات',
                    'متوسطة أم القرى',
                    'متوسطة الإمام عاصم لتحفيظ القرآن الكريم',
                    'متوسطة الخليج',
                    'متوسطة الصديق',
                    'متوسطة الفاروق',
                    'متوسطة المروج',
                    'متوسطة نجد'
                ];
                var html = '';
                var schools = $(this).data('schools');
                for(i = 0; i < data.length ; i++){
                    if(schools.includes(data[i])){
                        html += `<span class="badge badge-info mb-2 mr-2">
                                <label
                                    class="bg-info rounded p-1 text-white mr-2 d-flex align-items-center justify-content-between">
                                    ${data[i]}
                                    <input class="ck-user" name="schools[]" type="checkbox" value="${data[i]}" checked>
                                </label>
                            </span>`;
                    }else{
                        html += `<span class="badge badge-danger mb-2 mr-2">
                                <label
                                    class="bg-danger rounded p-1 text-white mr-2 d-flex align-items-center justify-content-between">
                                    ${data[i]}
                                    <input class="ck-user" name="schools[]" type="checkbox" value="${data[i]}">
                                </label>
                            </span>`;
                    }
                }
                // console.dir(schools);
                    $('#training-id').val(id);
                    $('#training-name').val(name);
                    $('#training-schools').html(html);
                });

            $('#btn-all').click(function(){
                if($('.ck-user').is(':checked')){
                    $( ".ck-user" ).prop("checked", false );
                    $(this).html('الكل');
                }else{
                    $( ".ck-user" ).prop("checked", true );
                    $(this).html('الغاء الكل');
                }
            });
        });
</script>

@endsection
