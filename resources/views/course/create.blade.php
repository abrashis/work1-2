<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.25);
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin: 0;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .btn-back {
            background-color: #6c757d;
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 4px;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
        .error-messages {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .error-messages h3 {
            margin-top: 0;
        }
        .error-messages ul {
            margin: 0;
            padding-left: 20px;
        }
        .error-messages li {
            margin-bottom: 5px;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <h1>Create Course</h1>
    
    @if($errors->any())
        <div class="error-messages">
            <h3>Please fix the following errors:</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="form-container">
        <form action="/courses" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Course Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}"
                    required
                >
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea 
                    id="description" 
                    name="description"
                    required
                >{{ old('description') }}</textarea>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="duration">Duration (weeks)</label>
                    <input 
                        type="number" 
                        id="duration" 
                        name="duration" 
                        value="{{ old('duration') }}"
                        min="1"
                        max="52"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="fee">Fee ($)</label>
                    <input 
                        type="number" 
                        id="fee" 
                        name="fee" 
                        value="{{ old('fee') }}"
                        min="0"
                        step="0.01"
                        required
                    >
                </div>
            </div>
            
            <div class="form-group">
                <label for="difficulty">Difficulty Level</label>
                <select id="difficulty" name="difficulty" required>
                    <option value="">-- Select Difficulty --</option>
                    <option value="Easy" {{ old('difficulty') == 'Easy' ? 'selected' : '' }}>Easy</option>
                    <option value="Medium" {{ old('difficulty') == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Hard" {{ old('difficulty') == 'Hard' ? 'selected' : '' }}>Hard</option>
                </select>
            </div>
            
            <div class="form-group">
                <div class="checkbox-group">
                    <input 
                        type="checkbox" 
                        id="is_active" 
                        name="is_active" 
                        value="1"
                        {{ old('is_active') ? 'checked' : '' }}
                    >
                    <label for="is_active" style="margin: 0;">Active Course</label>
                </div>
            </div>
            
            <button type="submit">Create Course</button>
            <a href="/courses" class="btn-back">Back to Courses</a>
        </form>
    </div>
</body>
</html>
