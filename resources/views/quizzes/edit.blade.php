@extends('layouts.app')

@section('action')
<a href="{{ route('quizzes') }}" class="btn btn-primary">الإختبارات</a>
@endsection

@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="w-50 mx-auto" action="{{ route('quizzes.update' , ['id' => $quiz->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">إسم الإختبار</label>
                            <input class="form-control" type="text" name="name" value="{{ $quiz->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="level_id" class="form-label">المستوى</label>
                            <select name="level_id" class="form-control" required>
                                @foreach ($levels as $l)
                                <option @if($quiz->level->id == $l->id) selected @endif value="{{ $l->id }}">{{ $l->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date_start" class="form-label">
                                تاريخ بداية الإختبار</label>
                            <input class="form-control" type="datetime-local" name="date_start"
                                value="{{ $quiz->date_start->format('Y-m-d\TH:i:s') }}">
                        </div>
                        <div class="form-group">
                            <label for="date_end" class="form-label">
                                تاريخ نهاية الإختبار</label>
                            <input class="form-control" type="datetime-local" name="date_end"
                                value="{{ $quiz->date_end->format('Y-m-d\TH:i:s') }}">
                        </div>
                        <div class="form-group">
                            <label for="duration" class="form-label">
                                مدة الإختبار</label>
                            <input class="form-control" type="number" name="duration" value="{{ $quiz->duration }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>حالة الإختبار</label>
                            <div class="radio-inline">
                                <label class="radio radio-square">
                                <input type="radio" name="status" value="1" @if($quiz->status) checked="checked" @endif>
                                <span></span>ظاهر</label>
                                <label class="radio radio-square">
                                <input type="radio" name="status" value="0" @if(!$quiz->status) checked="checked" @endif>
                                <span></span>مخفي</label>
                            </div>
                            <span class="form-text text-muted">إظهار أو إخفاء الاختبار</span>
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
