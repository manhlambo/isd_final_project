<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use Illuminate\Http\Request;
use App\User;
use App\Teacher;
use App\Student;
use App\Subject;
use App\Post;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index', [
            'posts' => Post::all(),
            'users' => User::all(),
            'teachers' => Teacher::all(),
            'classrooms' => ClassRoom::all(),
            'students' => Student::all(),
            'subjects' => Subject::all(),
        ]);
    }
}
