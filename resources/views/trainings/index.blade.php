@extends('layouts.app')

@can('إضافة خطة تدريب')
    @section('action')
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#create-trainingplan">إضافة خطة تدريب</button>
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
                                <td>الخطة</td>
                                <td>الملف</td>
                                <td>العمليات</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainings as $plan)
                            <tr>
                                <td>{{ $plan->name }}</td>
                                <td>
                                    <a target="_blank" class="btn btn-success" href="{{ asset($plan->file) }}">عرض خطة التدريب</a>
                                </td>
                                <td class="d-flex">
                                    @can('تعديل خطة تدريب')
                                        <button data-id="{{ $plan->id }}" data-name="{{ $plan->name }}" type="button" class="btn-update btn btn-info mr-2" data-toggle="modal" data-target="#update-trainingplan">
                                            تعديل
                                        </button>
                                    @endcan

                                    @can('حذف خطة تدريب')
                                        <form action="{{ route('delete.trainingplan', [ 'id' => $plan->id ]) }}" method="post">
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
            <form action="{{ route('update.trainingplan') }}" method="post" enctype="multipart/form-data">
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
                <h5 class="modal-title">إضافة خطة تدريب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('create.trainingplan') }}" method="post" enctype="multipart/form-data">
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
                $('#training-id').val(id);
                $('#training-name').val(name);
            });
        });
    </script>

@endsection
