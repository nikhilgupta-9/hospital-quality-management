<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Admin Enrollment — Hospital Quality Management (HQM)</title>
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
        select.admin-input option {
            background-color: #0d1731;
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="container" style="max-width: 540px;">
    <!-- Brand Header -->
    <div class="text-center mb-4">
        <a href="<?= site_url('/') ?>" class="text-decoration-none">
            <div class="d-inline-flex align-items-center justify-content-center rounded-4 shadow-lg mb-2" 
                 style="width: 58px; height: 58px; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: #ffffff; font-size: 1.6rem;">
                <i class="fas fa-shield-virus"></i>
            </div>
            <h1 class="h4 text-white fw-extrabold mb-0" style="font-family: var(--font-heading); letter-spacing: -0.02em;">
                <?= esc(site_setting('site_name', 'Hospital Quality Management')) ?>
            </h1>
            <p class="text-light small opacity-75 mb-0" style="font-size: 0.82rem; letter-spacing: 0.08em; font-weight: 700; color: #f59e0b !important;">
                EXECUTIVE HOSPITAL ADMIN ENROLLMENT
            </p>
        </a>
    </div>

    <!-- Admin Registration Card -->
    <div class="card admin-card p-4 p-sm-5">
        <div class="mb-4 text-center">
            <span class="badge px-3 py-1 rounded-pill mb-2 fw-semibold" style="background: rgba(245, 158, 11, 0.2); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.3);">
                <i class="fas fa-key me-1"></i> Requires Master Security Token
            </span>
            <h2 class="h5 fw-bold text-white mb-1" style="font-family: var(--font-heading);">Register Hospital Executive</h2>
            <p class="small text-white-50 mb-0">Enroll a medical director or hospital administration head account.</p>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger py-2 small d-flex align-items-center gap-2 rounded-3 border-0 bg-danger bg-opacity-25 text-danger-subtle">
                <i class="fas fa-circle-exclamation text-danger"></i>
                <div><?= esc(session()->getFlashdata('error')) ?></div>
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

        <form action="<?= site_url('admin/register') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="name" class="form-label small fw-semibold text-light">Full Legal / Professional Name</label>
                <div class="input-group">
                    <span class="input-group-text admin-input-group-text border-end-0"><i class="fas fa-user-tie"></i></span>
                    <input type="text" class="form-control admin-input border-start-0 ps-0" id="name" name="name"
                           value="<?= esc(old('name')) ?>" required placeholder="e.g. Dr. Rajesh Sharma (MD)">
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label small fw-semibold text-light">Official Executive Email</label>
                <div class="input-group">
                    <span class="input-group-text admin-input-group-text border-end-0"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control admin-input border-start-0 ps-0" id="email" name="email"
                           value="<?= esc(old('email')) ?>" required placeholder="director@hospitaldomain.org">
                </div>
            </div>

            <div class="mb-3">
                <label for="hospital_id" class="form-label small fw-semibold text-light">Designated Hospital Institution</label>
                <div class="input-group">
                    <span class="input-group-text admin-input-group-text border-end-0"><i class="fas fa-hospital"></i></span>
                    <select class="form-select admin-input border-start-0 ps-0" id="hospital_id" name="hospital_id" required>
                        <option value="">-- Select Hospital --</option>
                        <?php foreach ($hospitals as $hosp) : ?>
                            <option value="<?= esc($hosp['id']) ?>" <?= old('hospital_id') == $hosp['id'] ? 'selected' : '' ?>>
                                <?= esc($hosp['name']) ?> (<?= esc($hosp['code']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-sm-6">
                    <label for="password" class="form-label small fw-semibold text-light">Account Password</label>
                    <div class="input-group">
                        <span class="input-group-text admin-input-group-text border-end-0"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control admin-input border-start-0 ps-0" id="password" name="password" required placeholder="Min. 8 chars">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="password_confirm" class="form-label small fw-semibold text-light">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text admin-input-group-text border-end-0"><i class="fas fa-lock-open"></i></span>
                        <input type="password" class="form-control admin-input border-start-0 ps-0" id="password_confirm" name="password_confirm" required placeholder="Repeat password">
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="admin_secret_key" class="form-label small fw-semibold text-warning">
                    <i class="fas fa-shield-halved me-1"></i> Master Administrative Security Token
                </label>
                <div class="input-group">
                    <span class="input-group-text admin-input-group-text border-end-0"><i class="fas fa-key text-warning"></i></span>
                    <input type="password" class="form-control admin-input border-start-0 ps-0 border-warning" id="admin_secret_key" name="admin_secret_key" 
                           value="HINTON-ADMIN-SECURE-2026" required placeholder="Master Token provided by Super Admin">
                </div>
                <small class="text-white-50 mt-1 d-block" style="font-size: 0.74rem;">
                    Default demo master key: <code>HINTON-ADMIN-SECURE-2026</code>
                </small>
            </div>

            <button type="submit" class="btn btn-warning w-100 py-2 mb-3 fw-bold text-dark shadow-lg" style="background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%); border: none;">
                <i class="fas fa-user-shield me-1"></i> Authorize &amp; Create Admin Account
            </button>
        </form>

        <div class="text-center pt-2 border-top border-white border-opacity-10">
            <a href="<?= site_url('admin/login') ?>" class="text-white-50 small text-decoration-none">
                Already registered? <span class="text-warning fw-semibold">Sign in here</span>
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

</body>
</html>
