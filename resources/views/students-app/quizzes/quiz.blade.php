@extends('layouts.student')

@section('content')
    @php
        $i = 1;
    @endphp
        <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="false">
            <!--begin: Wizard Nav-->
            <div class="wizard-nav">
                <div class="wizard-steps d-flex" data-total-steps="4">
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                        <div class="wizard-wrapper">
                            <div class="wizard-number">1</div>
                            <div class="wizard-label">
                                <div class="wizard-title">الاستدلال اللغوى وفهم المقروء :</div>
                                {{-- <div class="wizard-desc">Setup Your Address</div> --}}
                            </div>
                        </div>
                    </div> <!-- الاستدلال اللغوى وفهم المقروء -->
                    <div  class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                            <div class="wizard-number">2</div>
                            <div class="wizard-label">
                                <div class="wizard-title">الاستدلال الرياضي والمكاني :</div>
                                {{-- <div class="wizard-desc">Payment Options</div> --}}
                            </div>
                        </div>
                    </div> <!-- الاستدلال الرياضي والمكاني -->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                            <div class="wizard-number">3</div>
                            <div class="wizard-label">
                                <div class="wizard-title">الاستدلال العلمي والميكانيكي :</div>
                                {{-- <div class="wizard-desc">Review and Submit</div> --}}
                            </div>
                        </div>
                    </div> <!-- الاستدلال العلمي والميكانيكي-->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                            <div class="wizard-number">4</div>
                            <div class="wizard-label">
                                <div class="wizard-title">المرونة العقليه :</div>
                                {{-- <div class="wizard-desc">Review and Submit</div> --}}
                            </div>
                        </div>
                    </div> <!-- إجراءات الدرس -->
                </div>
            </div>
            <!--end: Wizard Nav-->
            <!--begin: Wizard Body-->
            <div class="card card-custom card-shadowless rounded-top-0">
                <div class="card-body p-0">
                    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                        <div class="col-xl-12 col-xxl-7">
                            <form class="form mt-0 mt-lg-10 fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="post" action="{{ route('quiz.store' , ['id' => $quiz->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    @foreach ($questions1 as $q)
                                    <div class="form-group">
                                        <label>
                                            {{ $q->name }}
                                            <span class="badge badge-info">{{ $q->mark }} نقطة</span>
                                        </label>
                                        @if($q->file)
                                        <audio controls>
                                            <source src="{{ asset($q->file) }}" type="audio/wav">
                                            <source src="{{ asset($q->file) }}" type="audio/mp3">
                                            Your browser does not support the audio element.
                                        </audio>
                                        @endif
                                        <div class="d-flex justify-content-between">
                                            @php
                                                $arr = $q->answers->toArray();
                                                shuffle($arr);
                                            @endphp
                                            @foreach ($arr as $r)
                                            @if ($loop->index == 0)
                                            <input hidden type="radio" name="q[{{$i}}][answer]" value="null" checked >
                                            @endif
                                            <div>
                                                <label>{{ $r['name'] }}</label>
                                                <input type="text" name="q[{{$i}}][question]" value="{{ $q->id }}" hidden>
                                                <input type="radio" name="q[{{$i}}][answer]" value="{{ $r['name'] }}">
                                            </div>
                                            @endforeach
                                            @php
                                                $i++;
                                            @endphp
                                        </div>
                                    </div>
                                    @endforeach
                                </div> <!-- الاستدلال اللغوى وفهم المقروء  -->
                                <div class="pb-5" data-wizard-type="step-content">
                                    @foreach ($questions2 as $q)
                                    <div class="form-group">
                                        <label>{{ $q->name }}
                                            <span class="badge badge-info">{{ $q->mark }} نقطة</span>
                                        </label>
                                        @if($q->file)
                                        <audio controls>
                                            <source src="{{ asset($q->file) }}" type="audio/wav">
                                            <source src="{{ asset($q->file) }}" type="audio/mp3">
                                            Your browser does not support the audio element.
                                        </audio>
                                        @endif
                                        <div class="d-flex justify-content-between">
                                            @php
                                                $arr = $q->answers->toArray();
                                                shuffle($arr);
                                            @endphp
                                            @foreach ($arr as $r)
                                            @if ($loop->index == 0)
                                            <input hidden type="radio" name="q[{{$i}}][answer]" value="null" checked >
                                            @endif
                                            <div>
                                                <label>{{ $r['name'] }}</label>
                                                <input type="text" name="q[{{$i}}][question]" value="{{ $q->id }}" hidden>
                                                <input type="radio" name="q[{{$i}}][answer]" value="{{ $r['name'] }}">
                                            </div>
                                            @endforeach
                                            @php
                                                $i++;
                                            @endphp
                                        </div>
                                    </div>
                                    @endforeach
                                </div><!-- الاستدلال الرياضي والمكاني -->
                                <div class="pb-5" data-wizard-type="step-content">
                                    @foreach ($questions3 as $q)
                                    <div class="form-group">
                                        <label>{{ $q->name }}
                                            <span class="badge badge-info">{{ $q->mark }} نقطة</span>
                                        </label>
                                        @if($q->file)
                                        <audio controls>
                                            <source src="{{ asset($q->file) }}" type="audio/wav">
                                            <source src="{{ asset($q->file) }}" type="audio/mp3">
                                            Your browser does not support the audio element.
                                        </audio>
                                        @endif
                                        <div class="d-flex justify-content-between">
                                            @php
                                                $arr = $q->answers->toArray();
                                                shuffle($arr);
                                            @endphp
                                            @foreach ($arr as $r)
                                            @if ($loop->index == 0)
                                            <input hidden type="radio" name="q[{{$i}}][answer]" value="null" checked >
                                            @endif
                                            <div>
                                                <label>{{ $r['name'] }}</label>
                                                <input type="text" name="q[{{$i}}][question]" value="{{ $q->id }}" hidden>
                                                <input type="radio" name="q[{{$i}}][answer]" value="{{ $r['name'] }}">
                                            </div>
                                            @endforeach
                                            @php
                                                $i++;
                                            @endphp
                                        </div>
                                    </div>
                                    @endforeach
                                </div><!-- الاستدلال العلمي والميكانيكي -->
                                <div class="pb-5" data-wizard-type="step-content">
                                    @foreach ($questions4 as $q)
                                    <div class="form-group">
                                        <label>{{ $q->name }}
                                            <span class="badge badge-info">{{ $q->mark }} نقطة</span>
                                        </label>
                                        @if($q->file)
                                        <audio controls>
                                            <source src="{{ asset($q->file) }}" type="audio/wav">
                                            <source src="{{ asset($q->file) }}" type="audio/mp3">
                                            Your browser does not support the audio element.
                                        </audio>
                                        @endif
                                        <div class="d-flex justify-content-between">
                                            @php
                                                $arr = $q->answers->toArray();
                                                shuffle($arr);
                                            @endphp
                                            @foreach ($arr as $r)
                                            @if ($loop->index == 0)
                                            <input hidden type="radio" name="q[{{$i}}][answer]" value="null" checked >
                                            @endif
                                            <div>
                                                <label>{{ $r['name'] }}</label>
                                                <input type="text" name="q[{{$i}}][question]" value="{{ $q->id }}" hidden>
                                                <input type="radio" name="q[{{$i}}][answer]" value="{{ $r['name'] }}">
                                            </div>
                                            @endforeach
                                            @php
                                                $i++;
                                            @endphp
                                        </div>
                                    </div>
                                    @endforeach
                                </div><!-- المرونة العقليه -->
                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div class="mr-2">
                                        <button type="button"
                                            class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                                            data-wizard-type="action-prev">السابق</button>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                            data-wizard-type="action-submit">إنهاء الإختبار</button>
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
                        text: "كل شيء سليم تريد فعلا إنهاء الإختبار",
                        icon: "success",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم قم بإنهاء الإختبار",
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
                                text: "لم نقم بإنهاء الإختبار",
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

@section('action')
    <a href="/" class="btn btn-success mr-2">الرئيسية</a>
    <a href="{{ route('student.info') }}" class="btn btn-info">معلوماتي الشخصية</a>
@endsection
