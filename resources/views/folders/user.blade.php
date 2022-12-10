@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="row">
        @if($folders->count())
        <div class="col-md-12">
            <div class="row">
                @foreach ($folders as $folder)
                    <livewire:private-folder :folder="$folder" />
                @endforeach
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-custom example example-compact gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">ملفاتي</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div id="folders-files-table" class="row">
                        <div class="badge badge-warning text-center text-white w-100">
                            قم بإختيار مجلد لظهور الملفات
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-warning w-100">
            المعلم ليس لدية أي مجلدات
        </div>
        @endif
    </div>
</div>


@endsection
