A. Next.js Frontend (App Router, CRUD Posts, DaisyUI)
This project serves as the user interface for the blog application,

Features
App Router: Leverages Next.js 14's App Router for efficient routing and data fetching.

CRUD Operations:

Post Listing: Displays all blog posts.

Post Detail: Shows a single post's content.

Create Post: Form to add new blog posts.

Edit Post: Form to modify existing blog posts.

Delete Post: Functionality to remove posts.

DaisyUI: Utilizes DaisyUI as the component library for a modern and responsive design.

Technologies Used
Next.js 14+

React

Tailwind CSS

DaisyUI

Getting Started
Clone the repository:

Bash

git clone [Link to your Next.js project GitHub Repo]
cd your-nextjs-project-name
Install dependencies:

Bash

npm install

# or

yarn install
Configure Environment Variables:
Create a .env.local file in your project's root directory and add the following:

Code snippet

NEXT_PUBLIC_API_BASE_URL=http://localhost:8000/api # Or wherever your Laravel API is running
NEXT_PUBLIC_AUTH_API_BASE_URL=http://localhost:8001 # Or wherever your Django Auth service is running
Run the development server:

Bash

npm run dev

# or

yarn dev
Open http://localhost:3000 with your browser to see the result.

B. Laravel API (CRUD Posts, Pagination, DB Migration & Seeder)
This project provides the backend API for managing blog posts.

Features
Database Migration: tbl_posts schema definition.

Database Seeder: Populates tbl_posts with dummy data for development.

RESTful Endpoints for Posts:

GET /api/posts: Retrieve a list of all posts with pagination.

GET /api/posts/{id}: Retrieve a single post.

POST /api/posts: Create a new post.

PUT /api/posts/{id}: Update an existing post.

DELETE /api/posts/{id}: Delete a post.

Pagination: Implements pagination for the GET /api/posts endpoint.

Technologies Used
Laravel 10+

PHP 8.2+

MySQL (or your preferred database)

Getting Started
Clone the repository:

Bash

git clone [Link to your Laravel project GitHub Repo]
cd your-laravel-project-name
Install Composer dependencies:

Bash

composer install
Configure Environment Variables:
Create a .env file from .env.example and configure your database connection:

Code snippet

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
Generate Application Key:

Bash

php artisan key:generate
Run Database Migrations:

Bash

php artisan migrate
Seed the Database:

Bash

php artisan db:seed --class=PostSeeder # Ensure you have a PostSeeder created
Start the development server:

Bash

php artisan serve
The API will be available at http://localhost:8000.
