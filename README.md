
---

# Travel Booking System

## 📌 Overview
The **Travel Booking System** enables users to search, book, and manage travel reservations. Built using PHP with a relational database backend, it ensures efficient data handling and user-friendly interactions.

## 🚀 Features
- Search and filter travel options (hotels, flights, rental services).
- Secure booking and payment integration.
- User authentication and profile management.
- Admin panel for managing listings and reservations.
- Responsive design with HTML and CSS for a seamless UI.

## 🔧 Tech Stack
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL (via XAMPP)
- **Server:** Apache (XAMPP)

## 📂 Database Schema
Key tables include:
- `users` (id, name, email, password)
- `bookings` (id, user_id, travel_id, booking_date, status)
- `travel_options` (id, type, location, price, availability)

## ⚙️ Setup Guide
### Prerequisites:
1. Install **XAMPP** ([Download Here](https://www.apachefriends.org/index.html)).
2. Clone the repository:
   ```bash
   git clone https://github.com/your-repo/travel-booking-system.git
   ```
3. Move project files to `htdocs` inside the **XAMPP** directory.
4. Start **Apache** and **MySQL** in XAMPP.

### Database Setup:
1. Open **phpMyAdmin** and create a new database:
   ```sql
   CREATE DATABASE travel_booking;
   ```
2. Import `travel_booking.sql` from the repository.
3. Update database connection in `config.php`:
   ```php
   $conn = new mysqli("localhost", "root", "", "travel_booking");
   ```

## 🖥️ Running the Project
1. Ensure **Apache & MySQL** are running in XAMPP.
2. Open browser and visit:
   ```
   http://localhost/travel-booking-system
   ```
3. Log in or sign up to test booking features.

## 🛠️ Contribution Guidelines
1. Fork the repository.
2. Create a new branch: `git checkout -b feature-name`
3. Commit changes: `git commit -m "Added feature"`
4. Push and submit a pull request.

## 📜 License
This project is licensed under the Apache 2.0 License. See `LICENSE` for details.

---

