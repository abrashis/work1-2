<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
        }
        .success-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .btn-group {
            margin-bottom: 20px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-edit {
            background-color: #28a745;
        }
        .btn-edit:hover {
            background-color: #1e7e34;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .btn-students {
            background-color: #6c757d;
        }
        .btn-students:hover {
            background-color: #5a6268;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        thead {
            background-color: #007bff;
            color: white;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tbody tr:hover {
            background-color: #f9f9f9;
        }
        .actions {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }
        .actions form {
            display: inline;
        }
        .empty-message {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
        }
        .status.active {
            background-color: #d4edda;
            color: #155724;
        }
        .status.inactive {
            background-color: #f8d7da;
            color: #721c24;
        }
        .difficulty {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
        }
        .difficulty.easy {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        .difficulty.medium {
            background-color: #fff3cd;
            color: #856404;
        }
        .difficulty.hard {
            background-color: #f8d7da;
            color: #721c24;
        }
        .nav-buttons {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <h1>Courses Management</h1>
    
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="nav-buttons">
        <a href="/courses/create" class="btn">Create New Course</a>
        <a href="/students" class="btn btn-students">Manage Students</a>
    </div>
    
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Duration (weeks)</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>${{ number_format($course->fee, 2) }}</td>
                    <td>
                        <span class="difficulty {{ strtolower($course->difficulty) }}">
                            {{ $course->difficulty }}
                        </span>
                    </td>
                    <td>
                        <span class="status {{ $course->is_active ? 'active' : 'inactive' }}">
                            {{ $course->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="/courses/{{ $course->id }}" class="btn">View</a>
                            <a href="/courses/{{ $course->id }}/edit" class="btn btn-edit">Edit</a>
                            <form action="/courses/{{ $course->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="empty-message">
                        No courses found. <a href="/courses/create">Create one</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
