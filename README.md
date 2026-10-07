# Training Institute Management System - Week 1

A Laravel-based Full-Stack Web Application for managing Students and Courses at a training institute.

## 🎯 Project Overview

This is Week 1 of a progressive 12-week workshop series building a complete training institute management system. Week 1 focuses on building the foundation with full CRUD operations for Students and Courses.

**Status**: ✅ **Week 1 Complete**

## 📋 Table of Contents

- [Quick Start](#quick-start)
- [Features](#features)
- [Technical Stack](#technical-stack)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Usage](#usage)
- [Documentation](#documentation)
- [Week 1 Completion](#week-1-completion)
- [Next Steps](#next-steps)

## 🚀 Quick Start

### Prerequisites
- PHP 8.0+ (Current: 8.5.1)
- Composer (Current: 2.9.5)
- MySQL 5.7+ OR SQLite

### Setup (2 minutes)

```bash
# 1. Configure database in .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_DATABASE=WorkshopDB

# 2. Run migrations
php artisan migrate

# 3. Start the server
php artisan serve

# 4. Open in browser
# http://127.0.0.1:8000/students
```

## ✨ Features Implemented

### Student Management ✅
- ✅ Create students with validation
- ✅ List all students with table view
- ✅ View individual student details
- ✅ Edit student information
- ✅ Delete students with confirmation
- ✅ Email uniqueness validation
- ✅ Success/error message flashing
- ✅ Form data preservation on errors

### Course Management ✅
- ✅ Create courses with all fields
- ✅ List all courses with status badges
- ✅ View individual course details
- ✅ Edit course information
- ✅ Delete courses with confirmation
- ✅ Difficulty level selection (Easy/Medium/Hard)
- ✅ Active/Inactive status toggle
- ✅ Professional fee formatting

### Core Laravel Features ✅
- ✅ RESTful routing
- ✅ Eloquent ORM
- ✅ Server-side validation
- ✅ CSRF protection
- ✅ Method spoofing (PUT/DELETE)
- ✅ Blade templating
- ✅ Session flashing
- ✅ Error handling

## 🛠 Technical Stack

| Component | Version | Status |
|-----------|---------|--------|
| PHP | 8.5.1 | ✅ |
| Laravel | 11.x | ✅ |
| MySQL/SQLite | Latest | ✅ |
| Composer | 2.9.5 | ✅ |
| Blade | Latest | ✅ |
| Eloquent | Latest | ✅ |

## 📁 Project Structure

```
week1/
├── app/
│   └── Models/
│       ├── Student.php
│       └── Course.php
├── database/
│   └── migrations/
│       ├── [timestamp]_create_students_table.php
│       └── [timestamp]_create_courses_table.php
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
├── .env
├── README.md
├── QUICK_START.md
├── SETUP_INSTRUCTIONS.md
├── IMPLEMENTATION_SUMMARY.md
└── TESTING_GUIDE.md
```

## 📥 Installation

### Step 1: Clone or Create Project
```bash
cd ~/6CS056/6CS056-Workshop
git switch Workshop1
# (or create new project)
```

### Step 2: Configure Database
Edit `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=WorkshopDB
DB_USERNAME=root
DB_PASSWORD=
```

### Step 3: Run Migrations
```bash
php artisan migrate
```

### Step 4: Start Development Server
```bash
php artisan serve
```

### Step 5: Access Application
- **Students**: http://127.0.0.1:8000/students
- **Courses**: http://127.0.0.1:8000/courses

## 💻 Usage

### Create a Student
1. Navigate to `/students/create`
2. Fill in the form
3. Click "Create Student"

### Create a Course
1. Navigate to `/courses/create`
2. Fill in the form
3. Select difficulty level
4. Check active status if needed
5. Click "Create Course"

### Manage Data
- **List**: View all students/courses at `/students` or `/courses`
- **View**: Click "View" button to see details
- **Edit**: Click "Edit" button to modify
- **Delete**: Click "Delete" button and confirm

## 📚 Documentation

| Document | Purpose |
|----------|---------|
| [QUICK_START.md](QUICK_START.md) | 30-second setup guide with URLs and test checklist |
| [SETUP_INSTRUCTIONS.md](SETUP_INSTRUCTIONS.md) | Detailed setup with MySQL/SQLite options |
| [IMPLEMENTATION_SUMMARY.md](IMPLEMENTATION_SUMMARY.md) | Complete technical implementation details |
| [TESTING_GUIDE.md](TESTING_GUIDE.md) | Comprehensive 36-test suite for QA |

## ✅ Week 1 Completion

### Checklist
- [x] Laravel project setup
- [x] Database configuration
- [x] Student model and migration
- [x] Course model and migration
- [x] Student CRUD routes (7 routes)
- [x] Course CRUD routes (7 routes)
- [x] Student views (4 views)
- [x] Course views (4 views)
- [x] Form validation
- [x] Error handling
- [x] Success messages
- [x] CSRF protection
- [x] Database operations
- [x] Documentation

### Validation Rules

#### Students
| Field | Rules |
|-------|-------|
| name | Required, string, max 255 |
| email | Required, email, unique, max 255 |
| phone | Required, string, max 20 |
| address | Optional, string, max 500 |
| date_of_birth | Optional, date |

#### Courses
| Field | Rules |
|-------|-------|
| name | Required, string, max 255 |
| description | Required, string, max 1000 |
| duration | Required, integer, 1-52 |
| fee | Required, numeric, 0+ |
| difficulty | Required, Easy/Medium/Hard |
| is_active | Optional, boolean |

### API Routes

**Student Routes (7)**
```
GET    /students
GET    /students/create
POST   /students
GET    /students/{id}
GET    /students/{id}/edit
PUT    /students/{id}
DELETE /students/{id}
```

**Course Routes (7)**
```
GET    /courses
GET    /courses/create
POST   /courses
GET    /courses/{id}
GET    /courses/{id}/edit
PUT    /courses/{id}
DELETE /courses/{id}
```

## 🔄 Next Steps (Week 2+)

- [ ] Many-to-Many relationships
- [ ] Search functionality
- [ ] Filtering and sorting
- [ ] Pagination
- [ ] AJAX/Real-time updates
- [ ] Responsive design
- [ ] REST API endpoints
- [ ] Authentication
- [ ] Authorization
- [ ] Device APIs integration
- [ ] Performance optimization

## 🐛 Troubleshooting

### Database Connection Error
```bash
# Verify MySQL is running
# Check .env credentials
php artisan cache:clear
```

### Port 8000 Already in Use
```bash
php artisan serve --port=8001
```

### 404 Errors
```bash
# Restart server
php artisan serve
```

## 📖 Learning Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Eloquent ORM](https://laravel.com/docs/eloquent)
- [Blade Templating](https://laravel.com/docs/blade)
- [Validation](https://laravel.com/docs/validation)
- [Routing](https://laravel.com/docs/routing)

## 📊 Project Statistics

| Metric | Count |
|--------|-------|
| Routes | 14 |
| Views | 8 |
| Models | 2 |
| Migrations | 2 |
| Database Tables | 2 |
| Test Cases | 36 |
| Documentation Files | 4 |
| Total Lines of Code | 1500+ |

## 🎓 Key Concepts Covered

1. **HTTP Methods**: GET, POST, PUT, DELETE
2. **RESTful Routing**: Resource conventions
3. **Eloquent ORM**: Model-database interaction
4. **Blade Templating**: Dynamic HTML rendering
5. **Form Validation**: Server-side rules
6. **CSRF Protection**: Security
7. **Session Flashing**: Message handling
8. **Error Handling**: Exception management
9. **Database Transactions**: Data consistency
10. **Code Organization**: MVC pattern

## 🚀 Performance

- Page load time: < 500ms
- Database queries: Optimized for N+1 prevention (Week 1)
- CSS: Inline (optimization for Week 2)
- JavaScript: Minimal (baseline for future features)

## 📝 Notes

- Week 1 focuses on CRUD functionality
- Database must be set up before migrations
- All routes are accessible without authentication (for now)
- Validation happens server-side only (Week 1)
- No client-side JavaScript yet (Week 2+)

## 🤝 Contributing

This is a learning project for the 6CS056 Advanced Full Stack Development course.

## 📄 License

This project is part of the curriculum for 6CS056 - Advanced Full Stack Development.

## 👤 Author

Created as part of Week 1 workshop exercise.

---

## Quick Commands Reference

```bash
# Start server
php artisan serve

# Run migrations
php artisan migrate

# Fresh migration (reset database)
php artisan migrate:fresh

# View all routes
php artisan route:list

# Clear cache
php artisan cache:clear

# Create student view
php artisan make:view student.list

# Create model
php artisan make:model Student -m
```

---

**Ready to start?** 
1. Run `php artisan migrate`
2. Run `php artisan serve`
3. Visit http://127.0.0.1:8000/students

For detailed setup instructions, see [QUICK_START.md](QUICK_START.md)
#   w o r k 1 - 2  
 