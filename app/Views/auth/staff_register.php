<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Account Registration — Hinton DQMS Suite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Google Fonts & Bootstrap 5.3 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    
    <!-- Custom Hinton Theme CSS -->
    <link href="<?= base_url('assets/css/premium-theme.css') ?>" rel="stylesheet">
</head>
<body style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px 16px; background: linear-gradient(135deg, #040e24 0%, #07193b 50%, #0052cc 100%); font-family: var(--font-body);">

<div class="container" style="max-width: 540px;">
    <!-- Brand Header -->
    <div class="text-center mb-4">
        <a href="<?= site_url('/') ?>" class="text-decoration-none">
            <div class="d-inline-flex align-items-center justify-content-center rounded-4 shadow-lg mb-2" 
                 style="width: 58px; height: 58px; background: linear-gradient(135deg, #00d084 0%, #0052cc 100%); color: #ffffff; font-size: 1.6rem;">
                <i class="fas fa-user-plus"></i>
            </div>
            <h1 class="h4 text-white fw-extrabold mb-0" style="font-family: var(--font-heading); letter-spacing: -0.02em;">
                <?= esc(site_setting('site_name', 'Hinton Quality')) ?>
            </h1>
            <p class="text-light small opacity-75 mb-0" style="font-size: 0.82rem; letter-spacing: 0.05em; font-weight: 600;">
                CLINICAL &amp; DEPARTMENTAL STAFF ONBOARDING
            </p>
        </a>
    </div>

    <!-- Register Card -->
    <div class="card border-0 shadow-2xl rounded-4 p-4 p-sm-5" style="background: rgba(255, 255, 255, 0.98); backdrop-filter: blur(20px);">
        <div class="mb-4 text-center">
            <span class="badge px-3 py-1 rounded-pill mb-2 fw-semibold" style="background: rgba(0, 208, 132, 0.12); color: #00875a; font-size: 0.78rem;">
                <i class="fas fa-building-user me-1"></i> Departmental User Access
            </span>
            <h2 class="h5 fw-bold text-navy mb-1" style="font-family: var(--font-heading);">Create Staff Account</h2>
            <p class="small text-muted mb-0">Join your hospital's quality &amp; accreditation workspace.</p>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger py-2 small d-flex align-items-center gap-2 rounded-3">
                <i class="fas fa-circle-exclamation"></i>
                <div><?= esc(session()->getFlashdata('error')) ?></div>
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

        <form action="<?= site_url('register') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="name" class="form-label small fw-semibold text-dark">Full Name &amp; Designation</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-user-doctor"></i></span>
                    <input type="text" class="form-control border-start-0 ps-0" id="name" name="name"
                           value="<?= esc(old('name')) ?>" required placeholder="e.g. Dr. Priya Nair / Staff Nurse Anita">
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label small fw-semibold text-dark">Institutional / Work Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control border-start-0 ps-0" id="email" name="email"
                           value="<?= esc(old('email')) ?>" required placeholder="staff.name@hospital.org">
                </div>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-sm-6">
                    <label for="hospital_id" class="form-label small fw-semibold text-dark">Hospital Facility</label>
                    <select class="form-select" id="hospital_id" name="hospital_id" required onchange="loadDepartments(this.value)">
                        <option value="">-- Choose Hospital --</option>
                        <?php foreach ($hospitals as $hosp) : ?>
                            <option value="<?= esc($hosp['id']) ?>" <?= old('hospital_id', $hospitals[0]['id'] ?? '') == $hosp['id'] ? 'selected' : '' ?>>
                                <?= esc($hosp['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="department_id" class="form-label small fw-semibold text-dark">Clinical Department</label>
                    <select class="form-select" id="department_id" name="department_id" required>
                        <option value="">-- Choose Department --</option>
                        <?php foreach ($departments as $dept) : ?>
                            <option value="<?= esc($dept['id']) ?>" <?= old('department_id') == $dept['id'] ? 'selected' : '' ?>>
                                <?= esc($dept['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row g-2 mb-4">
                <div class="col-sm-6">
                    <label for="password" class="form-label small fw-semibold text-dark">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control border-start-0 ps-0" id="password" name="password" required placeholder="Min. 8 chars">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="password_confirm" class="form-label small fw-semibold text-dark">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-lock-open"></i></span>
                        <input type="password" class="form-control border-start-0 ps-0" id="password_confirm" name="password_confirm" required placeholder="Confirm password">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-hinton-primary w-100 py-2 mb-3 fw-bold shadow-md">
                <i class="fas fa-check-circle me-1"></i> Register Clinical Account
            </button>
        </form>

        <div class="text-center pt-2 border-top">
            <a href="<?= site_url('login') ?>" class="text-muted small text-decoration-none">
                Already have an account? <span class="text-primary fw-semibold">Sign in here</span>
            </a>
        </div>
    </div>

    <!-- Switcher -->
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
function loadDepartments(hospitalId) {
    if (!hospitalId) return;
    fetch('<?= site_url('api/departments-by-hospital/') ?>' + hospitalId)
        .then(response => response.json())
        .then(data => {
            const deptSelect = document.getElementById('department_id');
            deptSelect.innerHTML = '<option value="">-- Choose Department --</option>';
            data.forEach(dept => {
                const opt = document.createElement('option');
                opt.value = dept.id;
                opt.textContent = dept.name;
                deptSelect.appendChild(opt);
            });
        })
        .catch(err => console.error('Error fetching departments:', err));
}
</script>

</body>
</html>
