@extends('layouts.student')

@section('content')
    <div class="alert alert-danger">انتهى وقت الإختبار</div>
@endsection

@section('action')
    <a href="/quiz" class="btn btn-success mr-2">الرئيسية</a>
    <a href="{{ route('student.info') }}" class="btn btn-info">معلوماتي الشخصية</a>
@endsection
