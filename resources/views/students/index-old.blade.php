@extends('layouts.app')

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Teachers-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-md-row-auto w-md-275px w-xl-325px">
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">الصفوف</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">إدارة الصفوف</span>
                            </h3>
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions"
                                    data-placement="left">
                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover py-5">
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-drop"></i>
                                                    </span>
                                                    <span class="navi-text">إضافة صف</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <!--begin::Container-->
                            <div>
                                @foreach ($classes as $classe)
                                <div class="d-flex align-items-center mb-2">
                                    <div class="d-flex flex-row">
                                        <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">
                                            {{ $classe->name }}
                                        </span>
                                        <div>
                                            <button type="button"
                                                class="btn btn-light font-weight-bolder font-size-sm py-2">تعديل</button>
                                            <button type="button"
                                                class="btn btn-light font-weight-bolder font-size-sm py-2">حذف</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">الفصول</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">إدارة فصل</span>
                            </h3>
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions"
                                    data-placement="left">
                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover py-5">
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-drop"></i>
                                                    </span>
                                                    <span class="navi-text">إضافة صف</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-drop"></i>
                                                    </span>
                                                    <span class="navi-text">إضافة فصل</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <!--begin::Container-->
                            <div>
                                @foreach ($groupes as $groupe)
                                <div class="d-flex align-items-center mb-2">
                                    <div class="d-flex flex-row">
                                        <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">
                                            الفصل
                                            {{ $groupe->name }}
                                        </span>
                                        <div>
                                            <button type="button"
                                                class="btn btn-light font-weight-bolder font-size-sm py-2">تعديل</button>
                                            <button type="button"
                                                class="btn btn-light font-weight-bolder font-size-sm py-2">حذف</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <!--begin::Header-->
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">الطلاب</span>
                                <span class="text-muted mt-1 font-weight-bold font-size-sm">
                                    جدول الطلاب
                                </span>
                            </h3>
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title=""
                                    data-placement="left" data-original-title="Quick actions">
                                    <!--begin::Trigger Modal-->
                                    <a href="#" class="btn btn-success font-weight-bolder font-size-sm m-2"
                                        aria-haspopup="true" aria-expanded="false" data-toggle="modal"
                                        data-target="#exampleModalCustomScrollable">إضافة طالب</a>
                                    <a href="#" class="btn btn-success font-weight-bolder font-size-sm"
                                        aria-haspopup="true" aria-expanded="false" data-toggle="modal"
                                        data-target="#excelStudents">
                                    رفع بيانات الطلاب
                                    </a>
                                    <!--end::Trigger Modal-->
                                    <!--begin::Modal Content-->
                                    <div class="modal fade" id="exampleModalCustomScrollable" tabindex="-1"
                                        role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div data-scroll="true" data-height="600">
                                                        <form class="form pt-9">
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Name</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        type="text" value="Nick" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Nickname</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        type="text" value="Bold" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Organization</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        type="text" value="Loop Inc." />
                                                                    <span class="form-text text-muted">If you want your
                                                                        invoices addressed to a company. Leave blank to
                                                                        use your full name.</span>
                                                                </div>
                                                            </div>
                                                            <div class="separator separator-dashed my-10"></div>
                                                            <!--begin::Heading-->
                                                            <div class="row">
                                                                <div class="col-lg-9 col-xl-6 offset-xl-3">
                                                                    <h3 class="font-size-h6 mb-5">Contact Info:</h3>
                                                                </div>
                                                            </div>
                                                            <!--end::Heading-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <div
                                                                        class="input-group input-group-lg input-group-solid">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-phone"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text"
                                                                            class="form-control form-control-lg form-control-solid"
                                                                            value="+35278953712" placeholder="Phone" />
                                                                    </div>
                                                                    <span class="form-text text-muted">We'll never share
                                                                        your email with anyone else.</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Email
                                                                    Address</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <div
                                                                        class="input-group input-group-lg input-group-solid">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-at"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text"
                                                                            class="form-control form-control-lg form-control-solid"
                                                                            value="nick.bold@loop.com"
                                                                            placeholder="Email" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Site</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <div
                                                                        class="input-group input-group-lg input-group-solid">
                                                                        <input type="text"
                                                                            class="form-control form-control-lg form-control-solid"
                                                                            placeholder="Username" value="loop" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">.com</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="separator separator-dashed my-10"></div>
                                                            <!--begin::Heading-->
                                                            <div class="row">
                                                                <div class="col-lg-9 col-xl-6 offset-xl-3">
                                                                    <h3 class="font-size-h6 mb-5">Contact Info:</h3>
                                                                </div>
                                                            </div>
                                                            <!--end::Heading-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Email
                                                                    Notification</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <span class="switch">
                                                                        <label>
                                                                            <input type="checkbox" checked="checked"
                                                                                name="email_notification_1" />
                                                                            <span></span>
                                                                        </label>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Send
                                                                    Copy</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <span class="switch">
                                                                        <label>
                                                                            <input type="checkbox"
                                                                                name="email_notification_2" />
                                                                            <span></span>
                                                                        </label>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="button"
                                                        class="btn btn-primary font-weight-bold">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Modal Content-->
                                    <!--begin::Modal Content-->
                                    <div class="modal fade" id="excelStudents" tabindex="-1"
                                        role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <form action="{{ route('import.students') }}" method="post" class="form pt-9" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 text-right col-form-label">ملف الطلاب</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        type="file" name="file" />
                                                                </div>
                                                            </div>
                                                        {{-- </form> --}}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit"
                                                        class="btn btn-primary font-weight-bold">Submit</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Modal Content-->
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Search Form-->
                            <form action="/students" method="get">
                            <div class="mb-10">
                                <div class="row align-items-center">
                                    <div class="col-lg-10 col-xl-9">
                                        <div class="row align-items-center">
                                            <div class="col-md-3 my-2 my-md-0">
                                                <div class="input-icon">
                                                    <input type="text"
                                                    class="form-control form-control-solid"
                                                    name="q"
                                                    placeholder="بحث..."/>
                                                    <span>
                                                        <i class="flaticon2-search-1 text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-3 my-2 my-md-0">
                                                <select class="form-control form-control-solid"
                                                    name="classe">
                                                    <option value="">الصف</option>
                                                    @foreach ($classes as $c)
                                                    <option value="{{ $c->id }}">
                                                        {{ $c->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 my-2 my-md-0">
                                                <select class="form-control form-control-solid"
                                                name="groupe">
                                                    <option value="">الفصل</option>
                                                    @foreach ($groupes as $g)
                                                    <option value="{{ $g->id }}">
                                                        {{ $g->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            {{-- <div class="col-md-3 my-2 my-md-0">
                                                <input type="text" name="date"
                                                    class="form-control hijri-date-default form-control-solid form-control-lg"
                                                    placeholder="أدخل إجابتك" required />
                                            </div> <!-- التاريخ --> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-xl-3 mt-5 mt-lg-0">
                                        <button class="btn btn-light-primary px-6 font-weight-bold">
                                            بحث
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!--end: Search Form-->
                            <!--begin: Datatable-->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>الإسم</th>
                                        <th>المستوى في الإختبار</th>
                                        {{-- <th>الفصل</th> --}}
                                        {{-- <th>
                                            العمليات
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $s)
                                        <tr>
                                            <td>
                                                {{ $s->name }}
                                            </td>
                                            <td>
                                                {{ $s->level }}
                                            </td>
                                            {{-- <td> --}}
                                                {{-- {{ $s->groupe->name }} --}}
                                            {{-- </td> --}}
                                            {{-- <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-success mr-2">تعديل</button>
                                                    <button class="btn btn-danger">حذف</button>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end: Datatable-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Teachers-->
        </div>
        <!--end::Container-->
    </div>
</div>
@endsection

@section('scripts')
<script>


</script>
@endsection
