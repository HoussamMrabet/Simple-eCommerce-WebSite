# SWE4356 Group Project - Security Testing of Web Applications 

A security-audited fork of a PHP e-commerce platform [Simple E-Commerce Web Application](https://github.com/HoussamMrabet/Simple-eCommerce-WebSite) for the **SWE4356 Secure Software Development** course.

This project focuses on identifying and resolving real-world web security vulnerabilities through both **manual inspection** and **automated testing** using OWASP ZAP.

---

## Group Member – Group 1

| Name             | Matric Number |
|------------------|---------------|
| Chan Ci En       | 215035        |
| Khoo Boo Jing    | 215382        |
| Loo Huai Yuan    | 215516        |
| Chu Xing En      | 215090        |
| Loh Joe Ying     | 215507        |
| Tan Yong Jin     | 217086        |

---

## Setup & Usage

### 1. Clone the repository:
```
git clone https://github.com/Chance3009/ecommerce-secure-patch.git
cd ecommerce-secure-patch
```

### 2. Import the database:
- Open `phpMyAdmin` or use MySQL CLI
- Import `database.sql` into your MySQL server

### 3. Configure the database connection:
- Open `connect.php`
- Update the host, username, password, and database name

### 4. Run the application:
- Use XAMPP/LAMP/MAMP to host the project locally
- Visit:
```
http://localhost/ecommerce-secure-patch
```

---

## License

This project is licensed under the [MIT License](LICENSE).  
Original base project by [HoussamMrabet](https://github.com/HoussamMrabet/Simple-eCommerce-WebSite).

---

## Contributing

We use a branch-based workflow. Follow these steps to contribute:

1. Clone this repository (if not already):
   ```
   git clone https://github.com/Chance3009/ecommerce-secure-patch.git
   cd ecommerce-secure-patch
   ```

2. Create a new branch for your fix:
   ```
   git checkout -b fix/<issue-keywords>-<your-name-initials>
   ```

3. Make your changes and commit them:
   ```
   git add .
   git commit -m "fix: brief description of your fix"
   ```

4. Push your branch to GitHub:
   ```
   git push origin fix/<issue-keywords>-<your-name-initials>
   ```

5. Open a Pull Request targeting the `master` branch with:
   - A clear title (e.g., `fix: added CSP header to prevent XSS`)
   - Description of the fix

6. Wait for review and approval from the project lead before merging.

Please follow naming conventions and ensure your fix is tested locally before submitting.
