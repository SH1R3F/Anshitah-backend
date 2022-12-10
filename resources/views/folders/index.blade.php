@extends('layouts.app')
@section('action')
    <button data-toggle="modal"
    data-target="#create-folder" class="btn btn-info">مجلد جديد</button>
@endsection
@section('content')
<div class="card card-custom example example-compact gutter-b">
    <div class="card-header d-flex justify-content-center align-items-center">
        <ul class="nav nav-pills" id="myTabFoldersNav" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#public-folders">
                    <span class="nav-icon">
                        <i class="flaticon2-chat-1"></i>
                    </span>
                    <span class="nav-text">المجلدات العامة</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#private-folders">
                    <span class="nav-icon">
                        <i class="flaticon2-layers-1"></i>
                    </span>
                    <span class="nav-text">المجلدات الخاصة</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content mt-5" id="myTabFoldersContent">
            <div class="tab-pane fade active show" id="public-folders" role="tabpanel" aria-labelledby="public-folders">
                <!-- Shared Folders -->
                <div class="row">
                    <livewire:shared-folders />
                </div>
            </div>
            <div class="tab-pane fade" id="private-folders" role="tabpanel" aria-labelledby="private-folders">
                <!-- Private Folders -->
                <div class="row">
                    <livewire:private-folders />
                </div>
            </div>
        </div>
    </div>
</div>

@include('folders.includes.shared-modals')
@include('folders.includes.private-modals')
@include('folders.includes.transfer-files-modal')
@endsection


