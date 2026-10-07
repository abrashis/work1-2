# Git Workflow - Week 1 Implementation

## Overview

This guide explains how to commit your Week 1 work to GitHub using Git and the correct branch structure.

## Repository Structure

```
6CS056-Workshop (Main Repository)
├── main (default branch)
├── Workshop1 (Week 1 branch)
├── Workshop2 (Week 2 branch)
└── ... (other weeks)
```

## Step-by-Step Git Workflow

### Step 1: Verify Current Branch

```powershell
cd d:\documents\Sem5-AdFullstack\week1
git branch
git status
```

**Expected Output**:
```
* Workshop1  (or whatever your branch is named)
On branch Workshop1
Your branch is up to date with 'origin/Workshop1'.
```

### Step 2: Check Changed Files

```powershell
git status
```

**Expected Output** (should include):
```
Untracked files:
  (use "git add <file>..." to include in what will be committed)
        README.md
        QUICK_START.md
        SETUP_INSTRUCTIONS.md
        ... (and other files)

Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
        .env
        routes/web.php
```

### Step 3: Review What You're Committing

```powershell
# See what's been added
git add .

# Review the changes that will be committed
git diff --cached --stat
```

### Step 4: Commit Your Work

```powershell
# Create a descriptive commit message
git commit -m "Week 1: Implement complete CRUD for Students and Courses

- Created Student and Course models with migrations
- Implemented 14 RESTful routes (7 for each entity)
- Built 8 Blade views with professional styling
- Added comprehensive validation on all forms
- Implemented CSRF protection and error handling
- Added success message flashing
- Documentation and testing guides included

Completion Status: All Week 1 requirements met"
```

### Step 5: Push to Remote Repository

```powershell
# Push to the Workshop1 branch
git push origin Workshop1

# Or if it's a new branch
git push -u origin Workshop1
```

### Step 6: Verify on GitHub

1. Go to your GitHub repository
2. Select the `Workshop1` branch
3. Verify all files are present
4. Check the commit message

## Commit Message Template

Use this format for professional commit messages:

```
Week 1: Brief description of changes

- Detailed point 1
- Detailed point 2
- Detailed point 3
- Detailed point 4

Additional notes or completion status
```

## Example Commit for Week 1

```powershell
git add .

git commit -m "Week 1: Complete CRUD implementation for Students and Courses

FEATURES:
- Student Management: Create, Read, Update, Delete with validation
- Course Management: Create, Read, Update, Delete with validation
- Form Validation: Server-side validation for all inputs
- Error Handling: Comprehensive error messages and validation
- CSRF Protection: Security tokens on all forms
- Blade Views: 8 professional views with CSS styling
- Routes: 14 RESTful routes for both entities

DATABASE:
- Students table with 7 fields
- Courses table with 7 fields
- Proper relationships and constraints

DOCUMENTATION:
- README.md: Project overview
- QUICK_START.md: 30-second setup guide
- SETUP_INSTRUCTIONS.md: Detailed setup for MySQL/SQLite
- IMPLEMENTATION_SUMMARY.md: Technical details
- TESTING_GUIDE.md: 36-test QA suite

STATUS: ✅ Week 1 complete and ready for testing"
```

## Branch Protection Rules

**Important**: Never push directly to `main` branch!

Always follow this workflow:
1. Make changes on `Workshop1` branch
2. Commit and push to `Workshop1`
3. Create Pull Request to `main` when ready
4. Request code review
5. Merge to `main` after approval

## Viewing Commits

### View commit history
```powershell
git log --oneline -10
```

### View detailed commit information
```powershell
git show commit_hash
```

### View what was changed
```powershell
git log -p
```

## Undoing Commits

### If you haven't pushed yet:
```powershell
# Undo last commit but keep changes
git reset --soft HEAD~1

# Undo last commit and discard changes
git reset --hard HEAD~1
```

### If you already pushed:
```powershell
# Create a new commit that undoes changes
git revert HEAD
```

## Merging to Main Branch

### Prerequisites
- All commits pushed to `Workshop1`
- All tests passing
- Code review approved

### Create Pull Request

1. **Via GitHub Web UI**:
   - Go to your repository
   - Click "Compare & pull request"
   - Set base: `main`, compare: `Workshop1`
   - Add description
   - Click "Create Pull Request"

2. **Via GitHub CLI**:
   ```powershell
   gh pr create --base main --head Workshop1 --title "Week 1: Complete CRUD" --body "See IMPLEMENTATION_SUMMARY.md"
   ```

3. **Via Git Commands**:
   ```powershell
   # Switch to main
   git checkout main

   # Pull latest
   git pull origin main

   # Merge Workshop1
   git merge Workshop1

   # Push to main
   git push origin main
   ```

## Files to Commit in Week 1

### Models and Migrations
- [ ] `app/Models/Student.php`
- [ ] `app/Models/Course.php`
- [ ] `database/migrations/[timestamp]_create_students_table.php`
- [ ] `database/migrations/[timestamp]_create_courses_table.php`

### Views
- [ ] `resources/views/student/list.blade.php`
- [ ] `resources/views/student/create.blade.php`
- [ ] `resources/views/student/detail.blade.php`
- [ ] `resources/views/student/edit.blade.php`
- [ ] `resources/views/course/list.blade.php`
- [ ] `resources/views/course/create.blade.php`
- [ ] `resources/views/course/detail.blade.php`
- [ ] `resources/views/course/edit.blade.php`

### Routes and Configuration
- [ ] `routes/web.php`
- [ ] `.env` (with database config)

### Documentation
- [ ] `README.md`
- [ ] `QUICK_START.md`
- [ ] `SETUP_INSTRUCTIONS.md`
- [ ] `IMPLEMENTATION_SUMMARY.md`
- [ ] `TESTING_GUIDE.md`
- [ ] `GIT_WORKFLOW.md`

### Files to Exclude (in .gitignore)
- ❌ `vendor/` (composer packages)
- ❌ `node_modules/`
- ❌ `.env.local`
- ❌ `storage/logs/`
- ❌ `database/database.sqlite` (database file)

## Pushing Updates

If you need to push updates after initial commit:

```powershell
# Make your changes
# ... (edit files)

# Stage changes
git add .

# Commit with descriptive message
git commit -m "Fix: Update validation rules for courses

- Increase max description length to 1000 chars
- Add fee validation for decimal places
- Improve error messages"

# Push to remote
git push origin Workshop1
```

## Checking Status Before Committing

```powershell
# View all changes
git diff

# View staged changes
git diff --cached

# View untracked files
git status

# See which files have changed
git status --short
```

## Useful Git Aliases

Add these to make Git commands easier:

```powershell
# Create aliases
git config --global alias.co checkout
git config --global alias.br branch
git config --global alias.ci commit
git config --global alias.st status
git config --global alias.unstage 'reset HEAD --'
git config --global alias.last 'log -1 HEAD'
git config --global alias.visual 'log --graph --oneline --all'

# Now you can use:
git st          # instead of git status
git ci -m "msg" # instead of git commit -m "msg"
git co branch   # instead of git checkout branch
```

## Syncing with Main Branch

If main branch was updated after you created Workshop1:

```powershell
# Fetch latest from remote
git fetch origin

# Merge main into Workshop1
git merge origin/main

# Resolve any conflicts if they exist
# ... (edit conflicting files)

# Complete the merge
git add .
git commit -m "Merge main branch into Workshop1"
git push origin Workshop1
```

## Deploying to Server

After merging to main:

```powershell
# On your local machine
git checkout main
git pull origin main

# On the server
cd /path/to/workshop
git pull origin main
composer install
php artisan migrate
```

## Git Workflow Diagram

```
┌─────────────────┐
│  GitHub (main)  │
│   (production)  │
└────────┬────────┘
         │
         │ Pull Request
         ↓
┌─────────────────────┐     ┌──────────────────┐
│  Workshop1 Branch   │←───→│ Local Repository │
│  (on GitHub)        │     │ (on your PC)     │
└─────────────────────┘     └──────────────────┘
         ↑                          │
         │                          │
         └──────────Push────────────┘
```

## Commit Best Practices

✅ **DO**:
- Write clear, descriptive commit messages
- Commit related changes together
- Commit frequently (not all at once)
- Use past tense in commit messages
- Reference issue numbers if applicable

❌ **DON'T**:
- Commit uncommmented code
- Push directly to main
- Make huge commits with many unrelated changes
- Use vague messages like "fix" or "update"
- Commit sensitive information (.env passwords)

## Example Weekly Workflow

### Monday (Start Week 1)
```powershell
# Create/switch to Workshop1 branch
git checkout -b Workshop1
# or
git checkout Workshop1
```

### Tuesday-Friday (During Week 1)
```powershell
# Regular commits as you develop
git add .
git commit -m "Feature: Add student validation"
git push origin Workshop1
```

### Friday (End of Week 1)
```powershell
# Final push
git push origin Workshop1

# Create pull request on GitHub
# Request code review
# Merge to main after approval
```

## Emergency: Remove Last Commit (Before Pushing)

```powershell
# Undo last commit, keep changes
git reset --soft HEAD^
git reset HEAD~1

# Now you can re-commit or make changes
```

## Emergency: Remove Last Commit (Already Pushed)

```powershell
# Create a new commit that reverts changes
git revert HEAD

# Push the revert
git push origin Workshop1
```

## GitHub CLI Commands

If you have GitHub CLI installed:

```powershell
# Check if authenticated
gh auth status

# Create pull request
gh pr create --base main --head Workshop1

# View pull request
gh pr view 1

# Merge pull request
gh pr merge 1 --merge

# View repository
gh repo view

# Create issue
gh issue create --title "Bug: Something broken" --body "Description"
```

## Troubleshooting Git Issues

### "Permission denied (publickey)"
```powershell
# Generate SSH key
ssh-keygen -t rsa -b 4096 -C "your_email@example.com"

# Add to GitHub: Settings → SSH and GPG keys
```

### "Merge conflict"
```powershell
# Open conflicting files
# Edit to resolve conflicts
# Remove conflict markers

git add .
git commit -m "Resolve merge conflicts"
git push origin Workshop1
```

### "Nothing to commit"
```powershell
# Check status
git status

# If you have untracked files
git add .
git status
```

## After Week 1

### Before Starting Week 2
```powershell
# Make sure everything is committed
git status

# Create new branch for Week 2
git checkout main
git pull origin main
git checkout -b Workshop2

# Continue development on Workshop2
```

---

## Quick Reference

| Task | Command |
|------|---------|
| Check branch | `git branch` |
| See changes | `git status` |
| View diff | `git diff` |
| Add all files | `git add .` |
| Commit | `git commit -m "message"` |
| Push | `git push origin Workshop1` |
| View log | `git log --oneline` |
| Switch branch | `git checkout branch_name` |
| Create branch | `git checkout -b new_branch` |
| Pull latest | `git pull origin Workshop1` |
| Fetch remote | `git fetch origin` |

---

**Remember**: Always commit meaningful, descriptive messages that explain what changed and why.

For GitHub guidelines, see the GitHub Guideline documentation.
