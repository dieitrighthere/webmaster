# WEBMASTER - ISAFP CMS Platform & Portal System

> **A comprehensive Content Management System and Portal Platform for the Intelligence Service of the Armed Forces of the Philippines**

## 📋 Project Overview

WEBMASTER is a dual-purpose platform that serves as both a public-facing website for ISAFP and a comprehensive Content Management System (CMS) with integrated portal access to multiple Information Systems. The platform provides network-based access control, distinguishing between public visitors and authorized AFPNET users.

### 🎯 Purpose
- **Public Website**: Accessible information for general visitors including news, careers, legacy content, and organizational information
- **CMS Platform**: Administrative interface for content management with approval workflows
- **Portal System**: Unified gateway providing access to multiple integrated Information Systems for authorized users

### 👥 Target Audience
- **Public Visitors**: General public accessing organizational information
- **Content Administrators**: Staff managing website content through the CMS
- **AFPNET Users**: Authorized personnel accessing integrated Information Systems
- **System Administrators**: Technical staff managing the platform

## 🏗️ System Architecture

### Public Website Flow
```
Visitor → Network Detection → Public Website
                           ↓
        [News, Careers, Home, Legacy Pages]
```

### AFPNET Portal Flow
```
AFPNET User → Authentication → Portal Dashboard → User Type Detection
                                        ↓
    [LMS | PIMS | NIRMS | SPMS | ICOMS | UCS | FMS | IPED]
                                        ↓
                            API Integration Layer
                                        ↓
                        [Connected Information Systems]
```

### CMS Workflow
```
Content Creation → Draft Status → Review Process → Approval → Publication
                                       ↓
                            Version Control System
```

## ✨ Key Features

### 🌐 Public Website
- **Responsive Design**: Mobile-first approach with Tailwind CSS
- **Content Areas**: News articles, career postings, organizational legacy, announcements
- **Network Detection**: Automatic detection of AFPNET vs public network access
- **Government Compliance**: Official Philippine government footer and branding

### 🔐 Portal System
- **Multi-System Integration**: Unified access to 8 different Information Systems:
  - **LMS** (Logistics Management System)
  - **PIMS** (Personnel Information Management System)
  - **NIRMS** (Network and ICT Risk Management System)
  - **SPMS** (Strategic Planning Management System)
  - **ICOMS** (Intelligence Collection Operations Management System)
  - **UCS** (Unified Clearance System)
  - **FMS** (Financial Management System)
  - **IPED** (Intelligence Personnel and Equipment Database)

### 📝 Content Management System
- **Content Types**: News articles, career postings, announcements, page content
- **Workflow Management**: Draft → Review → Approval → Publication
- **Version Control**: Track changes with revert capabilities
- **Multi-User Support**: Role-based access control for different content types
<!-- - **SEO Management**: Meta tags, URL management, and search optimization -->

### 🔧 Administrative Features
- **User Management**: Role-based permissions and access control
- **Analytics Integration**: Traffic and usage monitoring
- **Backup Systems**: Automated content and database backups
- **API Integration**: RESTful APIs for system interconnectivity

## 🛠️ Technical Stack

### Backend
- **Framework**: Laravel 11+ (PHP 8.3.13)
- **Database**: JSON files (current) → Microsoft SQL Server (planned)
- **Authentication**: Laravel Breeze with AFPNET integration
- **Content Management**: Custom trait-based system

### Frontend
- **JavaScript Framework**: Vue.js 3
- **CSS Framework**: Tailwind CSS
- **Build Tool**: Vite
- **Page Transitions**: Inertia.js

### Development Environment
- **PHP**: 8.3.13+
- **Node.js**: 22.16.0+
- **Package Manager**: Composer + NPM

## 🚀 Installation & Setup

### Prerequisites
```bash
# Required software
PHP >= 8.3.13
Node.js >= 22.16.0
Composer
Git
```

### Installation Steps

1. **Clone Repository**
```bash
git clone https://github.com/isafp/webmaster.git
cd webmaster
```

2. **Install Dependencies**
```bash
# PHP dependencies
composer install

# Node.js dependencies
npm install
```

3. **Environment Configuration**
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure environment variables
# Edit .env file with your settings
```

4. **Database Setup**
```bash
# For JSON file system (current)
mkdir -p resources/data

# For future MSSQL integration
# Update .env with database credentials
```

5. **Asset Compilation**
```bash
# Development
npm run dev

# Production
npm run build
```

6. **Start Development Server**
```bash
php artisan serve
```

## 📁 Project Structure

```
webmaster/
├── app/
│   ├── Http/Controllers/           # Page controllers
│   ├── Services/                   # Business logic services
│   ├── Traits/                     # Reusable functionality
│   └── Models/                     # Data models (future)
├── resources/
│   ├── js/
│   │   ├── Components/             # Vue.js components
│   │   ├── Layouts/                # Page layouts
│   │   └── Pages/                  # Vue.js pages
│   ├── data/                       # JSON content files
│   └── views/                      # Blade templates
├── public/                         # Static assets
├── routes/                         # Application routes
└── database/                       # Database files (future)
```

## 🔧 Configuration

### Network Detection
Configure AFPNET IP ranges in `config/app.php`:
```php
'afpnet_ranges' => [
    '192.168.1.0/24',    // Example range
    '10.0.0.0/8',        // Example range
    // Add actual AFPNET ranges
],
```

### Content Management
JSON content files location: `resources/data/`
- `news.json` - News articles
- `announcements.json` - System announcements
- `careers.json` - Job postings (future)

## 🌍 Deployment

### Production Environment
- **Domain**: isafp.mil.ph
- **Server**: Government infrastructure
- **SSL**: Required for AFPNET integration
- **Backup**: Automated daily backups recommended

### Environment Variables
```bash
APP_ENV=production
APP_URL=https://isafp.mil.ph
DB_CONNECTION=sqlsrv  # For future MSSQL integration
AFPNET_DETECTION=true
```

## 🔐 Security Considerations

- **Network-Based Access Control**: AFPNET detection for secure features
- **Input Validation**: All user inputs sanitized and validated
- **CSRF Protection**: Built-in Laravel CSRF protection
- **SQL Injection Prevention**: Eloquent ORM and prepared statements
- **Role-Based Access**: Granular permissions for different user types

## 🧪 Testing

```bash
# Run PHP tests
php artisan test

# Run JavaScript tests
npm run test

# Run feature tests
php artisan test --filter=Feature
```

## 📖 API Documentation

### Portal Integration Endpoints
- `GET /api/portal/systems` - Available systems for user
- `POST /api/portal/authenticate` - Portal authentication
- `GET /api/portal/{system}/dashboard` - System-specific dashboard data

### Content Management API
- `GET /api/content/{type}` - Retrieve content by type
- `POST /api/content/{type}` - Create new content
- `PUT /api/content/{type}/{id}` - Update content
- `DELETE /api/content/{type}/{id}` - Delete content

## 🤝 Contributing

### Development Workflow
1. Create feature branch from `develop`
2. Implement changes with tests
3. Submit pull request for review
4. Merge after approval and testing

### Code Standards
- **PSR-12** coding standards for PHP
- **ESLint** configuration for JavaScript
- **Tailwind CSS** utility-first approach
- **Vue.js 3** composition API preferred

## 📞 Support & Contact

### Technical Support
- **Organization**: Intelligence Service of the Armed Forces of the Philippines
- **Domain**: isafp.mil.ph
- **Environment**: Government Infrastructure

### Documentation
- **System Architecture**: See workflow diagrams in `/docs`
- **API Documentation**: Available at `/docs/api`
- **User Guides**: Available at `/docs/user-guides`

## 📄 License

This project is developed for the Intelligence Service of the Armed Forces of the Philippines. All content is in the public domain unless otherwise stated, in accordance with Philippine government guidelines.

## 🗺️ Roadmap

### Phase 1: Public Website ✅
- [x] Basic website structure
- [x] Content management via JSON
- [x] AFPNET detection
- [x] Responsive design

### Phase 2: CMS Platform 🚧
- [ ] Administrative dashboard
- [ ] Content workflow system
- [ ] User role management
- [ ] Version control

### Phase 3: Portal Integration 📋
- [ ] Authentication system
- [ ] Portal dashboard
- [ ] API integration layer
- [ ] System-specific interfaces

### Phase 4: Database Migration 📋
- [ ] MSSQL database setup
- [ ] Data migration tools
- [ ] Performance optimization
- [ ] Advanced analytics

---

**Built with ❤️ for the Intelligence Service of the Armed Forces of the Philippines**

*Protecting the sovereignty and security of the Republic of the Philippines through excellence in technology and intelligence operations.*