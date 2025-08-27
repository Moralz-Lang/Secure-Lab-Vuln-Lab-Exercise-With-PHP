# 🛡️ SecureLab & VulnLab Exercises for PHP

> ⚠️ **Important:** Always run these labs **locally on a Unix/Linux VM** (e.g., Ubuntu in VirtualBox). Never expose vulnerable labs to the internet.

---

## 1️⃣ SecureLab – Safe Practices

SecureLab is designed to demonstrate proper coding practices. Exercises here let learners see how **secure code behaves**.

### Exercise 1: User Registration & Login

**Steps:**

1. Go to `http://securelab.local/register.php`.
2. Register a new user (e.g., username: `testuser`, password: `Password123!`).
3. Check your database (`securelab.users`) to see that the password is **hashed**, not plaintext.
4. Log in via `http://securelab.local/login.php`.

**Expected Outcome:**

* Passwords are hashed (bcrypt/TOTP hash).
* You are redirected to `dashboard.php`.

**Critical Thinking:**

* Why does hashing prevent password theft?
* What would happen if SQL injection were attempted in the login form?

---

### Exercise 2: Dashboard Access Control

**Steps:**

1. Open `http://securelab.local/dashboard.php` without logging in.

**Expected Outcome:**

* Access should be denied or redirected to login.

**Critical Thinking:**

* Why is it important to check authentication on every protected page?

---

### Exercise 3: Two-Factor Authentication (TOTP)

**Steps:**

1. Go to `verify_totp.php`.
2. Use the secret provided and scan it with Google Authenticator.
3. Enter the TOTP code to verify.

**Expected Outcome:**

* Only the correct code will allow login or access.

**Critical Thinking:**

* How does 2FA improve login security?
* What attacks does it prevent compared to password-only authentication?

---

### Exercise 4: CSRF Protection

**Steps:**

1. Try submitting registration or login forms **without a CSRF token**.

**Expected Outcome:**

* Form submission fails with “Invalid CSRF token”.

**Critical Thinking:**

* How could a CSRF attack manipulate a logged-in user’s account?

---

### Exercise 5: Include Protection

**Steps:**

1. Try opening `includes/config.php` in the browser (`http://securelab.local/includes/config.php`).

**Expected Outcome:**

* Access should be denied (403 Forbidden).

**Critical Thinking:**

* Why is it dangerous to expose server-side includes?

---

## 2️⃣ VulnLab – Exploit Simulation

VulnLab is **deliberately insecure**. Exercises here allow learners to **practice exploiting vulnerabilities safely**.

### Exercise 1: SQL Injection (sqli\_vuln.php)

**Steps:**

1. Open `http://vulnlab.local/sqli_vuln.php?id=1`.
2. Try inputting `' OR 1=1 --` or similar SQLi payloads.

**Expected Outcome:**

* Data may leak or authentication may bypass.

**Critical Thinking:**

* Why does directly interpolating input into SQL queries cause vulnerabilities?
* How would prepared statements prevent this?

---

### Exercise 2: Reflected XSS (xss\_reflected\_vuln.php)

**Steps:**

1. Enter `<script>alert('XSS')</script>` in the input field.

**Expected Outcome:**

* JavaScript executes in the browser.

**Critical Thinking:**

* How could XSS be used to steal cookies or manipulate sessions?
* How would you sanitize input to prevent this?

---

### Exercise 3: CSRF (csrf\_vuln.php)

**Steps:**

1. Submit a form **without the CSRF token**.

**Expected Outcome:**

* The form may execute actions without authentication.

**Critical Thinking:**

* What harm could occur if CSRF protections are missing?

---

### Exercise 4: File Upload Vulnerability (upload\_vuln.php)

**Steps:**

1. Try uploading a PHP file (e.g., `test.php`) in the upload form.
2. Observe execution or rejection.

**Expected Outcome:**

* Vulnerable labs may execute uploaded scripts.

**Critical Thinking:**

* Why is validating file type and size critical?
* How could this vulnerability allow a server takeover?

---

### Exercise 5: Insecure Login (insecure\_login.php)

**Steps:**

1. Try logging in with empty or weak credentials.
2. Observe if authentication is bypassed.

**Expected Outcome:**

* Insecure login may allow access without proper checks.

**Critical Thinking:**

* How does hashing, salting, and validation prevent this in SecureLab?

---

## 3️⃣ Optional Advanced Experiments

These exercises are for advanced learners:

### 3.1 Network Recon with Nmap

* Scan your VM to see which ports are open:

```bash
nmap -sS 127.0.0.1
```

* Analyze which services (Apache, MySQL) respond.

**Critical Thinking:**

* How could a hacker enumerate services?
* How can you hide unnecessary ports in a real environment?

---

### 3.2 Traffic Monitoring with Wireshark

* Capture HTTP requests from VulnLab forms.
* Observe how unencrypted login credentials are sent.

**Critical Thinking:**

* Why is HTTPS important for protecting sensitive data?

---

### 3.3 Creating a Local Honeypot

* Modify VulnLab to **log all POST requests and inputs** to a file.
* Simulate attackers targeting your fake lab.

**Critical Thinking:**

* How can honeypots be used for security research?

---

### 3.4 Using Your Local AI Agent

* Automate vulnerability scans or input fuzzing using your AI agent.
* Example: let AI test forms with SQLi, XSS, and CSRF payloads safely.

**Critical Thinking:**

* How can AI accelerate security testing?
* What precautions should be taken when automating attacks?

---

## 4️⃣ Styling & Customization

* SecureLab: light and clean theme
* VulnLab: dark hacker-style theme

**Suggestions for customization:**

* Add CSS animations or gradients.
* Customize header/footer logos.
* Create new pages for other vulnerability exercises (e.g., command injection, session hijacking).

---

## 5️⃣ Final Notes

* **Keep it local:** Never expose vulnerable labs publicly.
* **Learn through contrast:** Compare SecureLab vs VulnLab to understand security principles.
* **Experiment responsibly:** Test exploits only in your VM environment.


