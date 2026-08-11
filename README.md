# Simplified E-commerce Website Project  
Welcome to the __Simplified E-commerce Website Project__ Repository!  
This project demonstrates the design and development of a full-stack e-commerce web application, showcasing modern web development principles and the MVC architectural pattern. It features user authentication, product catalog management, shopping cart functionality, order processing, product reviews, an administrative dashboard, and AJAX-powered interactions to deliver a responsive user experience.

---
# Application Architecture  
The application architecture for this project follows the Model-View-Controller (MVC) architecture:
![application-architecture-image](https://github.com/al-akl/e-commerce-website/blob/4cae4ab38d4024c4f3cf281956b7072bda68e700/docs/application-architecture.png)

---
# Project Requirements  
Building the E-commerce Website (Web Development)  

__Objective__  

Develop a simplified version of an E-commerce Website using Apache & MySQL running via XAMPP, HTML, CSS, JavaScript and PHP.  

__Specifications__  
- __Architecture:__ Implement the application using the Model–View–Controller (MVC) architecture with a dedicated service layer to ensure separation of concerns and maintainability.
- __Authentication:__ Provide secure user registration, login, logout, and role-based access control for customers and administrators.
- __Product Management:__ Enable administrators to perform CRUD operations on products.
- __Shopping Experience:__ Allow customers to browse products, filter items, manage a shopping cart, place orders, and submit product reviews.
- __User Experience:__ Use AJAX to support asynchronous operations such as cart updates and form submissions without requiring full page reloads.
- __Database:__ Store and manage application data using MySQL.

---
# Tools Used
- Visual Studio Code: Write HTML, CSS, JavaScript and PHP files
- XAMPP: Run Apache and MySQL databases.
- DrawIO: Design application architecture, and data model.
---
# Repository Structure  
```text
e-commerce-project/
│
├── novastore/
|    |
|    ├── assets/                      # Static assets
|    |     ├── css/                   # Stylesheets
|    |     ├── images/                # Product Images
|    |     ├── js/                    # JavaScript files
|    |
|    ├── config/                      # Database Connectivity
|    |
|    ├── controllers/                 # Handle HTTP requests
|    |
|    ├── core/                        # Core framework component (Router)       
|    │
|    ├── database/
|    |     ├── data.sql               # Sample data
|    |     ├── schema.sql             # Database schema
|    │   
|    ├── models/                      # Data access layer 
|    │
|    ├── services/                    # Business logic
|    |
|    ├── views/                       # Presentation layer         
|    |    ├── admin/                  # Administrator pages
|    |    ├── auth/                   # Authentication pages
|    |    ├── partials/               # Reusable view components
|    |    ├── private/                # Customer-only pages
|    |    ├── public/                 # Publicly accessible pages
|    |
|    ├── index.php/                   # Front controller (application entry point)
|
├── docs/
|    ├── application-architecture.png #Draw.io file shows the project's architecture
|    ├── data-model.png               #Draw.io file shows the database schema
|                    
├── README.md                                    
```
---
# AI Usage  
The HTML and CSS components of this project were initially generated with the assistance of AI and then adapted and refined by me. All PHP backend development, JavaScript functionality, database design, MVC architecture, and feature integration were implemented by me. Throughout development, AI was additionally used as a debugging assistant and to clarify technical concepts.  

---
# About Me  
Hello! I'm Elias ALAKL, a third-year Computer and Communication Engineering student. I'm passionate about technology and enjoy learning new concepts on my own. I'm always looking for opportunities to improve my skills and build projects that challenge me.
