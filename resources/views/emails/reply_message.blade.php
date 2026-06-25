<!DOCTYPE html>
<html>
<head>
    <style>
        .container { font-family: sans-serif; line-height: 1.6; color: #333; }
        .reply-box { background: #f9f9f9; padding: 15px; border-left: 4px solid #FF014F; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h3>Hi {{ $contact->name }},</h3>
        <p>Thank you for reaching out to me. Regarding your message about "<strong>{{ $contact->subject }}</strong>", here is my response:</p>
        
        <div class="reply-box">
            {{ $replyText }}
        </div>

        <p>Feel free to reply to this email if you have any more questions.</p>
        <br>
        <p>Best Regards,<br><strong>Md. Faruk Mia</strong></p>
    </div>
</body>
</html>