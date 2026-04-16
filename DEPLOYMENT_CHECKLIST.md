# Production Deployment Checklist

## Pre-Deployment
- [ ] Environment set to production
- [ ] Debug mode disabled
- [ ] Database credentials updated
- [ ] Redis configured (if using)
- [ ] SMTP mail configured
- [ ] SSL certificate installed
- [ ] Domain DNS configured

## Security
- [x] Rate limiting on contact form (5 req/min)
- [x] Form Request classes created (StoreContactRequest)
- [x] XSS vulnerabilities fixed (pricing notice, page hero)
- [x] File upload constraints added (5MB, images only)
- [x] Security headers configured
- [x] CSRF protection enabled

## Performance
- [x] Config cached
- [x] Routes cached
- [x] Views cached
- [x] Autoloader optimized
- [x] Assets compiled
- [x] Sitemap generated (Requires production DB connection)

## Post-Deployment
- [ ] Test contact form submission
- [ ] Test admin login
- [ ] Test blog post creation
- [ ] Verify SSL redirect
- [ ] Check security headers
- [ ] Monitor error logs
- [ ] Test backup system

## Verification Commands
```bash
# Check environment
php artisan tinker --execute="echo app()->environment();"

# Check debug mode
php artisan tinker --execute="var_dump(config('app.debug'));"

# Check rate limiting
php artisan route:list | grep contact

# Run tests
php artisan test

# Check cache status
php artisan config:cache && php artisan route:cache && php artisan view:cache
```
