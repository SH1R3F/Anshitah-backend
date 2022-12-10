<form method="post" action="{{ route('donate-post') }}" enctype="multipart/form-data">
    @csrf
    <!--begin::Title-->
    <div class="pb-13 pt-lg-0 pt-5">
        <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">وقت التطوع</h3>
        {{-- <p class="text-muted font-weight-bold font-size-h4">Enter your details to create
            your account</p> --}}
        @if (session('success'))
        <div class="flash-msg alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <!--end::Title-->
    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('name')
        is-invalid
        @enderror""
            type=" text" placeholder="اسم الطالب" name="name" autocomplete="off" />
        @error('name')
        <span class="invalid-feedback">
            الاسم اجباري
            <span>
                @enderror
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group">
        <select id="school" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('school')
        is-invalid
        @enderror" name="school">
            <option value="-1">اختر اسم المدرسة</option>
            @foreach ($schools as $school)
            <option value="{{ $school }}">
                {{ $school }}
            </option>
            @endforeach
        </select>
        @error('school')
        <span class="invalid-feedback">
            اختر مدرسة
            <span>
                @enderror
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <select class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('saf')
                    is-invalid
                    @enderror""
                    name=" saf">
                    <option value="-1">اختر الصف</option>
                    @foreach ($sofof1 as $saf)
                    <option value="{{ $saf }}">
                        {{ $saf }}
                    </option>
                    @endforeach
                </select>
                @error('saf')
                <span class="invalid-feedback">
                    اختر صف
                    <span>
                        @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <select class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('fasle')
                    is-invalid
                    @enderror""
                    name=" fasle">
                    <option value="-1">اختر الفصل</option>
                    @foreach ($fosol as $saf)
                    <option value="{{ $saf }}">
                        {{ $saf }}
                    </option>
                    @endforeach
                </select>
                @error('fasle')
                <span class="invalid-feedback">
                    اختر فصل
                    <span>
                        @enderror
            </div>
        </div>
    </div>
    <!--begin::Form group-->
    <div class="form-group">
        <label>ملف المشاركة</label>
        <div></div>
        <div class="custom-file">
            <input type="file" name="file" class="custom-file-input @error('file')
            is-invalid
            @enderror" id="customFile">
            <label class="custom-file-label" for="customFile">اختر ملف</label>
            @error('file')
            <span class="invalid-feedback">
                ادخل رابط أو ارفق ملف
                <span>
                    @enderror
        </div>
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('path')
        is-invalid
        @enderror""
            type=" text" placeholder="رابط" name="path" autocomplete="off" />
        @error('path')
        <span class="invalid-feedback">
            ادخل رابط أو ارفق ملف
            <span>
                @enderror
    </div>
    <!--begin::Form group-->
    <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
        <button type="submit"
            class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">مشاركة</button>
        {{-- <button type="button" id="kt_login_signup_cancel"
            class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
        --}}
    </div>
    <!--end::Form group-->
</form>


