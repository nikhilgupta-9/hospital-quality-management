<!-- =========================================================
     HINTON PAGE BANNER / HEADER (EXACT CLONE WITH MOLECULES)
========================================================= -->
<section class="page-banner-wrapper">
    <div class="container">
        <div class="page-banner-hinton">
            <!-- Floating Decorative Molecule Elements -->
            <div class="banner-molecule-left"><i class="fas fa-circle-nodes"></i></div>
            <div class="banner-molecule-right"><i class="fas fa-circle-nodes"></i></div>

            <div class="position-relative" style="z-index: 2;">
                <h1 class="page-banner-title">Audit Checklists</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">Checklists</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-main">
    <div class="container">
        <div class="row g-4">
            <!-- Checklist 1 -->
            <div class="col-lg-6">
                <div class="card card-max p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-rose"><i class="fas fa-fire-extinguisher me-1"></i> Life Safety</span>
                        <span class="small text-muted">Monthly Frequency</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Fire & Disaster Management Audit</h5>
                    <p class="small text-muted mb-3">Comprehensive inspection of addressable alarms, main hydrants, extinguisher tags, sprinkler systems, and evacuation routes.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <ul class="mb-0 ps-3">
                            <li>All fire exit pathways clear and illuminated exit lights verified.</li>
                            <li>Main fire pump automated pressure sensor active (&gt; 7 bar).</li>
                            <li>Smoke and heat detectors functionally tested in ICU and Pharmacy.</li>
                            <li>Emergency evacuation floor plans displayed across patient wards.</li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="text-success small fw-semibold"><i class="fas fa-check-circle me-1"></i> 7 Objective Points</span>
                        <a href="<?= site_url('login') ?>" class="btn btn-sm btn-outline-navy">Conduct Digital Audit</a>
                    </div>
                </div>
            </div>

            <!-- Checklist 2 -->
            <div class="col-lg-6">
                <div class="card card-max p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-door-closed me-1"></i> Surgical Services</span>
                        <span class="small text-muted">Weekly Frequency</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Operation Theatre (OT) Sterility & Safety Audit</h5>
                    <p class="small text-muted mb-3">WHO Surgical Safety Checklist compliance, positive pressure HVAC HEPA filters, autoclave validation, and surgical attire.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <ul class="mb-0 ps-3">
                            <li>WHO Surgical Safety Checklist (Sign-in, Time-out, Sign-out) compliance.</li>
                            <li>OT AHU pressure gradient positive relative to scrub corridor.</li>
                            <li>CSSD Bowie-Dick test and biological spore indicator passed.</li>
                            <li>Anesthesia machine high/low pressure leak test verified before case.</li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="text-success small fw-semibold"><i class="fas fa-check-circle me-1"></i> 8 Objective Points</span>
                        <a href="<?= site_url('login') ?>" class="btn btn-sm btn-outline-navy">Conduct Digital Audit</a>
                    </div>
                </div>
            </div>

            <!-- Checklist 3 -->
            <div class="col-lg-6">
                <div class="card card-max p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-biohazard me-1"></i> Environmental</span>
                        <span class="small text-muted">Daily / Weekly</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Biomedical Waste (BMW) & STP Plant Log</h5>
                    <p class="small text-muted mb-3">Color-coded segregation (Yellow, Red, Blue, White puncture-proof), barcode tracking, and Sewage Treatment Plant effluent parameters.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <ul class="mb-0 ps-3">
                            <li>No waste stored beyond statutory 48-hour limit.</li>
                            <li>Barcoded waste bags weighed and logged at central storage yard.</li>
                            <li>STP treated water parameters (BOD &lt; 10 mg/L, TSS &lt; 10 mg/L, pH 6.5-8.5).</li>
                            <li>Waste handlers equipped with mandatory heavy-duty PPE.</li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="text-success small fw-semibold"><i class="fas fa-check-circle me-1"></i> 6 Objective Points</span>
                        <a href="<?= site_url('login') ?>" class="btn btn-sm btn-outline-navy">Conduct Digital Audit</a>
                    </div>
                </div>
            </div>

            <!-- Checklist 4 -->
            <div class="col-lg-6">
                <div class="card card-max p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-gold"><i class="fas fa-heart-pulse me-1"></i> Intensive Care</span>
                        <span class="small text-muted">Monthly Frequency</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">ICU Care Bundle & Device Safety Audit</h5>
                    <p class="small text-muted mb-3">Ventilator bundle, central line insertion checklist, emergency crash cart inventory, and defibrillator daily testing log.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <ul class="mb-0 ps-3">
                            <li>Head-of-bed elevation 30-45 degrees for mechanically ventilated patients.</li>
                            <li>Crash cart medicine expiry check and tamper-evident seal verification.</li>
                            <li>Defibrillator 30-joule discharge test recorded on shift basis.</li>
                            <li>Sedation vacation and weaning readiness assessed daily.</li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="text-success small fw-semibold"><i class="fas fa-check-circle me-1"></i> 8 Objective Points</span>
                        <a href="<?= site_url('login') ?>" class="btn btn-sm btn-outline-navy">Conduct Digital Audit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
