# SecureLab & VulnLab Exercise with PHP – Beginner Cybersecurity Exercises

```

 _____  _   _  _____ 
|  __ \| | | ||  __ \
| |__) | |_| || |__) |
|  ___/|  _  ||  ___/
|_|    |_| |_||_|     

This repository contains SecureLab & VulnLab:
- SecureLab: Safe coding examples (hashed passwords, CSRF tokens, 2FA)
- VulnLab: Vulnerable playground for practicing SQLi, XSS, CSRF, file upload exploits.
⚠️ Educational use only – run locally on a VM!


SecureLab (SAFE)         VulnLab (VULNERABLE)

````

> ⚠️ **Educational Use Only** – Run these labs locally on a Unix/Linux VM. Never deploy to public servers.

---

## 📝 Overview

This repository contains **two labs**:

- **SecureLab** – Demonstrates **secure coding practices**:
  - Password hashing
  - CSRF tokens
  - 2FA/TOTP
  - Restricted access to includes/config files

- **VulnLab** – Demonstrates **common vulnerabilities**:
  - SQL Injection (SQLi)
  - Cross-Site Scripting (XSS)
  - Cross-Site Request Forgery (CSRF)
  - File upload vulnerabilities
  - Insecure login

- **Purpose**: Compare secure vs vulnerable implementations and **practice critical thinking for cybersecurity**.

---

## 💻 System Requirements

- OS: Ubuntu / Linux VM (VirtualBox recommended)  
- Web server: XAMPP/LAMPP with Apache & PHP 8+  
- Database: MariaDB / MySQL  
- Browser: Chrome, Firefox, or Edge  
- Optional pentesting tools: **Nmap**, **Wireshark**, Burp Suite, Metasploit, or your local AI agent  

---

## 🚀 Deployment Instructions

### 1️⃣ Clone Repository

```bash
git clone https://github.com/Moralz-Lang/Secure-Lab-Vuln-Lab-Exercise-With-PHP.git
cd Secure-Lab-Vuln-Lab-Exercise-With-PHP
````

### 2️⃣ Deploy to XAMPP/LAMPP

```bash
sudo cp -r securelab vulnlab /opt/lampp/htdocs/
sudo chown -R daemon:daemon /opt/lampp/htdocs/securelab /opt/lampp/htdocs/vulnlab
sudo chmod -R 755 /opt/lampp/htdocs/securelab /opt/lampp/htdocs/vulnlab
```

### 3️⃣ Update `/etc/hosts`:

```text
127.0.0.1 securelab.local
127.0.0.1 vulnlab.local
```

### 4️⃣ Configure Virtual Hosts

Edit `/opt/lampp/etc/extra/httpd-vhosts.conf`:

```apache
<VirtualHost *:80>
    ServerName securelab.local
    DocumentRoot "/opt/lampp/htdocs/securelab"
    <Directory "/opt/lampp/htdocs/securelab">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>

<VirtualHost *:80>
    ServerName vulnlab.local
    DocumentRoot "/opt/lampp/htdocs/vulnlab"
    <Directory "/opt/lampp/htdocs/vulnlab">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Restart Apache:

```bash
sudo /opt/lampp/lampp restart
```

---

## 🗄️ Database Setup

### SecureLab

```sql
CREATE DATABASE securelab;
USE securelab;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);
```

### VulnLab

```sql
CREATE DATABASE vulnlab;
USE vulnlab;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);
```

* Update `includes/config.php` for each lab with correct credentials.

---

## 🧪 Step-by-Step Lab Testing & Critical Thinking

### SecureLab – Safe Practices

1. **Registration & Login**

   * Confirm password is **hashed**.
   * Test SQL injection → should fail.
   * Critical thinking: “How does hashing protect users?”

2. **Dashboard**

   * Accessible **only after login**.
   * Attempt direct URL access → should redirect or deny.

3. **TOTP 2FA**

   * Scan QR with Google Authenticator.
   * Test code entry.
   * Critical thinking: “Why does 2FA enhance security?”

4. **CSRF Protection**

   * Submit forms without token → rejected.
   * Consider: “What if tokens were missing?”

5. **Include/Config Protection**

   * Try accessing `includes/config.php` → 403 forbidden.
   * Ask: “Why is server-side include protection critical?”

---

### VulnLab – Exploit Simulation

* **SQL Injection** (`sqli_vuln.php`)
  Input: `' OR 1=1 --` → observe data leak/login bypass.
  Question: “Why is direct string interpolation dangerous?”

* **XSS** (`xss_reflected_vuln.php`)
  Input: `<script>alert('XSS')</script>` → script executes.
  Question: “How could cookies/session be stolen?”

* **CSRF** (`csrf_vuln.php`)
  Submit form without token → succeeds.
  Question: “What is the impact if CSRF protection is missing?”

* **File Upload** (`upload_vuln.php`)
  Try `.php` upload → observe execution or rejection.
  Question: “How can file validation improve security?”

* **Insecure Login** (`insecure_login.php`)
  Test weak passwords → observe bypass/failure.
  Question: “How does hashing & salting prevent theft?”

> Always run exploits **locally in VM**, never on public servers.

---

## 🎨 Styling & Layout

* SecureLab: Light theme `/securelab/css/style.css`
* VulnLab: Dark theme `/vulnlab/css/style.css`
* Header/footer includes for consistent UI

> Users can edit CSS files to **add animations, colors, or themes**.

---

## 🔧 Pentesting & Lab Extensions

* Use **Nmap** to scan open ports on VM.
* Use **Wireshark** to monitor HTTP traffic between browser and lab.
* Upload `.txt` or `.php` files in VulnLab to simulate **honeypot attacks**.
* Integrate your **local AI agent** to analyze vulnerabilities automatically or suggest security fixes.
* Extend labs with:

  * Brute-force simulations
  * Custom logging
  * Malware sandbox exercises
  * API endpoint testing

---

## 📁 Extra Instructions Folder – `deployment_guide`

Include `deployment_guide/INSTRUCTIONS.md`:

```markdown
# Deployment Guide – SecureLab & VulnLab

1️⃣ /etc/hosts:

127.0.0.1 securelab.local
127.0.0.1 vulnlab.local

2️⃣ httpd.conf / extra/httpd-vhosts.conf:

Include etc/extra/httpd-vhosts.conf

<VirtualHost *:80>
    ServerName securelab.local
    DocumentRoot "/opt/lampp/htdocs/securelab"
    <Directory "/opt/lampp/htdocs/securelab">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>

<VirtualHost *:80>
    ServerName vulnlab.local
    DocumentRoot "/opt/lampp/htdocs/vulnlab"
    <Directory "/opt/lampp/htdocs/vulnlab">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>

3️⃣ Restart Apache:

sudo /opt/lampp/lampp restart

4️⃣ Access Labs:

SecureLab: http://securelab.local  
VulnLab: http://vulnlab.local

5️⃣ Notes:

- Database credentials in `includes/config.php` must match.
- Permissions: `/opt/lampp/htdocs/securelab & vulnlab` → 755
```

---

## ⚠️ Safety Notes

* Run **only locally** in VM environment.
* Never expose labs to public internet.
* Use for **educational purposes** only.

---

## 💡 ASCII Fun Visual: Lab Workflow

```
     +-------------------+      +------------------+
     |   User Browser    | ---> |  SecureLab /     |
     |                   |      |  VulnLab PHP     |
     +-------------------+      +------------------+
                |                         |
                v                         v
         +--------------+           +----------------+
         | Apache/PHP   |           | MariaDB/MySQL  |
         +--------------+           +----------------+
                |                         |
                v                         v
          Security Checks         Vulnerabilities Exploit
```

* SecureLab → Shows **protection in action**
* VulnLab → Allows **safe attack simulations**

---

## ✅ Summary

This project is a **beginner-friendly, hands-on exercises** to learn cybersecurity:

* Compare secure vs vulnerable coding practices
* Test exploits safely in a VM
* Learn critical thinking for security
* Extend with CSS, AI agents, pentesting, or honeypot ideas

Enjoy experimenting, learning, and improving your cybersecurity skills safely!
