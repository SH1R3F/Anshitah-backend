@extends('layouts.app')

@section('action')
<a href="{{ route('reports.index') }}" class="btn btn-primary mr-2">التقارير</a>
@endsection

@section('content')
<div class="card card-custom">
    <div class="card-header h-auto py-4">
        <div class="card-title">
            <h3 class="card-label">{{ $title }} : {{ $r->name }}
                <span class="d-block text-muted pt-2 font-size-sm">
                    التاريخ : {{ $r->created_at->format('d-m-Y') }}
                </span>
            </h3>
        </div>
    </div>
    <div class="card-body py-4">
        <div class="row">
            <form class="w-100" action="{{ route('reports.evaluation.edit.post' , ['id' => $r->id]) }}" method="post">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>معايير التقييم</th>
                                <th>عناصر التقييم</th>
                                <th>الدرجة</th>
                                <th>الدرجة المستحقة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-light">
                                <td>الفكرة</td>
                                <td>
                                    <select name="idea" class="form-control">
                                        <option @if($r->idea == "جديدة") selected @endif value="جديدة">جديدة</option>
                                        <option @if($r->idea == "تقليدية مطورة") selected @endif value="تقليدية مطورة">تقليدية مطورة</option>
                                        <option @if($r->idea == "تقليدية") selected @endif value="تقليدية">تقليدية</option>
                                    </select>
                                </td>
                                <td>4</td>
                                <td>
                                    <select name="q1" class="form-control calculated">
                                        <option @if($r->q1 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q1 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q1 == "2") selected @endif value="2">2</option>
                                        <option @if($r->q1 == "3") selected @endif value="3">3</option>
                                        <option @if($r->q1 == "4") selected @endif value="4">4</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-secondary">
                                <td>القيمة التربوية</td>
                                <td>
                                    <select name="value" class="form-control">
                                        <option @if($r->value == "ملاحظة القيمة التربوية في النشاط (القيمة موضوع النشاط)") selected @endif
                                            value="ملاحظة القيمة التربوية في النشاط (القيمة موضوع النشاط)">
                                            ملاحظة القيمة التربوية في النشاط (القيمة موضوع النشاط)
                                        </option>
                                        <option @if($r->value == "يمكن ملاحظة القيمة في النشاط بطريقة غير مباشرة") selected @endif
                                            value="يمكن ملاحظة القيمة في النشاط بطريقة غير مباشرة">
                                            يمكن ملاحظة القيمة في النشاط بطريقة غير مباشرة
                                        </option>
                                        <option @if($r->value == "وضع القيمة في الاعلانات دون تفعيل") selected @endif  value="وضع القيمة في الاعلانات دون تفعيل">
                                            وضع القيمة في الاعلانات دون تفعيل
                                        </option>
                                    </select>
                                </td>
                                <td>4</td>
                                <td>
                                    <select name="q2" class="form-control calculated">
                                        <option @if($r->q2 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q2 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q2 == "2") selected @endif value="2">2</option>
                                        <option @if($r->q2 == "3") selected @endif value="3">3</option>
                                        <option @if($r->q2 == "4") selected @endif value="4">4</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-light">
                                <td rowspan="3">التخطيط</td>
                                <td>الالتزام بالتنفيذ حسب الخطة الزمنية المعتمدة</td>
                                <td>4</td>
                                <td>
                                    <select name="q3" class="form-control calculated">
                                        <option @if($r->q3 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q3 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q3 == "2") selected @endif value="2">2</option>
                                        <option @if($r->q3 == "3") selected @endif value="3">3</option>
                                        <option @if($r->q3 == "4") selected @endif value="4">4</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-light">
                                <td>رفع بيانات المشاركين على المنصة في الوقت المحدد</td>
                                <td>4</td>
                                <td>
                                    <select name="q4" class="form-control calculated">
                                        <option @if($r->q4 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q4 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q4 == "2") selected @endif value="2">2</option>
                                        <option @if($r->q4 == "3") selected @endif value="3">3</option>
                                        <option @if($r->q4 == "4") selected @endif value="4">4</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-light">
                                <td>رفع تقرير النشاط خلال أسبوع من تاريخ التنفيذ</td>
                                <td>2</td>
                                <td>
                                    <select name="q5" class="form-control calculated">
                                        <option @if($r->q5 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q5 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q5 == "2") selected @endif value="2">2</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-secondary">
                                <td rowspan="3">جودة التنفيذ</td>
                                <td>حضور الطلاب والمشرف للدورات والمحاضرات</td>
                                <td>2</td>
                                <td>
                                    <select name="q6" class="form-control calculated">
                                        <option @if($r->q6 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q6 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q6 == "2") selected @endif value="2">2</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-secondary">
                                <td>التقيد بتعليمات وشروط المسابقة</td>
                                <td>2</td>
                                <td>
                                    <select name="q7" class="form-control calculated">
                                        <option @if($r->q7 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q7 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q7 == "2") selected @endif value="2">2</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-secondary">
                                <td>توفر إعلانات تخص النشاط المنفذ</td>
                                <td>2</td>
                                <td>
                                    <select name="q8" class="form-control calculated">
                                        <option @if($r->q8 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q8 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q8 == "2") selected @endif value="2">2</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-light">
                                <td>الفئة المستهدفة</td>
                                <td>تسجيل العدد المخصص لكل مدرسة (5طلاب)</td>
                                <td>5</td>
                                <td>
                                    <select name="q9" class="form-control calculated">
                                        <option @if($r->q9 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q9 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q9 == "2") selected @endif value="2">2</option>
                                        <option @if($r->q9 == "3") selected @endif value="3">3</option>
                                        <option @if($r->q9 == "4") selected @endif value="4">4</option>
                                        <option @if($r->q9 == "5") selected @endif value="5">5</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-secondary">
                                <td>مناسبة النشاط</td>
                                <td>مناسبة النشاط للمرحلة العمرية</td>
                                <td>2</td>
                                <td>
                                    <select name="q10" class="form-control calculated">
                                        <option @if($r->q10 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q10 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q10 == "2") selected @endif value="2">2</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-light">
                                <td rowspan="2">النشر والتوثيق</td>
                                <td>توثيق النشاط ( صور + فيديو )</td>
                                <td>2</td>
                                <td>
                                    <select name="q11" class="form-control calculated">
                                        <option @if($r->q11 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q11 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q11 == "2") selected @endif value="2">2</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-light">
                                <td>النشر الإعلامي ( حسابات المدرسة والإدارة )</td>
                                <td>2</td>
                                <td>
                                    <select name="q12" class="form-control calculated">
                                        <option @if($r->q12 == "0") selected @endif value="0">0</option>
                                        <option @if($r->q12 == "1") selected @endif value="1">1</option>
                                        <option @if($r->q12 == "2") selected @endif value="2">2</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-dark text-white">
                                <td colspan="2">المجموع</td>
                                <td>35</td>
                                <td id="total">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary w-50">حفظ</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $(function(){
        $('.calculated').change(function(){
            var total = 0;
            for(i = 0; i < $('.calculated').length ; i++){
                total += parseInt($('.calculated').eq(i).val());
            }
            $('#total').html(total);
        });
    });
</script>

@endsection
