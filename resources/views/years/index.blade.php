@extends('layouts.app')

@section('styles')
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endsection

@can('إضافة صف')
    @section('action')
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#create-year">إضافة صف</button>
    @endsection
@endcan

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
                                <td>الصف</td>
                                <td>الفصول</td>
                                <td>العمليات</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($years as $year)
                            <tr>
                                <td>{{ $year->name }}</td>
                                <td>
                                    @foreach (json_decode($year->classes) as $class)
                                        {{ $year->number }}/{{ $class }}
                                        @if (!$loop->last)
                                        ,    
                                        @endif 
                                    @endforeach
                                </td>
                                <td class="d-flex">
                                    @can('تعديل صف')
                                        <button data-id="{{ $year->id }}" data-number="{{ $year->number }}" data-name="{{ $year->name }}" data-classes="{{ $year->classes }}" type="button" class="btn-update btn btn-info mr-2" data-toggle="modal" data-target="#update-year">
                                            تعديل
                                        </button>
                                    @endcan
                                    
                                    @can('حذف صف')
                                        <form action="{{ route('delete.year', [ 'id' => $year->id ]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                حذف
                                            </button>
                                        </form>
                                    @endcan
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

<!-- Update year Modal -->
<div class="modal fade" id="update-year" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل الصف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('update.year') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="text" name="id" id="year-id" class="form-control" hidden>

                    <div class="form-group">
                        <label>اسم الصف</label>
                        <input type="text" name="name" id="year-name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>رقم الصف</label>
                        <input type="number" name="number" id="year-number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>الفصول</label>
                        <input class="form-control" name="classes" required id="kt_tagify_1"/>
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

<!-- Create year Modal -->
<div class="modal fade" id="create-year" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة صف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('create.year') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>اسم الصف</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>رقم الصف</label>
                        <input type="number" name="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>الفصول</label>
                        <input class="form-control" name="classes" required id="kt_tagify_2"/>
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
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>

    <script>
        $(function(){
            new Tagify (document.querySelector('#kt_tagify_1'), {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value)
            });
            new Tagify (document.querySelector('#kt_tagify_2'), {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value)
            });
            $('.btn-update').click(function(){
                var id = $(this).data('id');
                var number = $(this).data('number');
                var name = $(this).data('name');
                var classes = $(this).data('classes');
                $('#year-id').val(id);
                $('#year-number').val(number);
                $('#year-name').val(name);
                $('#kt_tagify_1').val(classes);
            });
            
        });
    </script>

@endsection
