<div class="col-md-4 position-relative">
    <div class="mb-1">
        <div data-folder="{{ $folder->id }}" class="btn-bg-folder card card-custom wave wave-animate-slow wave-warning mb-2">
            <div class="card-body">
                <div class="d-flex align-items-center p-5">
                    <div class="mr-6">
                        <span class="svg-icon svg-icon-warning svg-icon-4x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                        </span>
                    </div>
                    <div class="d-flex flex-column">
                        <label>{{ $folder->name }}</label>
                        <div class="text-dark-75">
                            {{ $folder->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!Auth::user()->hasRole('طالب'))
        <div class="dropdown dropdown-inline position-absolute" style="z-index : 2;left: 25px;top: 10px;">
            <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="ki ki-bold-more-ver"></i>
            </button>
            <div class="dropdown-menu p-2">
                <button class="btn-update-folder btn btn-text-warning btn-hover-light-warning font-weight-bold w-100" data-id="{{ $folder->id }}" data-toggle="modal" data-target="#update-folder">تعديل</button>
                <form action="{{ route('folders.delete' , ['id' => $folder->id]) }}" method="post">
                    @csrf
                    <button class="btn btn-text-danger btn-hover-light-danger font-weight-bold w-100">حذف</button>
                </form>
                <button class="btn-new-file btn btn-text-warning btn-hover-light-warning font-weight-bold w-100" data-folder="{{ $folder }}" data-toggle="modal" data-target="#create-folder-file">ملف جديد</button>
                <button data-folder="{{ $folder }}" class="btn-sub-folder btn btn-text-info btn-hover-light-info font-weight-bold w-100" data-toggle="modal" data-target="#create-subfolder">مجلد ابن</button>
            </div>
        </div>
    @endif
    <div class="mb-2">
        <div class="d-flex">
            @foreach ($folder->folders as $folder)
                <div class="position-relative justify-content-center">
                    <button data-folder="{{ $folder->id }}" class="btn-bg-folder btn btn-success">
                        {{ $folder->name }}
                    </button>
                    @if (!Auth::user()->hasRole('طالب'))
                        <div class="dropdown dropdown-inline mx-1">
                            <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-ver"></i>
                            </button>
                            <div class="dropdown-menu p-2">
                                <button class="btn-update-folder btn btn-text-warning btn-hover-light-warning font-weight-bold w-100" data-id="{{ $folder->id }}" data-toggle="modal" data-target="#update-folder">تعديل</button>
                                <form action="{{ route('folders.delete' , ['id' => $folder->id]) }}" method="post">
                                    @csrf
                                    <button class="btn btn-text-danger btn-hover-light-danger font-weight-bold w-100">حذف</button>
                                </form>
                                <button class="btn-new-file btn btn-text-warning btn-hover-light-warning font-weight-bold w-100" data-folder="{{ $folder }}" data-toggle="modal" data-target="#create-folder-file">ملف جديد</button>
                                {{-- <button data-folder="{{ $folder }}" class="btn-sub-folder btn btn-text-info btn-hover-light-info font-weight-bold w-100" data-toggle="modal" data-target="#create-subfolder">مجلد ابن</button> --}}
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div><!-- المجلدات الابناء -->
</div><!-- الملفات الخاصة -->
