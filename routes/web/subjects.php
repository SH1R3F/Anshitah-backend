<?php
    /**
     * المادة الدراسية
     */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Models\User;
use App\Models\Year;
use Illuminate\Support\Facades\Auth;
use App\Models\Shared;

// Route::get('/online-content', [ContentController::class, 'index'])->middleware(['permission:عرض المحتوى الإلكتروني'])->name('onlinecontent');
// Route::post('/online-content/create', [ContentController::class, 'create'])->middleware(['permission:إضافة مادة'])->name('create.onlinecontent');
// Route::post('/online-content/update', [ContentController::class, 'update'])->middleware(['permission:تعديل مادة'])->name('update.onlinecontent');
// Route::post('/online-content/delete/{id}', [ContentController::class, 'destroy'])->middleware(['permission:حذف مادة'])->name('delete.onlinecontent');


// /**
//  * For users
//  */

// Route::get('/users-online-content', [ContentController::class, 'users_index'])->middleware(['permission:إستعمال المحتوى الإلكتروني'])->name('onlinecontent-users');

Route::get('/student-subjects', function(){
    $class = Auth::user()->classes;
    $folders = [];
    if ($class && is_array(json_decode($class, true))) {
        $class = json_decode($class)[0];
        $teachers = User::role('معلم')->where('classes', 'LIKE', '%' . $class . '%')->with('folders')->get();
    }
    return view('student-subjects.index', [
        'title'    => 'المادة الدراسية',
        'teachers' => $teachers,
        'shareds'  => Shared::all()
    ]);

})->middleware(['permission:المادة الدراسية'])->name('student-subjects');
