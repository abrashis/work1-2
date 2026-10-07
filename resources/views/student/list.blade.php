<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
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
        }
        .actions form {
            display: inline;
        }
        .empty-message {
            text-align: center;
            padding: 40px;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Students Management</h1>
    
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="btn-group">
        <a href="/students/create" class="btn">Create New Student</a>
    </div>
    
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <div class="actions">
                            <a href="/students/{{ $student->id }}" class="btn">View</a>
                            <a href="/students/{{ $student->id }}/edit" class="btn btn-edit">Edit</a>
                            <form action="/students/{{ $student->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="empty-message">
                        No students found. <a href="/students/create">Create one</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
