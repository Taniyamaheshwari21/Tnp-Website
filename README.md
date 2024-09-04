# Tnp-Cell-Website


## Overview
This project is a web-based application designed to manage placement activities in an educational institution. The system provides two interfaces: one for students and one for companies. Students can view their personal details, check eligibility for companies, and apply for placements. Companies can view the list of students who have applied for their openings.

## Features

### Student Interface
- **Login:** Secure login for students using their student ID and password.
- **View Personal Details:** Students can view their personal details stored in the system.
- **Check Eligibility:** The system displays a list of companies for which the student is eligible based on criteria such as academic performance and other qualifications.
- **Apply for Placements:** Students can apply to eligible companies directly through the platform.

### Company Interface
- **Login:** Secure login for companies using their company ID and password.
- **View Applicants:** Companies can view a list of students who have applied for their job openings.
- **Filter Applicants:** Companies can filter applicants based on specific criteria to shortlist candidates for interviews.

## Technology Stack
- **Frontend:** HTML, CSS, Bootstrap
- **Backend:** PHP
- **Database:** MySQL

## Setup Instructions

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/yourusername/placement-management-system.git
   '''
   
2. **Database Setup:**

Import the dbms.sql file located in the database folder into your MySQL server to set up the required tables.

3. **Configure Database Connection:**

Update the database connection details in dbconnect.php
```bash
$server = "localhost";
$username = "root";
$password = "";
$database = "dbms";

Ensure that the database name matches the one used during import.
4. **Run the Application:**

Open your web browser and navigate to http://localhost/placement-management-system.
Login Credentials:

Student Login: Use the student ID and password provided in the stu_login table.
Company Login: Use the company ID and password provided in the comp_login table.

   
