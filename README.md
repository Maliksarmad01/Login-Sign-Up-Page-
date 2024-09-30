# Login-Sign-Up-Page
Login-Sign Up Page With Backend
# **User Authentication System**

## **Project Overview**

This project is a full-featured **user authentication system** designed to manage user registration, login, and protected content access. It uses a combination of **front-end technologies (HTML/CSS)** and **back-end technologies (PHP/MySQL)**. The purpose of the project is to provide a simple yet effective authentication system that can be integrated into larger web applications or used as a standalone system.

This project demonstrates the following:
- Handling user credentials securely.
- Implementing client-side and server-side validation.
- Using PHP for form submission, database interaction, and session management.
- Directing authenticated users to restricted content (like a dashboard).

### **Key Features**

1. **Registration System**:
   - **User Input**: A simple form where new users can input their details (e.g., username, email, password).
   - **Validation**: Includes client-side (HTML5) and server-side (PHP) validation.
     - **Client-Side**: Uses HTML5 features like `required`, `email` input type, and basic JavaScript validation.
     - **Server-Side**: Ensures data integrity with checks for empty fields, proper email format, and unique usernames/emails.
   - **Data Handling**: Passwords are hashed using PHP's `password_hash()` function to ensure secure storage. Data is inserted into a **MySQL database** after validation.
   - **Errors**: If validation fails, appropriate error messages (e.g., "Email already exists", "Password too short") are displayed.

2. **Login System**:
   - **User Input**: Users input their credentials (username or email, password).
   - **Validation**: 
     - Server-side validation ensures that only registered users with valid credentials can log in.
   - **Password Verification**: Uses `password_verify()` to compare the user’s input password with the hashed password stored in the database.
   - **Session Management**: Upon successful login, a PHP session is created, allowing the user to remain logged in across different pages.

3. **Dashboard (Protected Content)**:
   - Only accessible after successful login. If a user tries to access the dashboard without logging in, they are redirected to the login page.
   - Can be extended to include personalized features based on user-specific data (e.g., user profiles, settings).

4. **Welcome Page**:
   - A **landing page** that users are redirected to after logging in or registering.
   - It can display a greeting message and provide links to different parts of the application (e.g., dashboard, logout).

5. **Security**:
   - **Password Hashing**: Passwords are never stored in plaintext; they are hashed using the `bcrypt` algorithm, ensuring security.
   - **SQL Injection Protection**: Uses **prepared statements** (PDO or MySQLi) to prevent SQL injection attacks.
   - **Cross-Site Scripting (XSS)**: All user inputs are sanitized before being displayed or inserted into the database.

6. **Session Management**:
   - PHP sessions are used to manage user login status. If the session expires or is destroyed, the user is automatically logged out.
   - Redirection rules ensure that only logged-in users can access the dashboard.

### **Detailed Project Structure**

- **`dashboard.html`**:
  - Serves as a **protected user dashboard**. Users can only access this page after successful login.
  - It can be customized to display user-specific content, such as account details, recent activities, etc.
  - Links to log out and other features can be included here.

- **`login.html`**:
  - The **login form** where users input their credentials.
  - Front-end validation ensures all fields are filled out correctly before submission.
  - The form submits data via the POST method to `login.php`.

- **`login.php`**:
  - **Back-end processing** script that validates user credentials.
  - Upon success, it initiates a **PHP session** for the user and redirects them to the dashboard.
  - If login fails, error messages are displayed (e.g., "Incorrect username or password").
  - It queries the database for the user and uses `password_verify()` to check the hashed password.

- **`register.html`**:
  - The **user registration form**, where new users can create accounts by entering their username, email, and password.
  - The form submits the data to `register.php` via the POST method.
  - Front-end validation ensures fields are filled correctly before submission.

- **`register.php`**:
  - **Back-end processing** script that handles the registration.
  - Validates the user's input (e.g., checking for unique usernames/emails, ensuring strong passwords).
  - Hashes the password using PHP’s `password_hash()` function before storing it in the database.
  - Inserts the user’s data into a **MySQL database** and displays success/failure messages.

- **`Welcome.html`**:
  - The **post-login welcome page** that users are directed to after successfully logging in or registering.
  - It can display a personalized message like "Welcome, [username]" and provide navigation to other sections.

### **Database Schema**

The database is structured as follows:

#### Users Table (`users`)
```sql
CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

- **Fields**:
  - `id`: A unique identifier for each user.
  - `username`: The user’s unique username.
  - `email`: The user’s unique email address.
  - `password_hash`: The hashed password stored securely.
  - `created_at`: Timestamp indicating when the user registered.

### **Technical Details**

- **Front-End**:
  - Basic HTML forms are used for the login and registration pages.
  - CSS can be added to enhance the design.
  - JavaScript (optional) can be implemented to further improve form validation and user experience.

- **Back-End**:
  - PHP is responsible for handling form submissions, processing login/registration, managing sessions, and interacting with the database.
  - **PDO** or **MySQLi** is recommended for secure database interactions.
  - `password_hash()` and `password_verify()` functions are used to handle password encryption and verification.

- **Security Best Practices**:
  - Use HTTPS to encrypt the data transmitted between the server and the client.
  - Always sanitize user inputs to avoid XSS or other code injection vulnerabilities.
  - Consider implementing rate-limiting or CAPTCHA to prevent brute-force attacks on login pages.

### **Installation and Setup Guide**

1. **Clone the repository**:
   ```bash
   git clone https://github.com/Maliksarmad01/your-repository.git
   cd your-repository
   ```

2. **Database Setup**:
   - Create a database and a table to store users.
   - Use the SQL script provided above to create the `users` table.

3. **Configure the PHP Scripts**:
   - Update `login.php` and `register.php` with your database connection details (host, username, password, database name).

4. **Deploy the Project**:
   - Upload the files to a server that supports PHP (e.g., Apache, Nginx with PHP-FPM).
   - Ensure the server is configured to use **PHP 7.0+** (for `password_hash()` and `password_verify()` functions).

5. **Run the Application**:
   - Access the registration page (`register.html`) to create new accounts.
   - Use the login page (`login.html`) to authenticate users.

### **Security Considerations**

- **Password Security**: Passwords are securely hashed with the `bcrypt` algorithm (`password_hash()` in PHP).
- **SQL Injection Prevention**: Uses prepared statements to avoid SQL injection attacks.
- **Session Security**: PHP sessions are used to maintain login states, and session IDs should be rotated on login for security.
- **HTTPS**: Implement HTTPS to protect data during transmission.
