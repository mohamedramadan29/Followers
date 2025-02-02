<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> رسالة تواصل جديدة </title>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            text-align: right;
            direction: rtl
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .email-header {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        .email-body {
            padding: 20px;
            line-height: 1.6;
            color: #333333;
        }

        .email-body h2 {
            color: #4CAF50;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .email-body p {
            margin-bottom: 20px;
            font-size: 16px;
        }

        .email-body a {
            display: inline-block;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 10px;
        }

        .email-body a:hover {
            background-color: #45a049;
        }

        .email-footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #666666;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            رسالة تواصل جديدة من متجر نايف
        </div>
        <div class="email-body">
            <h2>مرحبًا !</h2>
            <p> لديك رسالة تواصل جديدة من </p>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th> اسم العميل </th>
                        <td> {{ $name }} </td>
                    </tr>
                    <tr>
                        <th> البريد الالكتروني </th>
                        <td> {{ $email }} </td>
                    </tr>
                    <tr>
                        <th> نص الرسالة </th>
                        <td> {{ $message_body }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="email-footer">
            &copy; 2024 متجر نايــف - جميع الحقوق محفوظة
        </div>
    </div>
</body>

</html>
