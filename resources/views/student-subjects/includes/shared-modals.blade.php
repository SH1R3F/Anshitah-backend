
<!-- Create Sub Shared Modal -->
<div class="modal fade" id="create-subshared" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    إنشاء مجلد إبن في
                    <em>
                        <span id="x-shared-name" class="text-info"></span>
                    </em>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('shareds.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input id="x-shared-id" type="text" name="shared_id" hidden>
                    </div>
                    <div class="form-group">
                        <label>إسم المجلد</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>وصف المجلد</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">حفظ المعلومات</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Create Shared Folder Modal -->
<div class="modal fade" id="create-publicfolder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إنشاء مجلد مشترك</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('shareds.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>إسم المجلد</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>وصف المجلد</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>الصلاحية</label>
                        <input type="text" name="permission" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">حفظ المعلومات</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Create Shared File Modal -->
<div class="modal fade" id="create-shared-file" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    إنشاء ملف جديد في
                    <em>
                        <span id="shared-name" class="text-info"></span>
                    </em>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            @if($shareds->count())
            <form action="{{ route('sharedfiles.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- اسم المجلد -->
                    <div class="form-group">
                        <input id="shared-id" name="shared_id" type="text" required hidden>
                    </div>
                    <div class="form-group">
                        <!-- اسم الملف -->
                        <label>اسم الملف</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>وصف الملف</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>رابط الملف</label>
                        <input type="text" name="href" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>الملف</label>
                        <input type="file" name="path" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">حفظ المعلومات</button>
                </div>
            </form>
            @else
            <div class="row p-4">
                <div class="badge badge-warning text-center text-white w-50 mx-auto">
                    لا توجد مجلدات عذرا
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- Update Shared File Modal -->
<div class="modal fade" id="update-shared-file" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل ملف مشترك</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="form-update-shared-file" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    {{-- <div class="form-group">
                        <label>إسم المجلد الأب</label>
                        <select name="shared_id" class="form-control" required>
                            @foreach ($shareds as $folder)
                            @can($folder->permission)
                            <option value="{{ $folder->id }}" class="text-center">{{ $folder->name }}</option>
                            @foreach (\App\Models\Shared::subshareds($folder->id) as $subfolder)
                            <option class="bg-light-dark text-white text-center" value="{{ $subfolder->id }}">
                                {{ $subfolder->name }}
                            </option>
                            @endforeach
                            @endcan
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label>إسم الملف</label>
                        <input id="update-shared-file-name" type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>وصف الملف</label>
                        <input id="update-shared-file-description" type="text" name="description"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>رابط الملف</label>
                        <input id="update-shared-file-href" type="text" name="href" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>الملف</label>
                        <input type="file" name="path" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">حفظ المعلومات</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Update Shared Modal -->
<div class="modal fade" id="update-shared" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل مجلد مشترك</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="form-update-shared" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>إسم المجلد</label>
                        <input id="update-shared-name" type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>وصف المجلد</label>
                        <input id="update-shared-description" type="text" name="description" class="form-control"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">حفظ المعلومات</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('scripts')
<!-- Shareds -->
<script>
    function updateSharedFile(id){
        $('#form-update-shared-file').attr('action',`/sharedfiles/update/${id}`);
        $.get(`/sharedfiles/edit/${id}`,function(response){
            $('#update-shared-file-name').val(response.name);
            $('#update-shared-file-description').val(response.description);
            $('#update-shared-file-href').val(response.href);
        });
    }
    $(function(){
        // When click to ملف جديد
        $('.btn-new-shared-file').click(function(){
            var shared = $(this).data('shared');
            $('#shared-id').val(shared['id']);
            $('#shared-name').html(shared['name']);
        });

        // تعديل المجلد
        $('.btn-update-shared').click(function(){
            var id = $(this).data('id');
            $('#form-update-shared').attr('action',`/shareds/update/${id}`);
            $.get(`/shareds/details/${id}`,function(response){
                $('#update-shared-name').val(response.name);
                $('#update-shared-description').val(response.description);
            });
        });

        /*
        * Toggle background When click to shared folder
        * Get Files
        */
        $('.btn-bg-shared').click(function(){
            $('.btn-bg-shared').removeClass('wave-dark')
            $(this).addClass('wave-dark');
            var shared = $(this).data('shared');
            $.get(`/sharedfiles/${shared}`,function(response){
                $('#shared-files-table').html(response);
            });
        });

        //انشاء مجلد ابن
        $('.btn-sub-shared').click(function(){
            var shared = $(this).data('shared');
            $('#x-shared-id').val(shared['id']);
            $('#x-shared-name').html(shared['name']);
        });
    });
</script>

<!-- Folders -->
<script>
    function updateFile(id){
        $('#form-update-file').attr('action',`/files/update/${id}`);
        $.get(`/files/edit/${id}`,function(response){
            $('#update-file-name').val(response.name);
            $('#update-file-description').val(response.description);
            $('#update-file-href').val(response.href);
        });
    }
    $(function(){
        // When click to ملف جديد
        $('.btn-new-file').click(function(){
            var folder = $(this).data('folder');
            $('#folder-id').val(folder['id']);
            $('#folder-name').html(folder['name']);
        });

        // تعديل المجلد
        $('.btn-update-folder').click(function(){
            var id = $(this).data('id');
            $('#form-update-folder').attr('action',`/folders/update/${id}`);
            $.get(`/folders/details/${id}`,function(response){
                $('#update-folder-name').val(response.name);
                $('#update-folder-description').val(response.description);
            });
        });

        //انشاء مجلد ابن
        $('.btn-sub-folder').click(function(){
            var folder = $(this).data('folder');
            $('#sub-folder-id').val(folder['id']);
            $('#sub-folder-name').html(folder['name']);
        });
    });
</script>
@if (Auth::user()->hasRole('طالب'))
    <script>
        /*
        * Toggle background When click to shared folder
        * Get Files
        */
        $('.btn-bg-folder').click(function(){
            $('.btn-bg-folder').removeClass('wave-dark')
            $(this).addClass('wave-dark');
            var folder = $(this).data('folder');
            $.get(`/files/students/${folder}`,function(response){
                $('#folders-files-table').html(response);
                // console.log(response);
            });
        });
    </script>
@else
<script>
    /*
    * Toggle background When click to shared folder
    * Get Files
    */
    $('.btn-bg-folder').click(function(){
        $('.btn-bg-folder').removeClass('wave-dark')
        $(this).addClass('wave-dark');
        var folder = $(this).data('folder');
        $.get(`/files/${folder}`,function(response){
            $('#folders-files-table').html(response);
            // console.log(response);
        });
    });
</script>
@endif
@endsection
