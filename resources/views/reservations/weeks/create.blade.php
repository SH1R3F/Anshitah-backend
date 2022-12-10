@extends('layouts.app')
@section('action')
    <a href="{{ route('weeks') }}" class="btn btn-primary">الأسابيع</a>
@endsection
@section('content')
    <div class="card px-5 py-2">
        <form action="{{ route('week.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label>
                    وصف الأسبوع
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <span>الأيام</span>
            <hr>
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
                                        @if($name == 'الأحد') selected @endif
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
                                <input type="text" name="dates[]" class="form-control hijri-date-default" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        @if($name == 'الإثنين') selected @endif
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
                                <input type="text" name="dates[]" class="form-control hijri-date-default" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        @if($name == 'الثلاثاء') selected @endif
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
                                <input type="text" name="dates[]" class="form-control hijri-date-default" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        @if($name == 'الأربعاء') selected @endif
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
                                <input type="text" name="dates[]" class="form-control hijri-date-default" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        @if($name == 'الخميس') selected @endif
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
                                <input type="text" name="dates[]" class="form-control hijri-date-default" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-sm w-50">إنشاء</button>
        </form>
    </div>
@endsection


