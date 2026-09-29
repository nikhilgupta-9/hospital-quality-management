<!-- HOSPITAL ADMIN COMPLIANCE SCORECARD -->
<div class="row g-4 mb-4">
    <!-- Main Readiness Score Widget -->
    <div class="col-lg-4">
        <div class="card card-max p-4 h-100 text-center bg-navy-gradient text-white">
            <span class="badge badge-max badge-max-gold mb-2 mx-auto">Hospital Quality Index</span>
            <h3 class="h5 fw-bold text-white mb-3">Overall NABH Readiness</h3>
            
            <div class="readiness-gauge my-2" style="background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(0,0,0,0) 70%); border: 6px solid var(--accent-gold);">
                <span class="gauge-value text-gold">88.5%</span>
            </div>

            <p class="small text-light mb-3 opacity-90">
                Hospital is on track for NABH 5th Edition Final Assessment. 2 Critical items need attention before audit submission.
            </p>

            <div class="d-flex justify-content-center gap-2">
                <a href="<?= site_url('document/export') ?>" class="btn btn-gold-max btn-sm">
                    <i class="fas fa-file-export me-1"></i> Export NABH Bundle
                </a>
            </div>
        </div>
    </div>

    <!-- Panel Breakdown Metrics -->
    <div class="col-lg-8">
        <div class="row g-3">
            <div class="col-sm-6 col-md-3">
                <div class="card-premium-stat border-top-blue h-100">
                    <span class="small text-muted d-block mb-1">📄 Document Suite</span>
                    <h3 class="h4 fw-bold text-navy mb-0">94.2%</h3>
                    <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar bg-primary" style="width: 94.2%"></div>
                    </div>
                    <span class="small text-muted mt-2 d-block">48 SOPs Published</span>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card-premium-stat border-top-gold h-100">
                    <span class="small text-muted d-block mb-1">👥 HR & Credentialing</span>
                    <h3 class="h4 fw-bold text-navy mb-0">86.0%</h3>
                    <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar bg-warning" style="width: 86%"></div>
                    </div>
                    <span class="small text-muted mt-2 d-block">1 License Alert</span>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card-premium-stat border-top-emerald h-100">
                    <span class="small text-muted d-block mb-1">🏥 Medical Equipment</span>
                    <h3 class="h4 fw-bold text-navy mb-0">91.5%</h3>
                    <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar bg-success" style="width: 91.5%"></div>
                    </div>
                    <span class="small text-muted mt-2 d-block">1 Calibration Due</span>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card-premium-stat border-top-rose h-100">
                    <span class="small text-muted d-block mb-1">🔥 Fire & Safety NOC</span>
                    <h3 class="h4 fw-bold text-navy mb-0">100%</h3>
                    <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar bg-danger" style="width: 100%"></div>
                    </div>
                    <span class="small text-muted mt-2 d-block">NOC Valid (2027)</span>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card-premium-stat border-top-blue h-100">
                    <span class="small text-muted d-block mb-1">💧 STP & Utility Logs</span>
                    <h3 class="h4 fw-bold text-navy mb-0">89.0%</h3>
                    <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar bg-info" style="width: 89%"></div>
                    </div>
                    <span class="small text-muted mt-2 d-block">150 KLD Active</span>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card-premium-stat border-top-purple h-100">
                    <span class="small text-muted d-block mb-1">🎓 Staff Training</span>
                    <h3 class="h4 fw-bold text-navy mb-0">82.5%</h3>
                    <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar" style="width: 82.5%; background:#7c3aed;"></div>
                    </div>
                    <span class="small text-muted mt-2 d-block">BLS & BMW Drills</span>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card-premium-stat border-top-emerald h-100">
                    <span class="small text-muted d-block mb-1">📋 Internal Audits</span>
                    <h3 class="h4 fw-bold text-navy mb-0">90.0%</h3>
                    <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar bg-success" style="width: 90%"></div>
                    </div>
                    <span class="small text-muted mt-2 d-block">Monthly Audits Done</span>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card-premium-stat border-top-gold h-100">
                    <span class="small text-muted d-block mb-1">⚠️ CAPA Closure</span>
                    <h3 class="h4 fw-bold text-navy mb-0">78.0%</h3>
                    <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar bg-warning" style="width: 78%"></div>
                    </div>
                    <span class="small text-muted mt-2 d-block">1 Action Pending</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CRITICAL ALERTS & ACTION ITEMS -->
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="card card-max p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="h6 fw-bold text-navy mb-0"><i class="fas fa-triangle-exclamation text-danger me-2"></i> Immediate Action & Expiry Alerts</h5>
                <span class="badge badge-max badge-max-rose">4 Critical</span>
            </div>

            <div class="d-flex flex-column gap-3">
                <div class="p-3 bg-surface-alt rounded-3 border-start border-4 border-warning d-flex justify-content-between align-items-center">
                    <div>
                        <strong class="d-block small text-dark">HIC Infection Control Manual Review Due</strong>
                        <span class="small text-muted">Responsible: Dr. Ananya Sen &bull; Target: 25 Days</span>
                    </div>
                    <a href="<?= site_url('document') ?>" class="btn btn-sm btn-outline-navy">Review</a>
                </div>

                <div class="p-3 bg-surface-alt rounded-3 border-start border-4 border-danger d-flex justify-content-between align-items-center">
                    <div>
                        <strong class="d-block small text-dark">ICU Ventilator (Dräger V300) Calibration Expiry</strong>
                        <span class="small text-muted">Asset: EQ-ICU-VENT-01 &bull; Due in 20 Days</span>
                    </div>
                    <a href="<?= site_url('equipment') ?>" class="btn btn-sm btn-outline-navy">Schedule</a>
                </div>

                <div class="p-3 bg-surface-alt rounded-3 border-start border-4 border-warning d-flex justify-content-between align-items-center">
                    <div>
                        <strong class="d-block small text-dark">Doctor State Medical Council Registration Renewal</strong>
                        <span class="small text-muted">Dr. Vikram Malhotra (ICU) &bull; Due in 15 Days</span>
                    </div>
                    <a href="<?= site_url('hr') ?>" class="btn btn-sm btn-outline-navy">Update</a>
                </div>

                <div class="p-3 bg-surface-alt rounded-3 border-start border-4 border-danger d-flex justify-content-between align-items-center">
                    <div>
                        <strong class="d-block small text-dark">CAPA Action Item Overdue: 3rd Floor AHU Inspection</strong>
                        <span class="small text-muted">FMS Chapter Finding &bull; Due in 10 Days</span>
                    </div>
                    <a href="<?= site_url('document') ?>" class="btn btn-sm btn-outline-navy">Close CAPA</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart: Compliance by Chapter -->
    <div class="col-lg-6">
        <div class="card card-max p-4 h-100">
            <h5 class="h6 fw-bold text-navy mb-3"><i class="fas fa-chart-radar text-sapphire me-2"></i> NABH Chapter Compliance Radar</h5>
            <div style="height: 250px; position: relative;">
                <canvas id="chapterChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- DEPARTMENT-WISE READINESS TABLE -->
<div class="card card-max p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="h6 fw-bold text-navy mb-0"><i class="fas fa-sitemap text-sapphire me-2"></i> Department-wise Quality & Compliance Scorecard</h5>
        <span class="small text-muted">10 Departments Tracked</span>
    </div>

    <div class="table-responsive">
        <table class="table-max">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>SOP Compliance</th>
                    <th>Staff Credentialing</th>
                    <th>Equipment Calibration</th>
                    <th>Audit Readiness</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Intensive Care Unit (ICU)</strong></td>
                    <td><span class="badge bg-success-subtle text-success">96%</span></td>
                    <td><span class="badge bg-success-subtle text-success">100%</span></td>
                    <td><span class="badge bg-warning-subtle text-warning">88% (1 Due)</span></td>
                    <td><strong class="text-success">94.6%</strong></td>
                    <td><span class="badge badge-max badge-max-emerald">Accreditation Ready</span></td>
                </tr>
                <tr>
                    <td><strong>Operation Theatre (OT) Complex</strong></td>
                    <td><span class="badge bg-success-subtle text-success">92%</span></td>
                    <td><span class="badge bg-success-subtle text-success">95%</span></td>
                    <td><span class="badge bg-warning-subtle text-warning">85% (AMC Due)</span></td>
                    <td><strong class="text-success">90.6%</strong></td>
                    <td><span class="badge badge-max badge-max-emerald">Accreditation Ready</span></td>
                </tr>
                <tr>
                    <td><strong>Emergency & Trauma Care</strong></td>
                    <td><span class="badge bg-success-subtle text-success">100%</span></td>
                    <td><span class="badge bg-success-subtle text-success">90%</span></td>
                    <td><span class="badge bg-success-subtle text-success">95%</span></td>
                    <td><strong class="text-success">95.0%</strong></td>
                    <td><span class="badge badge-max badge-max-emerald">Accreditation Ready</span></td>
                </tr>
                <tr>
                    <td><strong>Pharmacy & Medication Mgmt</strong></td>
                    <td><span class="badge bg-success-subtle text-success">88%</span></td>
                    <td><span class="badge bg-success-subtle text-success">92%</span></td>
                    <td><span class="badge bg-success-subtle text-success">100%</span></td>
                    <td><strong class="text-success">93.3%</strong></td>
                    <td><span class="badge badge-max badge-max-emerald">Accreditation Ready</span></td>
                </tr>
                <tr>
                    <td><strong>Infection Control & Quality</strong></td>
                    <td><span class="badge bg-warning-subtle text-warning">85% (Review)</span></td>
                    <td><span class="badge bg-success-subtle text-success">100%</span></td>
                    <td><span class="badge bg-success-subtle text-success">100%</span></td>
                    <td><strong class="text-success">95.0%</strong></td>
                    <td><span class="badge badge-max badge-max-emerald">Accreditation Ready</span></td>
                </tr>
                <tr>
                    <td><strong>Biomedical & Facility Engineering</strong></td>
                    <td><span class="badge bg-success-subtle text-success">90%</span></td>
                    <td><span class="badge bg-success-subtle text-success">85%</span></td>
                    <td><span class="badge bg-warning-subtle text-warning">82%</span></td>
                    <td><strong class="text-warning">85.6%</strong></td>
                    <td><span class="badge badge-max badge-max-gold">Substantial Compliance</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('chapterChart').getContext('2d');
    new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['AAC', 'COP', 'MOM', 'PRE', 'HIC', 'CQI', 'ROM', 'FMS', 'HRM'],
            datasets: [{
                label: 'NABH Chapter Readiness %',
                data: [95, 92, 88, 96, 85, 90, 100, 86, 88],
                backgroundColor: 'rgba(0, 71, 187, 0.2)',
                borderColor: '#0047bb',
                pointBackgroundColor: '#d97706',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#0047bb'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                r: {
                    angleLines: { color: '#e2e8f0' },
                    grid: { color: '#e2e8f0' },
                    suggestedMin: 50,
                    suggestedMax: 100
                }
            }
        }
    });
});
</script>
