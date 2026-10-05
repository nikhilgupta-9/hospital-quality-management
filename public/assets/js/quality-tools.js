/**
 * Hospital Quality Management — Interactive JavaScript Engine
 * Live KPI Calculator, NABH Self-Assessment Engine, Filter & Analytics
 */

// Quality Indicator Calculator Engine
function calculateKPI(type) {
    let result = 0;
    let unit = '%';
    let interpretation = '';
    let statusClass = 'text-success';
    let nationalBenchmark = '';

    switch(type) {
        case 'bed_occupancy':
            const census = parseFloat(document.getElementById('kpi_census').value) || 0;
            const availableBeds = parseFloat(document.getElementById('kpi_available_beds').value) || 1;
            const days = parseFloat(document.getElementById('kpi_days').value) || 1;
            result = ((census) / (availableBeds * days)) * 100;
            unit = '%';
            nationalBenchmark = '75% - 85%';
            if (result >= 75 && result <= 85) {
                interpretation = 'Optimal utilization aligned with NABH safety margins.';
                statusClass = 'text-success';
            } else if (result > 85) {
                interpretation = 'High pressure on nursing & infection control resources.';
                statusClass = 'text-warning';
            } else {
                interpretation = 'Underutilized capacity.';
                statusClass = 'text-info';
            }
            break;

        case 'cauti_rate':
            const cautiCount = parseFloat(document.getElementById('kpi_cauti_count').value) || 0;
            const ucDays = parseFloat(document.getElementById('kpi_uc_days').value) || 1;
            result = (cautiCount / ucDays) * 1000;
            unit = ' per 1,000 device days';
            nationalBenchmark = '< 1.5 per 1,000 urinary catheter days';
            if (result <= 1.5) {
                interpretation = 'Within international benchmark (CDC/NHSN target).';
                statusClass = 'text-success';
            } else {
                interpretation = 'Exceeds threshold. Requires bundle audit & catheter necessity review.';
                statusClass = 'text-danger';
            }
            break;

        case 'clabsi_rate':
            const clabsiCount = parseFloat(document.getElementById('kpi_clabsi_count').value) || 0;
            const clDays = parseFloat(document.getElementById('kpi_cl_days').value) || 1;
            result = (clabsiCount / clDays) * 1000;
            unit = ' per 1,000 line days';
            nationalBenchmark = '< 1.0 per 1,000 central line days';
            if (result <= 1.0) {
                interpretation = 'Excellent central line insertion & maintenance compliance.';
                statusClass = 'text-success';
            } else {
                interpretation = 'Higher than standard. Immediate insertion checklist audit required.';
                statusClass = 'text-danger';
            }
            break;

        case 'med_error':
            const medErrors = parseFloat(document.getElementById('kpi_med_errors').value) || 0;
            const patientDays = parseFloat(document.getElementById('kpi_patient_days').value) || 1;
            result = (medErrors / patientDays) * 1000;
            unit = ' per 1,000 patient days';
            nationalBenchmark = '< 2.0 (with >90% near-miss reporting culture)';
            interpretation = result < 2 ? 'Controlled error rate. Continue non-punitive reporting.' : 'High medication administration risk. Pharmacy & 5-rights audit needed.';
            statusClass = result < 2 ? 'text-success' : 'text-danger';
            break;

        case 'alos':
            const totalDischargeDays = parseFloat(document.getElementById('kpi_discharge_days').value) || 0;
            const totalDischarges = parseFloat(document.getElementById('kpi_discharges').value) || 1;
            result = totalDischargeDays / totalDischarges;
            unit = ' Days';
            nationalBenchmark = '3.5 - 4.5 Days (Superspeciality)';
            interpretation = result <= 4.5 ? 'Efficient clinical pathway throughput.' : 'Potential discharge bottleneck or clinical delay.';
            statusClass = result <= 4.5 ? 'text-success' : 'text-warning';
            break;
    }

    const displayVal = document.getElementById(type + '_result_val');
    const displayMeta = document.getElementById(type + '_result_meta');
    if (displayVal) {
        displayVal.innerText = result.toFixed(2) + unit;
    }
    if (displayMeta) {
        displayMeta.innerHTML = `<span class="${statusClass} fw-bold">Status:</span> ${interpretation} <br><small class="text-muted">Benchmark: ${nationalBenchmark}</small>`;
    }
}

// Interactive NABH Self-Assessment Engine
function calculateAssessmentScore() {
    const totalQuestions = 12;
    let totalScore = 0;
    let answered = 0;
    
    for (let i = 1; i <= totalQuestions; i++) {
        const radios = document.getElementsByName('q' + i);
        for (const r of radios) {
            if (r.checked) {
                totalScore += parseInt(r.value, 10);
                answered++;
                break;
            }
        }
    }

    if (answered < totalQuestions) {
        alert('Please answer all ' + totalQuestions + ' questions to generate your accurate NABH readiness score.');
        return;
    }

    const maxScore = totalQuestions * 10;
    const percentage = Math.round((totalScore / maxScore) * 100);

    const resultBox = document.getElementById('assessment_result_card');
    const scoreVal = document.getElementById('score_percentage');
    const scoreRating = document.getElementById('score_rating');
    const scoreSummary = document.getElementById('score_summary');
    const scoreBar = document.getElementById('score_progress_bar');

    if (resultBox) {
        resultBox.style.display = 'block';
        resultBox.scrollIntoView({ behavior: 'smooth' });
    }
    if (scoreVal) scoreVal.innerText = percentage + '%';
    if (scoreBar) {
        scoreBar.style.width = percentage + '%';
        scoreBar.setAttribute('aria-valuenow', percentage);
    }

    if (percentage >= 85) {
        scoreRating.innerHTML = '<span class="badge bg-success fs-6"><i class="fas fa-check-circle me-1"></i> Ready for NABH Final Assessment</span>';
        scoreSummary.innerText = 'Outstanding compliance posture across Document, HR, and Infrastructure panels. Ready for Pre-Assessment / Final NABH Assessment submission.';
        scoreBar.className = 'progress-bar bg-success';
    } else if (percentage >= 65) {
        scoreRating.innerHTML = '<span class="badge bg-warning text-dark fs-6"><i class="fas fa-exclamation-circle me-1"></i> Substantial Compliance — Action Plan Required</span>';
        scoreSummary.innerText = 'Good foundational controls. Address gaps in equipment calibration, CAPA closure, and mandatory staff training to reach 85%+ readiness.';
        scoreBar.className = 'progress-bar bg-warning';
    } else {
        scoreRating.innerHTML = '<span class="badge bg-danger fs-6"><i class="fas fa-times-circle me-1"></i> Critical Gaps Identified</span>';
        scoreSummary.innerText = 'Significant non-conformities found in core statutory and clinical governance systems. Recommend structured gap closure using our portal toolkits.';
        scoreBar.className = 'progress-bar bg-danger';
    }
}

// Standards Filter Engine
function filterStandards(chapter) {
    const cards = document.querySelectorAll('.standard-chapter-card');
    const buttons = document.querySelectorAll('.filter-pill-btn');
    
    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');

    cards.forEach(card => {
        if (chapter === 'all' || card.getAttribute('data-chapter') === chapter) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Search standards
function searchStandardsQuery(query) {
    query = query.toLowerCase().trim();
    const cards = document.querySelectorAll('.standard-chapter-card');
    cards.forEach(card => {
        const text = card.innerText.toLowerCase();
        if (text.includes(query) || query === '') {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Auto filter standards on load from URL parameters (e.g. ?q=... or ?dept=...)
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const q = urlParams.get('q');
    const dept = urlParams.get('dept');

    if (q) {
        const searchInput = document.querySelector('input[onkeyup*="searchStandardsQuery"]');
        if (searchInput) {
            searchInput.value = q;
            searchStandardsQuery(q);
        }
    }

    if (dept) {
        filterStandards(dept);
    }

    // Back to Top button handler
    const backToTopBtn = document.getElementById('backToTopBtn');
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });
        backToTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Interactive 3D Card Tilt & Parallax Elements
    const tiltCards = document.querySelectorAll('.parallax-tilt-card');
    tiltCards.forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = ((y - centerY) / centerY) * -5;
            const rotateY = ((x - centerX) / centerX) * 5;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-4px)`;
        });
        
        card.addEventListener('mouseleave', function() {
            card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px)';
        });
    });

    // Scroll-based parallax transform for floating elements
    const parallaxScrollElements = document.querySelectorAll('[data-parallax-speed]');
    if (parallaxScrollElements.length > 0) {
        let ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    const scrollY = window.pageYOffset;
                    parallaxScrollElements.forEach(el => {
                        const speed = parseFloat(el.getAttribute('data-parallax-speed')) || 0.1;
                        const offset = scrollY * speed;
                        el.style.transform = `translate3d(0, ${offset}px, 0)`;
                    });
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
    }
});


