@extends('layouts.app')

@section('action')
    <a href="{{ route('reports.index') }}" class="btn btn-primary mr-2">التقارير</a>
@endsection

@section('content')
    <div class="card card-custom example example-compact gutter-b">
        <div class="card-header d-flex justify-content-center align-items-center">
            <ul class="nav nav-pills" id="myTabFoldersNav" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#a">
                        <span class="nav-icon">
                            <i class="flaticon2-chat-1"></i>
                        </span>
                        <span class="nav-text">صورة من النشاط بالمسميات والشعارات المعتمدة</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#b">
                        <span class="nav-icon">
                            <i class="flaticon2-layers-1"></i>
                        </span>
                        <span class="nav-text">صورة من بطاقة الدعوة</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#c">
                        <span class="nav-icon">
                            <i class="flaticon2-layers-1"></i>
                        </span>
                        <span class="nav-text">صورة معبرة من حفل الختام والتكريم</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#d">
                        <span class="nav-icon">
                            <i class="flaticon2-layers-1"></i>
                        </span>
                        <span class="nav-text">صوره معبره من النشر الإعلامي</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content mt-5" id="myTabFoldersContent">
                <div class="tab-pane fade active show" id="a" role="tabpanel" aria-labelledby="a">
                    <div class="row">
                        <button data-id="{{ $r->id }}" data-img="1" type="button" class="btn-create btn btn-info mr-2" data-toggle="modal" data-target="#create">
                            صورة جديدة
                        </button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>الصورة</td>
                                    <td>العمليات</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($r->img1) as $e)
                                <tr>
                                    <td>
                                        <a target="_blank" class="btn btn-success" href="{{ asset($e->file) }}">عرض ملف الاجراء</a>
                                    </td>
                                    <td class="d-flex">
                                        <button data-id="{{ $r->id }}" data-img="1" data-imgid="{{ $e->id }}" type="button" class="btn-update btn btn-info mr-2" data-toggle="modal"
                                            data-target="#update">
                                            تعديل
                                        </button>
                                        <form action="{{ route('reports.image.delete' , [
                                            'id'  => $r->id,
                                            'img' => 1,
                                            'imgid' => $e->id
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
                <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="b">
                    <div class="row">
                        <button data-id="{{ $r->id }}" data-img="2" type="button" class="btn-create btn btn-info mr-2" data-toggle="modal" data-target="#create">
                            صورة جديدة
                        </button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>الصورة</td>
                                    <td>العمليات</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($r->img2) as $e)
                                <tr>
                                    <td>
                                        <a target="_blank" class="btn btn-success" href="{{ asset($e->file) }}">عرض ملف الاجراء</a>
                                    </td>
                                    <td class="d-flex">
                                        <button data-id="{{ $r->id }}" data-img="2" data-imgid="{{ $e->id }}" type="button" class="btn-update btn btn-info mr-2" data-toggle="modal"
                                            data-target="#update">
                                            تعديل
                                        </button>
                                        <form action="{{ route('reports.image.delete' , [
                                            'id'  => $r->id,
                                            'img' => 2,
                                            'imgid' => $e->id
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
                <div class="tab-pane fade" id="c" role="tabpanel" aria-labelledby="c">
                    <!-- Private Folders -->
                    <div class="row">
                        <button data-id="{{ $r->id }}" data-img="3" type="button" class="btn-create btn btn-info mr-2" data-toggle="modal" data-target="#create">
                            صورة جديدة
                        </button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>الصورة</td>
                                    <td>العمليات</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($r->img3) as $e)
                                <tr>
                                    <td>
                                        <a target="_blank" class="btn btn-success" href="{{ asset($e->file) }}">عرض ملف الاجراء</a>
                                    </td>
                                    <td class="d-flex">
                                        <button data-id="{{ $r->id }}" data-img="3" data-imgid="{{ $e->id }}" type="button" class="btn-update btn btn-info mr-2" data-toggle="modal"
                                            data-target="#update">
                                            تعديل
                                        </button>
                                        <form action="{{ route('reports.image.delete' , [
                                            'id'  => $r->id,
                                            'img' => 3,
                                            'imgid' => $e->id
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
                <div class="tab-pane fade" id="d" role="tabpanel" aria-labelledby="d">
                    <div class="row">
                        <button data-id="{{ $r->id }}" data-img="4" type="button" class="btn-create btn btn-info mr-2" data-toggle="modal" data-target="#create">
                            صورة جديدة
                        </button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>الصورة</td>
                                    <td>العمليات</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($r->img4) as $e)
                                <tr>
                                    <td>
                                        <a target="_blank" class="btn btn-success" href="{{ asset($e->file) }}">عرض ملف الاجراء</a>
                                    </td>
                                    <td class="d-flex">
                                        <button data-id="{{ $r->id }}" data-img="4" data-imgid="{{ $e->id }}" type="button" class="btn-update btn btn-info mr-2" data-toggle="modal"
                                            data-target="#update">
                                            تعديل
                                        </button>
                                        <form action="{{ route('reports.image.delete' , [
                                            'id'  => $r->id,
                                            'img' => 4,
                                            'imgid' => $e->id
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
        </div>
    </div>
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">انشاء صورة تقرير</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form id="form-create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
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
    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعديل صورة تقرير</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form id="form-update" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
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
@endsection

@section('scripts')

    <script>
        $(function(){
            $('.btn-update').click(function(){
                var id = $(this).data('id');
                var img = $(this).data('img');
                var imgid = $(this).data('imgid');
                $('#form-update').attr('action' , `/reports/update/img/${id}/${img}/${imgid}`)
            });
            $('.btn-create').click(function(){
                var id = $(this).data('id');
                var img = $(this).data('img');
                var imgid = $(this).data('imgid');
                $('#form-create').attr('action' , `/reports/create/img/${id}/${img}`)
            });
        });
    </script>

@endsection
