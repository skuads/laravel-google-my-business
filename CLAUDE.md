# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel package that provides a PHP wrapper for the Google My Business API (v4.4). The package integrates Google's My Business PHP library with Laravel's service container and facade system.

## Architecture

### Core Components

- **GoogleMyBusiness** (`src/GoogleMyBusiness.php`) - Main service class extending Google_Service, contains all API resource endpoints (accounts, locations, reviews, etc.)
- **GoogleMyBusinessServiceProvider** (`src/GoogleMyBusinessServiceProvider.php`) - Laravel service provider that registers the GoogleMyBusiness class as a singleton
- **GoogleMyBusinessFacade** (`src/Facades/GoogleMyBusinessFacade.php`) - Laravel facade for easy access via `GoogleMyBusiness::` syntax

### Service Registration

The package auto-registers through Laravel's package discovery:
- Service provider: `Skuads\LaravelGoogleMyBusiness\GoogleMyBusinessServiceProvider`
- Facade alias: `GoogleMyBusiness` → `Skuads\LaravelGoogleMyBusiness\Facades\GoogleMyBusinessFacade`

### Dependencies

- PHP 8.1+
- Laravel 10.x, 11.x, or 12.x
- Google API Client Library (`google/apiclient ^2.15`)
- Google API Client Services (`google/apiclient-services ^0.376.0`)

## Development Commands

### Package Management
```bash
composer install          # Install dependencies
composer update           # Update dependencies
```

### Testing
No test framework is currently configured in this package.

## Important Notes

### API Access Requirements
- Google My Business API access requires application approval: https://docs.google.com/forms/d/1XTQc-QEjsE7YrgstyJxbFDnwmhUhBFFvpNJBw3VzuuE/viewform

### Debugging API Errors
Google My Business API returns unhelpful 400 errors by default. For detailed error messages, modify `/vendor/google/apiclient/src/Google/Http/REST.php` in the `doExecute` function:

```php
$httpHandler = HttpHandlerFactory::build($client);
// Add this line for detailed errors:
$request = $request->withHeader('X-GOOG-API-FORMAT-VERSION', '2');
```

Remove this modification after debugging.

### Required Scopes
The package requires this OAuth scope:
- `https://www.googleapis.com/auth/plus.business.manage`

### Integration with pulkitjalan/google-apiclient
The package is designed to work with `pulkitjalan/google-apiclient` for Google Client setup and OAuth handling.