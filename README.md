# 📚 Area71 Academy – Laravel Training Platform (Localhost Build)

![Laravel](https://img.shields.io/badge/Laravel-10.x-red)
![PHP](https://img.shields.io/badge/PHP-%3E=8.1-blue)
![License](https://img.shields.io/badge/License-MIT-green)

This is the **localhost build** of the **Area71 Academy Training Platform**, a Laravel-based web application for managing and delivering online training programs such as **Amazon FBA Mastery**, **Supply Chain**, and more.

---

## 🔧 Features

- ⚡ Built with **Laravel 10 Framework**
- 🔑 Authentication (Login/Register)
- 📊 Admin & User Dashboards
- 🛒 Course Purchase and Enrollment System
- 💳 SSLCOMMERZ Payment Gateway Integration
- 📦 Orders and Order Details Management
- 🎨 Responsive Frontend with Blade Templating
- 📑 DataTables for Admin Panel Data Display
- 🏗️ Modular MVC Architecture

---

## 🚀 Installation Steps

1. Clone or download this project.
2. Run the following commands:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve


Access the app 👉 http://127.0.0.1:8000

🧰 Tech Stack

Backend: Laravel 10, PHP 8.1+

Database: MySQL

Frontend: Blade Templating, Bootstrap/Tailwind

Payment: SSLCOMMERZ Gateway

Others: DataTables, MVC Pattern

📸 Screenshots
🏠 Home






📚 Courses




🛒 Cart & Auth




📞 Contact

🎓 Course Images (Promo)
Amazon FBA	Bundle	Daraz	Supply Chain

	
	
	
🎬 Demo (Video)

Watch the demo right here 👇

https://github.com/aarefinn/website_laravel_Area71/raw/main/docs/demo/area71-academy-demo.mp4

(GitHub supports inline playback for .mp4 files)

📂 Project Structure (Key)
app/
database/
public/
resources/
routes/
storage/
docs/
 ├─ screenshots/
 ├─ course-images/
 └─ demo/

🧪 Database Seeding

Run the following command to seed initial data:

php artisan migrate --seed


Custom seeders are inside database/seeders.

🗺️ Roadmap

 Full course → order → dashboard flow

 Student purchase history UI

 Stripe/SSLCOMMERZ sandbox toggle in .env

 Enrollment reports for admin


📄 License

This project is open-source under the MIT license.


---
