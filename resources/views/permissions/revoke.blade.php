@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-custom mb-2 mt-5">
            <div class="card-body">
                <button id="btn-ck-all" class="btn btn-info mb-2">تحديد الكل</button>
                <button id="btn-r-ck-all" class="btn btn-dark mb-2">إلغاء التحديد من الكل</button>
                    <form action="{{ route('permissions.revoke.post',[
                        'name' => $name
                    ]) }}" method="post">
                <button class="btn btn-success mb-2">حفظ المعلومات</button>
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    @foreach ($usersWith as $u)
                                        <span class="w-100 badge badge-primary mb-2 mr-2">
                                            <label
                                                class="bg-primary rounded p-1 text-white mr-2 d-flex align-items-center justify-content-between">
                                                {{ $u->name }}
                                                <input class="ck-user" name="users[]" type="checkbox" value="{{ $u->id }}" checked>
                                            </label>
                                        </span>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    @foreach ($usersWithout as $u)
                                        <span class="w-100 badge badge-danger mb-2 mr-2">
                                            <label
                                                class="bg-danger rounded p-1 text-white mr-2 d-flex align-items-center justify-content-between">
                                                {{ $u->name }}
                                                <input class="ck-user" name="users[]" type="checkbox" value="{{ $u->id }}">
                                            </label>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            <button class="btn btn-success">حفظ المعلومات</button>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        $(function(){
            $('#btn-ck-all').click(function(){
                $('.ck-user').prop('checked',true);
            });
            $('#btn-r-ck-all').click(function(){
                $('.ck-user').prop('checked',false);
            });
        });
    </script>
@endsection
