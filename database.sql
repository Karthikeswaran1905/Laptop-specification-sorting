CREATE DATABASE laptop_db;

USE laptop_db;

CREATE TABLE laptops (

```
id INT AUTO_INCREMENT PRIMARY KEY,

brand VARCHAR(100) NOT NULL,

model VARCHAR(255) NOT NULL,

price DECIMAL(10,2) NOT NULL,

ram VARCHAR(50) NOT NULL,

storage VARCHAR(100) NOT NULL,

display_size VARCHAR(50),

weight VARCHAR(50),

rating DECIMAL(3,1),

score INT,

image VARCHAR(255),

wishlist TINYINT DEFAULT 0
```

);
