<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fancy Email</title>
    <style>
        body {
            background-color: #2d3748;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #4a5568;
            border-radius: 8px;
            overflow: hidden;
            background-color: #1a202c;
        }
        .header {
            background-color: #e53e3e;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .content {
            padding: 20px;
            color: #edf2f7;
        }
        .content h2 {
            margin-top: 0;
            font-size: 20px;
            font-weight: bold;
        }
        .content p {
            margin: 10px 0;
            line-height: 1.6;
            color: #a0aec0;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button-container a {
            background-color: #e53e3e;
            color: #edf2f7;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin: 0 5px;
        }
        .button-container a:hover {
            background-color: #c53030;
        }
        .footer {
            background-color: #1a202c;
            color: #a0aec0;
            text-align: center;
            padding: 15px;
            font-size: 12px;
        }
        .footer a {
            color: #e53e3e;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <table class="container" cellspacing="0" cellpadding="0">
        <!-- Header Section -->
        <tr>
            <td class="header">
                <h1>Welcome to {{ $appName }}</h1>
            </td>
        </tr>

        <!-- Content Section -->
        <tr>
            <td class="content">
                <h2>{{ $subject }}</h2>
                <p>We’re thrilled to have you on board. Here's the message that has been delivered:</p>
                <p>{{ $body }}</p>

                <div class="button-container">
                    <a href="https://laravel.com/docs/11.x/mail#main-content">Learn More</a>
                    <a href="{{ $contactAddress }}">Contact Us</a>
                </div>
            </td>
        </tr>

        <!-- Additional Note Section -->
        <tr>
            <td class="content">
                <p>This email is sent from {{ $appName }} email service. If you didn't know this platform, please ignore this email.</p>
                <p>Best regards,</p>
                <p class="font-bold">{{ $appName }}</p>
            </td>
        </tr>

        <!-- Footer Section -->
        <tr>
            <td class="footer">
                <p>&copy; {{ date('Y') }} {{ $appName }}. All rights reserved.</p>
                <a href="https://laracasts.com">Laravel Community</a>
            </td>
        </tr>
    </table>
</body>
</html>
