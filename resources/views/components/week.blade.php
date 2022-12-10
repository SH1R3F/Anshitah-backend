<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
    <!--begin::Card-->
    <div class="card card-custom gutter-b card-stretch">
        <!--begin::Body-->
        <div class="card-body pt-4">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end">
                <div class="dropdown dropdown-inline" data-toggle="tooltip"
                title="العمليات" data-placement="left">
                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ki ki-bold-more-hor"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-5">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover">
                            <li class="navi-item">
                                <a href="{{ route('week.edit',['id'=>$id]) }}" class="btn btn-success btn-block mb-2">تعديل</a>
                            </li>
                            <li class="navi-item">
                                <form action="{{ route('week.delete',['id'=>$id]) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger btn-block">
                                        حذف
                                    </button>
                                </form>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
            </div>
            <!--end::Toolbar-->
            <!--begin::User-->
            <div class="d-flex align-items-center mb-7">
                <!--begin::Pic-->
                {{-- <div class="flex-shrink-0 mr-4">
                    <div class="symbol symbol-circle symbol-lg-75">
                        <img src="assets/media/project-logos/1.png" alt="image" />
                    </div>
                </div> --}}
                <!--end::Pic-->
                <!--begin::Title-->
                <div class="d-flex flex-column">
                    <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $name }}</a>
                    <span class="text-muted font-weight-bold">
                        ثم إنشاءه منذ : {{ $date }}
                    </span>
                </div>
                <!--end::Title-->
            </div>
            <!--end::User-->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('week.status',['id'=>$id]) }}" method="post">
                            @csrf
                            @if($status)
                            <button data-target="{{ $id }}" class="btn btn-block btn-sm btn-light-warning py-2">
                                إخفاء
                            </button>
                            @else
                            <button data-target="{{ $id }}" class="btn btn-block btn-sm btn-light-primary py-2">
                                إظهار
                            </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end:: Card-->
</div>



