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
                                <td>إسم المستخدم</td>
                                <td>نوع المستخدم</td>
                                <td>الحالة</td>
                                <td>العمليات</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->title }}</td>
                                <td>
                                    {{ $ticket->username }}
                                </td>
                                <td>
                                    {{ $ticket->rolename }}
                                </td>
                                <td>
                                    {{ $ticket->status == 1 ? 'مفتوحة' : 'مغلقة'; }}
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('show.ticket', [ 'id' => $ticket->id ]) }}" class="btn btn-success ml-1">عرض</a>
                                    <form action="{{ route('toggle.ticket', [ 'id' => $ticket->id ]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-{{ $ticket->status == 1 ? 'warning' : 'info'; }} ml-1">
                                            {{ $ticket->status == 1 ? 'إغلاق' : 'إعادة فتح'; }}
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('delete.ticket', [ 'id' => $ticket->id ]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger ml-1">
                                            حذف
                                        </button>
                                    </form>
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