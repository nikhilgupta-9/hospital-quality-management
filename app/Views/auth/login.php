<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in — Hospital Quality Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Placeholder styling only — replace with the project theme once it's wired in (Phase 2). -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #eef1ec; min-height: 100vh; display: flex; align-items: center; }
        .login-card { max-width: 400px; margin: 0 auto; border: 1px solid #dbe3de; border-radius: 10px; }
        .brand { font-weight: 600; color: #0f5c56; }
    </style>
</head>
<body>
<div class="container">
    <div class="card login-card shadow-sm">
        <div class="card-body p-4">
            <p class="brand mb-1">Hospital Quality Management</p>
            <h1 class="h5 mb-4">NABH Compliance Portal — Sign in</h1>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger py-2"><?= esc(session()->getFlashdata('error')) ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success py-2"><?= esc(session()->getFlashdata('message')) ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger py-2">
                    <ul class="mb-0 ps-3">
                        <?php foreach (session()->getFlashdata('errors') as $err) : ?>
                            <li><?= esc($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('login') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?= esc(old('email')) ?>" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" style="background:#0f5c56;border-color:#0f5c56;">
                    Sign in
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
