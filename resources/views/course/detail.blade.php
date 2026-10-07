<!DOCTYPE html>
<html>
<head>
    <title>Course Details</title>
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
            max-width: 700px;
        }
        .detail-group {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .detail-group:last-of-type {
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
            line-height: 1.6;
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
        .price {
            font-size: 24px;
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>
    <h1>Course Details</h1>
    
    <div class="detail-container">
        <div class="detail-group">
            <div class="label">ID</div>
            <div class="value">{{ $course->id }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Course Name</div>
            <div class="value">{{ $course->name }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Description</div>
            <div class="value">{{ $course->description }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Duration</div>
            <div class="value">{{ $course->duration }} weeks</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Course Fee</div>
            <div class="value price">${{ number_format($course->fee, 2) }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Difficulty Level</div>
            <div class="value">
                <span class="difficulty {{ strtolower($course->difficulty) }}">
                    {{ $course->difficulty }}
                </span>
            </div>
        </div>
        
        <div class="detail-group">
            <div class="label">Status</div>
            <div class="value">
                <span class="status {{ $course->is_active ? 'active' : 'inactive' }}">
                    {{ $course->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>
        
        <div class="detail-group">
            <div class="label">Created At</div>
            <div class="value">{{ $course->created_at->format('M d, Y H:i') }}</div>
        </div>
        
        <div class="detail-group">
            <div class="label">Last Updated</div>
            <div class="value">{{ $course->updated_at->format('M d, Y H:i') }}</div>
        </div>
        
        <div class="btn-group">
            <a href="/courses/{{ $course->id }}/edit" class="btn btn-edit">Edit Course</a>
            <a href="/courses" class="btn btn-back">Back to Courses</a>
        </div>
    </div>
</body>
</html>
