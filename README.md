# Basic Attendance Roster
Attendance roster that lets you set students as present/absent. Roster information is stored persistently in a MySQL database.

## Tech Stack
Vue.js, Laravel, MySQL, phpunit

## Setup
### Setting Up the Database
1. Open MySQL
2. In MySQL, Create a database:
```
    CREATE DATABASE attendance_DB;
    USE attendance_DB;
```
3. Create a table in the database to store the roster
```
    CREATE TABLE students (
        student_id VARCHAR(255) NOT NULL, 
        first_name VARCHAR(255) NOT NULL, 
        last_name VARCHAR(255) NOT NULL, 
        email VARCHAR(255) NOT NULL, 
        PRIMARY KEY (student_id)
    );
```

4. Import CSV data into the table (fill in correct path to csv file) (CSV used here is ./attendance_data.csv)
```
    LOAD DATA LOCAL INFILE 
    '/path/to/your/csv/file' 
    INTO TABLE students 
    FIELDS TERMINATED BY ',' 
    ENCLOSED BY '"'
    LINES TERMINATED BY '\n' 
    IGNORE 1 ROWS 
    (student_id, first_name, last_name, email);
```

### Run the Laravel Backend
5. cd into attendance-roster
```
    cd attendance-roster
```

6. Start up the laravel server
```
    php artisan serve
```

### Run the Vue Front End
7. for first-time use, ensure vue is installed
```
    npm install
```
8. run a hot deploy
```
    npm run hot
```

## Testing
1. cd into attendance-roster
```
    cd attendance-roster
```
2. Confirm & add feature tests in ./test/Feature
3. Confirm & add unit tests in ./test/Unit
4. Run all tests 
```
    php artisan test --verbose
```

