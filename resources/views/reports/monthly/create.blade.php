@extends('layouts.app')
@section('action')
    <a href="{{ route('reports.monthly.index') }}" class="btn btn-primary">التقارير</a>
@endsection
@section('content')
    <div class="card card-custom card-transparent">
        <div class="card-body p-0">
            <!--begin: Wizard-->
            <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="false">
                <!--begin: Wizard Nav-->
                <div class="wizard-nav">
                    <div class="wizard-steps d-flex" data-total-steps="1">
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-wrapper">
                                <div class="wizard-number">1</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">إنشاء تقرير شهري :</div>
                                    {{-- <div class="wizard-desc">Setup Your Address</div> --}}
                                </div>
                            </div>
                        </div> <!-- البيانات الأساسية -->
                        
                    </div>
                </div>
                <!--end: Wizard Nav-->
                <!--begin: Wizard Body-->
                <div class="card card-custom card-shadowless rounded-top-0">
                    <div class="card-body p-0">
                        <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                            <div class="col-xl-12 col-xxl-7">
                                <form class="form mt-0 mt-lg-10 fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="post" action="{{ route('reports.monthly.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <div class="form-group">
                                            <label>إسم المدرسة</label>
                                            <input type="text"
                                            class="form-control form-control-solid form-control-lg"
                                            name="school" placeholder="أدخل إجابتك"
                                            value>
                                            <div class="fv-plugins-message-container"></div>
                                        </div> <!-- إسم النشاط -->
                                        <div class="form-group">
                                            <label>تاريخ التقرير</label>
                                            <input type="date"
                                            class="form-control form-control-solid form-control-lg"
                                            name="report_date" placeholder="أدخل إجابتك"
                                            value>
                                            <div class="fv-plugins-message-container"></div>
                                        </div> <!-- رقم النشاط -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>عدد الأنشطة المنفذة خارج المدارس</label>
                                                    <input type="number"
                                                    class="form-control form-control-solid form-control-lg"
                                                    name="q1" placeholder="أدخل إجابتك"
                                                    value>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- عدد الطلاب المشاركين -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>عدد الأنشطة المنفذة داخل المدارس</label>
                                                    <input type="number"
                                                    class="form-control form-control-solid form-control-lg"
                                                    name="q2" placeholder="أدخل إجابتك"
                                                    value>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- عدد الطلاب المنظمين -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>عدد الطلاب الذين اجتازوا اختبارات قياس التعرف على الموهوبين</label>
                                                    <input type="number"
                                                    class="form-control form-control-solid form-control-lg"
                                                    name="q3" placeholder="أدخل إجابتك"
                                                    value>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- عدد الطلاب الجمهور -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        عدد الطلاب المشاركين في برامج مؤسسة موهبة
                                                    </label>
                                                    <input type="number"
                                                    class="form-control form-control-solid form-control-lg"
                                                    name="q4" placeholder="أدخل إجابتك"
                                                    value>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- إجمالي عدد المشاركين -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        عدد الطلاب المشاركين في الأولمبياد العلمي
                                                    </label>
                                                    <input type="number"
                                                    class="form-control form-control-solid form-control-lg"
                                                    name="q5" placeholder="أدخل إجابتك"
                                                    value>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- إجمالي عدد المشاركين -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>
                                                        عدد الطلاب الذين حققوا مراكز متقدمة في النشاط
                                                    </label>
                                                    <input type="number"
                                                    class="form-control form-control-solid form-control-lg"
                                                    name="q6" placeholder="أدخل إجابتك"
                                                    value>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- إجمالي عدد المشاركين -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>عدد المعلمين الذين حققوا مراكز متقدمة</label>
                                                    <input type="number"
                                                    class="form-control form-control-solid form-control-lg"
                                                    name="q7" placeholder="أدخل إجابتك"
                                                    value>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                            </div><!-- إجمالي عدد المشاركين -->
                                        </div>
                                        
                                        
                                    </div> <!-- النشاط -->


                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button"
                                                class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                                                data-wizard-type="action-prev">السابق</button>
                                        </div>
                                        <div>
                                            <button type="button"
                                                class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                                data-wizard-type="action-submit">إنشاء تقرير</button>
                                            <button type="button"
                                                class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                                data-wizard-type="action-next">التالي</button>
                                        </div>
                                    </div>
                                </form>
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
                        text: "كل شيء سليم تريد إنشاء التقرير",
                        icon: "success",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم قم بإنشاء التقرير!",
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
                                text: "لم نقم بإنشاء التقرير",
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
    <script>
        // Class definition
        var KTFormRepeater = function() {

        // Private functions
        var demo3 = function() {
            $('.kt_repeater').repeater({
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
@endsection
