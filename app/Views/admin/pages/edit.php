<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1 small">
                <li class="breadcrumb-item"><a href="<?= site_url('admin/pages') ?>">CMS Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Page</li>
            </ol>
        </nav>
        <h4 class="fw-bold text-navy mb-0" style="font-family: var(--font-heading);">
            <i class="fas fa-pen-to-square text-primary me-2"></i> Edit Page: <?= esc($page['title']) ?>
        </h4>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= site_url($page['slug']) ?>" target="_blank" class="btn btn-outline-primary btn-sm fw-bold">
            <i class="fas fa-external-link-alt me-1"></i> View Live Public Page
        </a>
        <a href="<?= site_url('admin/pages') ?>" class="btn btn-light border btn-sm fw-bold">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>
</div>

<?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger rounded-3" role="alert">
        <h6 class="fw-bold mb-2"><i class="fas fa-circle-exclamation me-1"></i> Please fix the following errors:</h6>
        <ul class="mb-0 small ps-3">
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= site_url('admin/pages/update/' . $page['slug']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="row g-4">
        <!-- Main Content Area -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="fw-bold text-navy mb-0">Page Content &amp; Headlines</h5>
                    <span class="badge bg-light text-navy border font-monospace">Slug: /<?= esc($page['slug']) ?></span>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Page Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?= old('title', $page['title']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Subtitle / Tagline</label>
                    <input type="text" name="subtitle" class="form-control" value="<?= old('subtitle', $page['subtitle'] ?? '') ?>" placeholder="e.g. Statutory scope and healthcare data protection under DPDP Act 2023">
                </div>

                <!-- Quick Formatting Toolbar -->
                <div class="mb-2 d-flex flex-wrap gap-1 p-2 rounded bg-light border">
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="insertFormat('## ', '')" title="Add Major Heading">
                        <i class="fas fa-heading me-1"></i> H2
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="insertFormat('### ', '')" title="Add Subheading">
                        <i class="fas fa-heading me-1" style="font-size: 0.75rem;"></i> H3
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="insertFormat('**', '**')" title="Bold Text">
                        <i class="fas fa-bold"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="insertFormat('- ', '')" title="Bullet List with Checkmark">
                        <i class="fas fa-list-check"></i> List Item
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="insertFormat('\n---\n', '')" title="Divider Line">
                        <i class="fas fa-minus"></i> Divider
                    </button>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">
                        Body Content (Markdown &amp; HTML Supported) <span class="text-danger">*</span>
                    </label>
                    <textarea id="pageContentArea" name="content" class="form-control font-monospace" rows="18" style="font-size: 0.9rem; line-height: 1.6;" required><?= old('content', $page['content']) ?></textarea>
                    <div class="text-muted small mt-2" style="font-size: 0.78rem;">
                        <i class="fas fa-circle-info text-primary me-1"></i> Content written here will immediately render with high-contrast medical styling on the public website.
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Settings -->
        <div class="col-lg-4">
            <!-- SEO & Meta Card -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                <h6 class="fw-bold text-navy mb-3"><i class="fas fa-magnifying-glass text-primary me-2"></i> SEO &amp; Meta Settings</h6>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Meta Browser Title</label>
                    <input type="text" name="meta_title" class="form-control" value="<?= old('meta_title', $page['meta_title'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="4"><?= old('meta_description', $page['meta_description'] ?? '') ?></textarea>
                </div>

                <div class="p-3 bg-light rounded-3 border">
                    <div class="small text-muted mb-1">Public URL:</div>
                    <a href="<?= site_url($page['slug']) ?>" target="_blank" class="fw-bold text-primary text-break">
                        <?= site_url($page['slug']) ?>
                    </a>
                </div>
            </div>

            <!-- Save Action Card -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h6 class="fw-bold text-navy mb-3">Publish Actions</h6>
                <p class="small text-muted mb-3">
                    Saving will immediately publish updates to the live public platform and record an immutable audit trail entry.
                </p>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm" style="background-color: #0c74c5; border-color: #0c74c5;">
                        <i class="fas fa-floppy-disk me-1"></i> Save &amp; Publish Updates
                    </button>
                    <a href="<?= site_url('admin/pages') ?>" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
function insertFormat(startTag, endTag) {
    const textarea = document.getElementById('pageContentArea');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const text = textarea.value;
    const selectedText = text.substring(start, end);
    const replacement = startTag + selectedText + endTag;
    textarea.value = text.substring(0, start) + replacement + text.substring(end);
    textarea.focus();
    textarea.setSelectionRange(start + startTag.length, start + startTag.length + selectedText.length);
}
</script>
