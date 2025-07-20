# AKMS 2.0 - Anak Kariah Management System 🕌

*Masjid Al-Irsyad Management System*

A comprehensive web-based management system designed for Masjid Al-Irsyad to efficiently manage and monitor their Anak Kariah (community members/beneficiaries). The system provides modern admin dashboard functionality with a beautiful, responsive glassmorphism design.

![Laravel](https://img.shields.io/badge/Laravel-9.x%2F10.x-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-blue.svg)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple.svg)

## ✨ Features

- **Modern Admin Dashboard** with glassmorphism design and responsive interface
- **Member Management** - Complete CRUD operations for Anak Kariah with status tracking
- **Advanced Analytics** - Interactive charts and data visualization with Chart.js
- **Event Management** - Carousel management for mosque activities and announcements
- **Admin User Management** - Role-based access control and user administration
- **Real-time Updates** - Dynamic interactions powered by Laravel Livewire
- **Export Functionality** - CSV export capabilities for data management
- **Search & Filtering** - Advanced search and filtering capabilities
- **Mobile-Friendly** - Fully responsive design for all devices

## 🚀 Quick Start

### Prerequisites

Before you begin, ensure you have the following installed:

- **PHP 8.0** or higher
- **Composer** (PHP package manager)
- **MySQL/MariaDB 5.7+** or PostgreSQL
- **Node.js & NPM** (for asset compilation)
- **Web server** (Apache/Nginx) for production

**Required PHP Extensions:**
- OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath

### Installation

1. **Clone the repository**
   ```bash
   git clone [your-repo-url]
   cd AKMS2.0
   ```

2. **Install dependencies**
   ```bash
   # Install PHP dependencies
   composer install
   
   # Install Node.js dependencies (if any)
   npm install
   ```

3. **Environment setup**
   ```bash
   # Copy environment file
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

4. **Database configuration**
   
   Edit your `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=akms_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Database setup**
   ```bash
   # Run database migrations
   php artisan migrate
   
   # Seed database (optional)
   php artisan db:seed
   ```

6. **Create Livewire components**
   ```bash
   php artisan make:livewire AnakKariahChart
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

   Your application will be available at `http://localhost:8000`

## 🔧 Technology Stack

- **Backend:** PHP 8.x with Laravel Framework (9.x/10.x)
- **Frontend:** HTML5, CSS3, JavaScript (ES6+)
- **Real-time:** Laravel Livewire for dynamic interactions
- **Database:** MySQL/MariaDB
- **Styling:** Bootstrap 5 + Custom glassmorphism design
- **Icons:** Font Awesome 6.4.0, Bootstrap Icons
- **Charts:** Chart.js for data visualization
- **Typography:** Inter font (Google Fonts)

## 💻 Usage

### Admin Dashboard
Access the admin dashboard to view comprehensive analytics, manage members, and oversee mosque activities.

### Member Management
- Add new Anak Kariah members
- Update member information and status
- View detailed member profiles
- Export member data to CSV

### Analytics & Reporting
- View real-time charts and statistics
- Track member growth and engagement
- Generate reports for administrative purposes

### Event Management
- Manage mosque events and announcements
- Update carousel content for public display
- Schedule and organize community activities

## 🎨 Design Features

The system features a modern glassmorphism design with:
- Translucent backgrounds with backdrop filters
- Smooth animations and transitions
- Responsive grid layouts
- Modern color schemes and typography
- Intuitive user interface elements

## 🔧 Configuration

### Environment Variables

Key environment variables to configure:

```env
APP_NAME="AKMS 2.0"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=your-host
DB_PORT=3306
DB_DATABASE=your-database
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

### Additional Configuration

- Configure mail settings for notifications
- Set up file storage for member documents
- Configure backup schedules
- Set up SSL certificates for production

## 🚀 Deployment

### Production Deployment

1. **Server Setup**
   - Configure web server (Apache/Nginx)
   - Install PHP 8.0+ and required extensions
   - Set up MySQL/MariaDB database

2. **Application Deployment**
   ```bash
   # Install dependencies
   composer install --optimize-autoloader --no-dev
   
   # Configure environment
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   
   # Run migrations
   php artisan migrate --force
   ```

3. **Security**
   - Set proper file permissions
   - Configure SSL certificates
   - Set up firewall rules
   - Regular security updates

## 🤝 Contributing

We welcome contributions to AKMS 2.0! Please follow these guidelines:

1. **Fork** the repository
2. **Create** a feature branch (`git checkout -b feature/AmazingFeature`)
3. **Commit** your changes (`git commit -m 'Add some AmazingFeature'`)
4. **Push** to the branch (`git push origin feature/AmazingFeature`)
5. **Open** a Pull Request

### Code Style

- Follow **PSR-12** coding standards
- Use meaningful variable and function names
- Add comments for complex logic
- Write tests for new features

### Testing

```bash
# Run PHPUnit tests
php artisan test
```

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Support

If you encounter any issues or have questions:

- **Issues:** Open an issue on GitHub
- **Email:** [your-email@example.com]
- **Documentation:** Check the Wiki section

## 🛣️ Roadmap

### Upcoming Features

- [ ] **Mobile App** - React Native companion app
- [ ] **API Integration** - RESTful API for third-party integrations
- [ ] **Advanced Reporting** - PDF report generation
- [ ] **Notification System** - Email/SMS notifications
- [ ] **Multi-language Support** - Bahasa Malaysia and English
- [ ] **Backup System** - Automated database backups
- [ ] **Audit Trail** - Comprehensive activity logging

### Version History

- **v2.0.0** - Initial release with modern UI and core features
- **v1.x.x** - Legacy version (deprecated)

## 🙏 Acknowledgments

- **Masjid Al-Irsyad** - For the opportunity to serve the community
- **Laravel Community** - For the excellent framework and resources
- **Bootstrap Team** - For the responsive CSS framework
- **Font Awesome** - For the beautiful icons

---

**Developed with ❤️ for Masjid Al-Irsyad Community**

*"And whoever does righteous deeds, whether male or female, while being a believer - those will enter Paradise and will not be wronged, [even as much as] the speck on a date seed."* - Quran 4:124
