@extends('layouts.student')

@section('content')
<div class="row">
    <div class="col-md-6">
        <!--begin::Base Table Widget 10-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">إختبارات متاحة</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">
                        جدول جميع الإختبارت
                    </span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2 pb-0 mt-n3">
                <div class="tab-content mt-5" id="myTabTables10">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade show active" id="kt_tab_pane_10_2" role="tabpanel" aria-labelledby="kt_tab_pane_10_2">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-borderless table-vertical-center">
                                <!--begin::Thead-->
                                <thead>
                                    <tr>
                                        <th class="p-0 w-50px"></th>
                                        <th class="p-0 w-100 min-w-100px"></th>
                                        <th class="p-0"></th>
                                        <th class="p-0 min-w-130px w-100"></th>
                                    </tr>
                                </thead>
                                <!--end::Thead-->
                                <!--begin::Tbody-->
                                <tbody>
                                    @foreach ($quizzes as $x)
                                    @if(\App\Models\Quiz::quizdone($x) == false)
                                    <tr>
                                        <td class="pl-0 pt-0 py-5">
                                            <div class="symbol symbol-45 symbol-light-success mr-2">
                                                <span class="symbol-label">
                                                    <span class="svg-icon svg-icon-2x svg-icon-success">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Playlist1.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M8.97852058,18.8007059 C8.80029331,20.0396328 7.53473012,21 6,21 C4.34314575,21 3,19.8807119 3,18.5 C3,17.1192881 4.34314575,16 6,16 C6.35063542,16 6.68722107,16.0501285 7,16.1422548 L7,5.93171093 C7,5.41893942 7.31978104,4.96566617 7.78944063,4.81271925 L13.5394406,3.05418311 C14.2638626,2.81827161 15,3.38225531 15,4.1731748 C15,4.95474642 15,5.54092513 15,5.93171093 C15,6.51788965 14.4511634,6.89225606 14,7 C13.3508668,7.15502181 11.6842001,7.48835515 9,8 L9,18.5512168 C9,18.6409956 8.9927193,18.7241187 8.97852058,18.8007059 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M16,9 L20,9 C20.5522847,9 21,9.44771525 21,10 C21,10.5522847 20.5522847,11 20,11 L16,11 C15.4477153,11 15,10.5522847 15,10 C15,9.44771525 15.4477153,9 16,9 Z M14,13 L20,13 C20.5522847,13 21,13.4477153 21,14 C21,14.5522847 20.5522847,15 20,15 L14,15 C13.4477153,15 13,14.5522847 13,14 C13,13.4477153 13.4477153,13 14,13 Z M14,17 L20,17 C20.5522847,17 21,17.4477153 21,18 C21,18.5522847 20.5522847,19 20,19 L14,19 C13.4477153,19 13,18.5522847 13,18 C13,17.4477153 13.4477153,17 14,17 Z" fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <span class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                {{ $x->name }}
                                            </span>
                                            <span class="text-muted font-weight-bold d-block">
                                                مدرسة الدفي
                                            </span>
                                        </td>
                                        <td></td>
                                        <td class="text-left">
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                {{ $x->created_at->format('d-m-Y') }}
                                            </span>
                                            <span class="text-muted font-weight-bold d-block font-size-sm">
                                                {{ $x->created_at->format('M') }}
                                            </span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="{{ route('quiz' , [
                                                'id' => $x->id
                                            ]) }}" class="btn btn-light-success">
                                                بدأ الإختبار
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                                <!--end::Tbody-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-md-6">
        <!--begin::Base Table Widget 10-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">إختبارات قمت بها</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">
                        جدول جميع الإختبارت
                    </span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2 pb-0 mt-n3">
                <div class="tab-content mt-5" id="myTabTables10">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade show active" id="kt_tab_pane_10_2" role="tabpanel" aria-labelledby="kt_tab_pane_10_2">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-borderless table-vertical-center">
                                <!--begin::Thead-->
                                <thead>
                                    <tr>
                                        <th class="p-0 w-50px"></th>
                                        <th class="p-0 w-100 min-w-100px"></th>
                                        <th class="p-0"></th>
                                        <th class="p-0 min-w-130px w-100"></th>
                                    </tr>
                                </thead>
                                <!--end::Thead-->
                                <!--begin::Tbody-->
                                <tbody>
                                    @foreach ($quizzes as $x)
                                    @if(\App\Models\Quiz::quizdone($x) != false)
                                    <tr>
                                        <td class="pl-0 pt-0 py-5">
                                            <div class="symbol symbol-45 symbol-light-success mr-2">
                                                <span class="symbol-label">
                                                    <span class="svg-icon svg-icon-2x svg-icon-success">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Playlist1.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M8.97852058,18.8007059 C8.80029331,20.0396328 7.53473012,21 6,21 C4.34314575,21 3,19.8807119 3,18.5 C3,17.1192881 4.34314575,16 6,16 C6.35063542,16 6.68722107,16.0501285 7,16.1422548 L7,5.93171093 C7,5.41893942 7.31978104,4.96566617 7.78944063,4.81271925 L13.5394406,3.05418311 C14.2638626,2.81827161 15,3.38225531 15,4.1731748 C15,4.95474642 15,5.54092513 15,5.93171093 C15,6.51788965 14.4511634,6.89225606 14,7 C13.3508668,7.15502181 11.6842001,7.48835515 9,8 L9,18.5512168 C9,18.6409956 8.9927193,18.7241187 8.97852058,18.8007059 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M16,9 L20,9 C20.5522847,9 21,9.44771525 21,10 C21,10.5522847 20.5522847,11 20,11 L16,11 C15.4477153,11 15,10.5522847 15,10 C15,9.44771525 15.4477153,9 16,9 Z M14,13 L20,13 C20.5522847,13 21,13.4477153 21,14 C21,14.5522847 20.5522847,15 20,15 L14,15 C13.4477153,15 13,14.5522847 13,14 C13,13.4477153 13.4477153,13 14,13 Z M14,17 L20,17 C20.5522847,17 21,17.4477153 21,18 C21,18.5522847 20.5522847,19 20,19 L14,19 C13.4477153,19 13,18.5522847 13,18 C13,17.4477153 13.4477153,17 14,17 Z" fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <span class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                {{ $x->name }}
                                            </span>
                                            <span class="text-muted font-weight-bold d-block">
                                                مدرسة الدفي
                                            </span>
                                        </td>
                                        <td></td>
                                        <td class="text-left">
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                {{ $x->created_at->format('d-m-Y') }}
                                            </span>
                                            <span class="text-muted font-weight-bold d-block font-size-sm">
                                                {{ $x->created_at->format('M') }}
                                            </span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="{{ asset(\App\Models\Quiz::quizdone($x)) }}" class="btn btn-light-success">
                                                النتيجة
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                                <!--end::Tbody-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>
</div>
@endsection

@section('action')
    <a href="/" class="btn btn-success mr-2">الرئيسية</a>
    <a href="{{ route('student.info') }}" class="btn btn-info">معلوماتي الشخصية</a>
@endsection
