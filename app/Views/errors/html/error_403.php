<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Access denied — Hospital Quality Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; background: #f4f6f5; color: #17221d; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .box { background: #fff; border: 1px solid #dbe3de; border-radius: 10px; padding: 32px 36px; max-width: 420px; text-align: center; }
        h1 { font-size: 1.2rem; margin: 0 0 8px; }
        p { color: #55635b; font-size: 0.92rem; margin: 0 0 18px; }
        a { color: #0f5c56; text-decoration: none; font-weight: 500; }
    </style>
</head>
<body>
    <div class="box">
        <h1>403 — Access denied</h1>
        <p><?= esc($message ?? "You don't have access to this section.") ?></p>
        <a href="<?= site_url('/') ?>">Back to dashboard</a>
    </div>
</body>
</html>
