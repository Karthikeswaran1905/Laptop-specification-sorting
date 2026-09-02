# 💻 Laptop Specification Sorting

## 📌 Project Description

**Laptop Specification Sorting** is a web-based application developed using **PHP, MySQL, HTML, CSS, and JavaScript**.

The application helps users browse and compare laptop specifications. Users can search for laptops, sort them based on different criteria, and filter laptops according to categories such as Gaming, Multitasking, Best Display, and Top 5 laptops.

The laptop information is stored in a **MySQL database** and displayed dynamically using PHP.

---

# 🚀 Features

* 🔍 Search laptops by model name.
* 📊 Sort laptops by price.
* 🏷️ Sort laptops by brand.
* 🎮 Filter Gaming laptops.
* 💻 Filter laptops suitable for Multitasking.
* 🖥️ Filter laptops with large displays.
* ⭐ Display laptop ratings and scores.
* 💾 Display RAM and storage specifications.
* ⚖️ Display laptop weight.
* 💰 Display laptop prices.
* 🔄 View detailed laptop information.
* 🌙 Dark mode option.
* 📱 User-friendly interface.

---

# 🛠️ Technologies Used

### Frontend

* HTML
* CSS
* JavaScript

### Backend

* PHP

### Database

* MySQL

### Server

* Apache Server using XAMPP

---

# 📂 Project Structure

```text
Laptop Specification Sorting/
│
└── exp4/
    │
    ├── index.php
    ├── compare.php
    ├── wishlist.php
    ├── db.php
    ├── style.css
    │
    └── images/
        ├── l1.jpg
        ├── l2.jpg
        └── l3.jpg
```

---

# 📄 File Description

## 1. index.php

This is the main page of the application.

It displays all the laptops available in the database.

The page provides the following functionality:

* Search laptops.
* Sort laptops.
* Filter laptops by category.
* Display laptop cards.
* Display laptop specifications.
* Navigate to the laptop details page.
* Enable Dark Mode.

### Search Function

Users can search for a laptop using its model name.

Example:

```text
Search Laptop
```

The application uses the following SQL condition:

```sql
WHERE model LIKE '%search%'
```

---

## 2. Sorting Functionality

The application allows users to sort laptops.

Available sorting options include:

* Price
* Brand

The selected sorting option is passed through the URL using the GET method.

Example:

```text
ORDER BY price
```

or

```text
ORDER BY brand
```

---

# 📂 Categories

The application provides multiple laptop categories.

## 🎮 Gaming

Gaming laptops are filtered based on price.

```text
Price > ₹200000
```

---

## 💼 Multitasking

Laptops with higher RAM are displayed.

The application selects laptops with:

```text
32GB RAM
64GB RAM
```

---

## 🖥️ Best Display

Laptops with larger displays are selected.

The application filters laptops with:

```text
Display Size >= 16 inches
```

---

## ⭐ Top 5

The application displays only five laptops.

The SQL query uses:

```sql
LIMIT 5
```

---

# 3. compare.php

This file displays detailed information about a selected laptop.

The laptop is selected using its unique ID.

Example:

```text
compare.php?id=1
```

The application retrieves the laptop details from the database.

The following details are displayed:

* Laptop Model
* RAM
* Storage
* Price

---

# 4. wishlist.php

This file manages the wishlist functionality.

It changes the wishlist status of a laptop.

The status is toggled between:

```text
0 = Not in Wishlist

1 = Added to Wishlist
```

The application uses the following SQL logic:

```sql
UPDATE laptops
SET wishlist =
CASE
WHEN wishlist = 1 THEN 0
ELSE 1
END
WHERE id = Laptop_ID;
```

---

# 5. db.php

This file is responsible for connecting the PHP application to the MySQL database.

Database connection:

```php
$conn = new mysqli(
    "localhost",
    "root",
    "",
    "exp4"
);
```

The database used is:

```text
exp4
```

---

# 6. style.css

This file contains the styling of the application.

It controls:

* Page layout
* Laptop cards
* Sidebar
* Buttons
* Search bar
* Dropdown menus
* Colors
* Dark mode appearance

---

# 🖼️ Images Folder

The `images` folder contains laptop images.

```text
images/
│
├── l1.jpg
├── l2.jpg
└── l3.jpg
```

These images are displayed dynamically with the laptop information.

---

# 🗄️ Database Setup

Create a database named:

```text
exp4
```

Use the following SQL command:

```sql
CREATE DATABASE exp4;
```

Select the database:

```sql
USE exp4;
```

---

# 📊 Laptops Table

Create a table named:

```text
laptops
```

The table should contain the following fields:

| Field        | Description           |
| ------------ | --------------------- |
| id           | Unique Laptop ID      |
| brand        | Laptop Brand          |
| model        | Laptop Model          |
| price        | Laptop Price          |
| ram          | RAM Specification     |
| storage      | Storage Specification |
| display_size | Laptop Display Size   |
| weight       | Laptop Weight         |
| rating       | Laptop Rating         |
| score        | Laptop Score          |
| image        | Laptop Image Path     |
| wishlist     | Wishlist Status       |

---

# 🧱 Table Creation

```sql
CREATE TABLE laptops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(100) NOT NULL,
    model VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    ram VARCHAR(20),
    storage VARCHAR(50),
    display_size VARCHAR(20),
    weight VARCHAR(20),
    rating DECIMAL(3,1),
    score INT DEFAULT 95,
    image VARCHAR(255),
    wishlist TINYINT DEFAULT 0
);
```

---

# ⚙️ Installation and Setup

## Step 1: Install XAMPP

Download and install XAMPP.

XAMPP provides:

* Apache
* PHP
* MySQL
* phpMyAdmin

---

## Step 2: Extract the Project

Extract the project ZIP file.

Copy the `exp4` folder to:

```text
C:\xampp\htdocs\
```

The project location should be:

```text
C:\xampp\htdocs\exp4
```

---

## Step 3: Start XAMPP

Open the XAMPP Control Panel.

Start:

```text
Apache
MySQL
```

---

## Step 4: Create Database

Open phpMyAdmin.

Create a database named:

```text
exp4
```

Create the `laptops` table.

---

## Step 5: Add Laptop Data

Insert laptop information into the database.

Example:

```sql
INSERT INTO laptops
(brand, model, price, ram, storage, display_size, weight, rating, score, image, wishlist)

VALUES

(
'ASUS',
'ASUS ROG Zephyrus',
150000,
'16GB',
'1TB SSD',
'16"',
'2.0kg',
4.8,
95,
'images/l1.jpg',
0
);
```

---

# ▶️ Running the Application

Open your web browser.

Enter:

```text
http://localhost/exp4/
```

The application will display the Laptop Comparison page.

---

# 🔄 Working Flow

```text
User
 │
 ▼
Open Website
 │
 ▼
Laptop Comparison Page
 │
 ├──────────────┐
 ▼              ▼
Search        Sort
 │              │
 ▼              ▼
Filter       Database
 │              │
 └──────┬───────┘
        │
        ▼
Display Laptop Cards
        │
        ▼
Select Laptop
        │
        ▼
View Laptop Details
```

---

# 🔍 Search Working Flow

```text
User enters Laptop Name
          │
          ▼
Search Request
          │
          ▼
PHP receives Search Value
          │
          ▼
MySQL Query
          │
          ▼
Search Laptop Model
          │
          ▼
Display Matching Laptops
```

---

# 📊 Sorting Working Flow

```text
User selects Sort Option
          │
          ▼
Price / Brand
          │
          ▼
PHP receives Sort Value
          │
          ▼
ORDER BY SQL Query
          │
          ▼
Sorted Laptop List
```

---

# 🎯 Project Objective

The main objective of this project is to develop a simple application for organizing and comparing laptop specifications.

The project demonstrates:

* PHP programming.
* MySQL database connectivity.
* Dynamic data retrieval.
* Search functionality.
* Sorting functionality.
* Filtering functionality.
* SQL queries.
* GET method.
* Conditional statements.
* Web application development.

---

# 💡 Example Features

## Search

Users can search:

```text
ASUS
```

The application displays laptops matching the search term.

---

## Sort by Price

Users can arrange laptops according to price.

```text
Low Price
    ↓
High Price
```

---

## Sort by Brand

Laptops can be arranged alphabetically according to their brand.

```text
Apple
ASUS
Dell
HP
Lenovo
```

---

## Gaming Category

The application identifies high-performance laptops suitable for gaming.

The condition used is:

```text
Price > 200000
```

---

## Multitasking Category

The application identifies laptops with high RAM.

Supported RAM:

```text
32GB
64GB
```

---

# 🌙 Dark Mode

The application includes a Dark Mode button.

When the user clicks the button, JavaScript adds or removes the `dark` class.

Example:

```javascript
function toggleMode(){
    document.body.classList.toggle("dark");
}
```

This changes the appearance of the application.

---

# 📋 Requirements

The following software is required:

* Windows / Linux / macOS
* XAMPP
* PHP
* MySQL
* Web Browser

Recommended browser:

* Google Chrome
* Microsoft Edge
* Mozilla Firefox

---

# 🔮 Future Enhancements

The following features can be added in future versions:

* ❤️ Complete wishlist interface.
* 🔄 Compare multiple laptops.
* 📊 Advanced laptop comparison table.
* 💰 Price range filtering.
* 🏷️ Brand filtering.
* ⭐ Rating-based sorting.
* 🔐 User login and registration.
* 👤 User accounts.
* 🛒 Laptop purchase links.
* 📱 Responsive mobile design.
* 🔍 Advanced search.
* 📊 Laptop recommendation system.

---

# 👨‍💻 Conclusion

The **Laptop Specification Sorting** project is a simple and effective web application developed using PHP and MySQL.

The application allows users to search, sort, filter, and view laptop specifications dynamically. It demonstrates important web development concepts such as database connectivity, SQL queries, dynamic data display, filtering, and sorting.

This project is useful for understanding the integration of **PHP, MySQL, HTML, CSS, and JavaScript** in a real-world web application.
