@extends('layouts.app')

@section('action')
<a href="{{ route('plans.create') }}" class="btn btn-primary mr-2">إنشاء خطة</a>
<a href="{{ route('plans') }}" class="btn btn-info mr-2">الخطط</a>
    <button type="button" class="btn-update btn btn-warning" data-toggle="modal"
        data-target="#create-ijraa">اجراء جديد</button>
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
                                <td>الاجراء</td>
                                <td>الملف</td>
                                <td>العمليات</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ijraat as $r)
                            <tr>
                                <td>{{ $r->name }}</td>
                                <td>
                                    <a target="_blank" class="btn btn-success" href="{{ $r->file }}">عرض ملف الاجراء</a>
                                </td>
                                <td class="d-flex">
                                    <button data-id="{{ $r->id }}" data-name="{{ $r->name }}" type="button" class="btn-update btn btn-info mr-2" data-toggle="modal"
                                        data-target="#update-ijraa">
                                        تعديل
                                    </button>
                                    <form action="{{ route('delete.ijraa' , [
                                        'plan' => $plan->id,
                                        'id' => $r->id
                                    ]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            حذف
                                        </button>
                                    </form>
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

<!-- Update Ijraa Modal -->
<div class="modal fade" id="update-ijraa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل اجراء</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('update.ijraa') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="plan" value="{{ $plan->id }}" hidden>
                    </div>
                    <div class="form-group">
                        <input id="ijraa-id" type="text" name="id" hidden>
                    </div>
                    <div class="form-group">
                        <label>الاجراء</label>
                        <input id="ijraa-name" type="text" name="name" class="form-control" required>
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

<!-- Create Ijraa Modal -->
<div class="modal fade" id="create-ijraa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">اجراء جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('create.ijraa') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="plan" value="{{ $plan->id }}" hidden>
                    </div>
                    <div class="form-group">
                        <label>الاجراء</label>
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
                $('#ijraa-id').val(id);
                $('#ijraa-name').val(name);
            });
        });
    </script>

@endsection
