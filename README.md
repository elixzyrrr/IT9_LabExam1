# Student Records PHP App

## Setup
1. Create a MySQL database named `lab_exam`.
2. Run the following SQL to create the `students` table:

```sql
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `age` int DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
```

3. Place the files in your PHP server folder (e.g., `htdocs` for XAMPP) and open `index.php` in a browser.
4. Use credentials `admin`/`admin123` to login.

## Files
- `db.php` - database connection
- `nav.php` - navigation bar
- `login.php` - login form
- `logout.php` - logout action
- `students.php` - list and action buttons
- `create.php` - add record
- `edit.php` - modify record
- `delete.php` - remove record
- `index.php` - redirect to login
