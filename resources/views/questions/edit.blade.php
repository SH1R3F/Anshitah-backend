@extends('layouts.app')

@section('action')
<a href="{{ route('quizzes') }}" class="btn btn-primary mr-2">الإختبارات</a>
@endsection

@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-12">
                <div class="card p-2 px-4">
                    <form class="w-100 mx-auto" action="{{ route('question.update' , [
                            'id' => $q->id
                        ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">السؤال</label>
                                    <input class="form-control" type="text" name="name"
                                        value="{{ $q->name }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mark" class="form-label">درجة السؤال</label>
                                    <input class="form-control" type="number" name="mark"
                                        value="{{ $q->mark }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="audio" class="form-label">الملف الصوتي</label>
                                    <input class="form-control" type="file" name="audio">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image" class="form-label">
                                        صورة السؤال
                                    </label>
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>


                            <div class="col-6">
                                <div class="form-group">
                                    <label for="answer" class="form-label">الإجابة الصحيحة</label>
                                    <input class="form-control" type="text" name="answer" value="{{ $q->answers[0]->name }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image1" class="form-label">
                                        صورة الإجابة الصحيحة
                                    </label>
                                    <input class="form-control" type="file" name="image1">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="answer1" class="form-label">الإجابة الخاطئة 1</label>
                                    <input class="form-control" type="text" name="answer1" value="{{ $q->answers[1]->name }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image2" class="form-label">
                                        صورة الإجابة الخاطئة 1
                                    </label>
                                    <input class="form-control" type="file" name="image2">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="answer2" class="form-label">الإجابة الخاطئة 2</label>
                                    <input class="form-control" type="text" name="answer2" value="{{ $q->answers[2]->name }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image3" class="form-label">
                                        صورة الإجابة الخاطئة 2
                                    </label>
                                    <input class="form-control" type="file" name="image3">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="answer3" class="form-label">الإجابة الخاطئة 3</label>
                                    <input class="form-control" type="text" name="answer3" value="{{ $q->answers[3]->name }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image4" class="form-label">
                                        صورة الإجابة الخاطئة 3
                                    </label>
                                    <input class="form-control" type="file" name="image4">
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="form-group">
                                    <label for="step_id" class="form-label">المجال</label>
                                    <select class="form-control" name="step_id" required>
                                        @foreach ($q->step->quiz->steps as $step)
                                            <option value="{{ $step->id }}" @if($q->step_id == $step->id) selected @endif>
                                                {{ $step->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">تعديل</button>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>

@endsection


