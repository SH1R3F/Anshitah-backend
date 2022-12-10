@extends('layouts.app')
    {{-- @section('action')
        <button data-toggle="modal" data-target="#create-folder" class="btn btn-info">مجلد جديد</button>
    @endsection --}}
    @section('content')
        <div class="card card-custom example example-compact gutter-b">
            <div class="card-header d-flex justify-content-center align-items-center">
                <ul class="nav nav-pills" id="myTabFoldersNav" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#private-folders">
                            <span class="nav-icon">
                                <i class="flaticon2-chat-1"></i>
                            </span>
                            <span class="nav-text">المواد الدراسية</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content mt-5" id="myTabFoldersContent">
                    <div class="tab-pane fade active show" id="private-folders" role="tabpanel" aria-labelledby="private-folders">
                        <!-- المواد الدراسية -->
                        <div class="row">
                            @include('livewire.student-folders')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('student-subjects.includes.shared-modals')
        @include('student-subjects.includes.private-modals')
    @endsection


