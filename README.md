# Poll Now

### A modern and scalable **Polling System** built with **PHP, CSS, Bootstrap, JavaScript, and MySQL**.  
PollNow is a full-featured polling platform that allows users to create polls, vote, manage poll activity, and view real-time results with a clean, modern frontend and secure backend. Features user authentication, profile management, admin dashboard, and advanced poll customization options.

---

## Quick Overview

**PollNow** is a full-stack, web-based **Polling System** built using **PHP, MySQL, JavaScript, CSS and Bootstrap**.  
It allows users to **create polls, vote securely, and view real-time results**, backed by a secure authentication system and an admin dashboard.

The project focuses on **clean UI/UX**, **secure backend development**, and a **modular folder structure**, making it ideal for **academic projects, full-stack demonstrations, and PHP/MySQL learning**.

### Key Highlights
- Secure user authentication with hashed passwords  
- Custom poll creation with advanced configuration options  
- Real-time voting and result analytics  
- Admin dashboard for managing users and polls  
- Mobile-responsive design with light/dark theme support  
- Strong emphasis on security and scalability  

**Tech Stack:** PHP • MySQL • JavaScript • Bootstrap 
**Setup Time:** ~10 minutes  
**Status:** Actively Developed

---

## Features

### **User Authentication & Profile Management**
- User registration and login system with email validation
- Password hashing using BCRYPT for security
- User profile dashboard with activity tracking
- Profile customization (bio, phone, website)
- Secure logout functionality
- Session-based authentication

### **Poll Creation & Management**
- Create custom polls with multiple options
- Set poll titles and descriptions
- Configure poll types and themes
- Schedule polls with date/time selection
- Set poll duration (hours/days)
- Configure voter representation options
- Device-specific polling
- Control result visibility
- Generate unique poll passwords
- Edit and manage created polls
- Participant tracking

### **Voting & Participation**
- Vote on polls with multiple choice options
- Single vote per user restriction (session/IP tracking)
- Real-time vote counting and display
- Anonymous voting support
- Track participated polls
- View personal voting history
- View all available polls directory

### **Results & Analytics**
- Real-time poll results with dynamic updates
- Live poll results monitoring
- Percentage-based vote distribution
- Vote count display
- Individual option result tracking

### **Admin Dashboard**
- Comprehensive admin panel
- View total users and poll statistics
- Monitor total messages and bug reports
- User management
- Poll administration
- Theme toggle (light/dark mode)

### **User Engagement Features**
- Contact/messaging system for user feedback
- Bug reporting functionality
- Message categorization
- Interactive poll discovery

### **Frontend & UX**
- Mobile-responsive design with CSS media queries
- Modern Bootstrap 5.3 integration
- Smooth animations and transitions
- Light/dark theme toggle
- Font Awesome icons integration
- Google Fonts (Poppins) for typography
- Horizontal navigation bar with dropdown menus
- Hamburger menu for mobile
- Clean and intuitive user interface

### **Security Features**
- Input sanitization and validation
- Prepared statements for SQL injection prevention
- XSS protection with htmlspecialchars()
- Session management with CSRF tokens
- Email validation (Gmail specific)
- Password strength requirements (minimum 8 characters)
- Name and email format validation

---

## Tech Stack

| Component | Technology |
|-----------|------------|
| **Frontend** | HTML5, CSS3, JavaScript(Vanilla) |
| **Backend** | PHP 7.x/8.x |
| **Database** | MySQL/MariaDB |
| **Server** | Apache (XAMPP/WAMP) |
| **CSS Framework** | Bootstrap 5.3.3 |
| **Icons** | Font Awesome 6.0 |
| **Fonts** | Google Fonts (Poppins) |
| **Date Picker** | Flatpickr |

---

## Project Structure

```
poll-system/
├── config/
│   └── connect.php              # Database connection configuration
├── admin/                       # Admin dashboard
│   ├── index.php
│   ├── admin-script.js
│   └── admin-stylesheet.css
├── createpoll/                  # Poll creation interface
│   ├── index.php
│   ├── create-script.js
│   └── create-stylesheet.css
├── created/                     # Poll creation confirmation
│   ├── index.php
│   ├── created-script.js
│   └── created-stylesheet.css
├── edit/                        # Poll editing
│   ├── index.php
│   ├── edit-script.js
│   └── edit-stylesheet.css
├── error/                       # Error page
│   ├── index.php
│   ├── error-script.js
│   └── error-stylesheet.css
├── login/                       # User login
│   ├── index.php
│   ├── login-script.js
│   └── login-stylesheet.css
├── signup/                      # User registration
│   ├── index.php
│   ├── signup-script.js
│   └── signup-stylesheet.css
├── poll/                        # Individual poll voting page
│   ├── index.php
│   ├── poll-script.js
│   └── poll-stylesheet.css
├── viewpolls/                   # All polls directory
│   ├── index.php
│   ├── viewpolls-script.js
│   └── viewpolls-stylesheet.css
├── mypoll/                      # User's created polls
│   ├── index.php
│   ├── poll-script.js
│   └── poll-stylesheet.css
├── pollresult/                  # Poll results display
│   ├── index.php
│   ├── pollresult-script.js
│   └── pollresult-stylesheet.css
├── participated/                # User's participated polls
│   ├── index.php
│   ├── participated-script.js
│   └── participated-stylesheet.css
├── profile/                     # User profile management
│   ├── index.php
│   ├── profile-script.js
│   └── profile-stylesheet.css
├── security/                    # Account security settings
│   ├── index.php
│   ├── security-script.js
│   └── security-stylesheet.css
├── success/                     # Vote submission success
│   └── index.php
├── livepolls/                   # Live polling display
│   └── index.php
├── soon/                        # Coming soon page
│   ├── index.php
│   ├── soon-script.js
│   └── soon-stylesheet.css
├── submit/                      # Vote submission handler
│   └── index.php
├── images/                      # Static images and logos
├── svgs/                        # SVG assets
├── index.php                    # Homepage
├── index-script.js              # Homepage functionality
├── index-stylesheet.css         # Homepage styles
├── README.md                    # Documentation
└── .htaccess                    # Apache configuration
```

---

## Database Schema

The system uses the following main database tables:

### **users** Table
- `uid` - User ID (Primary Key)
- `username` - Unique username
- `name` - User's full name
- `email` - User's email
- `password` - Hashed password
- `phone` - Contact number
- `bio` - User biography
- `website` - Personal website
- `pollsCreated` - Count of polls created
- `pollsVoted` - Count of polls participated in
- `dateJoined` - Registration date

### **polls** Table
- `pid` - Poll ID (Primary Key)
- `uid` - Creator user ID (Foreign Key)
- `name` - Creator's name
- `pollPassword` - Unique poll password
- `title` - Poll question/title
- `description` - Poll description
- `options` - Comma-separated poll options
- `pollType` - Poll type classification
- `theme` - Theme selection
- `caseOptions` - Case sensitivity settings
- `publishImmediately` - Publishing preference
- `startDateAndTime` - Poll start date/time
- `duration` - Poll duration
- `votersRepresentation` - Voter display setting
- `devices` - Device targeting
- `showResults` - Result visibility setting
- `dateCreated` - Creation timestamp

### **votes** Table
- `vid` - Vote ID (Primary Key)
- `pid` - Poll ID (Foreign Key)
- `uid` - User ID (Foreign Key)
- `selectedOption` - User's selected option
- `votedAt` - Vote timestamp

### **messages** Table
- `mid` - Message ID (Primary Key)
- `username` - Sender username
- `message` - Message content
- `dateSent` - Sending timestamp

### **bugs** Table
- `bid` - Bug report ID (Primary Key)
- `username` - Reporter username
- `bugTitle` - Bug title
- `bugDesc` - Bug description
- `bugType` - Type of bug
- `dateReported` - Report timestamp

---

## Installation & Setup

### **Prerequisites**
- XAMPP/WAMP/LAMP installed
- Apache web server running
- MySQL/MariaDB database server
- PHP 7.x or higher
- Modern web browser

### **Step-by-Step Installation**

1. **Clone the Repository**
   ```bash
   git clone https://github.com/ankush-github-11/poll-system.git
   ```

2. **Move to Server Directory**
   - **XAMPP Users:** `C:\xampp\htdocs\myproject` (or your XAMPP path)
   - **WAMP Users:** `C:\wamp\www\myproject` (or your WAMP path)
   - **Linux/Mac:** `/var/www/html/myproject`

3. **Create Database**
   - Open phpMyAdmin: `http://localhost/phpmyadmin`
   - Create a new database named `polldb`
   - Character set: `utf8mb4`, Collation: `utf8mb4_unicode_ci`

4. **Import Database Tables**
   - Go to phpMyAdmin → `polldb` database
   - Click on "Import" tab
   - If you have an SQL file, upload it
   - Otherwise, manually create tables using the schema provided

5. **Configure Database Connection**
   - Edit `config/connect.php`:
   ```php
   <?php
       session_start();
       define("LOCALHOST", "localhost");
       define("DB_USERNAME", "root");
       define("DB_PASSWORD", "");
       define("DB_NAME", "polldb");
       $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn));
       $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));
   ?>
   ```

6. **Start Apache & MySQL**
   - XAMPP: Click "Start" for Apache and MySQL
   - WAMP: Click "Start" in the system tray
   - Linux: `sudo service apache2 start` and `sudo service mysql start`

7. **Access the Application**
   - Open browser: `http://localhost/myproject`
   - Or: `http://127.0.0.1/myproject`

---

## Usage Guide

### **For New Users**

1. **Create Account**
   - Click "Sign Up" on homepage
   - Enter name, email, and password
   - Must use Gmail email address
   - Password must be at least 8 characters
   - Account created successfully!

2. **Login to Account**
   - Click "Login" on homepage
   - Enter email and password
   - Access personalized dashboard

3. **Create a Poll**
   - Click "Create Poll" button
   - Enter poll title and description
   - Add multiple poll options
   - Configure poll settings (type, theme, duration)
   - Schedule or publish immediately
   - Click "Create Poll"

4. **Participate in Polls**
   - Go to "View Polls" section
   - Browse available polls
   - Click on a poll to open
   - Select your choice
   - Submit vote
   - View live results

5. **View Results**
   - Click "Results" on any poll
   - See vote distribution
   - View percentage breakdown
   - Compare voting patterns

6. **Manage Profile**
   - Click "Profile" in navigation
   - Edit bio, phone, website
   - View poll creation history
   - Track participation count
   - Check voting statistics

7. **Account Security**
   - Go to "Security" section
   - Update password
   - Review security settings
   - Change privacy preferences

### **For Poll Creators**

1. **Edit Created Polls**
   - Go to "My Polls"
   - Select poll to edit
   - Modify title, description, or options
   - Update poll settings
   - Save changes

2. **Monitor Poll Results**
   - Check real-time vote counts
   - View percentage distribution
   - Export results (if available)
   - Extend poll duration if needed

3. **Share Polls**
   - Copy poll link from browser URL
   - Share on social media
   - Distribute via email
   - Use poll password for restricted access

---

## Security Considerations

### **Implemented Security Measures**
- Input sanitization using `htmlspecialchars()` and `trim()`
- SQL injection prevention with prepared statements
- XSS (Cross-Site Scripting) protection
- Password hashing with BCRYPT algorithm
- Email validation (Gmail only)
- Session-based authentication
- Single vote per user enforcement
- IP tracking to prevent duplicate votes

### **Best Practices Applied**
- Input validation for all forms
- Output escaping before display
- Secure database connections
- Hash-based password storage
- Session timeout management
- HTTPS recommended for production

### **Recommended Security Enhancements**
- Implement CSRF token validation
- Add rate limiting on login attempts
- Implement account lockout after failed attempts
- Add two-factor authentication (2FA)
- Use HTTPS/SSL certificates
- Regular security audits
- Database backup procedures

---

## Customization

### **Theming**
- Light/Dark mode toggle available
- Modify CSS files in each folder for styling
- Bootstrap 5.3 customization possible
- Google Fonts can be changed in HTML headers

### **Colors & Branding**
- Edit CSS files to change color scheme
- Primary color: `#ff0055` (Pink)
- Modify logo in `images/` folder
- Update site title in each PHP file

### **Adding Features**
- Create new folders following existing structure
- Include database table creation for new data
- Follow security practices in new code
- Implement proper input validation

---

## API Endpoints

- **Poll Submission:** `/submit/index.php` - Handle vote submission
- **Result Display:** `/pollresult/index.php` - Fetch and display results
- **User Data:** `/admin/index.php` - Dashboard statistics
- **Poll Search:** `/viewpolls/index.php` - Search available polls
- **Profile Updates:** `/profile/index.php` - Update user information

---

## Troubleshooting

### **Common Issues & Solutions**

| Issue | Solution |
|-------|----------|
| Database connection error | Check `config/connect.php` credentials |
| "Poll not found" error | Ensure poll ID is valid in URL |
| Can't create poll | Log in first, check user session |
| Vote not submitting | Refresh page, check browser console |
| Images not loading | Verify images/ folder exists |
| Styles not applying | Clear browser cache (Ctrl+Shift+Del) |
| Session expired | Log out and log in again |

### **Debug Mode**
- Check browser console (F12) for JavaScript errors
- Review PHP error logs in `/var/log/apache2/error.log`
- Test database connection in phpMyAdmin
- Verify file permissions are correct (644 for files, 755 for directories)

---

## Future Enhancements

### **Planned Features**
- Real-time result charts with Chart.js
- WebSocket for real-time updates
- Export poll results as PDF/CSV
- Advanced user filtering and search
- Email notifications for poll results
- Social media integration
- API for third-party integrations
- Mobile app version
- Advanced analytics and insights
- Scheduled poll reminders
- Poll templates library
- User roles and permissions
- Multi-language support
- Progressive Web App (PWA) support

---

## Contributing

Contributions are welcome and appreciated! To contribute:

1. **Fork the Repository**
   ```bash
   git clone https://github.com/ankush-github-11/poll-system.git
   ```

2. **Create Feature Branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

3. **Make Changes**
   - Follow existing code structure
   - Add comments for clarity
   - Test thoroughly

4. **Commit Changes**
   ```bash
   git commit -m "Add: brief description of changes"
   ```

5. **Push to Branch**
   ```bash
   git push origin feature/your-feature-name
   ```

6. **Create Pull Request**
   - Describe changes clearly
   - Reference any related issues
   - Wait for review and approval

### **Code Standards**
- Follow PSR-12 PHP coding standards
- Use prepared statements for database queries
- Sanitize all user inputs
- Add proper error handling
- Document complex functions
- Test across browsers and devices

---

## License

This project is open-source and available under the **MIT License**.

```
MIT License

Copyright (c) 2024 ankush-github-11

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
```

---

## Support & Contact

- **GitHub Issues:** [Report bugs or request features](https://github.com/ankush-github-11/poll-system/issues)
- **Email:** Contact through GitHub profile
- **Documentation:** See inline code comments
- **Wiki:** Check repository wiki for additional guides

---

## Resources

- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Bootstrap 5 Docs](https://getbootstrap.com/docs/5.3/)
- [JavaScript MDN](https://developer.mozilla.org/en-US/docs/Web/JavaScript/)
- [XAMPP Documentation](https://www.apachefriends.org/)

---

## 🎓 Learning Outcomes

By studying this project, you'll learn:
- Full-stack web development (PHP, MySQL, JavaScript)
- User authentication and session management
- Database design and SQL queries
- Security best practices
- Responsive web design
- Form handling and validation
- Bootstrap framework usage
- File organization and project structure

---

**Last Updated:** January 31, 2026  
**Version:** 1.0.0  
**Status:** Active Development