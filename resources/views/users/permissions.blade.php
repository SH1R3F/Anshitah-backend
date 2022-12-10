@extends('layouts.app')

@section('content')
<div class="card card-custom card-stretch">
    <form action="{{ route('users.permissions',['id' => $user->id]) }}" method="post">
        @csrf
        <div class="card-header py-3">
            <div class="card-toolbar">
                <button class="btn btn-success mr-2">حفظ الصلاحيات</button>
            </div>
        </div>
        <div class="card-body">
            <x-permissions-user :user="$user"/>
        </div>
    </form>
</div>

@endsection
