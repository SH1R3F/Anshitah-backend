@extends('layouts.app')
@section('action')
<a href="{{ route('plans') }}" class="btn btn-primary">الخطط</a>
@endsection
@section('content')
<div class="card card-custom card-transparent">
    <div class="card-body p-0">
        <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="false">
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
                                <div class="wizard-title">التاريخ :</div>
                                {{-- <div class="wizard-desc">Payment Options</div> --}}
                            </div>
                        </div>
                    </div> <!-- التاريخ -->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                            <div class="wizard-number">3</div>
                            <div class="wizard-label">
                                <div class="wizard-title">مؤشرات الأداء :</div>
                                {{-- <div class="wizard-desc">Review and Submit</div> --}}
                            </div>
                        </div>
                    </div> <!-- مؤشرات الأداء -->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                            <div class="wizard-number">4</div>
                            <div class="wizard-label">
                                <div class="wizard-title">نقط القياس و نسبة التحقق :</div>
                                {{-- <div class="wizard-desc">Review and Submit</div> --}}
                            </div>
                        </div>
                    </div> <!-- نقط القياس و نسبة التحقق -->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                            <div class="wizard-number">5</div>
                            <div class="wizard-label">
                                <div class="wizard-title">الإجراءات :</div>
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
            <div class="card card-custom card-shadowless rounded-top-0">
                <div class="card-body p-0">
                    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                        <div class="col-xl-12 col-xxl-7">
                            <!--begin: Wizard Form-->
                            <form class="form mt-0 mt-lg-10 fv-plugins-bootstrap fv-plugins-framework" id="kt_form"
                                method="post" action="{{ route('plans.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>المجال الأول</label>
                                                <input class="form-control" type="text" name="majal_awl">
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div> <!-- المجال الأول -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>الهدف الإستراتيجي</label>
                                                <input class="form-control" type="text" name="hadf_istratiji">
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div> <!-- الهدف الإستراتيجي -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>الهدف التشغيلي</label>
                                                <input class="form-control" type="text" name="hadf_tachghili">
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div> <!-- الهدف التشغيلي -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>مهمة / برنامج</label>
                                                <input class="form-control" type="text" name="mohima">
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div> <!-- مهمة / برنامج -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>وصف المهمة / البرنامج</label>
                                                <input class="form-control" type="text" name="wasf_mohima">
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div> <!-- وصف المهمة / البرنامج -->
                                    </div>
                                </div> <!-- البيانات الأساسية -->

                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>من</label>
                                                <div class="input-group">
                                                    <input type="text" name="date_start"
                                                        class="form-control hijri-date-default form-control-solid form-control-lg"
                                                        placeholder="أدخل إجابتك" required />
                                                </div>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div><!-- من -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>إلى</label>
                                                <div class="input-group">
                                                    <input type="text" name="date_end"
                                                        class="form-control hijri-date-default form-control-solid form-control-lg"
                                                        placeholder="أدخل إجابتك" required />
                                                </div>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div><!-- إلى -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>المدة</label>
                                                <input class="form-control" type="text" name="al_moda">
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div><!-- المدة -->
                                    </div>
                                </div> <!-- التاريخ -->

                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>مؤشر الأداء للإدارة</label>
                                                <textarea class="kt-tinymce" class="tox-target" name="adaa_idara"
                                                    cols="30" rows="5"></textarea>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div><!-- مؤشر الأداء للإدارة -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>مؤشر الأداء للمدارس</label>
                                                <textarea class="kt-tinymce" name="adaa_madariss" cols="30"
                                                    rows="5"></textarea>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div><!-- مؤشر الأداء للمدارس -->
                                    </div>
                                </div> <!-- مؤشرات الأداء -->

                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>نقط القياس و نسبة التحقق </label>
                                                <textarea class="kt-tinymce" name="nokat_qiass" cols="30"
                                                    rows="5"></textarea>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div><!-- نقط القياس و نسبة التحقق	 -->
                                    </div>
                                </div> <!-- نقط القياس و نسبة التحقق -->

                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>الإجراءات</label>
                                                <textarea class="kt-tinymce" name="ijraat" cols="30"
                                                    rows="5"></textarea>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div id="kt_repeater_3">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label text-right">الاجراء</label>
                                                    <div data-repeater-list="array" class="col-lg-9">
                                                        <div data-repeater-item class="form-group row">
                                                            <div class="col-lg-5">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" name="name" class="form-control"
                                                                        placeholder="الاجراء" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-envelope"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="file" name="file" class="form-control"
                                                                        placeholder="الملف" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <a href="javascript:;" data-repeater-delete="array"
                                                                    class="btn font-weight-bold btn-danger btn-icon">
                                                                    <i class="la la-remove"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-3"></div>
                                                    <div class="col">
                                                        <div data-repeater-create="array"
                                                            class="btn font-weight-bold btn-primary">
                                                            <i class="la la-plus"></i>
                                                            اجراء جديد
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- الإجراءات  -->
                                    </div>
                                </div> <!-- الإجراءات -->

                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>أماكن التنفيذ</label>
                                                <textarea class="kt-tinymce" name="amakin_tanfid" cols="30"
                                                    rows="5"></textarea>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div><!-- أماكن التنفيذ -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>أساليب التنفيذ</label>
                                                <textarea class="kt-tinymce" name="asalib_tanfid" cols="30"
                                                    rows="5"></textarea>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div><!-- أساليب التنفيذ -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>الجهات المساندة</label>
                                                <textarea class="kt-tinymce" name="aljihat_mosanida" cols="30"
                                                    rows="5"></textarea>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div><!-- الجهات المساندة -->
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
                                            data-wizard-type="action-submit">إنشاء خطة</button>
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
        </div>
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
                        text: "كل شيء سليم تريد إنشاء الخطة",
                        icon: "success",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم قم بإنشاء الخطة",
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
                                text: "لم نقم بإنشاء الخطة",
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
                            majal_awl: {
                                validators: {
                                    notEmpty: {
                                        message: 'المجال الأول فارغ'
                                    },
                                }
                            },
                            hadf_istratiji: {
                                validators: {
                                    notEmpty: {
                                        message: 'الهدف الإستراتيجي فارغ'
                                    },
                                }
                            },
                            hadf_tachghili: {
                                validators: {
                                    notEmpty: {
                                        message: 'الهدف التشغيلي فارغ'
                                    },
                                }
                            },
                            mohima: {
                                validators: {
                                    notEmpty: {
                                        message: 'مهمة / برنامج	 فارغ'
                                    },
                                }
                            },
                            wasf_mohima: {
                                validators: {
                                    notEmpty: {
                                        message: 'وصف المهمة / البرنامج	 فارغ'
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
                            date_start: {
                                validators: {
                                    notEmpty: {
                                        message: 'التاريخ فارغ'
                                    }
                                }
                            },
                            date_end: {
                                validators: {
                                    notEmpty: {
                                        message: 'التاريخ فارغ'
                                    }
                                }
                            },
                            al_moda: {
                                validators: {
                                    notEmpty: {
                                        message: 'المدة فارغة'
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
                            // adaa_idara: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: 'مؤشر الأداء للإدارة فارغ'
                            //         }
                            //     }
                            // },
                            // adaa_madariss: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: 'مؤشر الأداء للمدارس فارغ'
                            //         }
                            //     }
                            // },
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
                        // fields: {
                        //     nokat_qiass: {
                        //         validators: {
                        //             notEmpty: {
                        //                 message: 'نقط القياس و نسبة التحقق فارغ'
                        //             }
                        //         }
                        //     },
                        // },
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
                        // fields: {
                        //     ijraat: {
                        //         validators: {
                        //             notEmpty: {
                        //                 message: 'الإجراءات فارغة'
                        //             }
                        //         }
                        //     },
                        // },
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
                        // fields: {
                        //     amakin_tanfid: {
                        //         validators: {
                        //             notEmpty: {
                        //                 message: 'أماكن التنفيذ فارغة'
                        //             }
                        //         }
                        //     },
                        //     asalib_tanfid: {
                        //         validators: {
                        //             notEmpty: {
                        //                 message: 'أساليب التنفيذ فارغة'
                        //             }
                        //         }
                        //     },
                        //     aljihat_mosanida: {
                        //         validators: {
                        //             notEmpty: {
                        //                 message: 'الجهات المساندة فارغة'
                        //             }
                        //         }
                        //     },
                        // },
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
<script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
{{-- <script src="{{ asset('assets/js/pages/crud/forms/widgets/form-repeater.js') }}"></script> --}}
<script>
    var KTTinymce = function () {
    // Private functions
    var demos = function () {
        tinymce.init({
            selector: '.kt-tinymce'
        });
    }

    return {
        // public functions
        init: function() {
            demos();
        }
    };
    }();
    // Initialization
    jQuery(document).ready(function() {
        KTTinymce.init();
    });
</script>
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
@endsection
