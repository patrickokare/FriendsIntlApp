# 🎓 Friendship Web Application — Patrick Okare (2016)

A web platform developed for **Friends International**, aimed at helping overseas students integrate into British culture by matching them with local hosting families.

## 🌍 Purpose
This project facilitates the “Friendship Link” hospitality scheme. It connects international students with UK-based families based on shared preferences such as:
- Age
- Dietary needs
- Gender
- Marital status
- Religion

## 💻 Technology Stack
- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP, MySQL
- **Infrastructure:** Microsoft Azure
- **Email Service:** SwiftMailer (SMTP)


## Web App - URL
  https://friendshiplink.azurewebsites.net/master/

## 🔧 Features
- Admin portal for secure login/logout
- Match creation between students and host families
- Student & Host CRUD operations
- Email notifications for successful matches
- Preference-based filtering system
- Session management and database abstraction
## 📁 Project Structure

<pre><code>
friendship-app/
├── css/                       # Stylesheets
├── fonts/                     # Font assets
├── images/                    # Static image assets
├── swiftmailer/               # Mail library
├── admine.php                 # Admin dashboard
├── dbConnect.php              # Database connection
├── new_student.php            # Add new student
├── new_host.php               # Add new host
├── create_matches.php         # Match logic
├── view_student.php           # View all students
├── view_host.php              # View all hosts
├── view_match.php             # View existing matches
├── edit_student.php           # Edit student info
├── edit_host.php              # Edit host info
├── delete_student.php         # Delete student record
├── delete_host.php            # Delete host record
├── delete_match_student.php   # Remove a match
├── session.php                # Session management
├── login.php / logout.php     # Authentication logic
├── index.php / home.php       # Landing / Homepage
└── README.md                  # Project documentation
</code></pre>

## 🚀 Hosting
Deployed on **Microsoft Azure**, with MySQL as the backend and SwiftMailer for email services.

## 📬 Contact
Built with ❤️ by Patrick Okare — [LinkedIn]([https://www.linkedin.com](https://www.linkedin.com/in/patrickokare/)




