# Playground Cart

A multi-tenant e-commerce study project based on Laravel. ***Developed for educational purposes.***

### Architecture

* **Strategy:** Database-per-tenant.
* **Isolation:** Each store (tenant) has its own isolated MySQL database.
* **Technology:** Laravel 12 + `stancl/tenancy` package.

### Getting Started

1. **Clone the repository:**
```bash
git clone https://github.com/rauldiamantino/playground-cart.git
cd playground-cart

```

2. **Install dependencies:**
```bash
composer install
npm install

```

3. **Environment Setup:**
```bash
cp .env.example .env
php artisan key:generate
# Update your DB credentials in .env

```

4. **Run Migrations:**
```bash
# Central (System) migrations
php artisan migrate

# Tenant (Store-specific) migrations
php artisan tenants:migrate

```

5. **Serve:**
```bash
php artisan serve

```


### 🛠️ Key Commands

* **Create Tenant Migration:** `php artisan make:migration <name> --path=database/migrations/tenant`
* **Run Tenant Migrations:** `php artisan tenants:migrate`
