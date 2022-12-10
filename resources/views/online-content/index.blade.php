@extends('layouts.app')

@can('إضافة مادة')
    @section('action')
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#create-onlinecontent">إضافة مادة</button>
    @endsection
@endcan

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
                                <td>المادة</td>
                                <td>الملف</td>
                                <td>العمليات</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content as $subject)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                <td>
                                    <a target="_blank" class="btn btn-success" href="{{ asset($subject->file) }}">عرض المادة</a>
                                </td>
                                <td class="d-flex">
                                    @can('تعديل مادة')
                                        <button data-id="{{ $subject->id }}" data-name="{{ $subject->name }}" type="button" class="btn-update btn btn-info mr-2" data-toggle="modal" data-target="#update-onlinecontent">
                                            تعديل
                                        </button>
                                    @endcan

                                    @can('حذف مادة')
                                        <form action="{{ route('delete.onlinecontent', [ 'id' => $subject->id ]) }}" method="post">
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

<!-- Update onlinecontent Modal -->
<div class="modal fade" id="update-onlinecontent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل المادة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('update.onlinecontent') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input id="content-id" type="text" name="id" class="form-control" hidden>
                    <div class="form-group">
                        <label>المادة</label>
                        <input id="content-name" type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>الملف</label>
                        <input type="file" name="file" class="form-control">
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
<div class="modal fade" id="create-onlinecontent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة مادة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('create.onlinecontent') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>المادة</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>الملف</label>
                        <input type="file" name="file" class="form-control" accept="application/pdf,application/msword,
                        application/vnd.openxmlformats-officedocument.wordprocessingml.document">
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
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#content-id').val(id);
                $('#content-name').val(name);
            });
        });
    </script>

@endsection
