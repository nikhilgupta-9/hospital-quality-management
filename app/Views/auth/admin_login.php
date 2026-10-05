<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Executive Admin Gateway — Hospital Quality Management (HQM)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Google Fonts & Bootstrap 5.3 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    
    <!-- Custom Theme CSS -->
    <link href="<?= base_url('assets/css/premium-theme.css') ?>" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            background: radial-gradient(circle at 10% 20%, #061129 0%, #030818 100%);
            font-family: var(--font-body);
        }
        .admin-card {
            background: rgba(13, 23, 49, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
            border-radius: 1.25rem;
            color: #ffffff;
            backdrop-filter: blur(20px);
        }
        .admin-input {
            background: rgba(255, 255, 255, 0.06) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
        }
        .admin-input:focus {
            border-color: #38bdf8 !important;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.25) !important;
        }
        .admin-input-group-text {
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            color: #94a3b8 !important;
        }
    </style>
</head>
<body>

<div class="container" style="max-width: 480px;">
    <!-- Brand Header -->
    <div class="text-center mb-4">
        <a href="<?= site_url('/') ?>" class="text-decoration-none">
            <div class="d-inline-flex align-items-center justify-content-center rounded-4 shadow-lg mb-2" 
                 style="width: 58px; height: 58px; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: #ffffff; font-size: 1.6rem;">
                <i class="fas fa-crown"></i>
            </div>
            <h1 class="h4 text-white fw-extrabold mb-0" style="font-family: var(--font-heading); letter-spacing: -0.02em;">
                <?= esc(site_setting('site_name', 'Hospital Quality Management')) ?>
            </h1>
            <p class="text-light small opacity-75 mb-0" style="font-size: 0.82rem; letter-spacing: 0.08em; font-weight: 700; color: #f59e0b !important;">
                EXECUTIVE &amp; SUPER ADMIN COMMAND SUITE
            </p>
        </a>
    </div>

    <!-- Admin Login Card -->
    <div class="card admin-card p-4 p-sm-5">
        <div class="mb-4 text-center">
            <span class="badge px-3 py-1 rounded-pill mb-2 fw-semibold" style="background: rgba(245, 158, 11, 0.2); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.3);">
                <i class="fas fa-shield-halved me-1"></i> Tier-1 Admin Clearance Required
            </span>
            <h2 class="h5 fw-bold text-white mb-1" style="font-family: var(--font-heading);">Administrator Access</h2>
            <p class="small text-white-50 mb-0">Single sign-in for Super Administrators and Hospital Directors.</p>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger py-2 small d-flex align-items-center gap-2 rounded-3 border-0 bg-danger bg-opacity-25 text-danger-subtle">
                <i class="fas fa-circle-exclamation text-danger"></i>
                <div><?= esc(session()->getFlashdata('error')) ?></div>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success py-2 small d-flex align-items-center gap-2 rounded-3 border-0 bg-success bg-opacity-25 text-success-subtle">
                <i class="fas fa-circle-check text-success"></i>
                <div><?= esc(session()->getFlashdata('message')) ?></div>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger py-2 small rounded-3 border-0 bg-danger bg-opacity-25 text-danger-subtle">
                <ul class="mb-0 ps-3">
                    <?php foreach (session()->getFlashdata('errors') as $err) : ?>
                        <li><?= esc($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('admin/login') ?>" method="post" id="adminLoginForm">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="admin_email" class="form-label small fw-semibold text-light">Admin Email Address</label>
                <div class="input-group">
                    <span class="input-group-text admin-input-group-text border-end-0"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control admin-input border-start-0 ps-0" id="admin_email" name="email"
                           value="<?= esc(old('email', 'admin@hospitalquality.org')) ?>" required autofocus placeholder="admin@domain.org">
                </div>
            </div>
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <label for="admin_password" class="form-label small fw-semibold text-light mb-0">Master Password</label>
                </div>
                <div class="input-group">
                    <span class="input-group-text admin-input-group-text border-end-0"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control admin-input border-start-0 ps-0" id="admin_password" name="password" value="Admin@123456" required placeholder="••••••••">
                </div>
            </div>
            <button type="submit" class="btn btn-warning w-100 py-2 mb-3 fw-bold text-dark shadow-lg" style="background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%); border: none;">
                <i class="fas fa-key me-1"></i> Authenticate Command Session
            </button>
        </form>

        <!-- Quick Demo Switcher -->
        <div class="border-top border-white border-opacity-10 pt-3 mt-2">
            <span class="small text-white-50 d-block text-center mb-2 fw-semibold" style="font-size: 0.78rem;">
                Authorized Demo Role Access:
            </span>
            <div class="row g-2">
                <div class="col-6">
                    <button type="button" class="btn btn-sm btn-outline-warning w-100 text-truncate rounded-3" onclick="setDemo('admin@hospitalquality.org', 'Admin@123456')">
                        👑 Super Admin
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-sm btn-outline-light w-100 text-truncate rounded-3" onclick="setDemo('director@maxcarehospital.org', 'Admin@123456')">
                        🏥 Hospital Admin
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center mt-3 pt-2 border-top border-white border-opacity-10">
            <a href="<?= site_url('admin/register') ?>" class="text-warning small text-decoration-none fw-semibold">
                <i class="fas fa-user-plus me-1"></i> Register New Hospital Admin (Master Key)
            </a>
        </div>
    </div>

    <!-- Portal Navigation Switcher -->
    <div class="d-flex justify-content-between align-items-center mt-4 px-2">
        <a href="<?= site_url('login') ?>" class="text-info small text-decoration-none fw-semibold">
            <i class="fas fa-stethoscope me-1"></i> Switch to Staff Portal
        </a>
        <a href="<?= site_url('/') ?>" class="text-light small text-decoration-none opacity-75 hover-white">
            <i class="fas fa-arrow-left me-1"></i> Guidance Home
        </a>
    </div>
</div>

<script>
function setDemo(email, pass) {
    document.getElementById('admin_email').value = email;
    document.getElementById('admin_password').value = pass;
    document.getElementById('adminLoginForm').submit();
}
</script>

</body>
</html>
