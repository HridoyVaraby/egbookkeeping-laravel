# CyberPanel Deployment Guide

This guide outlines the step-by-step process for deploying the EG Bookkeeping Laravel application to a server managed by **CyberPanel**.

## 1. Create a Website in CyberPanel
1. Log in to your CyberPanel dashboard.
2. Go to **Websites** > **Create Website**.
3. Fill in the details:
   - **Package:** Default
   - **Owner:** admin (or your preferred user)
   - **Domain Name:** `egbookkeeping.com`
   - **Email:** Your admin email
   - **Select PHP:** PHP 8.3 (Required)
   - **Additional Features:** Check "SSL" and "open_basedir Protection" (optional but recommended).
4. Click **Create Website**.

## 2. Configure the Document Root
Laravel requires the document root to be the `public` directory, not the base folder.

1. In CyberPanel, go to **Websites** > **List Websites** > **Manage** (next to your domain).
2. Scroll down and click **vHost Conf**.
3. Look for the line that says `docRoot                   $VH_ROOT/public_html`
4. Change it to:
   ```text
   docRoot                   $VH_ROOT/public_html/public
   ```
5. Click **Save** to restart the LiteSpeed web server for this site.

## 3. Upload the Codebase
You can upload your code via SSH (recommended) or the File Manager.

**Via SSH (Recommended):**
1. SSH into your server as root or a user with adequate permissions.
2. Navigate to your website's directory:
   ```bash
   cd /home/egbookkeeping.com/public_html
   ```
3. Remove the default index file:
   ```bash
   rm index.html
   ```
4. Clone your repository (you may need to set up SSH keys for your Git provider):
   ```bash
   git clone <repository-url> .
   ```
   *(The `.` ensures it clones into the current directory rather than creating a subfolder).*

## 4. Install Dependencies
While still in the `/home/egbookkeeping.com/public_html` directory via SSH:

```bash
# Install PHP dependencies
# Make sure to use the correct PHP version binary if multiple are installed
/usr/local/lsws/lsphp83/bin/php /usr/local/bin/composer install --optimize-autoloader --no-dev

# Install Node.js dependencies and build frontend assets
# Note: You may need to install Node.js via NVM if not globally available
npm ci
npm run build
```

## 5. Environment Configuration
1. Copy the environment file:
   ```bash
   cp .env.example .env
   ```
2. Create a database in CyberPanel:
   - Go to **Databases** > **Create Database**.
   - Select your website and create a DB Name, DB Username, and Password.
3. Edit the `.env` file (`nano .env`):
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_URL=https://egbookkeeping.com`
   - Set the `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` to the ones you just created.
   - Set your `MAIL_*` credentials.

## 6. Application Setup
Run the Laravel initialization commands:

```bash
# Generate the application key
/usr/local/lsws/lsphp83/bin/php artisan key:generate

# Run database migrations
/usr/local/lsws/lsphp83/bin/php artisan migrate --force

# Seed the database (creates default admin and categories)
/usr/local/lsws/lsphp83/bin/php artisan db:seed --force

# Seed the blog posts from the WordPress export
/usr/local/lsws/lsphp83/bin/php artisan db:seed --class=WordPressPostSeeder --force

# Create the storage symlink
/usr/local/lsws/lsphp83/bin/php artisan storage:link
```

## 7. Permissions
Ensure the web server has permission to write to the storage and cache directories.
```bash
chown -R nobody:nobody storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```
*(CyberPanel / LiteSpeed typically uses the `nobody` user or the specific site owner's user. If `nobody` causes issues, use the owner of the `public_html` folder).*

## 8. Optimization
Cache the configuration and routes to improve performance:
```bash
/usr/local/lsws/lsphp83/bin/php artisan optimize
```

## 9. Set Up Cron Job (Task Scheduler)
To run Laravel's scheduled tasks (like the automatic sitemap generator):

1. In CyberPanel, go to **Websites** > **List Websites** > **Manage**.
2. Click on **Cron Jobs**.
3. Add the following command to run every minute (`* * * * *`):
   ```bash
   /usr/local/lsws/lsphp83/bin/php /home/egbookkeeping.com/public_html/artisan schedule:run >> /dev/null 2>&1
   ```
4. Click **Add Cron**.

## 10. Generate Initial Sitemap
Manually run the command to ensure search engines have your sitemap immediately:
```bash
/usr/local/lsws/lsphp83/bin/php artisan sitemap:generate
```

## 11. Final Checks
- Visit your website `https://egbookkeeping.com`.
- Verify the SSL certificate is active (padlock icon).
- Test the contact form to ensure emails are sending.
- Go to `/admin` to verify Filament loads correctly with its assets.
