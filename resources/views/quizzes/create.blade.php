@extends('layouts.app')

@section('action')
    <a href="{{ route('quizzes') }}" class="btn btn-primary">الإختبارات</a>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form class="w-50 mx-auto" action="{{ route('quizzes.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-label">إسم الإختبار</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="level" class="form-label">المستوى</label>
                                <select name="level" class="form-control" required>
                                    <option value="مستوى أول">
                                        المستوى الأول</option>
                                    <option value="مستوى ثاني">
                                        المستوى الثاني</option>
                                    <option value="مستوى ثالث">
                                        المستوى التالث</option>
                                </select>
                            </div>
                            <button class="btn btn-primary">إنشاء</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection

{{-- @section('scripts')
<script>
    // Class definition
    var KTFormRepeater = function() {

    // Private functions
    var demo3 = function() {
        $('#kt_repeater_3').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
    }

    return {
        // public functions
        init: function() {
            demo3();
        }
    };
    }();

    jQuery(document).ready(function() {
    KTFormRepeater.init();
    });
</script>
@endsection --}}
