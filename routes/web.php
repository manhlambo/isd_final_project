<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

/**
 * Trang chủ
 */
Route::get('/', 'HomeController@index')->name('home');

/**
 * Dashboard
 */
Route::get('/dashboard', 'AdminController@index')->name('admin.index');

/**
 * Thông báo
 */
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::patch('posts/{post}', 'PostController@update')->name('posts.update');
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');

/**
 * Users
 */
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
Route::patch('/users/{user}/update', 'UserController@update')->name('user.profile.update');
Route::delete('/users/{user}', 'UserController@destroy')->name('user.destroy');

/**
 * Role policy
 */
Route::middleware(['role:admin', 'auth'])->group(function(){
    Route::get('/users', 'UserController@index')->name('users.index');

    /**
    * Roles
    */
    Route::get('/roles', 'RoleController@index')->name('roles.index');
    Route::post('/roles', 'RoleController@store')->name('role.store');
    Route::get('/roles/{role}/edit', 'RoleController@Edit')->name('role.edit');
    Route::patch('/roles/{role}', 'RoleController@update')->name('role.update');
    Route::delete('/roles/{role}', 'RoleController@destroy')->name('role.destroy');

    //attach & detach role
    Route::patch('/users/{user}/attach', 'UserController@attach')->name('user.role.attach');
    Route::patch('/users/{user}/detach', 'UserController@detach')->name('user.role.detach');

    //attach & detach môn học 
    Route::patch('students/{student}/attach', 'StudentController@attach')->name('student.subject.attach');
    Route::patch('students/{student}/detach', 'StudentController@detach')->name('student.subject.detach');

});

/**
 * admin & model owner same access
 */
Route::middleware(['can:view,user'])->group(function(){
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});

/**
 * Permissions
 */
Route::get('/permissions', 'PermissionController@index')->name('permissions.index');

/**
 * Teachers
 */
Route::get('/teachers', 'TeacherController@index')->name('teachers.index');
Route::get('/teachers/{user}/create', 'TeacherController@create')->name('teacher.create');
Route::post('/teachers/{user}', 'TeacherController@store')->name('teacher.store');
Route::get('/teachers/{teacher}/edit', 'TeacherController@edit')->name('teacher.edit');
Route::patch('/teachers/{teacher}', 'TeacherController@update')->name('teacher.update');
Route::delete('/teachers/{teacher}', 'TeacherController@destroy')->name('teacher.destroy');

/**
 * Students
 */
Route::get('/students', 'StudentController@index')->name('students.index');
Route::get('students/{classroom}/create', 'StudentController@create')->name('student.create');
Route::post('students/{classroom}', 'StudentController@store')->name('student.store');
Route::get('students/{student}/edit', 'StudentController@edit')->name('student.edit');
Route::patch('students/{student}', 'StudentController@update')->name('student.update');
Route::delete('students/{student}', 'StudentController@destroy')->name('student.destroy');

/**
 * Classrooms
 */
Route::get('/classrooms', 'ClassRoomController@index')->name('classrooms.index');
Route::get('/classrooms/create', 'ClassRoomController@create')->name('classroom.create');
Route::post('/classrooms', 'ClassRoomController@store')->name('classroom.store');
Route::get('/classrooms/{classroom}/edit', 'ClassRoomController@edit')->name('classroom.edit');
Route::patch('/classrooms/{classroom}', 'ClassRoomController@update')->name('classroom.update');
Route::delete('/classrooms/{classroom}', 'ClassRoomController@destroy')->name('classroom.destroy');

/**
 * Subjects
 */
Route::get('/subjects', 'SubjectController@index')->name('subjects.index');
Route::post('/subjects', 'SubjectController@store')->name('subject.store');
Route::get('/subjects/{subject}/edit', 'SubjectController@edit')->name('subject.edit');
Route::patch('/subjects/{subject}', 'SubjectController@update')->name('subject.update');
Route::delete('/subjects/{subject}', 'SubjectController@destroy')->name('subject.destroy');

/**
 * Marks
 */
Route::get('/marks/{subject}/create', 'MarkController@create')->name('mark.create');
Route::post('/marks/{subject}', 'MarkController@store')->name('mark.store');
Route::get('/marks/{mark}/edit', 'MarkController@edit')->name('mark.edit');
Route::patch('/marks/{mark}', 'MarkController@update')->name('mark.update');
Route::delete('/marks/{mark}', 'MarkController@destroy')->name('mark.destroy');

Route::patch('marks/{mark}/compute', 'MarkController@compute')->name('mark.compute');

Route::get('/studentsList', 'MarkController@studentsList')->name('students.list');
Route::get('/teacherStudentsList', 'MarkController@teacherStudentsList')->name('teacherStudents.list');
Route::get('/marks/{student}', 'MarkController@marksList')->name('marks.list');

Route::get('/mark/email/{student}','MarkController@email')->name('mark.email');
Route::post('/mark/email/{student}', 'MarkController@send')->name('mark.send');

/**
 * export
 */
Route::get('/export-excel/teacher', 'TeacherController@exportIntoExcel')->name('teachers.export');
Route::get('/export-excel/student', 'StudentController@exportIntoExcel')->name('students.export');




