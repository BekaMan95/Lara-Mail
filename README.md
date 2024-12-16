<div align="center">
    <img src='./public/laramail-red.jpg' alt='image'>
  <h1 style="color: red;"> <\> Lara-Mail <\> </h1>
</div>

---

## 📧 Intro

**Lara-Mail** is a lightweight, elegant email-sending web application built with Laravel. Designed for simplicity and efficiency, it provides a clean interface to send emails effortlessly, complete with loading animations and pop-up notifications for enhanced user experience.

---

## 🚀 Features

- **Dynamic Email Sending**: Easily send customized emails with a subject, body, and recipient information.

- **Responsive Design**: Clean, mobile-friendly UI styled with Tailwind CSS.

- **Laravel Blade Templates**: Reusable components for quick development.

- **Customizable Email Templates**: Beautiful, professional email designs ready for use.

---

## 💻 Test

- **For the web view**: the web app is accessible at http://127.0.0.1:8000/send URL.

- **For REST api**: use http://127.0.0.1:8000/api/send URL.

    the json format is like this:
    ```json
    {
        "recipient": "emailaddress@mail.com",
        "subject": "Subject of the Email",
        "body": "body of the message!",
        "contact_info": "sender address (links)"
    }
    ```

---

## 🛠️ Installation

Follow these steps to get the project running locally:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/lara-mail.git lara-mail
   ```
    ```bash
   cd lara-mail
    ```

2. **Install Dependencies**:
    install composer dependencies,
   ```bash
   composer install
    ```
    install node dependencies,
    ```bash
    npm install
    ```

3. **Set up your environment**:
    Copy .env.example to .env:
    ```bash
    cp .env.example .env
    ```
    Configure your environment variables in .env. Here’s an example for setting up email:
    ```php
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=your_username
    MAIL_PASSWORD=your_password
    MAIL_ENCRYPTION=tls

    ```

4. **Generate application key**:
    ```bash
    php artisan key:generate
    ```

5. **Generate application key**:
    ```bash
    php artisan key:generate
    ```

6. **Build UI Components**:
    ```bash
    npm run build
    ```

7. **Start the development server**:
    ```bash
    php artisan serve
    ```
    The application will now be accessible at http://127.0.0.1:8000.
