<?php
header('Content-Type: application/json');

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Recipients
$recipients = [
    'remyaarun455@gmail.com',
    'vidhyavkr@gmail.com'
];

// Sanitize inputs
$name    = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
$phone   = htmlspecialchars(trim($_POST['phone'] ?? ''), ENT_QUOTES, 'UTF-8');
$email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$service = htmlspecialchars(trim($_POST['service'] ?? ''), ENT_QUOTES, 'UTF-8');
$date    = htmlspecialchars(trim($_POST['date'] ?? ''), ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars(trim($_POST['message'] ?? ''), ENT_QUOTES, 'UTF-8');

// Validate required fields
if (empty($name) || empty($phone) || empty($email) || empty($service) || empty($date)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please fill all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
    exit;
}

// Service label mapping
$serviceLabels = [
    'bridal'   => 'Bridal Makeover',
    'party'    => 'Party Makeup',
    'skincare' => 'Skincare Treatment',
    'hair'     => 'Hair Styling',
    'styling'  => 'Personal Styling',
];
$serviceLabel = $serviceLabels[$service] ?? $service;

// Collect IP address
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
// If multiple IPs (proxy chain), take the first one
if (strpos($ip, ',') !== false) {
    $ip = trim(explode(',', $ip)[0]);
}
$ip = filter_var($ip, FILTER_VALIDATE_IP) ? $ip : 'Unknown';

// Device / browser info from User-Agent
$userAgent = htmlspecialchars($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown', ENT_QUOTES, 'UTF-8');

// Device info sent from JS (screen size, platform)
$screenSize = htmlspecialchars(trim($_POST['screen_size'] ?? ''), ENT_QUOTES, 'UTF-8');
$platform   = htmlspecialchars(trim($_POST['platform'] ?? ''), ENT_QUOTES, 'UTF-8');
$language   = htmlspecialchars(trim($_POST['language'] ?? ''), ENT_QUOTES, 'UTF-8');

// Format date
$formattedDate = date('l, F j, Y', strtotime($date));

// Timestamp
$timestamp = date('l, F j, Y \a\t g:i A T');

// Build email body (HTML)
$emailBody = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, Helvetica, sans-serif; background: #f9f4f5; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #d4788c, #b8556a); padding: 30px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 24px; }
        .header p { color: rgba(255,255,255,0.85); margin: 8px 0 0; font-size: 14px; }
        .body { padding: 30px; }
        .field { margin-bottom: 16px; border-bottom: 1px solid #f0e6e9; padding-bottom: 12px; }
        .field:last-child { border-bottom: none; }
        .label { font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #b8556a; font-weight: 600; margin-bottom: 4px; }
        .value { font-size: 16px; color: #333; }
        .section-title { font-size: 13px; text-transform: uppercase; letter-spacing: 1.5px; color: #999; margin: 24px 0 12px; padding-top: 12px; border-top: 2px solid #f0e6e9; }
        .footer { background: #faf5f6; padding: 20px 30px; text-align: center; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Booking Request</h1>
            <p>' . $timestamp . '</p>
        </div>
        <div class="body">
            <div class="field">
                <div class="label">Full Name</div>
                <div class="value">' . $name . '</div>
            </div>
            <div class="field">
                <div class="label">Phone</div>
                <div class="value">' . $phone . '</div>
            </div>
            <div class="field">
                <div class="label">Email</div>
                <div class="value">' . $email . '</div>
            </div>
            <div class="field">
                <div class="label">Service</div>
                <div class="value">' . $serviceLabel . '</div>
            </div>
            <div class="field">
                <div class="label">Preferred Date</div>
                <div class="value">' . $formattedDate . '</div>
            </div>
            <div class="field">
                <div class="label">Special Requests</div>
                <div class="value">' . (empty($message) ? '<em>None</em>' : nl2br($message)) . '</div>
            </div>

            <div class="section-title">Client Device Information</div>
            <div class="field">
                <div class="label">IP Address</div>
                <div class="value">' . $ip . '</div>
            </div>
            <div class="field">
                <div class="label">Browser / User Agent</div>
                <div class="value" style="font-size:13px; word-break:break-all;">' . $userAgent . '</div>
            </div>
            <div class="field">
                <div class="label">Platform</div>
                <div class="value">' . (empty($platform) ? 'Unknown' : $platform) . '</div>
            </div>
            <div class="field">
                <div class="label">Screen Size</div>
                <div class="value">' . (empty($screenSize) ? 'Unknown' : $screenSize) . '</div>
            </div>
            <div class="field">
                <div class="label">Language</div>
                <div class="value">' . (empty($language) ? 'Unknown' : $language) . '</div>
            </div>
        </div>
        <div class="footer">
            Magic Mirror Makeover Studio &mdash; Pallikkara Road, Nandi Bazar, Calicut
        </div>
    </div>
</body>
</html>';

// Email headers
$to = implode(', ', $recipients);
$subject = "New Booking: $serviceLabel — $name";
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: Magic Mirror <noreply@magicmirrorstudio.com>\r\n";
$headers .= "Reply-To: $email\r\n";

// Send
$sent = mail($to, $subject, $emailBody, $headers);

if ($sent) {
    echo json_encode(['success' => true, 'message' => 'Booking sent successfully.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to send email. Please call us directly.']);
}
