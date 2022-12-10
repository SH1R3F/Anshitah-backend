@if(!$files->count())
    <div class='badge badge-warning text-center text-white w-100'>
        المجلد خالي من الملفات
    </div>
    @else
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>إسم الملف</th>
                <th>تحميل الملف</th>
                <th>عرض الملف</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($files as $file)
            <tr>
                <td>{{ $file->name }}</td>
                <td>
                    <a target="_blank" href="{{ $file->path }}" class="btn btn-primary w-100 @if(!$file->path) disabled @endif">تحميل</a>
                </td>
                <td>
                    <a target="_blank" href="{{ $file->href }}" class="btn btn-info w-100 @if(!$file->href) disabled @endif">عرض</a>
                </td>
                <td>
                    <button data-toggle="modal" data-target="#update-shared-file"
                    onclick="updateSharedFile({{ $file->id }})"
                        class="btn btn-success w-100">تعديل</button>
                </td>
                <td>
                    <form action="/files/delete/{{ $file->id }}" method="post">
                        @csrf
                        <button class="btn btn-danger w-100">حذف</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
