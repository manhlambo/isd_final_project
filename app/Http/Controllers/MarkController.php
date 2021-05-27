<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Student;
use App\Subject;
use App\Mark;

class MarkController extends Controller
{
    public function studentsList(){
        $students = Student::all();

        return view('headTeacher.student-list', [
            'students' => $students,
        ]);
    }

    public function marksList(Student $student){
        return view('headTeacher.mark-list', [

            'student' => $student,
        ]);
    }

    public function create(Subject $subject){
        return view('headTeacher.mark.create', [
            'subject' => $subject,
        ]);
    }

    public function store(Subject $subject){
        $data = request()->validate([
            'student_id' => 'required | numeric|exists:students,id',
            'oral' => 'nullable|numeric|between:1,10',
            'midterm' => 'nullable|numeric|between:1,10',
            'final' => 'nullable|numeric|between:1,10',
        ], [
            'student_id.required' => 'Vui lòng nhập ID học sinh',
            'student_id.numeric' => 'ID học sinh phải là số',
            'student_id.exists' => 'ID học sinh không tồn tại',
        ]);

        $student = request('student_id');

        $subject->marks()->create($data);

        return redirect()->route('marks.list', $student);

    }

    public function edit (Mark $mark){
        return view('headTeacher.mark.edit', [
            'mark' => $mark,
        ]);
    }

    public function update(Mark $mark){

    $data = request()->validate([
        'student_id' => 'required',
        'oral' => 'nullable|numeric|between:1,10',
        'midterm' => 'nullable|numeric|between:1,10',
        'final' => 'nullable|numeric|between:1,10',
    ], [
        'oral.numeric' => 'Điểm kiển tra miệng phải là số, trong khoảng 1 đến 10',
        'oral.between' => 'Điểm kiển tra miệng phải là số, trong khoảng 1 đến 10',
        'midterm.numeric' => 'Điểm kiển tra giữa kỳ phải là số, trong khoảng 1 đến 10',
        'midterm.between' => 'Điểm kiển tra giữa kỳ phải là số, trong khoảng 1 đến 10',
        'final.numeric' => 'Điểm kiển tra cuối kỳ phải là số, trong khoảng 1 đến 10',
        'final.between' => 'Điểm kiển tra cuối kỳ phải là số, trong khoảng 1 đến 10',
    ]);

    $student = request('student_id');

    $mark->update($data);

    Session::flash('updated-message', 'Điểm đã được cập nhập thành công');

    return redirect()->route('marks.list', $student);
    }

    public function compute(Mark $mark){
    
        $mark->overall = ( $mark->oral + ($mark->midterm)*2 + ($mark->final)*3 )/6;

        $mark->update();

        return back();
    }
}
