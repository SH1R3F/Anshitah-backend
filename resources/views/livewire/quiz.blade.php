<div  class="bg-white p-2 rounded">
    <div class="d-flex justify-content-between align-items-center py-2">
        <span class="badge badge-secondary" style="font-family: sans-serif !important; font-weight: bold">
            اسم الإختبار : {{ $quiz->name }}
        </span>
        <span id="time" class="badge badge-danger"></span>
    </div>
    <div class="container" >
        <form id="regForm" action="{{  route('quiz.done' , ['quiz' => $quiz->id]) }}" method="post">
            @csrf
            @php
            $i = 0;
            @endphp
            @foreach ($exam as $st)
            @foreach ($st->questions as $q)
            <div class="tab">
                <h3 class="text-center alert alert-info" style="font-family: sans-serif !important; font-weight: bold">{{ $st->step->name }}</h3>
                <div class="row">
                    <div class="col-6">
                        <p class="alert alert-success d-flex justify-content-between align-items-center" style="font-family: sans-serif !important; font-weight: bold">
                                <span style="font-family: sans-serif !important; font-weight: bold">
                                    {{ 'السؤال : ' . $q->question->name }}
                                </span>
                        </p>
                        <span>
                            @if($q->question->audio)
                            <a style="border: 2px solid" href="javascript:void(0)" onclick="play('https://anshitah.com/quiz/public/{{ $q->question->audio }}')" class="btn btn-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M2 6h3.828c-1.335 2.905-1.335 9.096 0 12h-3.828c-1.311-1.108-2-3.551-2-5.995 0-2.45.692-4.9 2-6.005zm22 6.005c.005 8.031-3.145 12.864-6.121 11.864-.774-.26-9.567-5.579-9.567-5.579-1.993-2.22-1.993-10.288 0-12.508 0 0 9.161-5.476 9.548-5.633 2.691-1.086 6.136 3.82 6.14 11.856zm-3.383-7.693c-1.053-2.264-3.002-2.226-4.034.002-.588 1.271-.993 3.165-1.21 4.797h.527c1.587 0 2.873 1.287 2.873 2.875s-1.286 2.875-2.873 2.875h-.515c.217 1.603.616 3.538 1.206 4.89.988 2.271 3.062 2.232 4.033-.002 1.946-4.477 1.772-11.609-.007-15.437z"/></svg>
                            </a>
                            @endif

                            @if($q->question->image)
                            <img class="mx-auto d-block" src="https://anshitah.com/quiz/public/{{ $q->question->image }}" style="max-width: 80%;border: 2px solid">
                            @endif
                        </span>
                    </div>
                    <div class="col-6">
                        <table class="container table table-striped">
                    @php
                    $answers = json_decode($quiz->exam->answers);
                    #shuffle($q->question->answers)
                    @endphp
                    <input type="radio" name="{{ $q->question->id }}" value="-1" @if($answers[$i]->answer == "-1")
                    checked @endif hidden>

                    {{-- @foreach ($q->question->answers as $a) --}}
                    @foreach (collect($q->question->answers)->sortBy('name')->toArray() as $a)
                    <tr class="row py-2">
                        <td class="col-10 d-flex justify-content-between align-items-center">
                            <span style="font-family: sans-serif !important; font-weight: bold">
                                {{ $loop->index + 1 }} -
                            @if($a->name)
                                {{ $a->name }}
                            @endif
                            @if($a->image)
                                <img src="https://anshitah.com/quiz/public/{{ $a->image }}" width="150">
                            @endif
                            </span>
                        </td>
                        <td class="col-2">
                            <input type="radio" name="{{ $q->question->id }}" value="{{ $a->id }}"
                                @if($answers[$i]->answer == $a->id) checked @endif>
                        </td>
                    </tr>
                    @endforeach
                    @php
                    $i++;
                    @endphp
                </table>
                    </div>
                </div>
            </div>
            @if($loop->last)
            <div class="tab">
                <div class="revision revision1 d-none">
                    1
                </div>
                <div class="revision revision2 d-none">
                    2
                </div>
                <div class="revision revision3 d-none">
                    3
                </div>
                <div class="revision revision4 d-none">
                    4
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
            <div class="mt-2" style="overflow:auto;">
                <div class="d-flex justify-content-between">
                    <button style="font-family: sans-serif !important; font-weight: bold" class="btn btn-warning w-25" type="button" id="prevBtn"
                        onclick="nextPrev(-1)">السابق</button>
                    <button style="font-family: sans-serif !important; font-weight: bold" class="btn btn-success w-25" type="button" id="nextBtn"
                        onclick="nextPrev(1)">التالي</button>
                </div>
            </div>

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                @for ($i = 0 ; $i < $steps + 4 ; $i++) <span class="step"></span>
                    @endfor
            </div>
        </form>
    </div>
</div>

@section('scripts')
<script>
    function play(audio) {
        var audio = new Audio(audio);
        audio.play();
    }

</script>
<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                // window.location.href = "https://anshitah.com/quiz/exam/time/" + {{ $quiz->id }};
                window.location.href = "http://127.0.0.1:8000/exam/time/" + {{ $quiz->id }};
            }

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
            });
            jQuery.ajax({
                url: "{{ url('/exam/min') }}",
                method: 'post',
                data: {
                    min : minutes,
                    id  : {{ $fixed->id }}
                },
                success: function(result){}
                });

        }, 1000);
    }
    window.onload = function () {
        var xz = {{ $fixed->time }};
        var xy = {{ $quiz->duration }};
        var xw = 0 ;
        if(xz == xy) xw = xy;
        else xw = xz + .5;
        var fiveMinutes = 60 * xw,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
</script><!-- Timer -->

<script>
    function showTab(n) {
        // alert({{ $step1 }});
        let step1 = {{ $step1 }};
        let step2 = {{ $step1 + $step2 + 1 }};
        let step3 = {{ $step1 + $step2 + $step3 + 2 }};
        let step4 = {{ $step1 + $step2 + $step3 + $step4 + 3 }};
        if(n == step1 || n == step2 || n == step3 || n == step4){
            if(currentTab == step1){
                $('.revision').addClass('d-none');
                $('.revision1').removeClass('d-none');
            }
            if(currentTab == step2){
                $('.revision').addClass('d-none');
                $('.revision2').removeClass('d-none');
            }
            if(currentTab == step3){
                $('.revision').addClass('d-none');
                $('.revision3').removeClass('d-none');
            }
            if(currentTab == step4){
                $('.revision').addClass('d-none');
                $('.revision4').removeClass('d-none');
            }
            var radios = $('input[type=radio]:checked');
            // console.dir(radios);
            var html1 = '';
            var html2 = '';
            var html3 = '';
            var html4 = '';
            j = 1;
            for(i = 0 ; i < step1 ; i++){
                if(radios.eq(i).val() == '-1'){
                    html1 += `<p>السؤال ${j++} : غير مكتمل</p>`;
                }else{
                    html1 += `<p>السؤال ${j++} : مكتمل</p>`;
                }
            }
            j = 1;

            for(i = step1 ; i < step2 ; i++){
                if(radios.eq(i).val() == '-1'){
                    html2 += `<p>السؤال ${j++} : غير مكتمل</p>`;
                }else{
                    html2 += `<p>السؤال ${j++} : مكتمل</p>`;
                }
            }
            j = 1;

            for(i = step2 ; i < step3 ; i++){
                if(radios.eq(i).val() == '-1'){
                    html3 += `<p>السؤال ${j++} : غير مكتمل</p>`;
                }else{
                    html3 += `<p>السؤال ${j++} : مكتمل</p>`;
                }
            }
            j = 1;

            for(i = step3 ; i < step4 ; i++){
                if(radios.eq(i).val() == '-1'){
                    html4 += `<p>السؤال ${j++} : غير مكتمل</p>`;
                }else{
                    html4 += `<p>السؤال ${j++} : مكتمل</p>`;
                }
            }
            j = 1;

            $('.revision1').html(html1);
            $('.revision2').html(html2);
            $('.revision3').html(html3);
            $('.revision4').html(html4);
        }
        // This function will display the specified tab of the form ...
        let x = document.querySelectorAll('.tab');
        // console.log(n);
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "إنهاء الإختبار";
        } else {
            document.getElementById("nextBtn").innerHTML = "التالي";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
        var currentTab = {{ $current }}; // Current tab is set to be the first tab (0)

    $(function(){


        $('#nextBtn').click(function(){
            // alert(currentTab);
            // change exam step
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/exam/step') }}",
                method: 'post',
                data: {
                    id: {{$quiz->id}},
                    step: currentTab,
                },
                success: function(result){
                    // console.log("Step Changed !");
            }});


            var steps = {{ $steps }};
            var step1 = {{ $step1 }};
            var step2 = {{ $step2 + $step1 }};
            var step3 = {{ $step3 + $step2 + $step1 }};
            var step4 = {{ $step4 + $step3 + $step2 + $step1 }};

            if(currentTab == step1 + 1 || currentTab == step2 + 2 || currentTab == step3 + 3 || currentTab == step4 + 4){
                $('#prevBtn').addClass('d-none');
            }else{
                $('#prevBtn').removeClass('d-none');
            }
            if(currentTab == step1){
                $('.revision').addClass('d-none');
                $('.revision1').removeClass('d-none');
            }
            if(currentTab == step2){
                $('.revision').addClass('d-none');
                $('.revision2').removeClass('d-none');
            }
            if(currentTab == step3){
                $('.revision').addClass('d-none');
                $('.revision3').removeClass('d-none');
            }
            if(currentTab == step4){
                $('.revision').addClass('d-none');
                $('.revision4').removeClass('d-none');
            }
            // alert(step3);
            var radios = $('input[type=radio]:checked');
            // console.dir(radios);
            var table= [];
            for(i = 0 ; i < radios.length ; i++){
                table.push(radios.eq(i).val());
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/exam/create') }}",
                method: 'post',
                data: {
                    answers: JSON.stringify(table),
                    quiz: {{$quiz->id}},
                    exam: {{$fixed->id}}
                },
                success: function(result){
                    // console.log(result);
            }});

            var html1 = '';
            var html2 = '';
            var html3 = '';
            var html4 = '';
            j = 1;
            html1 += '<div class="alert alert-warning">سوف تنتقل الى قسم الاستدلال الرياضي والمكاني و لن تتمكن من العودة الى قسم الاستدلال اللغوى وفهم المقروء</div>' ;
            html2 += '<div class="alert alert-warning">سوف تنتقل الى  قسم الاستدلال العلمي والميكانيكي و لن تتمكن من العودة الى قسم الاستدلال الرياضي والمكاني</div>' ;
            html3 += '<div class="alert alert-warning">سوف تنتقل الى قسم المرونة العقلية و لن تتمكن من العودة الى قسم الاستدلال العلمي والميكانيكي</div>' ;
            html4 += '<div class="alert alert-warning">سوف تنهي الإختبار و لن تتمكن من الرجوع الى قسم المرونة العقلية</div>' ;
            for(i = 0 ; i < step1 ; i++){
                if(radios.eq(i).val() == '-1'){
                    html1 += `<p>السؤال ${j++} : غير مكتمل</p>`;
                }else{
                    html1 += `<p>السؤال ${j++} : مكتمل</p>`;
                }
            }
            j = 1;

            for(i = step1 ; i < step2 ; i++){
                if(radios.eq(i).val() == '-1'){
                    html2 += `<p>السؤال ${j++} : غير مكتمل</p>`;
                }else{
                    html2 += `<p>السؤال ${j++} : مكتمل</p>`;
                }
            }
            j = 1;

            for(i = step2 ; i < step3 ; i++){
                if(radios.eq(i).val() == '-1'){
                    html3 += `<p>السؤال ${j++} : غير مكتمل</p>`;
                }else{
                    html3 += `<p>السؤال ${j++} : مكتمل</p>`;
                }
            }
            j = 1;

            for(i = step3 ; i < step4 ; i++){
                if(radios.eq(i).val() == '-1'){
                    html4 += `<p>السؤال ${j++} : غير مكتمل</p>`;
                }else{
                    html4 += `<p>السؤال ${j++} : مكتمل</p>`;
                }
            }
            j = 1;

            $('.revision1').html(html1);
            $('.revision2').html(html2);
            $('.revision3').html(html3);
            $('.revision4').html(html4);
        });
    });

</script>


@endsection


@section('styles')
<style>
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }
</style>
@endsection
