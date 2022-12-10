<div class="col-12">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($shareds as $shared)
                @can($shared->permission)
                <livewire:shared-folder :key="'shared-' . $shared->id" :shared="$shared" />
                @endcan
                @endforeach
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-custom example example-compact gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">ملفاتي في الملفات المشتركة</h3>
                    </div>
                    <div class="card-toolbar">
                        @can('إنشاء مجلدات مشتركة')
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#create-publicfolder">
                            مجلد مشترك
                        </button>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div id="shared-files-table" class="row">
                        <div class="badge badge-warning text-center text-white w-100">
                            قم بإختيار مجلد لظهور الملفات
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



