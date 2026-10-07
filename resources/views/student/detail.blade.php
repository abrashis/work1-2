<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
        }
        .detail-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        .detail-group {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .detail-group:last-child {
            border-bottom: none;
        }
        .label {
            color: #666;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .value {
            color: #333;
            font-size: 16px;
            margin-top: 5px;
        }
        .btn-group {
            margin-top: 30px;
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        .btn-edit {
            background-color: #28a745;
            color: white;
        }
        .btn-edit:hover {
            background-color: #1e7e34;
        }
        .btn-back {
            background-color: #6c757d;
            color: white;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <h1>Student Details</h1>
    
    <div class="detail-container">
        <div class="detail-group">
            <div class="label">ID</div>
            <div class="value">{{ $student->id }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Name</div>
            <div class="value">{{ $student->name }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Email</div>
            <div class="value">{{ $student->email }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Phone</div>
            <div class="value">{{ $student->phone }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Address</div>
            <div class="value">{{ $student->address ?? 'Not provided' }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Date of Birth</div>
            <div class="value">{{ $student->date_of_birth ?? 'Not provided' }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Created At</div>
            <div class="value">{{ $student->created_at->format('M d, Y H:i') }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Last Updated</div>
            <div class="value">{{ $student->updated_at->format('M d, Y H:i') }}</div>
        </div>
        
        <div class="btn-group">
            <a href="/students/{{ $student->id }}/edit" class="btn btn-edit">Edit Student</a>
            <a href="/students" class="btn btn-back">Back to Students</a>
        </div>
    </div>
</body>
</html>
