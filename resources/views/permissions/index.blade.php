@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-custom mb-2 mt-5">
            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-12">
                        <style>
                            ul {
                                list-style: none;
                                /* list-style-image: url({{ asset('assets/media/svg/icons/Code/Plus.svg') }}) ; */
                            }
                        </style>
                        <ul class="row">
                            @foreach ($groupe_permissions as $grp)
                            {{-- <div class="col-2">
                                <span class="badge badge-primary w-100 mb-2">
                                    {{ $grp->name }}
                                </span>
                                @foreach ($grp->permissions as $permission)
                                <span class="badge badge-danger w-100 mb-2">
                                    {{ $permission->name }}
                                </span>
                                @endforeach
                            </div> --}}
                            <style>
                                .btn-plus > .icon-minus {
                                    display: none;
                                }
                                .btn-minus > .icon-plus {
                                    display: none;
                                }
                            </style>
                            <div class="col-12">
                                <li>
                                    <button class="p-0 m-0 btn-toggle btn-plus" style="border: none;background:none;">
                                        <img class="icon-plus" src="{{ asset('assets/media/svg/icons/Code/Plus.svg') }}" alt="" srcset="">
                                        <img class="icon-minus" src="{{ asset('assets/media/svg/icons/Code/Minus.svg') }}" alt="" srcset="">
                                    </button>
                                    <input type="checkbox" class="grp">
                                    <label for="">{{ $grp->name }}</label>
                                    <div class="d-none bg-dark text-white position-absolute row rounded p-2" style="width:100%;z-index:9999">
                                        @foreach ($grp->permissions as $p)
                                        <span class="col-4">
                                            <input type="checkbox" name="" id="" class="permission">
                                            <label for="">{{ $p->name }}</label>
                                        </span>
                                        @endforeach
                                    </div>
                                </li>
                            </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    $(function(){
            $('.grp').change(function(){
                if(this.checked){
                    $(this).siblings('div').children().children('input').attr('checked',true);
                }else{
                    $(this).siblings('div').children().children('input').attr('checked',false);
                }
            });
            $('.grp').prev('button').click(function(){
                $(this).siblings('div').toggleClass('d-none');
            });
            $('.btn-toggle').click(function(){
                if($(this).hasClass('btn-plus')){
                    $(this).removeClass('btn-plus');
                    $(this).addClass('btn-minus');
                }else{
                    $(this).addClass('btn-plus');
                    $(this).removeClass('btn-minus');
                }
            });
        });
</script>
@endsection
