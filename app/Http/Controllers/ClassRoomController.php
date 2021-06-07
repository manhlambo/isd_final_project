<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassRoom;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ClassRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $classrooms = ClassRoom::all();
        
        return view('admin.classroom.index', [
            'classrooms' => $classrooms,
        ]);
    }

    public function create(){

        $this->authorize('create', ClassRoom::class);

        return view('admin.classroom.create');
    }

    public function store(Request $request){

        $data = request()->validate([
            'grade' => 'required',
            'name' => [
                'required',

                Rule::unique('class_rooms')->where(function ($query) use ($request) {

                    return $query
                        ->whereGrade($request->grade)
                        ->whereName($request->name);
                }),
                ],
            'teacher_id' => 'nullable|numeric|exists:teachers,id|unique:class_rooms,teacher_id',
            
        ], [
            'grade.required' => 'Vui lòng điền tên khối học',

            'name.required' => 'Vui lòng điền tên lớp học',
            'name.unique' => 'Lớp học đã tồn tại',

            'teacher_id.numeric' => 'ID giáo viên phải là số',
            'teacher_id.exists' => 'ID giáo viên không tồn tại',
            'teacher_id.unique' => 'ID giáo viễn đã tồn tại', 
        ]);

        ClassRoom::create($data);

        Session::flash('message', 'Lớp học đã được thêm thành công');

        return redirect()->route('classrooms.index');

    }

    public function edit(ClassRoom $classroom){

        $this->authorize('update', $classroom);
        
        return view('admin.classroom.edit', [
            'classroom' => $classroom,
        ]);
    }

    public function update(ClassRoom $classroom, Request $request){
        $data = request()->validate([
            'grade' => 'required',
            'name' => [
                'required',

                Rule::unique('class_rooms')->where(function ($query) use ($request, $classroom) {

                    return $query
                        ->whereGrade($request->grade)
                        ->whereName($request->name)
                        ->whereNotIn('id', [$classroom->id]);
                }),
            ],

            'teacher_id' => [
                'nullable',
                'numeric',
                'exists:teachers,id',
                Rule::unique('class_rooms', 'teacher_id')->ignore($classroom),
            ],
        ], [

            'grade.required' => 'Vui lòng điền tên khối học',

            'name.required' => 'Vui lòng điền tên lớp học',
            'name.unique' => 'Lớp học đã tồn tại',
            
            'teacher_id.numeric' => 'ID giáo viên phải là số',
            'teacher_id.exists' => 'ID giáo viên không tồn tại',
            'teacher_id.unique' => 'ID giáo viên đã tồn tại', 

        ]);

        $classroom->update($data);

        Session::flash('updated-message', 'Thông tin lớp học đã được sửa thành công');
        
        return redirect()->route('classrooms.index');
    }

    public function destroy(Request $request){

        $classroom = ClassRoom::findOrFail($request->classroom_id);

        $classroom->delete();

        Session::flash('destroy-message', 'Lớp học đã được xóa thành công');
        
        return back();
    }
}
