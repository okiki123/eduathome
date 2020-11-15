<html>
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{ config('app.name') }}</title>
        <link href="https://fonts.googleapis.com/css?family=Mallanna&display=swap" type="text/css">
        <style>
            body {
                font-family: 'Mallanna', sans-serif;
                padding: 10px;
                color: #121104;
                font-size: 15px;
            }

            .logo {
                margin-bottom: 15px;
                text-align: center;
            }

            .logo img {
                vertical-align: center;
            }

            .font-size-xl {
                font-size: 24px;
            }

            .font-w600 {
                font-weight: 600;
            }

            .text-center {
                text-align: center;
            }

            table {
                width: 600px;
                margin-right: auto;
                margin-left: auto;
                border: solid 1px #ededed;
                padding: 1.5rem;
                font-size: 15px;
                line-height: 1.5;;
            }

            @media (max-width: 650px){
                table {
                    width: 100%;
                }
            }

            .action-button {
                background-color: #1b5954;
                border-color: #1b5954;
                color: #fff;
                display: inline-block;
                text-align: center;
                text-decoration: none;
                vertical-align: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                padding: .375rem .75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius: .25rem;
                margin-top: 10px;
                margin-bottom: 10px;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }

        </style>
    </head>
    <body>
        <table>
            <tr>
                <td>
                    <div class="logo">
                        <img src="{{ asset('images/logo.jpg') }}" width="60" height="60" class="d-inline-block align-top" alt="">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                   <h3>Hi {{ $firstName }},</h3>
                    <p>
                        We're happy you signed up for Edu@Home, to start exploring the platform, please confirm your email
                    </p>
                    <div>
                        <a class="action-button" href="{{route('login') }}">
                            Verify now
                        </a>
                    </div>

                    <div>
                        or copy and paste the link below in your browser
                    </div>
                    <p>
                        {{ $verificationLink }}
                    </p>
                    <p>Kind Regards,</p>
                    <p>Edu@Home</p>
                </td>
            </tr>
            <tr>
                <td>
                    <footer style="font-size: 12px; margin-top: 20px">
                        Copyrights © Edu@home 2020 | 1805 Antebellum Drive Murfreesboro, TN 37128
                    </footer>
                </td>
            </tr>
        </table>
    </body>
</html>
