# ISAFP Website

A modern website for the Intelligence Service of the Armed Forces of the Philippines built with Laravel and Vue.js.

## Features

- Public website with news, careers, and organizational information
- AFPNET detection for secure login access
- Responsive design with Tailwind CSS
- JSON-based content management
- Government-compliant footer and branding

## Requirements

- PHP 8.3+
- Node.js 22.16+
- Composer
- NPM

## Installation

1. **Clone the repository**
```bash
git clone https://gitlab.com/dieitrighthere/webmaster.git
cd webmaster
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Create content directories**
```bash
mkdir -p resources/data
```

5. **Build assets and start server**
```bash
npm run dev
php artisan serve
```

## Project Structure

```
├── app/Http/Controllers/     # Laravel controllers
├── resources/js/             # Vue.js components and pages
├── resources/data/           # JSON content files
├── public/                   # Static assets (images, etc.)
└── routes/web.php           # Application routes
```

## Content Management

Content is managed through JSON files in `resources/data/`:
- `news.json` - News articles and announcements
- `announcements.json` - Homepage announcements

## AFPNET Access

Add `?afpnet=true` to any URL to simulate AFPNET access and show the login button.

## License

Government project for the Intelligence Service of the Armed Forces of the Philippines.# webmaster
