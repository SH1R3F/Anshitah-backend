@extends('layouts.app')

@section('action')
    <a href="{{ url()->previous() }}" class="btn btn-primary">الزيارات</a>
@endsection

@section('content')
<div class="card card-custom">
    <!--begin::Header-->
    <div class="card-header h-auto py-4">
        <div class="card-title">
            <h3 class="card-label">{{ $title }}
            <span class="d-block text-muted pt-2 font-size-sm">
                التاريخ  : {{ $rating->date  }}
            </span></h3>
        </div>
        {{-- <div class="card-toolbar">
            <a href="#" class="btn btn-default btn-sm font-weight-bold" data-toggle="dropdown">
            <i class="flaticon2-gear"></i>Export</a>
            <div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-md">
                <!--begin::Navigation-->
                <ul class="navi navi-hover py-5">
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-drop"></i>
                            </span>
                            <span class="navi-text">New Group</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-list-3"></i>
                            </span>
                            <span class="navi-text">Contacts</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-rocket-1"></i>
                            </span>
                            <span class="navi-text">Groups</span>
                            <span class="navi-link-badge">
                                <span class="label label-light-primary label-inline font-weight-bold">new</span>
                            </span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-bell-2"></i>
                            </span>
                            <span class="navi-text">Calls</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-gear"></i>
                            </span>
                            <span class="navi-text">Settings</span>
                        </a>
                    </li>
                    <li class="navi-separator my-3"></li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-magnifier-tool"></i>
                            </span>
                            <span class="navi-text">Help</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="flaticon2-bell-2"></i>
                            </span>
                            <span class="navi-text">Privacy</span>
                            <span class="navi-link-badge">
                                <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                            </span>
                        </a>
                    </li>
                </ul>
                <!--end::Navigation-->
            </div>
        </div> --}}
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-4">
        <h4>البيانات الأساسية :</h4>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">إسم المعلم :</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{ $rating->teacher }}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">التخصص:</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{ $rating->takhasos }}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">مادة التدريس :</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{ $rating->madat_tadriss }}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">الحصة :</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{ $rating->seance_title }}</span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">عنوان الدرس :</label>
            <div class="col-8">
                <span class="form-control-plaintext font-weight-bolder">{{ $rating->course_title }}</span>
            </div>
        </div>
        <hr>
        <h4 class="mb-2 font-weight-bold text-dark">التخطيط للتدريس :</h4>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">عرض أهداف الدرس :</label>
            <div class="col-8">
                <span class="form-control-plaintext">
                {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                <span class="label label-inline label-primary label-bold">{{ $rating->q1 }}</span></span>
            </div>
        </div>
        <hr>
        <h4 class="mb-2 font-weight-bold text-dark"> إجراءات الدرس :</h4>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">مناسبة اجراءات الدرس :</label>
            <div class="col-8">
                <span class="form-control-plaintext">
                {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                <span class="label label-inline label-primary label-bold">{{ $rating->q2 }}</span></span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">فعالية الوسيلة التعليمية :</label>
            <div class="col-8">
                <span class="form-control-plaintext">
                {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                <span class="label label-inline label-primary label-bold">{{ $rating->q3 }}</span></span>
            </div>
        </div>
        <hr>
        <h4 class="mb-2 font-weight-bold text-dark"> ادارة الصف :</h4>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">إدارة وقت التعلم :</label>
            <div class="col-8">
                <span class="form-control-plaintext">
                {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                <span class="label label-inline label-primary label-bold">{{ $rating->q4 }}</span></span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">ضبط الصف :</label>
            <div class="col-8">
                <span class="form-control-plaintext">
                {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                <span class="label label-inline label-primary label-bold">{{ $rating->q5 }}</span></span>
            </div>
        </div>
        <h4 class="mb-2 font-weight-bold text-dark"> التقويم :</h4>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">تفعيل أدوات التقويم :</label>
            <div class="col-8">
                <span class="form-control-plaintext">
                {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                <span class="label label-inline label-primary label-bold">{{ $rating->q6 }}</span></span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">تفعيل مراحل التقويم :</label>
            <div class="col-8">
                <span class="form-control-plaintext">
                {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                <span class="label label-inline label-primary label-bold">{{ $rating->q7 }}</span></span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">النواحي الإيجابية :</label>
            <div class="col-8">
                <span class="form-control-plaintext">
                {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                <span class="label label-inline label-primary label-bold">{{ $rating->q8 }}</span></span>
            </div>
        </div>
        <div class="form-group row my-2">
            <label class="col-4 col-form-label">فرص التحسين :</label>
            <div class="col-8">
                <span class="form-control-plaintext">
                {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                <span class="label label-inline label-primary label-bold">{{ $rating->q9 }}</span></span>
            </div>
        </div>
    </div>
</div>

@endsection
