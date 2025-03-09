# PHP Auth System 🔐
A simple yet secure login and signup system built with PHP and MySQL.

## ✨ Features 
- 🔑 User registration & login
- 🔐 Password hashing for security
- 🛡️ Session management
  - 🎨 Simple and clean UI 
- 🗄️ MySQL database integration

## ⚙️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/msh31/php-auth-system.git
   cd php-auth-system
   ```

2. **Set up environment variables**
   - Create a `.env` file in the root directory and add your database credentials:
     ```
     DB_HOST=localhost
     DB_USER=your_username
     DB_PASS=your_password
     DB_NAME=php_auth_system
     ```
   - Install `vlucas/phpdotenv` (if not already installed):
     ```bash
     composer require vlucas/phpdotenv
     ```

3. **Set up the database**
   - Import the `database.sql` file into your MySQL database.

4. **Run the project**
   - Start a local server (e.g., XAMPP, MAMP, or PHP built-in server):
     ```bash
     php -S localhost:8000
     ```
   - Open `http://localhost:8000` in your browser.

## Contributing 🤝
Pull requests are welcome! Feel free to fork this repository and improve upon it.

## License 📜
This project is licensed under the MIT License.

---
Made with ❤️ by [Marco](https://marco007.dev/)

