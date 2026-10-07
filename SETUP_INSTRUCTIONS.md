# Week 1 - Training Institute Management System Setup Instructions

## Overview
This is a Laravel-based application for managing Students and Courses at a training institute. The application provides full CRUD functionality for both entities.

## Prerequisites
- PHP 8.0+ (Current: 8.5.1)
- Composer (Current: 2.9.5)
- MySQL Server 5.7+ or SQLite

## Database Setup

### Option 1: Using MySQL (Recommended for Production)

1. **Ensure MySQL is Running**
   ```powershell
   # Check if MySQL service is running
   Get-Service | Select-String -Pattern "MySQL"
   ```

2. **Update .env File**
   Open `.env` and configure the database connection:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=WorkshopDB
   DB_USERNAME=root
   DB_PASSWORD=your_password_here
   ```

3. **Create Database**
   ```sql
   CREATE DATABASE WorkshopDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

4. **Run Migrations**
   ```powershell
   php artisan migrate
   ```

### Option 2: Using SQLite (For Local Development)

1. **Enable SQLite Extension**
   - Edit your `php.ini` file
   - Uncomment or add: `extension=pdo_sqlite`
   - Restart your web server

2. **Update .env File**
   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=database/database.sqlite
   ```

3. **Create SQLite Database**
   ```powershell
   php artisan migrate
   ```

## Running the Application

1. **Start the Laravel Development Server**
   ```powershell
   php artisan serve
   ```

2. **Access the Application**
   - Open browser and navigate to: `http://127.0.0.1:8000`
   - Students: `http://127.0.0.1:8000/students`
   - Courses: `http://127.0.0.1:8000/courses`

## Project Structure

```
d:\documents\Sem5-AdFullstack\week1\
├── app/
│   └── Models/
│       ├── Student.php
│       └── Course.php
├── database/
│   └── migrations/
│       ├── xxxx_create_students_table.php
│       └── xxxx_create_courses_table.php
├── resources/
│   └── views/
│       ├── student/
│       │   ├── list.blade.php
│       │   ├── create.blade.php
│       │   ├── detail.blade.php
│       │   └── edit.blade.php
│       └── course/
│           ├── list.blade.php
│           ├── create.blade.php
│           ├── detail.blade.php
│           └── edit.blade.php
├── routes/
│   └── web.php
└── .env
```

## Features Implemented

### Student Management
- ✅ Create Student
- ✅ View All Students (List)
- ✅ View Student Details
- ✅ Edit Student
- ✅ Delete Student
- ✅ Form Validation
- ✅ Error Messages Display
- ✅ Success Messages with Redirect

### Course Management
- ✅ Create Course
- ✅ View All Courses (List)
- ✅ View Course Details
- ✅ Edit Course
- ✅ Delete Course
- ✅ Form Validation
- ✅ Error Messages Display
- ✅ Success Messages with Redirect

## Student Entity Fields

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| id | Integer | ✓ | Auto-increment primary key |
| name | String(255) | ✓ | Student's full name |
| email | String(255) | ✓ | Unique email address |
| phone | String(20) | ✓ | Contact number |
| address | Text | ✗ | Student's address |
| date_of_birth | Date | ✗ | Student's DOB |
| created_at | DateTime | ✓ | Record creation time |
| updated_at | DateTime | ✓ | Record modification time |

## Course Entity Fields

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| id | Integer | ✓ | Auto-increment primary key |
| name | String(255) | ✓ | Course name |
| description | Text | ✓ | Course description |
| duration | Integer | ✓ | Duration in weeks (1-52) |
| fee | Decimal(10,2) | ✓ | Course fee |
| difficulty | Enum | ✓ | Easy, Medium, Hard |
| is_active | Boolean | ✓ | Whether course is active (default: true) |
| created_at | DateTime | ✓ | Record creation time |
| updated_at | DateTime | ✓ | Record modification time |

## Validation Rules

### Student Validation
- **name**: Required, string, max 255 characters
- **email**: Required, email format, max 255 characters, must be unique
- **phone**: Required, string, max 20 characters
- **address**: Optional, string, max 500 characters
- **date_of_birth**: Optional, valid date format

### Course Validation
- **name**: Required, string, max 255 characters
- **description**: Required, string, max 1000 characters
- **duration**: Required, integer, between 1-52 weeks
- **fee**: Required, numeric, minimum 0, max 999999.99
- **difficulty**: Required, must be Easy, Medium, or Hard
- **is_active**: Optional, boolean

## Testing the Application

### Test Student CRUD:

1. **Create Student**
   - Navigate to `/students/create`
   - Fill in the form with sample data
   - Submit and verify success message

2. **List Students**
   - Navigate to `/students`
   - Verify student appears in the table

3. **View Student**
   - Click "View" button on student row
   - Verify all student details are displayed

4. **Edit Student**
   - Click "Edit" button on student row
   - Modify some fields
   - Submit and verify update success

5. **Delete Student**
   - Click "Delete" button on student row
   - Confirm deletion
   - Verify student is removed

### Test Course CRUD:

Follow the same steps as Student CRUD but navigate to `/courses`

### Test Validation:

1. Try creating a student with invalid email → Should show error
2. Try creating a course without a name → Should show error
3. Try creating a duplicate email student → Should show error
4. Try creating a course with invalid duration → Should show error

## Key Concepts Used

### HTTP Methods
- **GET**: Retrieve resources (list, details, edit form)
- **POST**: Create new resources (via forms)
- **PUT**: Update existing resources (via form with @method('PUT'))
- **DELETE**: Delete resources (via form with @method('DELETE'))

### Laravel Features
- **Eloquent ORM**: Database interaction via models
- **Mass Assignment**: $fillable property for secure data insertion
- **Validation**: Server-side form validation
- **CSRF Protection**: @csrf token in forms
- **Method Spoofing**: @method() directive for PUT/DELETE
- **Routing**: RESTful route structure
- **Blade Templating**: Dynamic HTML generation
- **Session Flashing**: Temporary success/error messages

## Deployment

### Push to GitHub
```powershell
git add .
git commit -m "Complete Week 1 CRUD implementation"
git push origin Workshop1
```

### Deploy to Server
1. Clone repository on server
2. Run `composer install`
3. Configure `.env` with production database credentials
4. Run `php artisan migrate`
5. Start the application

## Troubleshooting

### Database Connection Error
- Ensure MySQL service is running
- Verify .env database credentials
- Check database name exists

### CSRF Token Error
- Ensure @csrf is included in all forms
- Clear Laravel cache: `php artisan cache:clear`

### Migration Error
- Check migration files for syntax errors
- Ensure database exists before running migrations
- Clear cache and retry: `php artisan cache:clear && php artisan migrate`

### 404 Not Found
- Ensure Laravel development server is running
- Verify routes in `routes/web.php`
- Check URL matches route path

## Next Steps (Future Workshops)

- [ ] Add Many-to-Many relationship between Students and Courses
- [ ] Implement search and filtering
- [ ] Add pagination to list views
- [ ] Implement real-time UI updates (AJAX)
- [ ] Add responsive design
- [ ] Integrate device APIs (Camera, Geolocation, Gyroscope)
- [ ] Build REST API
- [ ] Add authentication
- [ ] Performance optimization
- [ ] Advanced UI components

## Support

For issues or questions, refer to:
- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Eloquent Documentation](https://laravel.com/docs/eloquent)
- [PHP Documentation](https://www.php.net/manual/)
