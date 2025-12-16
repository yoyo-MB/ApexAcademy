<!-- Copied-style concise guidance for AI coding agents working in this Laravel app -->
# Copilot / AI Agent Instructions

Quick summary
- This repository is a Laravel 12 application (PHP ^8.2) with a Vite-based frontend. Backend code lives in `app/`, HTTP routes in `routes/web.php`, and frontend assets in `resources/js` and `resources/css`.

Immediate setup commands (fast path)
- `composer run setup` — runs `composer install`, copies `.env`, generates app key, runs migrations, installs npm deps and builds front-end.
- If you prefer manual steps: `composer install`, copy `.env.example -> .env`, `php artisan key:generate`, `php artisan migrate`, `npm install`, `npm run dev`.

Dev server & processes
- Single-command dev environment: `composer run dev` (starts `php artisan serve`, queue listener, `php artisan pail` and `npm run dev` via `concurrently`).
- Worker/queues: queue backend is database (`DB_CONNECTION`/`QUEUE_CONNECTION`), run `php artisan queue:listen` or use the `composer run dev` helper.

Testing & linting
- Tests: `composer test` or `php artisan test` (PHPUnit integration). Tests live in `tests/` (Feature/ and Unit/).
- Linting: Laravel Pint is included in dev dependencies (use `./vendor/bin/pint` or the platform-specific `vendor/bin/pint.bat` on Windows).

Project-specific conventions and notes
- Database-backed: sessions, queue jobs, and cache are configured to use DB in `.env`. Cache tables and jobs table exist (`database/migrations/*`); session table may need creation with `php artisan session:table` then `php artisan migrate`.
- Migrations: located in `database/migrations/`. Seeders are in `database/seeders/` and factories in `database/factories/`.
- Routes & controllers: add HTTP routes in `routes/web.php`; controllers are in `app/Http/Controllers/` and models in `app/Models/` (Eloquent, PSR-4 autoloading via `composer.json`).
- Frontend: uses Vite (`vite.config.js`) and `laravel-vite-plugin` — JS entry is `resources/js/app.js` and CSS in `resources/css/app.css`.

Integration surfaces to be careful about
- Mail: default is `log` (see `.env`), so tests and local dev won't send real mail unless configured.
- External services: AWS env placeholders exist but are empty; Redis and Memcached settings are present but may not be used by default.

Examples to reference when making changes
- Add a web route: edit `routes/web.php` and point to a controller in `app/Http/Controllers/`.
- Add a migration: `php artisan make:migration` and use `php artisan migrate` to apply.
- Add a test: put feature tests in `tests/Feature` and run `php artisan test`.

When in doubt
- Read `composer.json` scripts for common dev workflows (`setup`, `dev`, `test`). Use `php artisan` helpers for common Laravel tasks. Prefer small, isolated changes and include tests for behavior changes.

Feedback
- If any required details are missing or environment steps fail, ask for the preferred local dev stack (Laragon, Docker, Sail) and whether to add helper scripts or docs.
