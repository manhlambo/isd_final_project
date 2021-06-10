<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Installation
1. Open Terminal and do a clone of the project and go to the project directory with the following command: 
- git clone https://github.com/manhlambo/isd_final_project.git.
- cd isd_final_project

2. Run composer and npm to install the necessary packages in the project 
- composer install.
- npm install.

3. Create database and config database 
- Go to phpmyadmin to create a new database: 
    - laravel.
- Execute the following command to copy the env file: 
    - cp .env.example .env.
- Update your env file as follows: 
      DB_CONNECTION=mysql          
      DB_HOST=127.0.0.1            
      DB_PORT=3306                 
      DB_DATABASE=laravel       
      DB_USERNAME=root             
      DB_PASSWORD=  

4. Generate key for the project 
- php artisan key:generate

5. Create tables and sample data for the database 
- php artisan migrate

6. Build styles and scripts 
- npm run dev

7. Install laravel excel
- composer require maatwebsite/excel

8. Serve the project: 
- php artisan serve

9. Final steps:
- Register user
- Go to phpmyadmin, insert admin role in roles table
   - name: Admin
   - slug: admin
- Attach admin role to user. Go to role_user table:
   - user_id: 1-user
   - role_id: 1-Admin 
- Press F5 to see the change in the website
- Add teacher role
   - Go to 'Quản lý phân quyền'
   - Insert 'Teacher' and press 'Tạo'





