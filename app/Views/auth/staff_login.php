<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff &amp; Department Quality Portal — Hospital Quality Management (HQM)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Google Fonts & Bootstrap 5.3 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    
    <!-- Custom Theme CSS -->
    <link href="<?= base_url('assets/css/premium-theme.css') ?>" rel="stylesheet">
</head>
<body style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px 16px; background: linear-gradient(135deg, #040e24 0%, #07193b 50%, #0052cc 100%); font-family: var(--font-body);">

<div class="container" style="max-width: 490px;">
    <!-- Brand Header -->
    <div class="text-center mb-4">
        <a href="<?= site_url('/') ?>" class="text-decoration-none">
            <div class="d-inline-flex align-items-center justify-content-center rounded-4 shadow-lg mb-2" 
                 style="width: 58px; height: 58px; background: linear-gradient(135deg, #00d084 0%, #0052cc 100%); color: #ffffff; font-size: 1.6rem;">
                <i class="fas fa-heart-pulse"></i>
            </div>
            <h1 class="h4 text-white fw-extrabold mb-0" style="font-family: var(--font-heading); letter-spacing: -0.02em;">
                <?= esc(site_setting('site_name', 'Hospital Quality Management')) ?>
            </h1>
            <p class="text-light small opacity-75 mb-0" style="font-size: 0.82rem; letter-spacing: 0.05em; font-weight: 600;">
                <?= esc(site_setting('site_tagline', 'HOSPITAL STANDARDS & ACCREDITATION')) ?>
            </p>
        </a>
    </div>

    <!-- Login Card -->
    <div class="card border-0 shadow-2xl rounded-4 p-4 p-sm-5" style="background: rgba(255, 255, 255, 0.98); backdrop-filter: blur(20px);">
        <div class="mb-4 text-center">
            <span class="badge px-3 py-1 rounded-pill mb-2 fw-semibold" style="background: rgba(0, 208, 132, 0.12); color: #00875a; font-size: 0.78rem;">
                <i class="fas fa-stethoscope me-1"></i> Clinical &amp; Operational Quality Portal
            </span>
            <h2 class="h5 fw-bold text-navy mb-1" style="font-family: var(--font-heading);">Departmental Sign In</h2>
            <p class="small text-muted mb-0">For Coordinators, Doctors, Nurses, and Biomedical Staff.</p>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger py-2 small d-flex align-items-center gap-2 rounded-3">
                <i class="fas fa-circle-exclamation"></i>
                <div><?= esc(session()->getFlashdata('error')) ?></div>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success py-2 small d-flex align-items-center gap-2 rounded-3">
                <i class="fas fa-circle-check"></i>
                <div><?= esc(session()->getFlashdata('message')) ?></div>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger py-2 small rounded-3">
                <ul class="mb-0 ps-3">
                    <?php foreach (session()->getFlashdata('errors') as $err) : ?>
                        <li><?= esc($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="post" id="loginForm">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="email" class="form-label small fw-semibold text-dark">Hospital Work Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control border-start-0 ps-0" id="email" name="email"
                           value="<?= esc(old('email', 'nabh@maxcarehospital.org')) ?>" required autofocus placeholder="name@hospital.org">
                </div>
            </div>
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <label for="password" class="form-label small fw-semibold text-dark mb-0">Staff Password</label>
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control border-start-0 ps-0" id="password" name="password" value="Admin@123456" required placeholder="••••••••">
                </div>
            </div>
            <button type="submit" class="btn btn-hinton-primary w-100 py-2 mb-3 fw-bold shadow-md">
                <i class="fas fa-sign-in-alt me-1"></i> Sign In to Quality Workspace
            </button>
        </form>

        <!-- Quick Demo Switcher -->
        <div class="border-top pt-3 mt-2">
            <span class="small text-muted d-block text-center mb-2 fw-semibold" style="font-size: 0.78rem;">
                Quick Clinical Role Switcher:
            </span>
            <div class="row g-2">
                <div class="col-6">
                    <button type="button" class="btn btn-sm btn-outline-secondary w-100 text-truncate rounded-3" onclick="setDemo('nabh@maxcarehospital.org', 'Admin@123456')">
                        🎯 NABH Coord.
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-sm btn-outline-secondary w-100 text-truncate rounded-3" onclick="setDemo('icu.head@maxcarehospital.org', 'Admin@123456')">
                        👥 ICU Incharge
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center mt-3 pt-2 border-top">
            <a href="<?= site_url('register') ?>" class="text-primary small text-decoration-none fw-semibold">
                <i class="fas fa-user-plus me-1"></i> New Staff? Register Hospital Account
            </a>
        </div>
    </div>

    <!-- Navigation Switchers -->
    <div class="d-flex justify-content-between align-items-center mt-4 px-2">
        <a href="<?= site_url('admin/login') ?>" class="text-warning small text-decoration-none fw-semibold">
            <i class="fas fa-crown me-1"></i> Executive Admin Portal
        </a>
        <a href="<?= site_url('/') ?>" class="text-light small text-decoration-none opacity-85 hover-white">
            <i class="fas fa-arrow-left me-1"></i> Guidance Home
        </a>
    </div>
</div>

<script>
function setDemo(email, pass) {
    document.getElementById('email').value = email;
    document.getElementById('password').value = pass;
    document.getElementById('loginForm').submit();
}
</script>

</body>
</html>
