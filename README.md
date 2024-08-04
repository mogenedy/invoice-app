# Invoice App

email:admin@gmail.com
name:admin
password:123456789
---
user@gmail.com
name:user
password:12345678
====================
## Installation
1. Clone the repository:
```bash
    git clone https://github.com/mogenedy/invoice-app.git
    cd invoice-app
```
2. Install the PHP dependencies:

    ```bash
    composer install
    ```

3. Copy the example environment file and set up your environment variables:

    ```bash
    cp .env.example .env
    ```
4. Generate the application key:

    ```bash
    php artisan key:generate
    ```
5-
5. Set up your database configuration in the `.env` file:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

6. Run the database migrations:

    ```bash
    php artisan migrate
    ```

7. Install the frontend dependencies:

    ```bash
    npm install
    ```

8. Build the frontend assets:

    ```bash
    npm run dev
```
9-seed the database
```bash
php artisan db:seed
```
10. Start the local development server:

    ```bash
    php artisan serve
    ```
