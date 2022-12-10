@extends('layouts.app')
@section('action')
    <a href="{{ route('weeks') }}" class="btn btn-success mr-2">الأسابيع</a>
    <a href="{{ route('week.create') }}" class="btn btn-primary">إنشاء أسبوع</a>
@endsection
@section('content')
    <div class="card px-5 py-2">
        <form action="{{ route('week.update',['id'=>$week->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label>
                    وصف الأسبوع
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="name" class="form-control" value="{{ $week->name }}" required>
            </div>
            <span>الأيام</span>
            <hr>
            @foreach ($days as $day)
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>
                                    وصف اليوم
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="names[]" class="form-control" required>
                                    @foreach ($names as $name)
                                        <option
                                            value="{{ $name }}"
                                            @if($name == $day->name) selected @endif
                                            >{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>
                                    تاريخ اليوم
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="text" name="dates[]" value="{{ $day->date }}" class="form-control hijri-date-default" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <button class="btn btn-primary btn-sm w-50">تعديل</button>
        </form>
    </div>
@endsection

