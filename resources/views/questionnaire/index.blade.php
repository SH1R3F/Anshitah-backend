@extends('layouts.app')

@can('إضافة إستبيان')
    @section('action')
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#create-questionnaire">إضافة إستبيان</button>
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
                                <td>الإستبيان</td>
                                <td>الملف</td>
                                <td>الرابط</td>
                                <td>العمليات</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questionnaires as $questionnaire)
                            <tr>
                                <td>{{ $questionnaire->name }}</td>
                                <td>
                                    @if($questionnaire->file == '')
                                    <a target="_blank" class="btn btn-success disabled" href="{{ asset($questionnaire->file) }}">عرض الإستبيان</a>
                                    @else
                                    <a target="_blank" class="btn btn-success" href="{{ asset($questionnaire->file) }}">عرض الإستبيان</a>
                                    @endif
                                </td>
                                <td>
                                    <a target="_blank" class="btn btn-info @if($questionnaire->path == null) disabled @endif " href="{{ $questionnaire->path }}">عرض الرابط</a>
                                </td>
                                <td class="d-flex">
                                    @can('تعديل إستبيان')
                                        <button data-id="{{ $questionnaire->id }}" data-name="{{ $questionnaire->name }}" data-path="{{ $questionnaire->path }}" type="button" class="btn-update btn btn-info mr-2" data-toggle="modal" data-target="#update-questionnaire">
                                            تعديل
                                        </button>
                                    @endcan

                                    @can('حذف إستبيان')
                                        <form action="{{ route('delete.questionnaires', [ 'id' => $questionnaire->id ]) }}" method="post">
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

<!-- Update questionnaire Modal -->
<div class="modal fade" id="update-questionnaire" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل الإستبيان</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('update.questionnaires') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input id="questionnaire-id" type="text" name="id" class="form-control" hidden>
                    <div class="form-group">
                        <label>الإستبيان</label>
                        <input id="questionnaire-name" type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>الرابط</label>
                        <input id="questionnaire-path" type="string" name="path" class="form-control">
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
<div class="modal fade" id="create-questionnaire" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة إستبيان</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('create.questionnaires') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>الإستبيان</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>الرابط</label>
                        <input type="text" name="path" class="form-control">
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
                var id   = $(this).data('id');
                var name = $(this).data('name');
                var path = $(this).data('path');
                $('#questionnaire-id').val(id);
                $('#questionnaire-name').val(name);
                $('#questionnaire-path').val(path);
            });
        });
    </script>

@endsection
