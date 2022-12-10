@extends('layouts.app')

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
                                <td>المادة</td>
                                <td>الملف</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content as $subject)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                <td>
                                    <a target="_blank" class="btn btn-success" href="{{ $subject->file }}">عرض المادة</a>
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

@endsection

