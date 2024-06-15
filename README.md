# Excel Data Importer

This Laravel project allows users to upload Excel files, preview their content, and store the data into the database. The application uses the Maatwebsite Excel package for handling Excel file operations.

## Features
- Register User as Admin
- Manage User Profile
- Create Staff by Admin
- Upload Excel files
- Preview Excel file content before saving to the database
- Store Excel data into the database
- View Multiple Excel File Data as per File Name and User
- Staff Dashboard where role based Dashboard menu is displayed (default password:1234)

## Requirements

- PHP >= 8.1
- Composer
- Laravel >= 10.10
- Database (PostgreSQL)

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/thebishalpaul/laravel-admin.git
    cd laravel-admin
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Set up the environment file:**

    Copy the `.env.example` file to `.env` and configure your database and other environment settings.

    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database credentials and other necessary settings.

4. **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

5. **Run migrations:**

    ```bash
    php artisan migrate
    ```

6. **Serve the application:**

    ```bash
    php artisan serve
    ```

    The application will be available at `http://localhost:8000`.

## Usage

1. **Upload an Excel File:**

    - Navigate to `http://localhost:8000/upload-excel`.
    - Choose an Excel file and click "Upload".

2. **Preview the Uploaded Data:**

    - After uploading, you will be redirected to a preview page where you can review the Excel file content.

3. **Store the Excel Data:**

    - If the preview looks correct, click "Store Excel Data" to save the data to the database.

4. **View Uploaded Data:**

    - Navigate to `http://localhost:8000/dashboard` to view the data you have uploaded.

## File Structure

- `app/Imports/DisbursementImport.php`: Handles the import logic for the Excel files.
- `app/Http/Controllers/FileUploadController.php`: Contains the logic for uploading, previewing, and storing Excel files.
- `app/Http/Controllers/AuthController.php`: Handles user authentication, including registration, login, and logout.
- `app/Http/Controllers/DashboardController.php`: Handles displaying the dashboard.
- `app/Http/Controllers/UserProfileController.php`: Handles user profile management.
- `app/Http/Controllers/Controller.php`: Base controller class with authorization and validation.
- `resources/views/excel/upload-excel.blade.php`: View for uploading Excel files.
- `resources/views/excel/preview-excel.blade.php`: View for previewing the uploaded Excel data.
- `resources/views/excel/user-excel-data.blade.php`: View for displaying the uploaded data by the user.
- `resources/views/admin/create-user.blade.php`: View for creating a new user and displaying created users.
- `resources/views/admin/dashboard.blade.php`: View for displaying the admin dashboard.

## Routes

- `GET /upload-excel`: Displays the form for uploading Excel files.
- `POST /upload-excel`: Handles the uploaded Excel file and displays the preview.
- `POST /store-excel`: Stores the uploaded Excel data into the database.
- `GET /user-excel-data`: Displays the uploaded data by the user.
- `GET /login`: Displays the login form for guests.
- `POST /login`: Authenticates the user.
- `GET /register`: Displays the registration form for guests.
- `POST /register`: Registers a new user.
- `GET /`: Displays the home/landing page for authenticated users.
- `GET /profile`: Displays the user profile page.
- `POST /logout`: Logs out the authenticated user.
- `POST /update-profile`: Updates the user profile.
- `GET /create-user`: Displays the form for creating a new user (admin only).
- `POST /create-user`: Creates a new user (admin only).

## Error Handling

- Ensure the uploaded file is an Excel file (`.xlsx`).
- Validate the required columns in the Excel file.
- Handle missing or incorrect data gracefully by displaying appropriate error messages.


## Acknowledgements

- [Laravel](https://laravel.com/)
- [Maatwebsite Excel](https://github.com/Maatwebsite/Laravel-Excel)