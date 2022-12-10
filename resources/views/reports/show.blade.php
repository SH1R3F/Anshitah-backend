@extends('layouts.app')

@section('action')
    <a href="{{ route('reports.index') }}" class="btn btn-primary mr-2">التقارير</a>
@endsection

@section('content')
<style>
    img {
        width: 150px;
    }
</style>
<div class="card card-custom">
    <div class="card-header h-auto py-4">
        <div class="card-title">
            <h3 class="card-label">{{ $title }}
            <span class="d-block text-muted pt-2 font-size-sm">
                التاريخ  : {{ $r->created_at->format('d-m-Y')  }}
            </span></h3>
        </div>
    </div>
    <!--begin::Body-->
    <div class="card-body py-4">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">نتيجة التقييم :</label>
                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">
                            {{ $r->evaluation->total ?? 'لم يتم التقييم بعد' }}
                        </span>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">عنوان التقرير :</label>
                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">{{ $r->name }}</span>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">رقم النشاط :</label>
                    <div class="col-8">
                        <span class="label label-inline label-primary label-bold">{{ $r->number }}</span>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">المدرسة :</label>
                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">{{ $r->school }}</span>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">المجال :</label>
                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">{{ $r->field }}</span>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">القيمة التربوية :</label>
                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">{{ $r->value }}</span>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">عدد الطلاب المشاركين :</label>
                    <div class="col-8">
                        <span class="form-control-plaintext">
                        {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                        <span class="label label-inline label-primary label-bold">{{ $r->mocharikin }}</span></span>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">عدد الطلاب المنظمين :</label>
                    <div class="col-8">
                        <span class="form-control-plaintext">
                        {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                        <span class="label label-inline label-primary label-bold">{{ $r->monadimin }}</span></span>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">عدد الطلاب الجمهور :</label>
                    <div class="col-8">
                        <span class="form-control-plaintext">
                        {{-- <span class="font-weight-bolder">345,000M</span>&nbsp; --}}
                        <span class="label label-inline label-primary label-bold">{{ $r->jomhor }}</span></span>
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">إجمالي عدد المشاركين :</label>
                    <div class="col-8">
                        <span class="label label-inline label-primary label-bold">{{ $r->total_mocharikin }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">ابرز ما تم تنفيذه من المدرسة للطلاب :</label>
                    <div class="col-8">
                        @foreach (json_decode($r->executed) as $e)
                            <span class="label label-inline label-success label-bold d-block mb-2">
                                {{ (int)$e->id + 1 }}
                                -
                                {{ $e->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">صور من النشاط بالمسميات والشعارات المعتمدة :</label>
                    <div class="col-8">
                        @foreach (json_decode($r->img1) as $e)
                            <a target="_blank" href="https://anshitah.com/nashat/public/{{ $e->file }}">
                                <img src="https://anshitah.com/nashat/public/{{ $e->file }}" />
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">صور من بطاقة الدعوة :</label>
                    <div class="col-8">
                        @foreach (json_decode($r->img2) as $e)
                            <a target="_blank" href="https://anshitah.com/nashat/public/{{ $e->file }}">
                                <img src="https://anshitah.com/nashat/public/{{ $e->file }}" />
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">صورة معبرة من حفل الختام والتكريم :</label>
                    <div class="col-8">
                        @foreach (json_decode($r->img3) as $e)
                        <a target="_blank" href="https://anshitah.com/nashat/public/{{ $e->file }}">
                            <img src="https://anshitah.com/nashat/public/{{ $e->file }}" />
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label class="col-4 col-form-label">صورة معبرة من النشر الإعلامي :</label>
                    <div class="col-8">
                        @foreach (json_decode($r->img4) as $e)
                        <a target="_blank" href="https://anshitah.com/nashat/public/{{ $e->file }}">
                            <img src="https://anshitah.com/nashat/public/{{ $e->file }}" />
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
