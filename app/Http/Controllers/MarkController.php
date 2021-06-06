<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Student;
use App\Subject;
use App\Teacher;
use App\Mark;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class MarkController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }
    
    public function studentsList(){
        
        // $students = auth()->user()->teacher->classroom->students;

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

        $this->authorize('create', Mark::class);

        return view('headTeacher.mark.create', [
            'subject' => $subject,
        ]);
    }

    public function store(Subject $subject, Request $request){

        $data = request()->validate([
            'student_id' => [
                'required',
                'numeric',
                'exists:students,id',

                Rule::unique('marks')->where(function ($query) use ($request, $subject) {
                    return $query
                        ->whereStudent_id($request->student_id)
                        ->whereSubject_id($subject->id);
                }),

            ],
            // 'oral' => 'nullable|numeric|between:0,10',
            // 'midterm' => 'nullable|numeric|between:0,10',
            // 'final' => 'nullable|numeric|between:0,10',
        ], [
            'student_id.required' => 'Vui lòng nhập ID học sinh',
            'student_id.numeric' => 'ID học sinh phải là số',
            'student_id.exists' => 'ID học sinh không tồn tại',
            'student_id.unique' => 'Điểm cho học sinh đã tồn tại',
        ]);

        $student = request('student_id');

        $subject->marks()->create($data);

        Session::flash('message', 'Điểm đã được thêm thành công');

        return redirect()->route('marks.list', $student);

    }

    public function edit (Mark $mark){

        $this->authorize('update', $mark);

        return view('headTeacher.mark.edit', [
            'mark' => $mark,
        ]);
    }

    public function update(Mark $mark){

    $data = request()->validate([
        'student_id' => 'required',
        'oral' => 'nullable|numeric|between:0,10',
        'midterm' => 'nullable|numeric|between:0,10',
        'final' => 'nullable|numeric|between:0,10',
    ], [
        'oral.numeric' => 'Điểm kiển tra miệng phải là số, trong khoảng 0 đến 10',
        'oral.between' => 'Điểm kiển tra miệng phải là số, trong khoảng 0 đến 10',
        'midterm.numeric' => 'Điểm kiển tra giữa kỳ phải là số, trong khoảng 0 đến 10',
        'midterm.between' => 'Điểm kiển tra giữa kỳ phải là số, trong khoảng 0 đến 10',
        'final.numeric' => 'Điểm kiển tra cuối kỳ phải là số, trong khoảng 0 đến 10',
        'final.between' => 'Điểm kiển tra cuối kỳ phải là số, trong khoảng 0 đến 10',
    ]);

    $student = request('student_id');

    $mark->update($data);

    Session::flash('updated-message', 'Điểm đã được cập nhập thành công');

    return redirect()->route('marks.list', $student);
    }

    public function destroy(Request $request){

        $mark = Mark::findOrFail($request->mark_id);
        
        $this->authorize('delete', $mark);

        $mark->delete();

        Session::flash('destroy-message', 'Điểm đã được xóa thành công');

        return back();

    }

    public function compute(Mark $mark){
    
        $mark->overall = ( $mark->oral + ($mark->midterm)*2 + ($mark->final)*3 )/6;

        $mark->update();

        return back();
    }

    public function email(Student $student){
        // dd($student);


        return view("admin.email.create", [
            'student' => $student,
        ]);
    }

    public function send(Student $student, Request $req){

        

        $data = [
            'name' => $student->name,
            'class' => $student->classroom->grade.$student->classroom->name,
            'teacher' => $student->classroom->teacher->user->name,
            'teacher_email' => $student->classroom->teacher->user->email,
            'dob' => $student->dob,
            'parent_name' => $student->parent_name,
            'parent_email' => $student->parent_email,
            
            'student' => $student,

            'body' => $req->body
        ];


        Mail::send('admin.email.send',$data, function($message) use($student) {
            $message->to($student->parent_email) -> subject("Thư thông báo kết quả học tập");

        });

        Session::flash('success', 'Gửi email thành công');
        
        return back();
    }
    
}
