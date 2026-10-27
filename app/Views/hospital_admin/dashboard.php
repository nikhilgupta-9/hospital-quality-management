<!-- =========================================================
     HOSPITAL ADMIN COMPLIANCE SCORECARD & EXECUTIVE COCKPIT
     Pattern Ref: hospital-dashboard-ui-skill.md (NABH Digital Mitra)
========================================================= -->

<div class="container-fluid px-0">

    <!-- 1. HERO BANNER (<HeroBanner />) -->
    <div class="hero-banner-card mb-4">
        <div class="row align-items-center g-4">
            <div class="col-12 col-lg-8">
                <!-- Top pill badges -->
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <span class="badge badge-status-pill badge-teal-outline">
                        <i class="fas fa-award me-1"></i> NABH 5TH EDITION TRACK
                    </span>
                    <span class="badge badge-status-pill bg-white bg-opacity-15 text-white">
                        <i class="fas fa-shield-halved me-1"></i> DQMS SMART ACCREDITATION
                    </span>
                    <span class="badge badge-status-pill badge-green-soft d-none d-sm-inline-flex">
                        <i class="fas fa-circle-check me-1"></i> ABDM M3 INTEGRATED
                    </span>
                </div>

                <!-- Hero Title & Subtitle -->
                <h2 class="h3 fw-bold text-white mb-2" style="font-family: var(--font-heading); letter-spacing: -0.02em;">
                    Hospital Quality &amp; NABH Compliance Cockpit
                </h2>
                <p class="text-white opacity-85 small mb-4" style="max-width: 680px; line-height: 1.6;">
                    Real-time institutional quality telemetry: Overall readiness <strong>88.5%</strong>, 7 statutory licences tracked with Traffic Light Engine, 10 NABH chapters mapped, and active clinical indicators.
                </p>

                <!-- Action Button Row (Pills with >=44px mobile touch targets) -->
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <a href="<?= site_url('hospital-admin/export-sync') ?>" class="btn-amber-pill">
                        <i class="fas fa-file-export me-1"></i> Point #6: Export NABH Bundle
                    </a>
                    <a href="<?= site_url('hospital-admin/chapter-matrix') ?>" class="btn-outline-white-pill">
                        <i class="fas fa-table-cells me-1"></i> Point #3: 10-Chapter Matrix
                    </a>
                    <a href="<?= site_url('hospital-admin/profile?tab=licenses') ?>" class="btn-outline-white-pill">
                        <i class="fas fa-id-card-clip me-1"></i> Point #2: Statutory Licences
                    </a>
                    <a href="<?= site_url('/') ?>" target="_blank" class="text-white small opacity-75 hover-white text-decoration-none ms-md-2 d-none d-md-inline-flex align-items-center">
                        <i class="fas fa-globe me-1"></i> Public Portal
                    </a>
                </div>
            </div>

            <!-- Optional Hero Illustration (Hidden on mobile) -->
            <div class="col-lg-4 d-none d-lg-block text-center">
                <div class="position-relative d-inline-block">
                    <img src="<?= base_url('assets/images/digital_patient_workflow.jpg') ?>" 
                         alt="Hospital Quality Telemetry" 
                         class="img-fluid rounded-4 shadow-lg" 
                         style="max-height: 190px; width: 100%; object-fit: cover; border: 2px solid rgba(255, 255, 255, 0.2);">
                    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-2 px-3 py-1 rounded-pill bg-dark bg-opacity-75 text-white small fw-bold" style="font-size: 0.72rem; white-space: nowrap;">
                        <i class="fas fa-gauge-high text-warning me-1"></i> 88.5% Index Score
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. STAT CARDS ROW (<StatCard /> Grid) -->
    <div class="row g-3 g-md-4 mb-4">
        <!-- Stat Card 1: Overall Readiness -->
        <div class="col-6 col-md-4 col-xl">
            <div class="stat-card-clean">
                <div>
                    <div class="stat-card-label">Overall Readiness</div>
                    <div class="stat-card-value text-primary" style="color: #1565C0 !important;">88.5%</div>
                </div>
                <div class="stat-card-sublabel text-success">
                    <i class="fas fa-check-circle"></i> Final Assessment Track
                </div>
            </div>
        </div>

        <!-- Stat Card 2: Statutory Licences -->
        <div class="col-6 col-md-4 col-xl">
            <a href="<?= site_url('hospital-admin/profile?tab=licenses') ?>" class="text-decoration-none">
                <div class="stat-card-clean">
                    <div>
                        <div class="stat-card-label">Statutory Licences</div>
                        <div class="stat-card-value text-success" style="color: #16A34A !important;">7 / 7</div>
                    </div>
                    <div class="stat-card-sublabel text-danger">
                        <i class="fas fa-triangle-exclamation"></i> 1 Overdue &bull; 2 Due Soon
                    </div>
                </div>
            </a>
        </div>

        <!-- Stat Card 3: Active Documents / SOPs -->
        <div class="col-6 col-md-4 col-xl">
            <a href="<?= site_url('document') ?>" class="text-decoration-none">
                <div class="stat-card-clean">
                    <div>
                        <div class="stat-card-label">Document Suite</div>
                        <div class="stat-card-value" style="color: #0B3D63 !important;">48 SOPs</div>
                    </div>
                    <div class="stat-card-sublabel text-primary">
                        <i class="fas fa-file-contract"></i> 10 Chapters Published
                    </div>
                </div>
            </a>
        </div>

        <!-- Stat Card 4: Critical Alerts -->
        <div class="col-6 col-md-6 col-xl">
            <a href="#immediateAlertsSection" class="text-decoration-none">
                <div class="stat-card-clean">
                    <div>
                        <div class="stat-card-label">Immediate Alerts</div>
                        <div class="stat-card-value text-danger" style="color: #DC2626 !important;">5 Action Due</div>
                    </div>
                    <div class="stat-card-sublabel text-warning">
                        <i class="fas fa-clock"></i> SPCB &bull; Calibration &bull; HR
                    </div>
                </div>
            </a>
        </div>

        <!-- Stat Card 5: Clinical Governance -->
        <div class="col-12 col-md-6 col-xl">
            <a href="<?= site_url('clinical') ?>" class="text-decoration-none">
                <div class="stat-card-clean">
                    <div>
                        <div class="stat-card-label">Clinical Quality</div>
                        <div class="stat-card-value text-success" style="color: #16A34A !important;">94.6%</div>
                    </div>
                    <div class="stat-card-sublabel text-success">
                        <i class="fas fa-heart-pulse"></i> ICU &amp; OT Audit Ready
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- 3. FILTER PILLS BAR (<FilterBar />) -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <!-- Horizontal Scrollable Pills -->
        <div class="filter-pills-bar">
            <button type="button" class="filter-pill active" onclick="filterDashboardSection('all', this)">
                <i class="fas fa-th-large"></i> All Telemetry
            </button>
            <button type="button" class="filter-pill" onclick="filterDashboardSection('scorecard', this)">
                <i class="fas fa-sitemap"></i> Department Scorecard
            </button>
            <button type="button" class="filter-pill" onclick="filterDashboardSection('alerts', this)">
                <i class="fas fa-triangle-exclamation"></i> Immediate Alerts (5)
            </button>
            <button type="button" class="filter-pill" onclick="filterDashboardSection('radar', this)">
                <i class="fas fa-chart-radar"></i> NABH Radar Matrix
            </button>
        </div>

        <!-- Right Action Button -->
        <div class="d-flex align-items-center gap-2">
            <a href="<?= site_url('hospital-admin/consultant-audit') ?>" class="btn-amber-pill">
                <i class="fas fa-plus-circle"></i> + New Audit / NC Log
            </a>
        </div>
    </div>

    <!-- 4. TWO-COLUMN SPLIT CONTENT -->
    <div class="row g-4 mb-4">

        <!-- LEFT COLUMN: Department Scorecard & Chapter Radar (60-65% width) -->
        <div class="col-12 col-lg-7" id="scorecardCol">

            <!-- Department-wise Quality Scorecard Card -->
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4 mb-4" id="departmentScorecardCard">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h3 class="h6 fw-bold text-navy mb-0" style="font-size: 1.05rem;">
                            <i class="fas fa-sitemap text-primary me-2"></i> Department-wise Quality &amp; Compliance Scorecard
                        </h3>
                        <small class="text-muted">Live audit compliance tracked across 6 key clinical departments</small>
                    </div>
                    <span class="badge badge-status-pill badge-teal-outline d-none d-sm-inline-flex">
                        6 Departments Tracked
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-muted small text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.04em;">
                            <tr>
                                <th>Department Name</th>
                                <th>SOP Compliance</th>
                                <th>Staff Credentialing</th>
                                <th>Equipment Calibration</th>
                                <th>Readiness</th>
                                <th class="text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            <tr>
                                <td>
                                    <div class="fw-bold text-navy"><i class="fas fa-bed-pulse text-primary me-1"></i> Intensive Care Unit (ICU)</div>
                                    <small class="text-muted">Level 3 Critical Care</small>
                                </td>
                                <td><span class="badge badge-status-pill badge-green-soft">96%</span></td>
                                <td><span class="badge badge-status-pill badge-green-soft">100%</span></td>
                                <td><span class="badge badge-status-pill badge-amber-soft">88% (1 Due)</span></td>
                                <td><strong class="text-success">94.6%</strong></td>
                                <td class="text-end"><span class="badge badge-status-pill badge-green-soft">Audit Ready</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold text-navy"><i class="fas fa-syringe text-primary me-1"></i> Operation Theatre (OT) Complex</div>
                                    <small class="text-muted">4 Major &bull; 2 Minor OTs</small>
                                </td>
                                <td><span class="badge badge-status-pill badge-green-soft">92%</span></td>
                                <td><span class="badge badge-status-pill badge-green-soft">95%</span></td>
                                <td><span class="badge badge-status-pill badge-amber-soft">85% (AMC Due)</span></td>
                                <td><strong class="text-success">90.6%</strong></td>
                                <td class="text-end"><span class="badge badge-status-pill badge-green-soft">Audit Ready</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold text-navy"><i class="fas fa-truck-medical text-primary me-1"></i> Emergency &amp; Trauma Care</div>
                                    <small class="text-muted">24x7 Triage Unit</small>
                                </td>
                                <td><span class="badge badge-status-pill badge-green-soft">100%</span></td>
                                <td><span class="badge badge-status-pill badge-green-soft">90%</span></td>
                                <td><span class="badge badge-status-pill badge-green-soft">95%</span></td>
                                <td><strong class="text-success">95.0%</strong></td>
                                <td class="text-end"><span class="badge badge-status-pill badge-green-soft">Audit Ready</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold text-navy"><i class="fas fa-pills text-primary me-1"></i> Pharmacy &amp; Medication Mgmt</div>
                                    <small class="text-muted">LASA &amp; Narcotic Vault</small>
                                </td>
                                <td><span class="badge badge-status-pill badge-green-soft">88%</span></td>
                                <td><span class="badge badge-status-pill badge-green-soft">92%</span></td>
                                <td><span class="badge badge-status-pill badge-green-soft">100%</span></td>
                                <td><strong class="text-success">93.3%</strong></td>
                                <td class="text-end"><span class="badge badge-status-pill badge-green-soft">Audit Ready</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold text-navy"><i class="fas fa-virus-slash text-primary me-1"></i> Infection Control &amp; Quality (HIC)</div>
                                    <small class="text-muted">BMW &amp; Surveillance</small>
                                </td>
                                <td><span class="badge badge-status-pill badge-amber-soft">85% (Review)</span></td>
                                <td><span class="badge badge-status-pill badge-green-soft">100%</span></td>
                                <td><span class="badge badge-status-pill badge-green-soft">100%</span></td>
                                <td><strong class="text-success">95.0%</strong></td>
                                <td class="text-end"><span class="badge badge-status-pill badge-green-soft">Audit Ready</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold text-navy"><i class="fas fa-microscope text-primary me-1"></i> Biomedical &amp; Facility Engineering</div>
                                    <small class="text-muted">STP &bull; RO &bull; Med Gases</small>
                                </td>
                                <td><span class="badge badge-status-pill badge-green-soft">90%</span></td>
                                <td><span class="badge badge-status-pill badge-green-soft">85%</span></td>
                                <td><span class="badge badge-status-pill badge-amber-soft">82%</span></td>
                                <td><strong class="text-warning">85.6%</strong></td>
                                <td class="text-end"><span class="badge badge-status-pill badge-amber-soft">Substantial</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- NABH Chapter Compliance Radar Card -->
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4" id="radarCard">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                    <div>
                        <h3 class="h6 fw-bold text-navy mb-0" style="font-size: 1.05rem;">
                            <i class="fas fa-chart-radar text-primary me-2"></i> NABH Chapter Compliance Radar
                        </h3>
                        <small class="text-muted">9 Active Core Chapters Multi-Dimensional Readiness</small>
                    </div>
                    <a href="<?= site_url('hospital-admin/chapter-matrix') ?>" class="btn-primary-pill" style="padding: 6px 16px !important; font-size: 0.8rem !important;">
                        <i class="fas fa-table-cells me-1"></i> Point #3: View 10-Chapter Matrix
                    </a>
                </div>
                <div style="height: 270px; position: relative;">
                    <canvas id="chapterChart"></canvas>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN: Immediate Action Alerts & 9-Point Roadmap Quick Hub (35-40% width) -->
        <div class="col-12 col-lg-5" id="alertsCol">

            <!-- Immediate Action & Expiry Alerts Panel -->
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4 mb-4" id="immediateAlertsSection">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="h6 fw-bold text-navy mb-0" style="font-size: 1.05rem;">
                        <i class="fas fa-triangle-exclamation text-danger me-2"></i> Immediate Action &amp; Expiry Alerts
                    </h3>
                    <span class="badge badge-status-pill badge-red-soft">5 Critical</span>
                </div>

                <div class="d-flex flex-column gap-3">
                    <!-- Alert 1 -->
                    <div class="p-3 bg-light rounded-3 border-start border-4 border-danger d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <div>
                            <strong class="d-block small text-danger"><i class="fas fa-certificate me-1"></i> Consent to Operate (CTO) Expired</strong>
                            <span class="small text-muted" style="font-size: 0.78rem;">Statutory Licences &bull; Overdue! Immediate SPCB Renewal</span>
                        </div>
                        <a href="<?= site_url('hospital-admin/profile?tab=licenses') ?>" class="btn btn-sm btn-danger rounded-pill px-3 fw-bold" style="min-height: 36px; display: inline-flex; align-items: center;">
                            Renew
                        </a>
                    </div>

                    <!-- Alert 2 -->
                    <div class="p-3 bg-light rounded-3 border-start border-4 border-warning d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <div>
                            <strong class="d-block small text-dark"><i class="fas fa-book-medical me-1 text-warning"></i> HIC Infection Control Manual Review Due</strong>
                            <span class="small text-muted" style="font-size: 0.78rem;">Responsible: Dr. Ananya Sen &bull; Target: 25 Days</span>
                        </div>
                        <a href="<?= site_url('document') ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold" style="min-height: 36px; display: inline-flex; align-items: center;">
                            Review
                        </a>
                    </div>

                    <!-- Alert 3 -->
                    <div class="p-3 bg-light rounded-3 border-start border-4 border-danger d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <div>
                            <strong class="d-block small text-dark"><i class="fas fa-wrench me-1 text-danger"></i> ICU Ventilator (Dräger V300) Calibration</strong>
                            <span class="small text-muted" style="font-size: 0.78rem;">Asset: EQ-ICU-VENT-01 &bull; Due in 20 Days</span>
                        </div>
                        <a href="<?= site_url('equipment') ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold" style="min-height: 36px; display: inline-flex; align-items: center;">
                            Schedule
                        </a>
                    </div>

                    <!-- Alert 4 -->
                    <div class="p-3 bg-light rounded-3 border-start border-4 border-warning d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <div>
                            <strong class="d-block small text-dark"><i class="fas fa-user-doctor me-1 text-primary"></i> Doctor Medical Council Registration</strong>
                            <span class="small text-muted" style="font-size: 0.78rem;">Dr. Vikram Malhotra (ICU) &bull; Due in 15 Days</span>
                        </div>
                        <a href="<?= site_url('hr') ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold" style="min-height: 36px; display: inline-flex; align-items: center;">
                            Update
                        </a>
                    </div>

                    <!-- Alert 5 -->
                    <div class="p-3 bg-light rounded-3 border-start border-4 border-danger d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <div>
                            <strong class="d-block small text-dark"><i class="fas fa-clock-rotate-left me-1 text-danger"></i> CAPA Action Item: 3rd Floor AHU</strong>
                            <span class="small text-muted" style="font-size: 0.78rem;">FMS Chapter Finding &bull; Due in 10 Days</span>
                        </div>
                        <a href="<?= site_url('document') ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold" style="min-height: 36px; display: inline-flex; align-items: center;">
                            Close CAPA
                        </a>
                    </div>
                </div>
            </div>

            <!-- Master Roadmap Quick Hub Card (All 9 Diary Points Direct Access) -->
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                <h3 class="h6 fw-bold text-navy mb-3" style="font-size: 1.05rem;">
                    <i class="fas fa-compass text-primary me-2"></i> Master Accreditation Hub (Points 1 - 9)
                </h3>
                <div class="row g-2">
                    <div class="col-6">
                        <a href="<?= site_url('hospital-admin/profile') ?>" class="btn btn-sm btn-light border w-100 text-start py-2 px-2 text-truncate rounded-3 text-navy fw-semibold" style="font-size: 0.8rem;">
                            <i class="fas fa-id-card-clip text-primary me-1"></i> #2 Profile &amp; Licences
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?= site_url('hospital-admin/chapter-matrix') ?>" class="btn btn-sm btn-light border w-100 text-start py-2 px-2 text-truncate rounded-3 text-navy fw-semibold" style="font-size: 0.8rem;">
                            <i class="fas fa-table-cells text-primary me-1"></i> #3 10-Chapter Matrix
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?= site_url('hospital-admin/consultant-audit') ?>" class="btn btn-sm btn-light border w-100 text-start py-2 px-2 text-truncate rounded-3 text-navy fw-semibold" style="font-size: 0.8rem;">
                            <i class="fas fa-clipboard-check text-warning me-1"></i> #4 Consultant Audit
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?= site_url('hospital-admin/evidence-library') ?>" class="btn btn-sm btn-light border w-100 text-start py-2 px-2 text-truncate rounded-3 text-navy fw-semibold" style="font-size: 0.8rem;">
                            <i class="fas fa-images text-success me-1"></i> #5 Evidence Library
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?= site_url('hospital-admin/export-sync') ?>" class="btn btn-sm btn-light border w-100 text-start py-2 px-2 text-truncate rounded-3 text-navy fw-semibold" style="font-size: 0.8rem;">
                            <i class="fas fa-file-export text-danger me-1"></i> #6 Export &amp; Sync
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?= site_url('hospital-admin/templates-vault') ?>" class="btn btn-sm btn-light border w-100 text-start py-2 px-2 text-truncate rounded-3 text-navy fw-semibold" style="font-size: 0.8rem;">
                            <i class="fas fa-box-archive text-info me-1"></i> #7 Templates Vault
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?= site_url('hospital-admin/government-schemes') ?>" class="btn btn-sm btn-light border w-100 text-start py-2 px-2 text-truncate rounded-3 text-navy fw-semibold" style="font-size: 0.8rem;">
                            <i class="fas fa-hand-holding-medical text-primary me-1"></i> #8 Gov Schemes
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?= site_url('hospital-admin/access-control') ?>" class="btn btn-sm btn-light border w-100 text-start py-2 px-2 text-truncate rounded-3 text-navy fw-semibold" style="font-size: 0.8rem;">
                            <i class="fas fa-user-shield text-secondary me-1"></i> #9 Access Control
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Interactive Chart.js Script & Filter Bar Functionality -->
<script>
function filterDashboardSection(section, btn) {
    // Toggle active pill state
    var pills = document.querySelectorAll('.filter-pill');
    pills.forEach(function(p) { p.classList.remove('active'); });
    if (btn) btn.classList.add('active');

    var scorecard = document.getElementById('departmentScorecardCard');
    var radar = document.getElementById('radarCard');
    var alerts = document.getElementById('immediateAlertsSection');

    if (section === 'scorecard') {
        if (scorecard) {
            scorecard.scrollIntoView({ behavior: 'smooth', block: 'start' });
            scorecard.classList.add('border', 'border-primary');
            setTimeout(function() { scorecard.classList.remove('border', 'border-primary'); }, 2000);
        }
    } else if (section === 'alerts') {
        if (alerts) {
            alerts.scrollIntoView({ behavior: 'smooth', block: 'start' });
            alerts.classList.add('border', 'border-danger');
            setTimeout(function() { alerts.classList.remove('border', 'border-danger'); }, 2000);
        }
    } else if (section === 'radar') {
        if (radar) {
            radar.scrollIntoView({ behavior: 'smooth', block: 'start' });
            radar.classList.add('border', 'border-primary');
            setTimeout(function() { radar.classList.remove('border', 'border-primary'); }, 2000);
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('chapterChart');
    if (ctx) {
        new Chart(ctx.getContext('2d'), {
            type: 'radar',
            data: {
                labels: ['AAC', 'COP', 'MOM', 'PRE', 'HIC', 'CQI', 'ROM', 'FMS', 'HRM'],
                datasets: [{
                    label: 'NABH Chapter Readiness %',
                    data: [95, 92, 88, 96, 85, 90, 100, 86, 88],
                    backgroundColor: 'rgba(21, 101, 192, 0.18)',
                    borderColor: '#1565C0',
                    borderWidth: 2,
                    pointBackgroundColor: '#F5A623',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointHoverBackgroundColor: '#ffffff',
                    pointHoverBorderColor: '#1565C0'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    r: {
                        angleLines: { color: '#E5E9F0' },
                        grid: { color: '#E5E9F0' },
                        pointLabels: {
                            font: {
                                size: 12,
                                weight: '600'
                            },
                            color: '#0F2A43'
                        },
                        suggestedMin: 60,
                        suggestedMax: 100,
                        ticks: {
                            stepSize: 10,
                            backdropColor: 'transparent',
                            color: '#6B7280'
                        }
                    }
                }
            }
        });
    }
});
</script>
