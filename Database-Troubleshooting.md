## ⚠️ Database Troubleshooting & Common Pitfalls

When working with **SecureLab** and **VulnLab**, beginners often encounter issues connecting the PHP pages to the database or fetching users. Here’s a guide to prevent and fix these problems.

---

### 1️⃣ Common Error: `SQLSTATE[42S22]: Unknown column 'username' in 'field list'`

**Problem:**

* When inserting users or querying the database, you might see:

```
ERROR 1054 (42S22): Unknown column 'username' in 'field list'
```

* This usually happens if the **table structure doesn’t match the PHP code**.

**Solution:**

1. Open your database in MariaDB/MySQL:

```sql
USE securelab; -- or vulnlab
DESCRIBE users;
```

2. Ensure the table has **exactly these columns**:

```sql
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);
```

> 💡 Note: Do **not** use `email` if your PHP code is referencing `username`. You must match column names in PHP queries exactly.

3. If you had previously created the table incorrectly (e.g., used `email` instead of `username`), **drop and recreate it**:

```sql
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);
```

---

### 2️⃣ Common Error: `Access denied for user 'vulnlab_user'@'localhost'`

**Problem:**

* Your PHP page shows:

```
DB error: SQLSTATE[HY000] [1045] Access denied for user 'vulnlab_user'@'localhost'
```

**Solution:**

1. Check `includes/config.php` in each lab and ensure credentials match your database setup:

```php
$host = 'localhost';
$db   = 'vulnlab';
$user = 'vulnlab_user';
$pass = 'yourpassword';
```

2. Create the user and grant privileges if needed (run as root in MariaDB):

```sql
CREATE USER 'vulnlab_user'@'localhost' IDENTIFIED BY 'yourpassword';
GRANT ALL PRIVILEGES ON vulnlab.* TO 'vulnlab_user'@'localhost';
FLUSH PRIVILEGES;
```

---

### 3️⃣ Linking PHP to Database

* Make sure your PHP pages include the **correct config file**:

```php
require __DIR__ . '/includes/config.php';
```

* Do **not** hardcode paths like `require 'db.php';` unless the file is in the same directory.

* Example working query:

```php
$id = $_GET['id'] ?? '';
$stmt = $pdo->query("SELECT * FROM users WHERE id = $id");
$user = $stmt->fetch();
```

> ⚠️ Always test that `id` exists in the `users` table before relying on the query.

---

### 4️⃣ Tips to Avoid Database Headaches

* Keep `username` consistent in all queries (register, login, SQLi exercises).
* Always recreate tables if you change column names.
* Test with a few sample users before running the labs.

---

### 5️⃣ Summary

By following the steps above, you avoid:

* “Unknown column” errors
* Access denied / permission errors
* Confusion between `username` vs `email` in PHP queries

> ✅ This ensures all labs (SecureLab & VulnLab) run smoothly and you can focus on **learning exploits safely**.

