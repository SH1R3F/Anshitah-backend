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
        <ul class="row">
            @php
                $groupe_permissions = \App\Models\GroupePermission::orderBy('id', 'ASC')->get();
                $role = Spatie\Permission\Models\Role::findOrFail($id);
                $role_permissions = [];
                foreach($role->permissions as $permission){
                    $role_permissions[] = $permission->name;
                }
            @endphp
            <div class="d-flex my-2">
                <span class="btn-check-all btn btn-success mr-2">
                    تحديد الكل
                </span>
                <span class="btn-uncheck-all btn btn-danger mr-2">
                    إلغاء تحديد الكل
                </span>
            </div>
            @foreach ($groupe_permissions as $grp)
                <div class="col-12">
                    <li>
                        <span class="p-0 m-0 btn-toggle btn-plus" style="border: none;background:none;">
                            <img class="icon-plus" src="{{ asset('assets/media/svg/icons/Code/Plus.svg') }}" alt="" srcset="">
                            <img class="icon-minus" src="{{ asset('assets/media/svg/icons/Code/Minus.svg') }}" alt="" srcset="">
                        </span>
                        <input type="checkbox" class="grp" {{ !array_diff($grp->permissions->pluck('name')->toArray(), $role_permissions) ? 'checked' : '' }}>
                        <label for="">{{ $grp->name }}</label>
                        <div class="d-none bg-dark position-absolute row rounded p-2" style="width:100%;z-index:9999">
                            @foreach ($grp->permissions as $p)
                                <span class="col-4">
                                    <input type="checkbox" name="permissions[]" value="{{ $p->name }}" class="permission"
                                    @if(in_array($p->name , $role_permissions))
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
                    $(this).siblings('div').children().children('input').prop('checked',true);
                }else{
                    $(this).siblings('div').children().children('input').prop('checked',false);
                }
            });
            $('.grp').prev('span').click(function(){
                $(this).siblings('div').toggleClass('d-none');
            });

            // whenever a permission is checked make the parent checked | unchecked
            $('.permission').change(function(){
                let parentDiv     = $(this).closest('div');
                let checkbox   = parentDiv.find('input:checkbox').length;
                let checkedbox = parentDiv.find('input:checkbox:checked').length;
                if (checkedbox === checkbox) {
                    parentDiv.siblings('input:checkbox').prop('checked', true);
                } else {
                    parentDiv.siblings('input:checkbox').prop('checked', false);
                }
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
                $('input').prop('checked',true);
            });
            $('.btn-uncheck-all').click(function(){
                $('input').prop('checked',false);
            });

        });
</script>
@endsection
