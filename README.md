# Patient Record Management
## Project Description :
<b>Web-based application</b> that allows users to manage patient records efficiently. It includes features for editing patient details such as name, age, contact information, and medical history. The user-friendly interface is built using HTML, PHP, and Bootstrap, with animations and a responsive design
## Features:
### Edit Patient Details:
<li>Update patient information through a simple and intuitive form.</li>
<li>Validate inputs to ensure data integrity.</li>

### Responsive Design:
The interface is mobile-friendly and adapts to different screen sizes.

### Animations and Styling:
Enhanced UI with smooth animations and modern design elements using Bootstrap and CSS.

## Technologies Used

### Frontend:
HTML5, CSS3, Bootstrap
Google Fonts for enhanced typography
### Backend:
PHP
### Database:
MySQL

## Installation Guide
<ul>1) Clone the repository</ul>
<ul>2)<b> Set up the database:</b>
  Import the patients.sql file into your MySQL database to create the required tables.
  <b>dataBase Query:</b>
     <pre>CREATE DATABASE patient_management;</pre>
     <pre>CREATE TABLE users (
      user_id INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(50) NOT NULL UNIQUE,
      password VARCHAR(255) NOT NULL,
      role ENUM('admin', 'staff') DEFAULT 'staff' );</pre>
     <pre>CREATE TABLE patients (
      patient_id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(100) NOT NULL,
      age INT NOT NULL,
      contact VARCHAR(15) NOT NULL,
      medical_history TEXT,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP); </pre>
</ul>
<ul>3) Configure the database connection:Update the db_connection.php file with your MySQL credentials.</ul>
<ul>4) <b>Start the server:</b>Place the project files in your web server directory (e.g., htdocs for XAMPP).Start your server and navigate to http://localhost/project-folder.</ul>


