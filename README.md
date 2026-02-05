# Optimus Software Limited - Company Website

A modern, responsive company website built with Laravel 10, Inertia.js, Vue.js 3, and Tailwind CSS.

## Features

- **Modern Tech Stack**: Laravel 10 + Inertia.js + Vue.js 3 + Tailwind CSS
- **Responsive Design**: Mobile-first responsive design
- **Admin Panel**: Complete admin dashboard for content management
- **Dynamic Content**: Admin can update homepage content without coding
- **Contact Management**: View and manage customer messages
- **Service Management**: Add, edit, and manage company services
- **Job Circulars**: Post and manage job openings
- **Image Upload**: Upload and manage images for homepage sections
- **SEO Friendly**: Clean URLs and meta tags

## Services Offered

1. **Web Application Development** - Custom web applications with modern technologies
2. **Mobile App Development** - Native and cross-platform mobile applications
3. **Digital Marketing** - SEO, social media marketing, and online advertising
4. **Business Solutions** - ERP systems, CRM platforms, and workflow automation
5. **Hardware Solutions** - System integration and IT infrastructure management

## Installation

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js 16+ and npm
- MySQL database

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd optimus-software-limited
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Configuration**
   Update your `.env` file with database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=optimus_software_limited
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Create Database**
   Create a MySQL database named `optimus_software_limited`

7. **Run Migrations and Seeders**
   ```bash
   php artisan migrate --seed
   ```

8. **Create Storage Link**
   ```bash
   php artisan storage:link
   ```

9. **Build Assets**
   ```bash
   npm run build
   ```

10. **Start Development Server**
    ```bash
    php artisan serve
    ```

Visit `http://localhost:8000` to view the website.

## Admin Panel

Access the admin panel at:
- Dashboard: `/admin/dashboard`
- Homepage Settings: `/admin/homepage-settings`
- Services Management: `/admin/services`
- Job Circulars: `/admin/job-circulars`
- Contact Messages: `/admin/contacts`

## File Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── ContactController.php
│   │   └── Admin/
│   └── Models/
├── resources/
│   ├── js/
│   │   ├── Components/
│   │   │   └── Layout.vue
│   │   └── Pages/
│   │       ├── Home.vue
│   │       ├── About.vue
│   │       ├── Services.vue
│   │       ├── Contact.vue
│   │       ├── Careers.vue
│   │       └── Admin/
│   └── views/
│       └── app.blade.php
├── database/
│   ├── migrations/
│   └── seeders/
└── routes/
    └── web.php
```

## Key Features

### Homepage Management
- Update hero section title, description, and image
- Manage about section content and image
- Update contact information
- Social media links management

### Services Management
- Add/edit/delete services
- Reorder services with sort functionality
- Enable/disable services

### Job Management
- Create job circulars with detailed information
- Set application deadlines
- Manage job status (active/inactive)

### Contact Management
- View all customer messages
- Mark messages as read/unread
- Contact form with validation

## Technologies Used

- **Backend**: Laravel 10, PHP 8.1+
- **Frontend**: Vue.js 3, Inertia.js
- **Styling**: Tailwind CSS
- **Database**: MySQL
- **Build Tool**: Vite
- **Package Manager**: Composer, npm

## Development

For development, run:
```bash
npm run dev
php artisan serve
```

This will start the Vite development server with hot reloading.

## Production Deployment

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Run `composer install --optimize-autoloader --no-dev`
4. Run `npm run build`
5. Configure your web server to point to the `public` directory

## License

This project is proprietary software developed for Optimus Software Limited.

## Support

For support and inquiries, contact:
- Email: info@optimussoftware.com
- Phone: +880 1234 567890