<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
    <a href="{{ route('hajz.hodor.table',['id' => $id]) }}">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <span class="d-block alert alert-info text-center">{{ $name }}</span>
                        </div>
                        <div class="col-6">
                            <div class="alert alert-warning text-center">
                                تاريخ بداية الأسبوع
                                <br>
                                {{ $days[0]['date'] }}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="alert alert-warning text-center">
                                تاريخ نهاية الأسبوع
                                <br>
                                {{ $days[4]['date'] }}
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="d-block alert alert-primary text-center m-0">عرض الجدول</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end:: Card-->
    </a>
</div>



