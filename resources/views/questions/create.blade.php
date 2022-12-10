@extends('layouts.app')

@section('action')
<a href="{{ route('quizzes') }}" class="btn btn-primary mr-2">الإختبارات</a>
<a href="#" class="btn btn-success font-weight-bolder font-size-sm" aria-haspopup="true" aria-expanded="false"
    data-toggle="modal" data-target="#excelQuestions">
    رفع بيانات الأسئلة
</a>
@endsection

@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-12">
                <div class="card p-2 px-4">
                    <form class="w-100 mx-auto" action="{{ route('question.store' , [
                            'id' => $quiz->id
                        ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="kt_repeater">
                            <div data-repeater-list="questions">
                                @forelse ($quiz->questions as $q)
                                <div data-repeater-item="question" class="row bg-secondary mb-3 p-2 mx-3">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="form-label">السؤال</label>
                                            <input class="form-control" type="text" name="name" value="{{ $q->name }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="mark" class="form-label">درجة السؤال</label>
                                            <input class="form-control" type="number" name="mark" value="{{ $q->mark }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label">الملف</label>
                                            <input class="form-control" type="file" name="file">
                                            @if($q->file)
                                            <audio controls>
                                                <source src="{{ asset($q->file) }}" type="audio/wav">
                                                <source src="{{ asset($q->file) }}" type="audio/mp3">
                                                Your browser does not support the audio element.
                                            </audio>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="answer" class="form-label">الإجابة الصحيحة</label>
                                            <input class="form-control" type="text" value="{{ $q->answer }}"
                                                name="answer" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="answer1" class="form-label">الإجابة الخاطئة 1</label>
                                            <input class="form-control" type="text" value="{{ $q->answers[1]->name }}"
                                                name="answer1" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="answer2" class="form-label">الإجابة الخاطئة 2</label>
                                            <input class="form-control" type="text" value="{{ $q->answers[2]->name }}"
                                                name="answer2" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="answer3" class="form-label">الإجابة الخاطئة 3</label>
                                            <input class="form-control" type="text" value="{{ $q->answers[3]->name }}"
                                                name="answer3" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            @php
                                                $list = [
                                                    'الاستدلال اللغوى وفهم المقروء',
                                                    'الاستدلال الرياضي والمكاني',
                                                    'الاستدلال العلمي والميكانيكي',
                                                    'المرونة العقليه'
                                                ]
                                            @endphp
                                            <label for="topic" class="form-label">المجال</label>
                                            <select class="form-control" name="topic" required>
                                                @foreach ($list as $l)
                                                <option value="{{ $l }}" @if(trim($l) == trim($q->topic)) selected @endif>
                                                    {{ $l }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="javascript:;" data-repeater-create=""
                                            class="btn btn-sm font-weight-bolder btn-light-primary">
                                            <i class="la la-plus"></i>إضافة سطر</a>
                                        <a href="javascript:;" data-repeater-delete=""
                                            class="btn btn-sm font-weight-bolder btn-light-danger">
                                            <i class="la la-trash-o"></i>حذف السطر</a>
                                    </div>
                                </div>
                                @empty
                                <div data-repeater-item="question" class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="form-label">السؤال</label>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="mark" class="form-label">درجة السؤال</label>
                                            <input class="form-control" type="number" name="mark"
                                                value="{{ old('mark') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="file" class="form-label">الملف</label>
                                            <input class="form-control" type="file" name="file">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="answer" class="form-label">الإجابة الصحيحة</label>
                                            <input class="form-control" type="text" name="answer" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="answer1" class="form-label">الإجابة الخاطئة 1</label>
                                            <input class="form-control" type="text" name="answer1" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="answer2" class="form-label">الإجابة الخاطئة 2</label>
                                            <input class="form-control" type="text" name="answer2" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="answer3" class="form-label">الإجابة الخاطئة 3</label>
                                            <input class="form-control" type="text" name="answer3" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="topic" class="form-label">المجال</label>
                                            <select class="form-control" name="topic" required>
                                                <option value="الاستدلال اللغوى وفهم المقروء">
                                                    الاستدلال اللغوى وفهم المقروء
                                                </option>
                                                <option value="الاستدلال الرياضي والمكاني">
                                                    الاستدلال الرياضي والمكاني
                                                </option>
                                                <option value="الاستدلال العلمي والميكانيكي">
                                                    الاستدلال العلمي والميكانيكي
                                                </option>
                                                <option value="المرونة العقليه">
                                                    المرونة العقليه
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="javascript:;" data-repeater-create=""
                                            class="btn btn-sm font-weight-bolder btn-light-primary">
                                            <i class="la la-plus"></i>إضافة سطر</a>
                                        <a href="javascript:;" data-repeater-delete=""
                                            class="btn btn-sm font-weight-bolder btn-light-danger">
                                            <i class="la la-trash-o"></i>حذف السطر</a>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <button class="btn btn-primary">إنشاء</button>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
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
                        data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Class definition
    var KTFormRepeater = function() {

    // Private functions
    var demo3 = function() {
        $('#kt_repeater').repeater({
            initEmpty: false,

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
    }

    return {
        // public functions
        init: function() {
            demo3();
        }
    };
    }();

    jQuery(document).ready(function() {
    KTFormRepeater.init();
    });
</script>
@endsection
