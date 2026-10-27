<!-- =========================================================
     MODULE #3: NABH 10-CHAPTER COMPLIANCE MATRIX
     Interactive Scoring, Gap Estimator & Chapter Breakdown
========================================================= -->

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <span class="badge px-3 py-1 mb-2 text-white fw-bold" style="background-color: #0c74c5; font-size: 0.75rem; letter-spacing: 0.05em;">
            <i class="fas fa-cubes-stacked me-1"></i> MODULE #3: NABH 5TH EDITION MATRIX
        </span>
        <h2 class="h4 text-navy fw-bold mb-1" style="font-family: var(--font-heading);">
            NABH 10-Chapter Compliance Matrix
        </h2>
        <p class="text-muted small mb-0">
            Interactive scoring across all 10 Patient-Centric &amp; Organization-Centric chapters. Real-time compliance weighting based on NABH scoring methodology.
        </p>
    </div>

    <div class="d-flex align-items-center gap-2">
        <a href="<?= site_url('standards') ?>" target="_blank" class="btn btn-sm btn-outline-navy fw-bold">
            <i class="fas fa-book-medical me-1"></i> Standards Glossary
        </a>
        <a href="<?= site_url('hospital-admin/consultant-audit') ?>" class="btn btn-sm text-white fw-bold" style="background-color: #ff7a00;">
            <i class="fas fa-clipboard-check me-1"></i> Run Consultant Audit &rarr;
        </a>
    </div>
</div>

<!-- =========================================================
     SUMMARY CARDS (OVERALL READY %)
========================================================= -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="card p-3 border bg-white shadow-xs rounded-3" style="border-left: 4px solid #0c74c5 !important;">
            <span class="small text-muted d-block mb-1">Overall 10-Chapter Index</span>
            <div class="d-flex align-items-baseline gap-2">
                <span class="fs-3 fw-extrabold text-navy"><?= esc($summary['avg_readiness']) ?>%</span>
                <span class="badge bg-success-subtle text-success small fw-bold">Audit Ready</span>
            </div>
            <div class="progress mt-2" style="height: 6px;">
                <div class="progress-bar" style="width: <?= esc($summary['avg_readiness']) ?>%; background-color: #0c74c5;"></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card p-3 border bg-white shadow-xs rounded-3" style="border-left: 4px solid #10b981 !important;">
            <span class="small text-muted d-block mb-1">Fully Compliant Standards</span>
            <div class="d-flex align-items-baseline gap-2">
                <span class="fs-3 fw-extrabold text-success"><?= esc($summary['total_compliant']) ?></span>
                <span class="text-muted small">/ <?= esc($summary['total_standards']) ?> Core Elements</span>
            </div>
            <span class="text-muted small" style="font-size: 0.72rem;">10 Points Awarded per element</span>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card p-3 border bg-white shadow-xs rounded-3" style="border-left: 4px solid #ff7a00 !important;">
            <span class="small text-muted d-block mb-1">Partially Compliant (CAPA Active)</span>
            <div class="d-flex align-items-baseline gap-2">
                <span class="fs-3 fw-extrabold" style="color: #ff7a00;"><?= esc($summary['total_partial']) ?></span>
                <span class="badge bg-warning-subtle text-warning small fw-bold">Needs Evidence</span>
            </div>
            <span class="text-muted small" style="font-size: 0.72rem;">5 Points Awarded per element</span>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card p-3 border bg-white shadow-xs rounded-3" style="border-left: 4px solid #ef4444 !important;">
            <span class="small text-muted d-block mb-1">Non-Compliant (Gaps / NC)</span>
            <div class="d-flex align-items-baseline gap-2">
                <span class="fs-3 fw-extrabold text-danger"><?= esc($summary['total_non_compliant']) ?></span>
                <span class="badge bg-danger-subtle text-danger small fw-bold">Critical Barrier</span>
            </div>
            <span class="text-muted small" style="font-size: 0.72rem;">0 Points Awarded (Immediate resolution)</span>
        </div>
    </div>
</div>

<!-- =========================================================
     10 CHAPTERS BREAKDOWN TABLE & CARDS
========================================================= -->
<div class="card border bg-white shadow-sm mb-4" style="border-radius: 12px; border-color: #e2e8f0 !important;">
    <div class="card-header p-3 bg-white border-bottom">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
            <h5 class="h6 fw-bold text-navy mb-0">
                <i class="fas fa-list-check me-2 text-primary"></i> 10 Statutory Chapters Compliance Registry
            </h5>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-outline-secondary" onclick="filterChapters('all', this)">All (10)</button>
                <button class="btn btn-sm btn-outline-primary" onclick="filterChapters('patient_centric', this)">Patient Centric (5)</button>
                <button class="btn btn-sm btn-outline-info" onclick="filterChapters('organization_centric', this)">Organization Centric (5)</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0" id="chapterTable">
            <thead style="background-color: #1a2340; color: #ffffff; font-size: 0.8rem; text-transform: uppercase;">
                <tr>
                    <th class="ps-4 py-3" style="width: 100px;">Chapter</th>
                    <th class="py-3">Full Chapter Name &amp; Clinical Focus</th>
                    <th class="py-3 text-center" style="width: 120px;">Category</th>
                    <th class="py-3 text-center" style="width: 180px;">Compliant / Partial / NC</th>
                    <th class="py-3 text-center" style="width: 180px;">Readiness Score</th>
                    <th class="pe-4 py-3 text-end" style="width: 130px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chapters as $ch) : ?>
                    <tr class="chapter-row" data-category="<?= esc($ch['category']) ?>">
                        <td class="ps-4">
                            <span class="badge text-white px-3 py-2 fw-bold" style="background-color: #0c74c5; font-size: 0.82rem;">
                                <?= esc($ch['chapter_code']) ?>
                            </span>
                        </td>
                        <td>
                            <strong class="text-navy d-block"><?= esc($ch['chapter_name']) ?></strong>
                            <span class="text-muted small" style="font-size: 0.75rem;">
                                Core Objective Standards Tracked: <?= esc($ch['total_standards']) ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="badge <?= $ch['category'] === 'patient_centric' ? 'bg-primary-subtle text-primary' : 'bg-info-subtle text-dark' ?> border">
                                <?= $ch['category'] === 'patient_centric' ? 'Patient Centric' : 'Org. Centric' ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-1 small">
                                <span class="badge bg-success" title="Compliant"><?= esc($ch['compliant_count']) ?> C</span>
                                <span class="badge bg-warning text-dark" title="Partial"><?= esc($ch['partial_count']) ?> P</span>
                                <span class="badge bg-danger text-white" title="Non-Compliant"><?= esc($ch['non_compliant_count']) ?> NC</span>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <strong class="<?= $ch['readiness_percentage'] >= 85 ? 'text-success' : 'text-warning' ?>">
                                    <?= esc($ch['readiness_percentage']) ?>%
                                </strong>
                            </div>
                            <div class="progress mt-1 mx-auto" style="height: 5px; width: 120px;">
                                <div class="progress-bar <?= $ch['readiness_percentage'] >= 85 ? 'bg-success' : 'bg-warning' ?>" style="width: <?= esc($ch['readiness_percentage']) ?>%;"></div>
                            </div>
                        </td>
                        <td class="pe-4 text-end">
                            <button type="button" class="btn btn-sm btn-outline-primary fw-bold" 
                                    onclick="openScoreModal(<?= htmlspecialchars(json_encode($ch), ENT_QUOTES, 'UTF-8') ?>)">
                                <i class="fas fa-sliders me-1"></i> Update
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- =========================================================
     MODAL: UPDATE CHAPTER SCORES
========================================================= -->
<div class="modal fade" id="scoreModal" tabindex="-1" aria-labelledby="scoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 12px; overflow: hidden;">
            <form action="<?= site_url('hospital-admin/chapter-matrix/update-score') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="chapter_id" id="modal_chapter_id">

                <div class="modal-header text-white" style="background-color: #1a2340; border-bottom: 3px solid #0c74c5;">
                    <div>
                        <span class="badge mb-1 text-white" style="background-color: #0c74c5;" id="modal_chapter_badge">AAC</span>
                        <h5 class="modal-title h6 fw-bold text-white mb-0" id="modal_chapter_title">Update Chapter Scoring</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <p class="small text-muted mb-3">
                        Enter the count of verified objective standards assessed during internal audits or quality committee reviews.
                    </p>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-success">
                            <i class="fas fa-check-circle me-1"></i> Fully Compliant Standards (10 Points Each)
                        </label>
                        <input type="number" name="compliant_count" id="modal_compliant" class="form-control form-control-lg fw-bold text-success" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-warning">
                            <i class="fas fa-triangle-exclamation me-1"></i> Partially Compliant Standards (5 Points Each)
                        </label>
                        <input type="number" name="partial_count" id="modal_partial" class="form-control form-control-lg fw-bold text-warning" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-danger">
                            <i class="fas fa-times-circle me-1"></i> Non-Compliant Standards (0 Points - NC finding)
                        </label>
                        <input type="number" name="non_compliant_count" id="modal_non_compliant" class="form-control form-control-lg fw-bold text-danger" min="0" required>
                    </div>

                    <div class="p-3 rounded bg-light border small text-muted">
                        <strong>NABH Standard Formula:</strong> <code>Readiness % = (Compliant&times;10 + Partial&times;5) / (Total&times;10) &times; 100</code>
                    </div>
                </div>

                <div class="modal-footer bg-light p-3">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm text-white fw-bold px-3" style="background-color: #0c74c5;">
                        <i class="fas fa-check me-1"></i> Recalculate &amp; Save Score
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function filterChapters(category, btn) {
    document.querySelectorAll('.chapter-row').forEach(row => {
        if (category === 'all' || row.getAttribute('data-category') === category) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function openScoreModal(chapter) {
    document.getElementById('modal_chapter_id').value = chapter.id;
    document.getElementById('modal_chapter_badge').innerText = chapter.chapter_code;
    document.getElementById('modal_chapter_title').innerText = chapter.chapter_name;
    document.getElementById('modal_compliant').value = chapter.compliant_count;
    document.getElementById('modal_partial').value = chapter.partial_count;
    document.getElementById('modal_non_compliant').value = chapter.non_compliant_count;

    const modal = new bootstrap.Modal(document.getElementById('scoreModal'));
    modal.show();
}
</script>
