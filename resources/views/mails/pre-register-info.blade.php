<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <style>
            body {
                background-color: #f7fafc;
                font-family: 'Figtree', sans-serif;
            }

            .container {
                max-width: 768px;
                margin: 0 auto;
                padding: 24px;
                background-color: #ffffff;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            main {
                margin-top: 24px;
                color: #4a5568;
            }

            h1 {
                font-size: 1.5rem;
                font-weight: 600;
                text-align: center;
            }

            p {
                margin-top: 16px;
                font-size: 1rem;
                line-height: 1.75;
            }

            .details {
                margin-top: 16px;
                padding: 16px;
                background-color: #f8fafc;
                border: 1px solid #e2e8f0;
                border-radius: 8px;
            }

            .details p {
                margin: 8px 0;
            }

            .footer {
                margin-top: 24px;
                text-align: center;
                border-top: 1px solid #e2e8f0;
                padding-top: 16px;
                font-size: 0.875rem;
                color: #a0aec0;
            }

            strong {
                font-weight: bold;
            }

            .qr-container {
                margin-top: 16px;
            }

            .marketing-login-link {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.marketing-login-link:hover {
    background-color: #0056b3;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-decoration: none;
}

.marketing-login-link:active {
    background-color: #004080;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

        </style>
    </head>

    <body>
        <div class="container">
            <main>
                <h1>Welcome to {{ $company->name }}!</h1>
                <p>Hello {{ $userData->first_name }},</p>
                <p>
                    Thank you for pre-registering for your visit to <strong>{{ $company->name }}</strong>. We’re
                    thrilled to
                    have you! Here are the details of your visit:
                </p>
                <div class="details">
                    <p>
                        <strong>Date:</strong>
                        {{ \Carbon\Carbon::parse($userData->visit_date)->format('F j, Y') }}
                        ({{ \Carbon\Carbon::parse($userData->visit_date)->diffForHumans() }})
                    </p>
                    <p>
                        <strong>Entry Time:</strong>
                        {{ \Carbon\Carbon::parse($userData->entry_time)->format('h:i A') }}
                    </p>
                    <p>
                        <strong>Exit Time:</strong>
                        {{ \Carbon\Carbon::parse($userData->exit_time)->format('h:i A') }}
                    </p>
                </div>

                <p>We look forward to welcoming you!</p>
                <p>
                    Best regards,<br />
                    The {{ $company->name }} Team
                </p>

                <p>Below is a QR to ease log in. </p>

                <a href="{{ route('company.check-in', $company->uuid) }}" class="marketing-login-link">
                    Log In To {{ $company->name }} Here
                </a>

                <div class="qr-container">
                    {{ $qrcode }}
                </div>
            </main>
            <footer class="footer">
                <p>&copy; 2024 {{ $company->name }}. All rights reserved.</p>
            </footer>
        </div>
    </body>

</html>
