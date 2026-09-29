<div class="d-flex justify-content-between align-items-center mb-4">
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
        <a href="<?= site_url($page['slug']) ?>" target="_blank" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
            <i class="fas fa-external-link-alt me-1"></i> View Live Page
        </a>
        <a href="<?= site_url('admin/pages') ?>" class="btn btn-light border btn-sm rounded-pill px-3">
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
                <h5 class="fw-bold text-navy mb-3">Page Content &amp; Headlines</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Page Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?= old('title', $page['title']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Subtitle / Header Tagline</label>
                    <input type="text" name="subtitle" class="form-control" value="<?= old('subtitle', $page['subtitle'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">
                        Body Content (Markdown / HTML Supported) <span class="text-danger">*</span>
                    </label>
                    <div class="text-muted small mb-2" style="font-size: 0.78rem;">
                        Tips: Use <code>### Section Title</code> for headings, <code>- List Item</code> for checkmark lists, and <code>**bold**</code> for emphasis.
                    </div>
                    <textarea name="content" class="form-control font-monospace" rows="16" style="font-size: 0.9rem;" required><?= old('content', $page['content']) ?></textarea>
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
                    <div class="small text-muted mb-1">Permanent URL Slug:</div>
                    <code class="fw-bold text-primary">/<?= esc($page['slug']) ?></code>
                </div>
            </div>

            <!-- Save Action Card -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h6 class="fw-bold text-navy mb-3">Publish Actions</h6>
                <p class="small text-muted mb-3">
                    Saving will immediately publish updates to the live public platform and record an immutable audit trail entry.
                </p>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary fw-bold py-2">
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
