<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
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
            max-width: 500px;
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
        input[type="email"],
        input[type="date"],
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
        textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.25);
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
    </style>
</head>
<body>
    <h1>Create Student</h1>
    
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
        <form action="/students" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}"
                    required
                >
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    required
                >
            </div>
            
            <div class="form-group">
                <label for="phone">Phone</label>
                <input 
                    type="text" 
                    id="phone" 
                    name="phone" 
                    value="{{ old('phone') }}"
                    required
                >
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <textarea 
                    id="address" 
                    name="address"
                >{{ old('address') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input 
                    type="date" 
                    id="date_of_birth" 
                    name="date_of_birth" 
                    value="{{ old('date_of_birth') }}"
                >
            </div>
            
            <button type="submit">Create Student</button>
            <a href="/students" class="btn-back">Back to Students</a>
        </form>
    </div>
</body>
</html>
