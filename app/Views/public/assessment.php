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
                <h1 class="page-banner-title">Readiness Assessment</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">Readiness Quiz</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-main">
    <div class="container max-w-900 mx-auto">
        <div class="card card-max p-4 p-lg-5 mb-4">
            <h4 class="h5 fw-bold text-navy mb-4 border-bottom pb-3"><i class="fas fa-list-ol text-sapphire me-2"></i> Quality & Compliance Self-Assessment Questionnaire</h4>

            <form id="assessmentForm" onsubmit="event.preventDefault(); calculateAssessmentScore();">
                <!-- Q1 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">1. Are standard operating procedures (SOPs) documented, approved, and version-controlled for all clinical departments?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q1" value="10" id="q1_yes">
                            <label class="form-check-label" for="q1_yes">Yes, 100% documented with active revision tracking (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q1" value="5" id="q1_partial">
                            <label class="form-check-label" for="q1_partial">Partially documented (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q1" value="0" id="q1_no">
                            <label class="form-check-label" for="q1_no">No formal system (0 pts)</label>
                        </div>
                    </div>
                </div>

                <!-- Q2 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">2. Are all doctors credentialed with primary source qualification verification and defined procedural privileging?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q2" value="10" id="q2_yes">
                            <label class="form-check-label" for="q2_yes">Yes, verified and approved by Credentials Committee (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q2" value="5" id="q2_partial">
                            <label class="form-check-label" for="q2_partial">Only basic documents collected without formal privileging (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q2" value="0" id="q2_no">
                            <label class="form-check-label" for="q2_no">No formal credentialing (0 pts)</label>
                        </div>
                    </div>
                </div>

                <!-- Q3 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">3. Are 100% of applicable medical equipment covered under valid calibration certificates and preventive maintenance (PPM)?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q3" value="10" id="q3_yes">
                            <label class="form-check-label" for="q3_yes">Yes, tracked with NABL calibration records & zero overdue (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q3" value="5" id="q3_partial">
                            <label class="form-check-label" for="q3_partial">Partially calibrated; some overdue equipment exists (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q3" value="0" id="q3_no">
                            <label class="form-check-label" for="q3_no">No calibration schedule maintained (0 pts)</label>
                        </div>
                    </div>
                </div>

                <!-- Q4 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">4. Does the facility possess a valid Fire Safety NOC and conduct regular addressable fire alarm / mock drills?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q4" value="10" id="q4_yes">
                            <label class="form-check-label" for="q4_yes">Valid Fire NOC + Regular tested alarms & drills (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q4" value="5" id="q4_partial">
                            <label class="form-check-label" for="q4_partial">Fire NOC under renewal / informal testing (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q4" value="0" id="q4_no">
                            <label class="form-check-label" for="q4_no">Expired / Missing fire safety documentation (0 pts)</label>
                        </div>
                    </div>
                </div>

                <!-- Q5 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">5. Is there a functional Hospital Infection Control Committee (HICC) tracking monthly HAI rates (CAUTI, CLABSI, SSI)?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q5" value="10" id="q5_yes">
                            <label class="form-check-label" for="q5_yes">Yes, monthly surveillance and benchmark comparison (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q5" value="5" id="q5_partial">
                            <label class="form-check-label" for="q5_partial">HICC exists but rates not systematically calculated (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q5" value="0" id="q5_no">
                            <label class="form-check-label" for="q5_no">No formal HAI surveillance (0 pts)</label>
                        </div>
                    </div>
                </div>

                <!-- Q6 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">6. Are High-Risk & LASA medications clearly identified, labeled with tall-man lettering, and stored separately?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q6" value="10" id="q6_yes">
                            <label class="form-check-label" for="q6_yes">Yes, fully compliant with double-check protocols (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q6" value="5" id="q6_partial">
                            <label class="form-check-label" for="q6_partial">Partially segregated (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q6" value="0" id="q6_no">
                            <label class="form-check-label" for="q6_no">No LASA labeling (0 pts)</label>
                        </div>
                    </div>
                </div>

                <!-- Q7 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">7. Are staff routinely trained in Basic Life Support (BLS) and Emergency Code Blue resuscitation?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q7" value="10" id="q7_yes">
                            <label class="form-check-label" for="q7_yes">&gt; 90% staff certified with logged mock drills (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q7" value="5" id="q7_partial">
                            <label class="form-check-label" for="q7_partial">50-89% staff certified (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q7" value="0" id="q7_no">
                            <label class="form-check-label" for="q7_no">&lt; 50% staff certified (0 pts)</label>
                        </div>
                    </div>
                </div>

                <!-- Q8 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">8. Does the hospital operate an authorized Sewage Treatment Plant (STP) and maintain water quality testing logs?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q8" value="10" id="q8_yes">
                            <label class="form-check-label" for="q8_yes">Yes, operational with SPCB consent and testing logs (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q8" value="5" id="q8_partial">
                            <label class="form-check-label" for="q8_partial">Plant operational but irregular test records (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q8" value="0" id="q8_no">
                            <label class="form-check-label" for="q8_no">No STP / Non-compliant discharge (0 pts)</label>
                        </div>
                    </div>
                </div>

                <!-- Q9 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">9. Is the WHO Surgical Safety Checklist (Sign-in, Time-out, Sign-out) implemented for 100% of OT procedures?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q9" value="10" id="q9_yes">
                            <label class="form-check-label" for="q9_yes">100% verified compliance with audit records (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q9" value="5" id="q9_partial">
                            <label class="form-check-label" for="q9_partial">Used frequently but not audited (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q9" value="0" id="q9_no">
                            <label class="form-check-label" for="q9_no">Not implemented (0 pts)</label>
                        </div>
                    </div>
                </div>

                <!-- Q10 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">10. Are incident reports, sentinel events, and near-misses investigated using Root Cause Analysis (RCA) and CAPA?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q10" value="10" id="q10_yes">
                            <label class="form-check-label" for="q10_yes">Yes, documented non-punitive CAPA closure system (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q10" value="5" id="q10_partial">
                            <label class="form-check-label" for="q10_partial">Incidents reported verbally or in informal books (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q10" value="0" id="q10_no">
                            <label class="form-check-label" for="q10_no">No incident reporting mechanism (0 pts)</label>
                        </div>
                    </div>
                </div>

                <!-- Q11 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">11. Are clinical records audited monthly for completeness, informed consent, and discharge summary turnaround?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q11" value="10" id="q11_yes">
                            <label class="form-check-label" for="q11_yes">Yes, structured medical record audit committee in place (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q11" value="5" id="q11_partial">
                            <label class="form-check-label" for="q11_partial">Audited occasionally (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q11" value="0" id="q11_no">
                            <label class="form-check-label" for="q11_no">No medical record audit (0 pts)</label>
                        </div>
                    </div>
                </div>

                <!-- Q12 -->
                <div class="mb-4 pb-3 border-bottom">
                    <h6 class="fw-bold text-dark mb-2">12. Does the hospital have a dedicated Medical Gas Pipeline System (MGPS) with auto-switchover and daily pressure logs?</h6>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q12" value="10" id="q12_yes">
                            <label class="form-check-label" for="q12_yes">Yes, with cryogenic LMO / manifold & audio-visual alarm (10 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q12" value="5" id="q12_partial">
                            <label class="form-check-label" for="q12_partial">Manifold system with manual cylinder changeover (5 pts)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q12" value="0" id="q12_no">
                            <label class="form-check-label" for="q12_no">Standalone cylinders only (0 pts)</label>
                        </div>
                    </div>
                </div>

                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-gold-max btn-lg px-5">
                        <i class="fas fa-chart-pie me-2"></i> Calculate Readiness Score & Generate Gap Report
                    </button>
                </div>
            </form>
        </div>

        <!-- Result Card (Hidden until submitted) -->
        <div class="card card-max p-4 p-lg-5 text-center shadow-xl border-2 border-primary" id="assessment_result_card" style="display: none;">
            <span class="badge badge-max badge-max-navy mb-2">Evaluation Outcome</span>
            <h3 class="fw-bold text-navy mb-2">NABH Accreditation Preparedness Score</h3>
            
            <div class="display-3 fw-bold text-navy my-3" id="score_percentage">0%</div>
            
            <div class="progress mb-3" style="height: 14px; max-width: 400px; margin: 0 auto;">
                <div class="progress-bar progress-bar-striped progress-bar-animated" id="score_progress_bar" style="width: 0%"></div>
            </div>

            <div class="mb-3" id="score_rating"></div>
            <p class="lead small text-muted max-w-700 mx-auto mb-4" id="score_summary"></p>

            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="<?= site_url('login') ?>" class="btn btn-primary-max">
                    <i class="fas fa-desktop me-2"></i> Implement Gap Closure in Portal
                </a>
                <a href="<?= site_url('contact') ?>" class="btn btn-outline-navy">
                    <i class="fas fa-headset me-2"></i> Request Expert Mock Audit
                </a>
            </div>
        </div>
    </div>
</section>
