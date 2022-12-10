@extends('layouts.app')

@section('action')
    <a href="{{ route('ratings.create') }}" class="btn btn-primary">الطلاب</a>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="card p-4">
                        <div class="card-header">
                            <h4>رفع بيانات المعلمين</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.students') }}"
                            method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>ملف المعلمين بصيغة Excel</label>
                                    <input type="file" name="file" class="form-control" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                </div>
                                <button class="btn btn-success">
                                    رفع الملف
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4">
                        <div class="card-header">
                            <h4>رفع بيانات الطلاب</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.students') }}"
                            method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>ملف الطلاب بصيغة Excel</label>
                                    <input type="file" name="file" class="form-control" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                </div>
                                <button class="btn btn-primary">
                                    رفع الملف
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
