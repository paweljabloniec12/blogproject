<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Message</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f6f9fc; font-family: Arial, sans-serif; line-height: 1.6;">
    <div style="max-width: 600px; margin: 20px auto; background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <!-- Header -->
        <div style="background: #2563eb; padding: 30px; border-radius: 10px 10px 0 0; text-align: center;">
            <h1 style="color: white; margin: 0; font-size: 24px;">New Contact Message</h1>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            <div style="margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <h2 style="color: #2563eb; font-size: 18px; margin: 0 0 5px 0;">Contact Details</h2>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 8px 0; color: #666; width: 100px;">Name:</td>
                        <td style="padding: 8px 0; color: #333; font-weight: 500;">{{$data['name']}}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0; color: #666;">Email:</td>
                        <td style="padding: 8px 0; color: #333; font-weight: 500;">{{$data['email']}}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0; color: #666;">Phone:</td>
                        <td style="padding: 8px 0; color: #333; font-weight: 500;">{{$data['phone']}}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0; color: #666;">Title:</td>
                        <td style="padding: 8px 0; color: #333; font-weight: 500;">{{$data['title']}}</td>
                    </tr>
                </table>
            </div>

            <div style="margin-bottom: 25px;">
                <h2 style="color: #2563eb; font-size: 18px; margin: 0 0 15px 0;">Message</h2>
                <div style="background: #f8fafc; padding: 20px; border-radius: 6px; color: #333;">
                    {{$data['message']}}
                </div>
            </div>

            <!-- Footer -->
            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; text-align: center; color: #666; font-size: 14px;">
                <p style="margin: 0;">This is an automated message from your contact form.</p>
                <p style="margin: 5px 0 0 0;">Please respond to the sender directly at {{$data['email']}}</p>
            </div>
        </div>
    </div>
</body>
</html>