# Environment Configuration

## Files

- `.env` - Active environment (varies by machine)
- `.env.production` - Production template (use as reference)
- `.env.local` - Local development template
- `.env.backup` - Backup of production settings (for quick switching)

## Workflow

### Local Development (Current Machine)
```bash
# Already configured - you're using .env.local
php artisan serve
```

### Production Deployment
1. Upload `.env.production` content to production server as `.env`
2. Update production credentials in `.env` (database, Redis, etc.)
3. Run: `php artisan config:cache`
4. **Never upload `.env.local` to production**

### Switching Environments (Optional)
```bash
# Switch to local development
cp .env.local .env

# Switch to production (for testing)
cp .env.backup .env
```

## Verification
```bash
php artisan tinker --execute="echo app()->environment();"
```

**Important:** `.env` files are in `.gitignore` and never committed.
