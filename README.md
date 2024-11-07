# Course Management System

A web-based Course Management System built using PHP and MySQL, designed to manage courses, student enrollment, marks, and feedback. This system allows instructors to efficiently handle student-related tasks such as viewing enrolled students, managing grades, and providing feedback.

## Features

### 1. **User roles**
   - **Student**: Each student can take up courses and submit the assignments to evaluate their learning track.
   - **Instructor**: Instructors can supervise students by tracking their marks, learning growth and can give feedback based on their performance.


### 1. **User Authentication**
   - **Session Management**: The system uses PHP sessions to verify if a user is logged in. If the session is not set, users are redirected to the login page.
   - **Redirect on Unauthorized Access**: If users try to access restricted pages without logging in, they will be redirected to the login page for security purposes.

### 2. **Dashboard Overview**
   - Upon successful login, the user is directed to a personalized dashboard.
   - The dashboard displays a welcome message with the user's name and ID.
   - The dashboard provides links to various sections:
     - **Students Enrolled**: View the list of students enrolled in the courses.
     - **Marks Obtained**: Check the marks and academic performance of students.
     - **Feedback Section**: Submit or manage feedback for students.

### 3. **Student Enrollment Management**
   - Instructors can view all students enrolled in a course. The system fetches data from the database to display a list of enrolled students for each course.

### 4. **Marks Management**
   - Instructors can manage and view student marks across various courses. This section allows the instructor to track student performance by viewing their grades and other academic details.

### 5. **Feedback Management**
   - Instructors can submit feedback for students. The feedback form allows the instructor to input the student ID, course name, and feedback message. Once submitted, the feedback is stored in the database for future reference.
   - **Feedback Submission**: The feedback is linked to the instructor's ID and the student's ID to maintain proper records.

