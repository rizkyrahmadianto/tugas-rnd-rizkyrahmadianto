**Getting Started with Reimbursement Application**

### Clone Repository
1. Clone the repository by running the following command in your terminal or command prompt:
   ```bash
   git clone https://github.com/rizkyrahmadianto/tugas-rnd-rizkyrahmadianto.git
   ```

### Navigate to Project Folder
2. Navigate to the project folder by running:
   ```bash
   cd tugas-rnd-rizkyrahmadianto
   ```

### Set Up Environment
3. Copy the `.env.example` file to `.env` by running:
   ```bash
   cp .env.example .env
   ```
   If you can't run the command above, you can manually copy the `.env.example` file and rename it to `.env`.

4. Install dependencies using Composer:
   ```bash
   composer install
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Create symbolic link for storage:
   ```bash
   php artisan storage:link
   ```

### Database Configuration
7. Create a database in PostgreSQL. Name the database as desired.

8. Open the `.env` file and ensure the following configuration matches your database information:
   ```dotenv
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

### Run Migrations
9. Once the database configuration is set, run the database migrations:
    ```bash
    php artisan migrate
    ```

### Seed the Database (Optional)
10. If you want to use the existing data, run the following command to seed the database:
    ```bash
    php artisan db:seed
    ```

### Launch Application
11. After completing all the steps, you can launch the application by running:
    ```bash
    php artisan serve
    ```

Now you can start using the Reimbursement application.
