@extends('layouts.app')

@can('إنشاء إختبار')
    @section('action')
        <a href="{{ route('quizzes.create') }}" class="btn btn-primary">إنشاء إختبار</a>
    @endsection
@endcan

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="level col-12">
                    @forelse ($quizzes as $quiz)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-custom gutter-b card-stretch">
                            <div class="card-body pt-4">
                                @canany(['تعديل إختبار', 'حذف إختبار'])
                                    <div class="d-flex justify-content-end">
                                        <div class="dropdown dropdown-inline" data-toggle="tooltip"
                                        title="العمليات" data-placement="left">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-5">
                                                <!--begin::Navigation-->
                                                <ul class="navi navi-hover">
                                                    @can('تعديل إختبار')
                                                        <li class="navi-item">
                                                            <a href="" class="btn btn-success btn-block mb-2">تعديل</a>
                                                        </li>
                                                    @endcan
                                                    @can('حذف إختبار')
                                                        <li class="navi-item">
                                                            <form action="" method="post">
                                                                @csrf
                                                                <button class="btn btn-danger btn-block">
                                                                    حذف
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endcan
                                                </ul>
                                                <!--end::Navigation-->
                                            </div>
                                        </div>
                                    </div>
                                @endcanany
                                <div class="d-flex align-items-center mb-7">
                                    <div class="d-flex flex-column">
                                        <span>عنوان الإختبار : {{ $quiz->name }}</span>
                                        <span>المستوى : {{ $quiz->level }}</span>
                                    </div>
                                </div>
                                @can('أسئلة الإختبار')
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <a class="btn btn-block btn-sm btn-light-warning py-2" href="{{ route('question.create' , ['id' => $quiz->id]) }}">الأسئلة</a>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-warning">
                        لا توجد أي إختبارات
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection


