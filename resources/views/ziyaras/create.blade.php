@extends('layouts.app')
@section('action')
    <a href="{{ route('ziyaras') }}" class="btn btn-primary">الزيارات</a>
@endsection
@section('content')
    <div class="card px-5 py-2">
        <form action="{{ route('ziyara.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label>
                    الفترة من
                    <span class="text-danger">*</span>
                </label>
                <input type="date" name="date"  class="form-control" value="{{ old('date') }}" required>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>
                                 الأحد
                                <span class="text-danger">*</span>
                            </label>
                            <select name="q1" class="form-control" required>
                                @foreach ($schools as $school)
                                    <option value="{{ $school }}">{{ $school }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>
                                 الإثنين
                                <span class="text-danger">*</span>
                            </label>
                            <select name="q2" class="form-control" required>
                                @foreach ($schools as $school)
                                    <option value="{{ $school }}">{{ $school }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>
                                 الثلاثاء
                                <span class="text-danger">*</span>
                            </label>
                            <select name="q3" class="form-control" required>
                                @foreach ($schools as $school)
                                    <option value="{{ $school }}">{{ $school }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>
                                 الأربعاء
                                <span class="text-danger">*</span>
                            </label>
                            <select name="q4" class="form-control" required>
                                @foreach ($schools as $school)
                                    <option value="{{ $school }}">{{ $school }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>
                                 الخميس
                                <span class="text-danger">*</span>
                            </label>
                            <select name="q5" class="form-control" required>
                                @foreach ($schools as $school)
                                    <option value="{{ $school }}">{{ $school }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-sm w-50">إنشاء</button>
        </form>
    </div>
@endsection


