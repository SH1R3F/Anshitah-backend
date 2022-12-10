<div class="modal fade" id="transfer-files-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    نقل الملفات من مجلد
                    <em>
                        <span id="x-shared-file-name" class="text-info"></span>
                    </em>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('transfer.shared.file') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>الملفات</label>
                        <div id="x-shared-files" class="d-flex flex-wrap"></div>
                    </div>
                    <div class="form-group">
                        <label>المجلد المنقول إليه</label>
                        <select name="shared" class="form-control" required>
                            @foreach ($shareds as $shared)
                                <option value="{{ $shared->id }}">{{ $shared->name }}</option>
                            @endforeach
                        </select>
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

