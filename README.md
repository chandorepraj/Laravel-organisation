# Laravel 12 Organisation Management System

A modern Laravel 12 application for managing Organisations, Locations, and Roles with both Web UI and REST APIs.
Built using AJAX interactions, Bootstrap UI, and token-based API authentication.

---

## 🚀 Features

* Bootstrap 5 admin theme integration
* Organisation CRUD management
* Multiple Locations per Organisation
* Role Management
* REST API with Bearer Token authentication
* Laravel Sanctum API security
* Authentication using Laravel Breeze
* AJAX-based form submission
* Bootstrap Modal for Add/Edit
* DataTables listing with search & pagination
* Server-side validation
* RESTful routes
* Clean MVC architecture
* Email Verification using Brevo
* API Resources for structured JSON responses

---

## 🧩 Modules

### 🏢 Organisation

* Create Organisation
* Edit Organisation
* Delete Organisation
* View Organisation list
* Organisation details with multiple locations
* Created by user relation

### 📍 Locations

* Add multiple locations per organisation
* AJAX modal popup
* Update location modal
* Delete location
* Organisation → Locations relationship

### 👥 Roles

* Role CRUD
* Role listing with DataTables
* Role assignment support

---

## 🔐 Authentication

* Laravel Breeze authentication
* Login / Register
* Middleware protected routes
* Email verification using Brevo
* API authentication using Laravel Sanctum
* Bearer Token protected APIs

---

## 🔑 API Features

* Login API with token generation
* Organisation CRUD API
* Location CRUD API
* Role CRUD API
* Protected routes using `auth:sanctum`
* API Resources for response formatting
* JSON based validation errors
* Nested relations (Organisation → Locations → User)

---

## 📊 DataTables

* Server-side processing
* AJAX loading
* Pagination
* Search & filtering
* Sorting support

---

## ⚡ Tech Stack

* Laravel 12
* PHP
* MySQL
* Bootstrap 5
* jQuery
* AJAX
* Yajra DataTables
* Laravel Breeze
* Laravel Sanctum
* Brevo (Email Service)

---

## 📁 Project Setup

```bash
git clone https://github.com/yourusername/your-repo-name.git
cd your-repo-name
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## 🎯 Highlights

* Modular CRUD structure
* AJAX powered UI
* Reusable modal components
* Clean controller logic
* Migration-based database setup
* API + Web architecture
* Eloquent relationships
* Resource-based API responses
* Sanctum token authentication

---

## 📌 API Authentication Example

```
Authorization: Bearer YOUR_TOKEN
Accept: application/json
```

---

## 👩‍💻 Author

Laravel Developer
PHP (Core) + CodeIgniter Experience
Learning & implementing Laravel 12
Building REST APIs with Sanctum

---

## 📌 Purpose

This project demonstrates practical Laravel development skills including:

* CRUD operations
* Eloquent relationships
* REST API development
* Authentication & Authorization
* AJAX UI interactions
* DataTables integration
* Resource-based API responses
* Token-based API security

---

## 📜 License

This project is open-sourced software licensed under the MIT license.
