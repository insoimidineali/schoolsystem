<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\Account\StudentFeeController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\Marks\GradeController;
use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\Marks\StudentMarksController;
// use App\Http\Controllers\Backend\Account\StudentFeeController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\FeeAmountControllere;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\SemesterController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentStreamController;
use App\Http\Controllers\Backend\Setup\StudentSectionController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Teacher\TeacherRegController;
use App\Http\Controllers\Backend\Teacher\AttendanceController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Report\MarkSheetController;



// StudentRegController


use App\Http\Controllers\Backend\UserController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    Debugbar::info("ghello");
    return view('auth:login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
Route::get('admin/logout', [AdminController::class,'Logout'])->name("admin.logout");

//  user Management All Routes


Route::prefix('/users')->group(function(){

    Route::get('view', [UserController::class, 'UserView'])->name('users.view');
    Route::get('add',[UserController::class, 'UserAdd'])->name("users.add");
    Route::post('store',[UserController::class, 'UserStore'])->name("users.store");
    Route::get('edite/{id}',[UserController::class, 'UserEdit'])->name("users.edit");
    Route::POST('update/{id}',[UserController::class, 'UserUpdate'])->name("users.update");
    Route::get('delete/{id}',[UserController::class, 'UserDelete'])->name("users.delete");

});
//

//  User Profile and change password
Route::prefix('profile')->group(function(){

    Route::get('view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.change');

});

//  User setup
Route::prefix('setups')->group(function(){
  // Student Class Route
  Route::get('/student/class/view', [StudentClassController::class, 'ViewStudentClass'])->name('student.class.view');
  Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
//   Route::get('/student/class/add', [SemesterController::class, 'StudentClassAdd'])->name('student.class.add');
  Route::post('/student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');
  Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
  Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');
  Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

  // Student terms Route
//     Route::get('/student/terms/view', [SemesterController::class, 'ViewStudent'])->name('student.terms.view');
//     Route::get('/student/class/add', [SemesterController::class, 'StudentClassAdd'])->name('student.class.add');
//     Route::post('/student/class/store', [SemesterController::class, 'StudentClassStore'])->name('store.student.class');
//     Route::get('/student/class/edit/{id}', [SemesterController::class, 'StudentClassEdit'])->name('student.class.edit');
//     Route::post('/student/class/update/{id}', [SemesterController::class, 'StudentClassUpdate'])->name('update.student.class');
//     Route::get('student/class/delete/{id}', [SemesterController::class, 'StudentClassDelete'])->name('student.class.delete');
//    // Student Class Route
    Route::get('/student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
    Route::get('/student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');
    Route::post('/student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('store.student.year');
    Route::get('/student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
    Route::post('/student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('update.student.year');
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');
     // Student Department Route
    // Route::get('student/streams/view', [StudentStreamController::class, 'ViewStreams'])->name('student.streams.view');
    Route::get('student/streams/view',[StudentStreamController::class, 'ViewStreams'])->name('student.streams.view');
    Route::get('student/streams/add', [StudentStreamController::class, 'StudentStreamsAdd'])->name('student.streams.add');
    Route::post('/student/streams/store', [StudentStreamController::class, 'StudentStreamsStore'])->name('store.student.streams');
    Route::get('/student/streams/edit/{id}', [StudentStreamController::class, 'StudentStreamsEdit'])->name('student.streams.edit');
    Route::post('/student/streams/update/{id}', [StudentStreamController::class, 'StudentStreamsUpdate'])->name('update.student.streams');
    Route::get('student/streams/delete/{id}', [StudentStreamController::class, 'StudentStreamsDelete'])->name('student.streams.delete');

    // Student Shift Route
    Route::get('student/section/view', [StudentSectionController::class, 'ViewShift'])->name('student.section.view');
    Route::get('student/section/add', [StudentSectionController::class, 'StudentShiftAdd'])->name('student.shift.add');
    Route::post('/student/section/store', [StudentSectionController::class, 'StudentShiftStore'])->name('store.student.shift');
    Route::get('/student/section/edit/{id}', [StudentSectionController::class, 'StudentSectionEdit'])->name('student.section.edit');
    Route::post('/student/section/update/{id}', [StudentSectionController::class, 'StudentSectionUpdate'])->name('update.student.section');
    Route::get('student/section/delete/{id}', [StudentSectionController::class, 'StudentSectionDelete'])->name('student.section.delete');

     // Student Shift Route
    Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCat'])->name('fee.category.view');
    Route::get('fee/category/add', [FeeCategoryController::class, 'FeeCatAdd'])->name('fee.category.add');
    Route::post('/fee/category/store', [FeeCategoryController::class, 'FeeCatStore'])->name('store.fee.category');
    Route::get('/fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCatEdit'])->name('fee.category.edit');
    Route::post('/fee/category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('update.fee.category');
    Route::get('/fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');

    // Fee category amount Route
    Route::get('fee/amount/view', [FeeAmountControllere::class, 'ViewFeeAmount'])->name('fee.amount.view');
    Route::get('/fee/amount/add', [FeeAmountControllere::class, 'AddFeeAmount'])->name('fee.amount.add');
    Route::post('/fee/amount/store', [FeeAmountControllere::class, 'StoreFeeAmount'])->name('store.fee.amount');
    Route::get('/fee/amount/edit/{fee_category_id}', [FeeAmountControllere::class, 'EditFeeAmount'])->name('fee.amount.edit');
    Route::post('/fee/amount/update/{fee_category_id}', [FeeAmountControllere::class, 'UpdateFeeAmount'])->name('update.fee.amount');
    Route::get('/fee/amount/details/{fee_category_id}', [FeeAmountControllere::class, 'DetailsFeeAmount'])->name('fee.amount.details');

    // Exam type view Route
    Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
    Route::get('/exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');
    Route::post('/exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('store.exam.type');
    Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
    Route::post('/exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('update.exam.type');
    Route::get('/exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');

    // School Subject view Route
    Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSubject'])->name('school.subject.view');
    Route::get('/school/subject/add', [SchoolSubjectController::class, 'SubjectAdd'])->name('school.subject.add');
    Route::post('/school/subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('store.school.subject');
    Route::get('/school/subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('school.subject.edit');
    Route::post('/school/subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('update.school.subject');
    Route::get('/school/subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('school.subject.delete');


  // Assign Subject Route
    Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
    Route::get('/assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');
    Route::post('/assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');
    Route::get('/assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');
    Route::post('/assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');
    Route::get('/assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');



    // designation Route

    Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');
    Route::get('/designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');
    Route::post('/designation/store', [DesignationController::class, 'DesignationStore'])->name('store.designation');
    Route::get('Designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');
    Route::post('Designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('update.designation');
    Route::get('Designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');



});

    // Student Routes

Route::prefix('students')->group(function(){

    Route::get('/register/view', [StudentRegController::class,'StudentRegisView'])->name('student.registration.view');
    Route::get('/register/add', [StudentRegController::class,'StudentRegisAdd'])->name('student.registration.add');
    Route::post('/register/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');
    Route::get('/year/stream/wise', [StudentRegController::class,'StudentYearStreamWise'])->name('student.year.stream.wise');
    Route::get('/register/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
    Route::post('/register/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
    Route::get('/register/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
    Route::post('/register/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');
    Route::get('/register/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');

    // View the Subject with the marks

    Route::get('/register/student/view', [StudentMarksController::class, 'StudentMarksView'])->name('student.marks.view');
    Route::get("student/result/ResultView", [StudentMarksController::class,'StudentResultView'])->name("student.result");
    Route::get("marks/getSubject", [StudentMarksController::class,'GetStudentMarks'])->name("view student.marks.getresult");

    //student.marks.view student.marks.getstudents

    Route::get('exam/fee/view', [ExamFeeController::class,'ExamFeeView'])->name('exam.fee.view');
    // Route::get('/register/add', [StudentRegController::class,'StudentRegisAdd'])->name('student.registration.add');
    // Route::post('/register/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');
    // Route::get('/year/stream/wise', [StudentRegController::class,'StudentYearStreamWise'])->name('student.year.stream.wise');
    // Route::get('/register/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
    // Route::post('/register/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
    // Route::get('/register/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
    // Route::post('/register/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');
    // Route::get('/register/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');

    //Exam Fee Route

    // Generate rolle
    Route::get('/role/generate/view', [StudentRollController::class,'StudentRoleView'])->name('roll.generate.view');
    Route::get('/register/getstudents', [StudentRollController::class,'GetStudent'])->name('student.registration.getstudents');
    Route::post('/role/generate/store', [StudentRollController::class,'StudentRollStore'])->name('roll.generate.store');


    // Registration Fee Routes
    Route::get('/reg/fee/view', [RegistrationFeeController::class,'RegFeeView'])->name('registration.fee.view');
    Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class,'RegFeeClassData'])->name('student.registration.fee.classwise.get');
    Route::get('/reg/fee/payslip', [RegistrationFeeController::class,'RegFeePayslip'])->name('student.registration.fee.payslip');

 // Monthly Fee Routes
 Route::get('/monthly/fee/view', [MonthlyFeeController::class,'MonthlyFeeView'])->name('monthly.fee.view');
 Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class,'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
 Route::get('/monthly/fee/payslip', [MonthlyFeeController::class,'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');

//exam.fee.view
Route::get('/exam/fee/view', [ExamFeeController::class,'ExamFeeView'])->name('exam.fee.view');
Route::get('/exam/fee/classwisedata', [ExamFeeController::class,'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
Route::get('/exam/fee/payslip', [ExamFeeController::class,'ExamFeePayslip'])->name('student.exam.fee.payslip');

});  //roll.generate.store
   // student.registration.promotion
//promotion.student.registration
// teachers

Route::prefix('teachers')->group(function(){
       Route::get("reg/teacher/view", [TeacherRegController::class,'TeacherView'])->name("teacher.registration.view");
       Route::get("reg/teacher/add", [TeacherRegController::class,'TeacherAdd'])->name("teacher.registration.add");
       Route::post("reg/teacher/store", [TeacherRegController::class,'TeacherStore'])->name("teacher.registration.store");
       Route::get('reg/teacher/edit/{id}', [TeacherRegController::class, 'TeacherRegEdit'])->name('teacher.registration.edit');
       Route::post('reg/teacher/update/{id}', [TeacherRegController::class, 'TeacherRegUpdate'])->name('update.teacher.registration');
       Route::get('reg/teacher/detail/{id}', [TeacherRegController::class, 'TeacherRegDetail'])->name('teacher.registration.details');

       // Student Attendance All Route
       Route::get('Attendance/student/view', [AttendanceController::class, 'StudentAttendanceView'])->name('student.attendance.view');
       Route::get('Attendance/student/add', [AttendanceController::class, 'StudentAttendanceAdd'])->name('student.attendance.add');
       Route::post('/Attendance/student/store', [AttendanceController::class, 'StudentStoreAttendance'])->name('store.student.attendance');
       Route::get('Attendance/student/edit/{id}', [AttendanceController::class, 'StudentAttendanceEdit'])->name('student.attendance.edit');
       Route::get('Attendance/student/detail/{id}', [AttendanceController::class, 'StudentAttendanceDetails'])->name('student.attendance.details');
       Route::get("Attendance/student/getStudent", [AttendanceController::class,'GetStudentList'])->name("student.attendance.getstudents");

       //    Route::post('Attendance/student/update/{id}', [AttendanceController::class, 'TeacherRegUpdate'])->name('update.student.attendance');

       // store.employee.attendance
       //student.attendance.details
       //store.employee.attendance
       //student.attendance.edit
});



Route::prefix('marks')->group(function(){
    Route::get("marks/entry/add", [MarksController::class,'MarkAdd'])->name("marks.entry.add");
    Route::post("marks/entry/store", [MarksController::class,'MarkEntryStore'])->name("marks.entry.store");
    Route::get("marks/entry/edit", [MarksController::class,'MarksEdit'])->name("marks.entry.edit");
    // Route::get("marks/getStd/edit", [MarksController::class,'MarksEdtgetStudent'])->name("student.edite.getstudents");
    // Marks Entry Grade
    Route::get("marks/grade/view", [GradeController::class,'MarksGradeView'])->name("marks.entry.grade");
    Route::get("marks/grade/add", [GradeController::class,'MarksGradeAdd'])->name("marks.grade.add");
    Route::post("marks/grade/store", [GradeController::class,'MarksStore'])->name("store.marks.grade");
    Route::get("marks/grade/edit/{id}", [GradeController::class,'MarksGradeEdit'])->name("marks.grade.edit");
    Route::post("marks/grade/update/{id}", [GradeController::class,'MarksGradeUpdate'])->name("update.marks.grade");
    Route::get("marks/getSubject", [DefaultController::class,'GetSubject'])->name("marks.getsubject");
    Route::get("student/marks/getSubject", [DefaultController::class,'GetStudent'])->name("student.marks.getstudents");
});


Route::prefix('accounts')->group(function(){
    Route::get("student/fee/view", [StudentFeeController::class,'StudentFeeView'])->name("student.fee.view");
    Route::get("student/fee/add", [StudentFeeController::class,'StudentFeeAdd'])->name("student.fee.add");
    Route::post("student/fee/store", [StudentFeeController::class,'StudentFeeStore'])->name("account.fee.store");
    // Route::get("marks/entry/edit", [MarksController::class,'MarksEdit'])->name("marks.entry.edit");
    // // Route::get("marks/getStd/edit", [MarksController::class,'MarksEdtgetStudent'])->name("student.edite.getstudents");
    // Marks Entry Grade
    // Route::get("marks/grade/view", [GradeController::class,'MarksGradeView'])->name("marks.entry.grade");
    // Route::post("marks/grade/store", [GradeController::class,'MarksStore'])->name("store.marks.grade");
    // Route::get("marks/grade/edit/{id}", [GradeController::class,'MarksGradeEdit'])->name("marks.grade.edit");
    // Route::post("marks/grade/update/{id}", [GradeController::class,'MarksGradeUpdate'])->name("update.marks.grade");
    // Route::get("marks/getSubject", [DefaultController::class,'GetSubject'])->name("marks.getsubject");
    // Route::get("student/marks/getSubject", [DefaultController::class,'GetStudent'])->name("student.marks.getstudents");
});

//Rapport Management :

Route::prefix("rapport")->group(function(){

    //MarkSheet Generate Route :
    Route::get("marksheet/generate/view", [MarkSheetController::class,'MarkSheetView'])->name('marksheet.generate.view');
    Route::get("marksheet/generate/get", [MarkSheetController::class,'MarkSheetGet'])->name('report.marksheet.get');

});

