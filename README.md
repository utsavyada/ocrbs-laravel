# OCRBS – Online Conference Room Booking System

## Features
- Conference hall availability
- Dynamic time slot grid
- Pagination (5/10/15 days)
- Admin-ready architecture

## Tech Stack
- Laravel 12
- MySQL
- Blade
- CSS

## Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
