# Poll System Project (Poll Now)

### A simple and interactive **Polling System** built with **PHP, CSS, JavaScript, and MySQL**.  
This project allows users to create polls, vote, and view real-time results with a clean frontend and secure backend.

## Features -

1. Create and manage polls (multiple questions/choices)  
2. Vote once per poll (IP/session restriction)  
3. Display poll results dynamically using **AJAX + JavaScript**  
4. Mobile-friendly design with **CSS**  
5. Data stored in **MySQL database**  
6. Secure handling of user input  

## Tech Stack -

1. **Frontend:** HTML, CSS, JavaScript (AJAX)  
2. **Backend:** PHP  
3. **Database:** MySQL  
4. **Server:** Apache/Nginx (XAMPP for local testing)  

## Installation & Setup -
1. Clone the repo or download files: git clone https://github.com/ankush-github-11/poll-system.git

2. Move project to server directory
 XAMPP → htdocs/poll-system/
 WAMP → www/poll-system/

3. Import Database

4. Open phpMyAdmin → Create DB `polldb`

5. Configure Database Connection: config/connect.php
```php
<?php
    session_start();
    define("LOCALHOST","localhost");
    define("DB_USERNAME","root");
    define("DB_PASSWORD","");
    define("DB_NAME","polldb");
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($conn));
    $db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error($conn));
?>
```
6. Run the project

7. Open in browser: http://localhost/poll-system/

## Usage -

1. Admin creates a poll in createpoll/index.php.

2. Users visit poll/index.php to vote.

3. Results of a poll can be viewed from pollresult/index.php.

## Security Considerations -

1. Sanitize inputs using mysqli_real_escape_string() or prepared statements.

2. Restrict multiple voting using session/IP tracking.

3. Escape output to prevent XSS attacks.

## Future Improvements -

1. Dynamic result page

2. Multiple-choice polls

3. Graphical results with Chart.js

4. Deploy on live hosting

## Contributing -

Contributions are welcome! Fork the repo, make changes, and submit a PR.

## License -

This project is open-source under the MIT License.