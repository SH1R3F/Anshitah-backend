@extends('layouts.app')

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Teachers-->
            <div class="d-flex flex-row">
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
                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <th>الإختبار</th>
                                        <th>المستوى</th>
                                        <th>النتيجة</th>
                                        <th>اعادة الاختبار</th>
                                        {{-- <th>الفصل</th> --}}
                                        {{-- <th>
                                            العمليات
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exams as $s)
                                        <tr>
                                            <td>
                                                {{ $s->quiz->name }}
                                            </td>
                                            <td>
                                                {{ $s->quiz->level->name }}
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{ route('result' , ['id' => $s->quiz->id , 'user' => $s->user->id]) }}" class="btn btn-warning">النتيجة</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('students.quiz.reset' , ['id' => $s->quiz->id , 'user' => $s->user->id]) }}" class="btn btn-danger">إعادة الإختبار</a>
                                            </td>
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
                            {{-- {{ $students->links() }} --}}
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
