@extends('layouts.app')
@section('action')
    <a href="{{ route('ratings.my') }}" class="btn btn-primary">الزيارات</a>
@endsection
@section('content')
    <div class="card card-custom card-transparent">
        <div class="card-body p-0">
            <!--begin: Wizard-->
            <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="false">
                <!--begin: Wizard Nav-->
                <div class="wizard-nav">
                    <div class="wizard-steps d-flex" data-total-steps="6">
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-wrapper">
                                <div class="wizard-number">1</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">البيانات الأساسية :</div>
                                    {{-- <div class="wizard-desc">Setup Your Address</div> --}}
                                </div>
                            </div>
                        </div> <!-- البيانات الأساسية -->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-wrapper">
                                <div class="wizard-number">2</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">التخطيط للتدريس :</div>
                                    {{-- <div class="wizard-desc">Payment Options</div> --}}
                                </div>
                            </div>
                        </div> <!-- التخطيط للتدريس -->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-wrapper">
                                <div class="wizard-number">3</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">إجراءات الدرس :</div>
                                    {{-- <div class="wizard-desc">Review and Submit</div> --}}
                                </div>
                            </div>
                        </div> <!-- إجراءات الدرس -->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-wrapper">
                                <div class="wizard-number">4</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">إدارة الصف :</div>
                                    {{-- <div class="wizard-desc">Review and Submit</div> --}}
                                </div>
                            </div>
                        </div> <!-- إدارة الصف -->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-wrapper">
                                <div class="wizard-number">5</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">التقويم :</div>
                                    {{-- <div class="wizard-desc">Review and Submit</div> --}}
                                </div>
                            </div>
                        </div> <!-- التقويم -->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-wrapper">
                                <div class="wizard-number">6</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">الملاحظات :</div>
                                    {{-- <div class="wizard-desc">Review and Submit</div> --}}
                                </div>
                            </div>
                        </div> <!-- الملاحظات -->
                    </div>
                </div>
                <!--end: Wizard Nav-->
                <!--begin: Wizard Body-->
                <div class="card card-custom card-shadowless rounded-top-0">
                    <div class="card-body p-0">
                        <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                            <div class="col-xl-12 col-xxl-7">
                                <!--begin: Wizard Form-->
                                <form class="form mt-0 mt-lg-10 fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="post" action="{{ route('ratings.update',['id' => $rating->id]) }}">
                                    @csrf
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <div class="form-group">
                                            <label>إسم المعلم</label>
                                            <select name="teacher_id"
                                                class="form-control form-control-solid form-control-lg">
                                                <option value>أدخل إجابتك</option>
                                                @foreach ($teachers as $t)
                                                    <option value="{{ $t->id }}"
                                                    @if($rating->teacher_id == $t->id)
                                                        selected
                                                    @endif
                                                    >{{ $t->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="fv-plugins-message-container"></div>
                                        </div> <!-- إسم المعلم -->
                                        <div class="form-group">
                                            <label>التخصص</label>
                                            <select name="takhasos" class="form-control form-control-solid form-control-lg">
                                                <option value>أدخل إجابتك</option>
                                                @foreach ($takhasosat as $t)
                                                    <option value="{{ $t }}"
                                                    @if($rating->takhasos == $t)
                                                        selected
                                                    @endif
                                                    >{{ $t }}</option>
                                                @endforeach
                                            </select>
                                            <div class="fv-plugins-message-container"></div>
                                        </div> <!-- التخصص -->

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>مادة التدريس</label>
                                                    <select name="madat_tadriss"
                                                        class="form-control form-control-solid form-control-lg">
                                                        <option value>أدخل إجابتك</option>
                                                        @foreach ($mawad as $m)
                                                            <option value="{{ $m }}"
                                                            @if($rating->madat_tadriss == $m)
                                                                selected
                                                            @endif
                                                            >{{ $m }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- مادة التدريس -->
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>الحصة</label>
                                                    <select name="seance_title"
                                                        class="form-control form-control-solid form-control-lg">
                                                        <option value>أدخل إجابتك</option>
                                                        @foreach ($seances as $s)
                                                            <option value="{{ $s }}"
                                                            @if($rating->seance_title == $s)
                                                            selected
                                                        @endif
                                                            >{{ $s }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- الحصة -->
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>الصف</label>
                                                    <select name="al_saf"
                                                        class="form-control form-control-solid form-control-lg">
                                                        <option value>أدخل إجابتك</option>
                                                        @foreach ($classes as $m)
                                                            <option value="{{ $m }}"
                                                            @if($rating->al_saf == $m->name)
                                                                selected
                                                            @endif
                                                            >{{ $m->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- الصف -->
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>الفصل</label>
                                                    <select name="al_fasle"
                                                        class="form-control form-control-solid form-control-lg">
                                                        <option value>أدخل إجابتك</option>
                                                        @foreach ($groupes as $s)
                                                            <option value="{{ $s }}"
                                                            @if($rating->al_fasle == $s->name)
                                                            selected
                                                        @endif
                                                            >{{ $s->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- الفصل -->
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>عنوان الدرس</label>
                                                    <input type="text"
                                                        class="form-control form-control-solid form-control-lg"
                                                        name="course_title" placeholder="أدخل إجابتك"
                                                        value="{{ $rating->course_title }}">
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- عنوان الدرس -->
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>التاريخ</label>
                                                    <div class="input-group">
                                                        <input type="text" name="date"
                                                            value="{{ $rating->date }}"
                                                            class="form-control hijri-date-default form-control-solid form-control-lg"
                                                            placeholder="أدخل إجابتك" required />
                                                    </div>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- التاريخ -->
                                        </div>
                                    </div> <!-- البيانات الأساسية -->

                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>عرض أهداف الدرس</label>
                                                    <select name="q1"
                                                        class="form-control form-control-solid form-control-lg">
                                                        <option value>أدخل إجابتك</option>
                                                        @foreach ($grades as $g)
                                                            <option value="{{ $g }}"
                                                                @if($rating->q1 == $g)
                                                                selected
                                                            @endif
                                                            >
                                                                {{ $g }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- عرض أهداف الدرس -->
                                        </div>
                                    </div> <!-- التخطيط للتدريس -->

                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>مناسبة اجراءات الدرس</label>
                                                    <select name="q2"
                                                        class="form-control form-control-solid form-control-lg">
                                                        <option value>أدخل إجابتك</option>
                                                        @foreach ($grades as $g)
                                                            <option value="{{ $g }}"
                                                            @if($rating->q2 == $g)
                                                            selected
                                                        @endif
                                                            >{{ $g }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- مناسبة اجراءات الدرس -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>فعالية الوسيلة التعليمية</label>
                                                    <select name="q3"
                                                        class="form-control form-control-solid form-control-lg">
                                                        <option value>أدخل إجابتك</option>
                                                        @foreach ($grades as $g)
                                                            <option value="{{ $g }}"
                                                            @if($rating->q3 == $g)
                                                                selected
                                                            @endif
                                                            >{{ $g }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- فعالية الوسيلة التعليمية -->
                                        </div>
                                    </div> <!-- إجراءات الدرس -->

                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>إدارة وقت التعلم</label>
                                                    <select name="q4"
                                                        class="form-control form-control-solid form-control-lg">
                                                        <option value>أدخل إجابتك</option>
                                                        @foreach ($grades as $g)
                                                            <option value="{{ $g }}"
                                                            @if($rating->q4 == $g)
                                                            selected
                                                        @endif
                                                            >{{ $g }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- إدارة وقت التعلم  -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>ضبط الصف</label>
                                                    <select name="q5"
                                                        class="form-control form-control-solid form-control-lg">
                                                        <option value>أدخل إجابتك</option>
                                                        @foreach ($grades as $g)
                                                            <option value="{{ $g }}"
                                                            @if($rating->q5 == $g)
                                                                selected
                                                            @endif
                                                            >{{ $g }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- ضبط الصف -->
                                        </div>
                                    </div> <!-- إدارة الصف -->

                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>تفعيل أدوات التقويم</label>
                                                    <select name="q6"
                                                        class="form-control form-control-solid form-control-lg">
                                                        <option value>أدخل إجابتك</option>
                                                        @foreach ($grades as $g)
                                                            <option value="{{ $g }}"
                                                            @if($rating->q6 == $g)
                                                                selected
                                                            @endif
                                                            >{{ $g }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- تفعيل أدوات التقويم  -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>تفعيل مراحل التقويم</label>
                                                    <select name="q7"
                                                        class="form-control form-control-solid form-control-lg">
                                                        <option value>أدخل إجابتك</option>
                                                        @foreach ($grades as $g)
                                                            <option value="{{ $g }}"
                                                            @if($rating->q7 == $g)
                                                                selected
                                                            @endif>{{ $g }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- تفعيل مراحل التقويم -->
                                        </div>
                                    </div> <!-- التقويم -->

                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>النواحي الإيجابية</label>
                                                    <input type="text" name="q8" placeholder="أدخل إجابتك" value="{{ $rating->q8 }}"
                                                        class="form-control form-control-solid form-control-lg" required />
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- النواحي الإيجابية -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>فرص التحسين</label>
                                                    <input type="text" name="q9" placeholder="أدخل إجابتك" value="{{ $rating->q9 }}"
                                                        class="form-control form-control-solid form-control-lg" required />
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- فرص التحسين -->
                                        </div>
                                    </div> <!-- الملاحظات -->

                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button"
                                                class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                                                data-wizard-type="action-prev">السابق</button>
                                        </div>
                                        <div>
                                            <button type="button"
                                                class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                                data-wizard-type="action-submit">تعديل زيارة</button>
                                            <button type="button"
                                                class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                                data-wizard-type="action-next">التالي</button>
                                        </div>
                                    </div>
                                    <!--end: Wizard Actions-->
                                    <div></div>
                                    <div></div>
                                </form>
                                <!--end: Wizard Form-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end: Wizard Bpdy-->
            </div>
            <!--end: Wizard-->
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('assets/css/pages/wizard/wizard-4.rtl.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script>
        "use strict";


        // Class definition
        var KTEcommerceCheckout = function() {
            // Base elements
            var _wizardEl;
            var _formEl;
            var _wizardObj;
            var _validations = [];

            // Private functions
            var _initWizard = function() {
                // Initialize form wizard
                _wizardObj = new KTWizard(_wizardEl, {
                    startStep: 1, // initial active step number
                    clickableSteps: false // allow step clicking
                });

                // Validation before going to next page
                _wizardObj.on('change', function(wizard) {
                    if (wizard.getStep() > wizard.getNewStep()) {
                        return; // Skip if stepped back
                    }

                    // Validate form before change wizard step
                    var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

                    if (validator) {
                        validator.validate().then(function(status) {
                            if (status == 'Valid') {
                                wizard.goTo(wizard.getNewStep());

                                KTUtil.scrollTop();
                            } else {
                                Swal.fire({
                                    text: "هناك بعض الأخطاء",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "حسنا",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            }
                        });
                    }

                    return false; // Do not change wizard step, further action will be handled by he validator
                });

                // Change event
                _wizardObj.on('changed', function(wizard) {
                    KTUtil.scrollTop();
                });

                // Submit event
                _wizardObj.on('submit', function(wizard) {
                    Swal.fire({
                        text: "كل شيء سليم تريد تعديل الزيارة",
                        icon: "success",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم قم بتعديل الزيارة!",
                        cancelButtonText: "لا قم بالتراجع",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-primary",
                            cancelButton: "btn font-weight-bold btn-default"
                        }
                    }).then(function(result) {
                        if (result.value) {
                            _formEl.submit(); // Submit form
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: "لم نقم بتعديل الزيارة",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "حسنا",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-primary",
                                }
                            });
                        }
                    });
                });
            }

            var _initValidation = function() {
                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                // Step 1
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            teacher_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار معلم'
                                    },
                                    // regexp: {
                                    //     regexp: /^\d+$/,
                                    //     message: 'المرجو إختيار معلم',
                                    // },
                                }
                            },
                            takhasos: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار التخصص'
                                    },
                                    // regexp: {
                                    //     regexp: /^\d+$/,
                                    //     message: 'المرجو إختيار التخصص',
                                    // },
                                }
                            },
                            madat_tadriss: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار مادة التدريس'
                                    },
                                    // regexp: {
                                    //     regexp: /^\d+$/,
                                    //     message: 'المرجو إختيار مادة التدريس',
                                    // },
                                }
                            },
                            seance_title: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار الحصة'
                                    },
                                    // regexp: {
                                    //     // regexp: /^\d+$/,
                                    //     regexp: /^[^-1]$/,
                                    //     message: 'المرجو إختيار الحصة',
                                    // },
                                }
                            },
                            course_title: {
                                validators: {
                                    notEmpty: {
                                        message: 'عنوان الدرس فارغ'
                                    },
                                }
                            },
                            al_fasle: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار الفصل'
                                    },
                                }
                            },
                            al_saf: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار الصف'
                                    },
                                }
                            },
                            date: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو تحديد التاريخ'
                                    },
                                    regexp: {
                                        regexp: /^[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}$/,
                                        message: 'طريقة كتابة التاريخ خاطئة جرب 01-01-1400',
                                    },
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));
                // Step 2
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            q1: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار عرض أهداف الدرس'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));
                // Step 3
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            q2: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار مناسبة اجراءات الدرس'
                                    }
                                }
                            },
                            q3: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار فعالية الوسيلة التعليمية'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));
                // Step 4
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            q4: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار إدارة وقت التعلم'
                                    }
                                }
                            },
                            q5: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار ضبط الصف'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));
                // Step 5
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            q6: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار تفعيل أدوات التقويم'
                                    }
                                }
                            },
                            q7: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إختيار تفعيل مراحل التقويم'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));
                // Step 6
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            q8: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إدخال النواحي الإيجابية'
                                    }
                                }
                            },
                            q9: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرجو إدخال فرص التحسين'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));
            }

            return {
                // public functions
                init: function() {
                    _wizardEl = KTUtil.getById('kt_wizard');
                    _formEl = KTUtil.getById('kt_form');

                    _initWizard();
                    _initValidation();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTEcommerceCheckout.init();
        });
    </script>
@endsection
