<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

Route::get('/', function () {
    return view('welcome');
});

// ==================== STUDENT ROUTES ====================

// List all students
Route::get('/students', function () {
    $students = Student::all();
    return view('student.list', [
        'students' => $students
    ]);
});

// Show create student form
Route::get('/students/create', function () {
    return view('student.create');
});

// Store student in database
Route::post('/students', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:students',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);
    
    $student = Student::create($validated);
    
    return redirect('/students')
        ->with('success', "Student {$student->name} created successfully!");
});

// Show student details
Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.detail', [
        'student' => $student
    ]);
});

// Show edit student form
Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.edit', [
        'student' => $student
    ]);
});

// Update student in database
Route::put('/students/{id}', function (Request $request, $id) {
    $student = Student::findOrFail($id);
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => ['required', 'email', 'max:255', 
            Rule::unique('students')->ignore($student->id)],
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);
    
    $student->update($validated);
    
    return redirect('/students/' . $student->id)
        ->with('success', 'Student updated successfully!');
});

// Delete student
Route::delete('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);
    $name = $student->name;
    $student->delete();
    
    return redirect('/students')
        ->with('success', "Student {$name} deleted successfully!");
});

// ==================== COURSE ROUTES ====================

// List all courses
Route::get('/courses', function () {
    $courses = Course::all();
    return view('course.list', [
        'courses' => $courses
    ]);
});

// Show create course form
Route::get('/courses/create', function () {
    return view('course.create');
});

// Store course in database
Route::post('/courses', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'duration' => 'required|integer|min:1|max:52',
        'fee' => 'required|numeric|min:0|max:999999.99',
        'difficulty' => 'required|in:Easy,Medium,Hard',
        'is_active' => 'boolean',
    ]);
    
    $course = Course::create($validated);
    
    return redirect('/courses')
        ->with('success', "Course {$course->name} created successfully!");
});

// Show course details
Route::get('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);
    return view('course.detail', [
        'course' => $course
    ]);
});

// Show edit course form
Route::get('/courses/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);
    return view('course.edit', [
        'course' => $course
    ]);
});

// Update course in database
Route::put('/courses/{id}', function (Request $request, $id) {
    $course = Course::findOrFail($id);
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'duration' => 'required|integer|min:1|max:52',
        'fee' => 'required|numeric|min:0|max:999999.99',
        'difficulty' => 'required|in:Easy,Medium,Hard',
        'is_active' => 'boolean',
    ]);
    
    $course->update($validated);
    
    return redirect('/courses/' . $course->id)
        ->with('success', 'Course updated successfully!');
});

// Delete course
Route::delete('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);
    $name = $course->name;
    $course->delete();
    
    return redirect('/courses')
        ->with('success', "Course {$name} deleted successfully!");
});
