<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class StudentForm extends Component
{
    public $schools = [
        'ابتدائية الأندلس',
        'ابتدائية الإمام عاصم لتحفيظ القرآن',
        'ابتدائية الجزيرة',
        'ابتدائية الحويلات',
        'ابتدائية الدانة',
        'ابتدائية الدفي',
        'ابتدائية الرياض',
        'ابتدائية الفناتير',
        'ابتدائية الفيحاء',
        'ابتدائية المرجان',
        'ابتدائية المطرفية',
        'ابتدائية الواحة',
        'ابتدائية جلمودة',
        'ابتدائية حراء',
        'ابتدائية نجد',
        'ابتدائية هجر',
        'ثانوية أم القرى - مقررات',
        'ثانوية الأحساء - مقررات',
        'ثانوية الدفي - مقررات',
        'ثانوية الرواد',
        'ثانوية العلا',
        'ثانوية نجد - مقررات',
        'متوسطة أم القرى',
        'متوسطة الإمام عاصم لتحفيظ القرآن الكريم',
        'متوسطة الخليج',
        'متوسطة الصديق',
        'متوسطة الفاروق',
        'متوسطة المروج',
        'متوسطة نجد'
    ];
    public $sofof1 = [
        'الأول ابتدائي',
        'الثاني ابتدائي',
        'الثالث ابتدائي',
        'الرابع ابتدائي',
        'الخامس ابتدائي',
        'السادس ابتدائي'
    ];
    public $sofof2 = [
        'الأول متوسط',
        'الثاني متوسط',
        'الثالث متوسط'
    ];
    public $sofof3 = [
        'الأول ثانوي',
        'الثاني ثانوي',
        'الثالث ثانوي'
    ];
    public $fosol = [1,2,3,4,5,6,7,8,9];
    public function render()
    {
        return view('livewire.student-form');
    }

    
}
