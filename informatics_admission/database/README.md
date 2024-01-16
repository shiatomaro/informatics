# DATABASE TABLES

## Users
| attribute | data type | description |
| --- | --- | --- |
| id | INT | primary key |
| email | VARCHAR(128) | the user's email address |
| password_hash | VARCHAR(60) | ther user's password hash |
| type | ENUM | see [user types](#user-types) section |
| created_at | timestamp | the timestamp at when the entry created |
| status | ENUM | see [user statuses](#user-statuses)

### User Types:
1. **Student**
2. **Registrar**
3. **Admin**

### User Statuses:
1. **Active**: the user can use their account
2. **Disabled**: the user is not permitted to use their account

## Courses
| attribute | data type | description |
| --- | --- | --- |
| id | INT | primary key |
| code | VARCHAR(20) | a short code that uniquely identifies a course |
| name | VARCHAR(128) | the name of the course |
| description | VARCHAR(128) | a description of the course |
| instructor | VARCHAR(128) | the name of the instructor for the course |
| status | ENUM | see [course statuses](#course-statuses) section |

### Course Statuses:
1. **Scheduled**: The course is planned for an upcoming academic term, and students can register for it.
2. **Open**: The course is currently accepting registrations, and students can enroll in it.
3. **Closed**: The course has reached its maximum capacity, and no further registrations are allowed. Students may need to wait for a future term or try to enroll in an alternative course.
4. **Cancelled**: The course has been canceled, often due to insufficient enrollment, faculty availability, or other unforeseen circumstances.
5. **Waitlisted**: The course is full, but students can add themselves to a waitlist. If a registered student drops the course, someone from the waitlist may get the opportunity to enroll.
6. **In Progress**: The course is currently being taught, and students are attending classes or participating in online sessions.
7. **Completed**: The course has finished, and all academic requirements, including exams and assignments, have been completed.
11. **Suspended**: The course may be temporarily suspended or put on hold, often due to issues such as faculty unavailability or curriculum review.

## Enrollments
| attribute | data type | description |
| --- | --- | --- |
| id | INT | primary key |
| user_id | INT | foreign key |
| course_id | INT | foreign key |
| entrollment_date | TIMESTAMP | the timestamp when the student enrolled |

## Assessments
the `assessments` table takes note of all the assessments that have taken place or will take place

| attribute | data type | description |
| --- | --- | --- |
| id | INT | primary key |
| user_id | INT | foreign key |
| assessment_date | TIMESTAMP | the timestamp of when the assesment took place | 
| result | ENUM | see [assesment results](#assesment-results) |

### Assesment results
1. **passed**
2. **failed**

## Student Information
the `student_information` table collates the student's data
| attribute | data type | description |
| --- | --- | --- |
| id | INT | primary key |
| user_id | INT | foreign key |
| student_id | INT | the student's id number (if applicable) |
| first_choice_program | VARCHAR(32) | the applicant's first choice program |
| second_choice_program | VARCHAR(32) | the applicant's second choice program |
| previous_school | VARCHAR(128) | the applicant's previous school |
| name_prefix | VARCHAR(8) | the applicant's name prefix (if it exists) |
| first_name | VARCHAR(128) | the applicant's first name |
| middle_name | VARCHAR(128) | the applicant's middle name |
| last_name | VARCHAR(128) | the applicant's last name |
| name_suffix | VARCHAR(8) | the applicant's name suffix (if it exists) |
| birth_date | TIMESTAMP | the applicant's birth_date |
| physical_address | VARCHAR(512) | the user's physical address |
| contact_number | VARCHAR(24) | the user's contact number |
| citizenship | VARCHAR(64) | the applicant's citizenship |
| sex | ENUM | see [applicant sex](#applicant-sex) |
| civil_status | ENUM | see [civil status](#civil-status) |
| father_name | VARCHAR(128) | father's full name |
| father_contact | VARCHAR(24) | father's contact number |
| mother_name | VARCHAR(128) | mother's full name |
| mother_contact | VARCHAR(24) | mother's contact number |
| guardian_name | VARCHAR(128) | guardian's full name |
| guardian_contact | VARCHAR(24) | guardian's contact number |
| guardian_address | VARCHAR(512) | the guardian's email address |
| guardian_email | VARCHAR(128) | the guardian's physical address |
| form137 | BLOB | a photo of the individual's form 137 |
| form138 | BLOB | a photo of the individual's form 138 |
| birth_cert | BLOB | a photo of the individual's birth certificate |
| baranggay_cert | BLOB | a photo of the individual's baranggay certificate |
| diploma | BLOB | a photo of the individual's diploma |
| created_at | TIMESTAMP | the timestamp of when the entry was created |
| updated_at | TIMESTAMP | the timestamp of when the entry was updated |

###  Sex:
1. **male**
2. **female**
2. **other**

### Civil Status:
1. **single**
2. **married**
3. **divorced**
4. **annuled**
5. **widowed**
6. **other**

## Student Applications
the `student_applications` table takes note of all the applications made by different students.
| attribute | data type | description |
| --- | --- | --- |
| id | INT | primary key |
| user_id | INT | foreign key |
| status | ENUM | see [application statuses](#application-statuses) |
| approved_by | VARCHAR(128) | the person who approved the application |
| noted_by | VARCHAR(128) | The person who made a note or observation on application
| created_at | TIMESTAMP | specifies when the student application was created |
| updated_at | TIMESTAMP | specifies when the student application was last updated |

### Application statuses
1. **approved**
2. **rejected**
3. **processing**

## Student Admin
| attribute | data type | description |
| --- | --- | --- |
| id | INT | primary key |
| user_id | INT | foreign key |
| position | ENUM | the position of the student admin |
| status | ENUM | the status of the student admin |