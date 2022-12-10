@extends('layouts.app')

@section('styles')
    <style>
        .scroll-y{overflow-y:scroll;position:relative}@media (max-width:991.98px){.scroll-y{overflow-y:auto}}.hover-scroll{position:relative}@media (min-width:992px){.hover-scroll{overflow:hidden;border-right:.4rem solid transparent;border-bottom:.4rem solid transparent;margin-right:-.4rem;margin-bottom:-.4rem}.hover-scroll:hover{overflow:scroll;border-right:0;border-bottom:0}@-moz-document url-prefix(){.hover-scroll{overflow:scroll;position:relative;border-right:0;border-bottom:0}}}@media (max-width:991.98px){.hover-scroll{overflow:auto}}.hover-scroll-y{position:relative}@media (min-width:992px){.hover-scroll-y{overflow-y:hidden;border-right:.4rem solid transparent;margin-right:-.4rem}.hover-scroll-y:hover{overflow-y:scroll;border-right:0}@-moz-document url-prefix(){.hover-scroll-y{overflow-y:scroll;position:relative;border-right:0}}}@media (max-width:991.98px){.hover-scroll-y{overflow-y:auto}}.hover-scroll-x{position:relative}@media (min-width:992px){.hover-scroll-x{overflow-x:hidden;border-bottom:.4rem solid transparent}.hover-scroll-x:hover{overflow-x:scroll;border-bottom:0}@-moz-document url-prefix(){.hover-scroll-x{overflow-x:scroll;position:relative;border-bottom:0}}}@media (max-width:991.98px){.hover-scroll-x{overflow-x:auto}}
        div::-webkit-scrollbar,main::-webkit-scrollbar,ol::-webkit-scrollbar,pre::-webkit-scrollbar,span::-webkit-scrollbar,ul::-webkit-scrollbar{width:.4rem;height:.4rem}div::-webkit-scrollbar-thumb,main::-webkit-scrollbar-thumb,ol::-webkit-scrollbar-thumb,pre::-webkit-scrollbar-thumb,span::-webkit-scrollbar-thumb,ul::-webkit-scrollbar-thumb{background-color:#eff2f5}div:hover,main:hover,ol:hover,pre:hover,span:hover,ul:hover{scrollbar-color:#e9edf1 transparent}div:hover::-webkit-scrollbar-thumb,main:hover::-webkit-scrollbar-thumb,ol:hover::-webkit-scrollbar-thumb,pre:hover::-webkit-scrollbar-thumb,span:hover::-webkit-scrollbar-thumb,ul:hover::-webkit-scrollbar-thumb{background-color:#e9edf1}}.scroll{overflow:scroll;position:relative}@media (max-width:991.98px){.scroll{overflow:auto}}.scroll-x{overflow-x:scroll;position:relative}@media (max-width:991.98px){.scroll-x{overflow-x:auto}}.scroll-y{overflow-y:scroll;position:relative}@media (max-width:991.98px){.scroll-y{overflow-y:auto}}.hover-scroll{position:relative}@media (min-width:992px){.hover-scroll{overflow:hidden;border-right:.4rem solid transparent;border-bottom:.4rem solid transparent;margin-right:-.4rem;margin-bottom:-.4rem}.hover-scroll:hover{overflow:scroll;border-right:0;border-bottom:0}@-moz-document url-prefix(){.hover-scroll{overflow:scroll;position:relative;border-right:0;border-bottom:0}}}@media (max-width:991.98px){.hover-scroll{overflow:auto}}.hover-scroll-y{position:relative}@media (min-width:992px){.hover-scroll-y{overflow-y:hidden;border-right:.4rem solid transparent;margin-right:-.4rem}.hover-scroll-y:hover{overflow-y:scroll;border-right:0}@-moz-document url-prefix(){.hover-scroll-y{overflow-y:scroll;position:relative;border-right:0}}}@media (max-width:991.98px){.hover-scroll-y{overflow-y:auto}}.hover-scroll-x{position:relative}@media (min-width:992px){.hover-scroll-x{overflow-x:hidden;border-bottom:.4rem solid transparent}.hover-scroll-x:hover{overflow-x:scroll;border-bottom:0}@-moz-document url-prefix(){.hover-scroll-x{overflow-x:scroll;position:relative;border-bottom:0}}}@media (max-width:991.98px){.hover-scroll-x{overflow-x:auto}}.hover-scroll-overlay-y{overflow-y:hidden;position:relative;--scrollbar-space:0.5rem}.hover-scroll-overlay-y::-webkit-scrollbar{width:calc(.4rem + var(--scrollbar-space))}.hover-scroll-overlay-y::-webkit-scrollbar-thumb{background-clip:content-box;border-right:var(--scrollbar-space) solid transparent}
        .card .card-header .card-title{display:flex;align-items:center;margin:.5rem;margin-left:0}.card .card-header .card-title.flex-column{align-items:flex-start;justify-content:center}.card .card-header .card-title .card-icon{margin-right:.75rem;line-height:0}.card .card-header .card-title .card-icon i{font-size:1.25rem;color:#7e8299;line-height:0}.card .card-header .card-title .card-icon i:after,.card .card-header .card-title .card-icon i:before{line-height:0}.card .card-header .card-title .card-icon .svg-icon svg{height:24px;width:24px}.card .card-header .card-title .card-icon .svg-icon svg [fill]:not(.permanent):not(g){transition:fill .3s ease;fill:#7e8299}.card .card-header .card-title .card-icon .svg-icon svg:hover [fill]:not(.permanent):not(g){transition:fill .3s ease}.card .card-header .card-title,.card .card-header .card-title .card-label{font-weight:500;font-size:1.275rem;color:#181c32}.card .card-header .card-title .card-label{margin:0 .75rem 0 0;flex-wrap:wrap}.card .card-header .card-title .small,.card .card-header .card-title small{color:#a1a5b7;font-size:1rem}.card .card-header .card-title .h1,.card .card-header .card-title .h2,.card .card-header .card-title .h3,.card .card-header .card-title .h4,.card .card-header .card-title .h5,.card .card-header .card-title .h6,.card .card-header .card-title h1,.card .card-header .card-title h2,.card .card-header .card-title h3,.card .card-header .card-title h4,.card .card-header .card-title h5,.card .card-header .card-title h6{margin-bottom:0}
        .btn.btn-text-gray-900{color:#181c32}.btn-check:active+.btn.btn-active-text-gray-900,.btn-check:checked+.btn.btn-active-text-gray-900,.btn.btn-active-text-gray-900.active,.btn.btn-active-text-gray-900.show,.btn.btn-active-text-gray-900:active:not(.btn-active),.btn.btn-active-text-gray-900:focus:not(.btn-active),.btn.btn-active-text-gray-900:hover:not(.btn-active),.show>.btn.btn-active-text-gray-900{color:#181c32}
        .btn.btn-text-gray-700{color:#5e6278}.btn-check:active+.btn.btn-active-text-gray-700,.btn-check:checked+.btn.btn-active-text-gray-700,.btn.btn-active-text-gray-700.active,.btn.btn-active-text-gray-700.show,.btn.btn-active-text-gray-700:active:not(.btn-active),.btn.btn-active-text-gray-700:focus:not(.btn-active),.btn.btn-active-text-gray-700:hover:not(.btn-active),.show>.btn.btn-active-text-gray-700{color:#5e6278}
        .text-gray-700{color:#5e6278!important}.text-gray-900{color:#181c32!important}
    </style>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
            <!--begin::Messenger-->
            <div class="card" id="kt_chat_messenger">
                <!--begin::Card header-->
                <div class="card-header" id="kt_chat_messenger_header">
                    <!--begin::Title-->
                    <div class="card-title">
                        <!--begin::User-->
                        <div class="d-flex justify-content-center me-3 mb-2">
                            <a href="{{ route('users.show', ['id' => $ticket->userid]) }}" class="text-gray-900 text-hover-primary me-1">{{ $ticket->username }}</a>
                            <span class="text-gray-700"> &nbsp; | &nbsp; {{ $ticket->title }}</span>
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body" id="kt_chat_messenger_body">
                    <!--begin::Messages-->
                    <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" style="max-height: 50vh;">
                        @foreach ($messages as $message)
                            @if ($message->sender == 0)
                                <!--begin::Message(in)-->
                                <div class="d-flex justify-content-start mb-10">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column align-items-start">
                                        <!--begin::Text-->
                                        <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                                            {{ $message->body }}
                                            @if (isset($message->attachment))
                                                <img src="{{ asset($message->attachment) }}" class="img-thumbnail d-block">
                                            @endif
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Message(in)-->
                            @else
                                <!--begin::Message(out)-->
                                <div class="d-flex justify-content-end mb-10">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column align-items-end">
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Details-->
                                            <div class="mx-3">
                                                <a href="{{ route('users.show', ['id' => $ticket->userid]) }}" class="fs-5 fw-bolder text-gray-900 text-hover-secondary me-1">{{ explode(' ', $ticket->username)[0] }}</a>
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="{{ asset($ticket->avatar ?? 'assets/media/users/default.jpg') }}">
                                            </div>
                                            <!--end::Avatar-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Text-->
                                        <div class="p-5 rounded bg-light-secondary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                                            {{ $message->body }}
                                            @if (isset($message->attachment))
                                                <img src="{{ asset($message->attachment) }}" class="img-thumbnail d-block">
                                            @endif
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Message(out)-->
                            @endif
                        @endforeach
                    </div>
                    <!--end::Messages-->
                </div>
                <!--end::Card body-->
                @if ($ticket->status == 1)
                    <!--begin::Card footer-->
                    <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                        <form action="{{ route('message.ticket.inquires', ['id' => $ticket->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Input-->
                            <textarea class="form-control form-control-flush mb-3" rows="3" name="message_body" data-kt-element="input" placeholder="أكتب رسالتك" required>{{ old('message_body') }}</textarea>
                            @error('message_body')
                                <a class="text-danger text-sm">{{ $errors->first('message_body') }}</a>
                            @enderror
                            <!--end::Input-->
                            <!--begin:Toolbar-->
                            <div class="d-flex flex-stack justify-content-between">
                                <!--begin::Actions-->
                                <div class="d-flex me-2">
                                    <label for="attachment" class="btn btn-sm btn-icon btn-active-light-primary me-1 w-auto">
                                        <i class="fas fa-paperclip"></i>
                                        <input type="file" name="attachment" id="attachment" hidden accept="image/*,audio/*,video/*">
                                        <a class="text-muted text-sm mx-2" id="filename"></a>
                                        @error('attachment')
                                            <a class="text-danger text-sm">{{ $errors->first('attachment') }}</a>
                                        @enderror
                                    </label>
                                </div>
                                <!--end::Actions-->
                                <!--begin::Send-->
                                <button class="btn btn-primary" type="submit" data-kt-element="send">إرسال</button>
                                <!--end::Send-->
                            </div>
                            <!--end::Toolbar-->
                        </form>
                    </div>
                    <!--end::Card footer-->
                @endif
            </div>
            <!--end::Messenger-->
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#attachment').change(function() {
                var file = $('#attachment')[0].files[0].name;
                $('#filename').text(file);
            });
            $(".scroll-y").animate({ scrollTop: $('.scroll-y')[0].scrollHeight }, 1000);
        })
    </script>
@endsection 