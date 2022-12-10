@if(!$sharedfiles->count())
    <div class='badge badge-warning text-center text-white w-100'>
        المجلد خالي من الملفات
    </div>
    @else
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>صاحب الملف</th>
                <th>إسم الملف</th>
                <th>تحميل الملف</th>
                <th>عرض الملف</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sharedfiles as $sharedfile)
            @if(Auth::user()->can('عرض الملفات ' . $sharedfile->shared->name)
                || Auth::user()->id == $sharedfile->user->id || $sharedfile->user->hasRole('مدير') )
            <tr>
                <td>{{ $sharedfile->user->name }}</td>
                <td>{{ $sharedfile->name }}</td>
                <td>
                    <a target="_blank" href="{{ $sharedfile->path }}" class="btn btn-primary w-100 @if(!$sharedfile->path) disabled @endif">تحميل</a>
                </td>
                <td>
                    <a target="_blank" href="{{ $sharedfile->href }}" class="btn btn-info w-100 @if(!$sharedfile->href) disabled @endif">عرض</a>
                </td>
                <td>
                    @if(Auth::user()->id == $sharedfile->user->id || Auth::user()->hasRole('مدير'))
                    <button data-toggle="modal" data-target="#update-shared-file"
                    onclick="updateSharedFile({{ $sharedfile->id }})"
                        class="btn btn-success w-100">تعديل</button>
                    @endif
                </td>
                <td>
                    @if(Auth::user()->id == $sharedfile->user->id || Auth::user()->hasRole('مدير'))
                    <form action="/sharedfiles/delete/{{ $sharedfile->id }}" method="post">
                        @csrf
                        <button class="btn btn-danger w-100">حذف</a>
                    </form>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
@endif
