@extends('layouts.app')

@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>عنوان التذكرة</td>
                                <td>الحالة</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->title }}</td>
                                <td>
                                    {{ $ticket->status == 1 ? 'مفتوحة' : 'مغلقة'; }}
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('technical-support.show', [ 'id' => $ticket->id ]) }}" class="btn btn-success ml-1">عرض</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>

@endsection