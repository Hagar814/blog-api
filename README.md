# Blog API - Laravel

This is a RESTful Blog API built with **Laravel**, supporting authentication using **Laravel Sanctum**, and providing features to manage blog posts.

---

## 🔧 Features

- **User Authentication (Login / Logout)**
- **Token-based Auth** using Laravel Sanctum
- **Create / Read / Update / Delete Posts**
- **Authorization**: Users can only edit or delete their own posts
- **API Resources** for clean JSON responses
- **Pagination** for listing posts
- **Validation** via Form Requests
- **Custom API Response Handler**

---
### Specific Libraries and Versions
- Laravel Framework: 11.x
- Laravel Sanctum: ^2.11
- PHP: ^8.4
- Composer: ^2.0
- Mewebstudio/Captcha: ^4.0 (if used for Captcha)
- Google reCAPTCHA: Optional for login form validation
## Project Setup

### Prerequisites
- PHP >= 8.4
- Composer >= 2.x
- MySQL or any other database
- Node.js and npm (for managing front-end assets)

## 📦 Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/blog-api.git
   cd blog-api

2. **install dependecies**:
- install Breeze API
- composer requir laravel/sactum

3. **in file .env**:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

### API Endpoints

| HTTP Method | Endpoint                  | Description                                |
|-------------|---------------------------|--------------------------------------------|
| POST        | `/api/auth/register`            | User registration 
| POST        | `/api/auth/login`              | User login and receive auth token          |
| POST        | `/api/auth/logout`             | Logout the authenticated user              |
| GET         | `/api/posts`              | Retrieve all posts (paginated)             |
| GET         | `/api/posts/{id}`         | Retrieve a single post by ID               |
| POST        | `/api/posts`              | Create a new post (requires auth)          |
| PUT         | `/api/posts/{id}`         | Update a post (requires auth & ownership)  |
| DELETE      | `/api/posts/{id}`         | Delete a post (requires auth & ownership)  |
