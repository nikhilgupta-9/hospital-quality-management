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
                <h1 class="page-banner-title">Quality KPIs &amp; Indicators</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">Quality Indicators</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-main">
    <div class="container">
        <!-- KPI Table -->
        <div class="card card-max p-4 mb-5">
            <h4 class="h5 fw-bold text-navy mb-3"><i class="fas fa-chart-line text-sapphire me-2"></i> Mandatory NABH Quality Indicators Matrix</h4>
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Indicator Code</th>
                            <th>Indicator Name</th>
                            <th>Numerator / Denominator</th>
                            <th>Target Benchmark</th>
                            <th>Frequency</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="badge badge-max badge-max-blue">QI-CLIN-01</span></td>
                            <td><strong>Catheter Associated UTI (CAUTI) Rate</strong></td>
                            <td class="small text-muted">(Total CAUTI Cases / Total Urinary Catheter Days) &times; 1,000</td>
                            <td><span class="badge badge-max badge-max-emerald">&le; 1.5 per 1,000 days</span></td>
                            <td>Monthly</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-max badge-max-blue">QI-CLIN-02</span></td>
                            <td><strong>Central Line Bloodstream Infection (CLABSI)</strong></td>
                            <td class="small text-muted">(Total CLABSI Cases / Total Central Line Days) &times; 1,000</td>
                            <td><span class="badge badge-max badge-max-emerald">&le; 1.0 per 1,000 days</span></td>
                            <td>Monthly</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-max badge-max-blue">QI-CLIN-03</span></td>
                            <td><strong>Ventilator Associated Pneumonia (VAP) Rate</strong></td>
                            <td class="small text-muted">(Total VAP Cases / Total Ventilator Days) &times; 1,000</td>
                            <td><span class="badge badge-max badge-max-emerald">&le; 2.0 per 1,000 days</span></td>
                            <td>Monthly</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-max badge-max-blue">QI-CLIN-04</span></td>
                            <td><strong>Surgical Site Infection (SSI) Rate</strong></td>
                            <td class="small text-muted">(Total Clean Wound SSI / Total Clean Surgeries) &times; 100</td>
                            <td><span class="badge badge-max badge-max-emerald">&le; 1.0%</span></td>
                            <td>Monthly</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-max badge-max-blue">QI-CLIN-05</span></td>
                            <td><strong>Medication Error Reporting Rate</strong></td>
                            <td class="small text-muted">(Total Reported Errors & Near Misses / Patient Days) &times; 1,000</td>
                            <td><span class="badge badge-max badge-max-gold">&gt; 1.0 (reporting culture)</span></td>
                            <td>Monthly</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-max badge-max-blue">QI-MGMT-01</span></td>
                            <td><strong>Bed Occupancy Rate (BOR)</strong></td>
                            <td class="small text-muted">(Total Inpatient Bed Days / Available Bed Days) &times; 100</td>
                            <td><span class="badge badge-max badge-max-emerald">75% - 85%</span></td>
                            <td>Daily / Monthly</td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-max badge-max-blue">QI-MGMT-02</span></td>
                            <td><strong>Average Length of Stay (ALOS)</strong></td>
                            <td class="small text-muted">Total Inpatient Days of Care / Total Discharges</td>
                            <td><span class="badge badge-max badge-max-emerald">3.5 - 4.5 Days</span></td>
                            <td>Monthly</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Live Calculator Section -->
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card card-max p-4 h-100">
                    <h5 class="fw-bold text-navy mb-3"><i class="fas fa-calculator text-gold me-2"></i> Medication Error Rate Calculator</h5>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Reported Medication Errors (Prescription, Dispensing, Admin)</label>
                        <input type="number" id="kpi_med_errors" class="form-control" value="6">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Total Patient Days in Period</label>
                        <input type="number" id="kpi_patient_days" class="form-control" value="4800">
                    </div>
                    <button class="btn btn-gold-max btn-sm mb-3" onclick="calculateKPI('med_error')">Calculate Error Rate</button>

                    <div class="kpi-result-display">
                        <span class="small text-uppercase text-light opacity-75">Error Rate per 1,000 Patient Days</span>
                        <div class="val" id="med_error_result_val">1.25</div>
                        <div class="small" id="med_error_result_meta">
                            <span class="text-success fw-bold">Status:</span> Controlled error rate. Continue non-punitive reporting.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-max p-4 h-100">
                    <h5 class="fw-bold text-navy mb-3"><i class="fas fa-stethoscope text-sapphire me-2"></i> Hospital Infection Control Rates</h5>
                    <div class="p-3 bg-surface-alt rounded-3 mb-3 small">
                        <p class="mb-2"><strong>WHO 5 Moments of Hand Hygiene Audit:</strong></p>
                        <div class="d-flex justify-content-between mb-1">
                            <span>Before touching a patient:</span>
                            <span class="fw-bold text-success">92% Compliance</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span>Before clean/aseptic procedure:</span>
                            <span class="fw-bold text-success">96% Compliance</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span>After body fluid exposure:</span>
                            <span class="fw-bold text-success">98% Compliance</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>After touching patient surroundings:</span>
                            <span class="fw-bold text-success">88% Compliance</span>
                        </div>
                    </div>
                    <a href="<?= site_url('login') ?>" class="btn btn-primary-max w-100 py-2">
                        <i class="fas fa-desktop me-1"></i> Access Full KPI Portal Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
