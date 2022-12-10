<div class="col-12">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($folders as $folder)
                    <livewire:private-folder :folder="$folder" />
                @endforeach
            </div>
            {{-- @foreach ($folder->folders as $subfolder)
            <div class="d-flex align-items-center">
                <button data-id="{{ $subfolder->id }}" class="btn-folder btn btn-info mb-2 mr-2">{{ $subfolder->name
                    }}</button>
                <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ki ki-bold-more-ver"></i>
                    </button>
                    <div class="dropdown-menu p-2">
                        <button type="button" data-id="{{ $subfolder->id }}"
                            class="btn-update-folder btn btn-text-warning btn-hover-light-warning font-weight-bold w-100"
                            data-toggle="modal" data-target="#update-folder">تعديل</button>
                        <form action="{{ route('folders.delete',[
                                            'id' => $subfolder->id
                                        ]) }}" method="post">
                            @csrf
                            <button
                                class="btn btn-text-danger btn-hover-light-danger font-weight-bold w-100">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @empty
            <div class="badge badge-warning text-white d-block text-center">
                لا توجذ لديك أي مجلدات بعد
            </div>
            @endforelse --}}
        </div>
        <div class="col-md-12">
            <div class="card card-custom example example-compact gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">ملفاتي</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div id="folders-files-table" class="row">
                        <div class="badge badge-warning text-center text-white w-100">
                            قم بإختيار مجلد لظهور الملفات
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

