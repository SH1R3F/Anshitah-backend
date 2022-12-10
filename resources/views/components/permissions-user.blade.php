<div class="row">
    <div class="col-12">
        <style>
            ul {
                list-style: none;
            }
        </style>
        <style>
            .btn-plus > .icon-minus {
                display: none;
            }
            .btn-minus > .icon-plus {
                display: none;
            }
        </style>
        <div class="d-flex my-2">
            <span class="btn-check-all btn btn-success mr-2">
                تحديد الكل
            </span>
            <span class="btn-uncheck-all btn btn-danger mr-2">
                إلغاء تحديد الكل
            </span>
        </div>
        <ul class="row">
            @foreach ($groupe_permissions as $grp)
            <div class="col-12">
                <li>
                    <span class="p-0 m-0 btn-toggle btn-plus" style="border: none;background:none;">
                        <img class="icon-plus" src="{{ asset('assets/media/svg/icons/Code/Plus.svg') }}" alt="" srcset="">
                        <img class="icon-minus" src="{{ asset('assets/media/svg/icons/Code/Minus.svg') }}" alt="" srcset="">
                    </span>
                    <input type="checkbox" class="grp">
                    <label for="">{{ $grp->name }}</label>
                    <div class="d-none bg-dark position-absolute row rounded p-2" style="width:100%;z-index:9999">
                        @foreach ($grp->permissions as $p)
                            <span class="col-4">
                                <input type="checkbox" name="permissions[]" value="{{ $p->name }}" class="permission"
                                @if($user->can($p->name))
                                checked
                                @endif
                                >
                                <label class="text-white">{{ $p->name }}</label>
                            </span>
                        @endforeach
                    </div>
                </li>
            </div>
            @endforeach
        </ul>
    </div>
</div>

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
            $('.grp').prev('span').click(function(){
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
            $('.btn-check-all').click(function(){
                $('input').attr('checked',true);
            });
            $('.btn-uncheck-all').click(function(){
                $('input').attr('checked',false);
            });
        });
</script>
@endsection
