# Area71 Academy – Localhost Laravel Project

This is the local version of the **Area71 Academy Training Platform**, a Laravel-based web application developed for managing and delivering online training programs on Amazon FBA and related topics.

## 🔧 Features

- Laravel 10 Framework
- Authentication (Login/Register)
- Admin & User Dashboards
- Course Purchase and Enrollment System
- SSLCOMMERZ Payment Gateway Integration
- Order and Order Details Management
- Responsive Frontend with Blade Templating
- DataTables for Admin Panel Data Display
- Modular MVC Architecture

## 📦 Installation Steps

1. Clone or download this project.
2. Run the following commands:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
