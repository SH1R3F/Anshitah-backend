@extends('layouts.app')

@section('action')
    <a href="{{ route('quizzes') }}" class="btn btn-info mr-2">الإختبارات</a>
    <a href="{{ route('question.create' , ['id' => $quiz->id]) }}" class="btn btn-primary mr-2">إنشاء سؤال</a>
    <a href="#" class="btn btn-success font-weight-bolder font-size-sm" aria-haspopup="true" aria-expanded="false"
        data-toggle="modal" data-target="#excelQuestions">
        رفع بيانات الأسئلة
    </a>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th>السؤال</th>
                            <th>الإجابة الصحيحة</th>
                            <th>الإجابة الخاطئة 1</th>
                            <th>الإجابة الخاطئة 2</th>
                            <th>الإجابة الخاطئة 3</th>
                            <th>المجال</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($steps as $s)
                            @foreach ($s->questions as $q)
                            <tr>
                                <td>
                                    {{ $q->name }}
                                    <div class="d-flex">
                                        @if($q->audio)
                                        <a target="_blank" href="{{ url("/public/$q->audio") }}" class="btn btn-info mr-2">المقطع الصوتي</a>
                                        @endif
                                        @if($q->image)
                                        <a target="_blank" href="{{ url("/public/$q->image") }}" class="btn btn-success">الصورة</a>
                                        @endif
                                    </div>
                                </td>
                                @foreach($q->answers as $a)
                                <td>
                                    {{ $a->name }}
                                    <div>
                                        @if($a->image)
                                        <a target="_blank" href="{{ url("/public/$a->image") }}" class="btn btn-white">عرض الصورة</a>
                                        @endif
                                    </div>
                                </td>
                                @endforeach
                                <td>{{ $s->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('question.edit' , ['id' => $q->id]) }}" class="btn btn-success mr-2">تعديل</a>
                                    <form action="{{ route('question.delete' , ['id' => $q->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                {{ $steps->links() }}
            </div>
        </div>
    </div>
    <div class="modal fade" id="excelQuestions" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">رفع بيانات الأسئلة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{ route('import.questions' , ['id' => $quiz->id]) }}" method="post" class="form pt-9"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 text-right col-form-label">ملف الأسئلة</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" type="file"
                                        name="file" />
                                </div>
                            </div>
                            {{--
                        </form> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">غلق النافذة</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">رفع الملف</button>
                </div>
                </form>
            </div>
        </div>
</div>
@endsection


