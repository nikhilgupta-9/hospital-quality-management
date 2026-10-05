<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="mb-1 text-navy fw-bold"><i class="fas fa-tags text-primary me-2"></i>SaaS Pricing Plans &amp; Tiers</h4>
        <p class="text-muted mb-0 small">Manage public pricing tiers, bed capacity limits, features list, and promotional badges shown on the portal.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= site_url('pricing') ?>" target="_blank" class="btn btn-outline-primary btn-sm fw-bold">
            <i class="fas fa-external-link-alt me-1"></i> View Live Pricing Page
        </a>
        <button class="btn btn-primary btn-sm fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#createPlanModal" style="background-color: #0c74c5; border-color: #0c74c5;">
            <i class="fas fa-plus me-1"></i> Add New Plan
        </button>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-1"></i> <?= esc(session()->getFlashdata('success')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-1"></i> <?= esc(session()->getFlashdata('error')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Plan Cards Overview Grid -->
<div class="row g-4 mb-4">
    <?php if (empty($plans)): ?>
        <div class="col-12">
            <div class="card p-5 text-center bg-white border-0 shadow-sm rounded-3">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <h5 class="fw-bold text-navy">No Pricing Plans Configured</h5>
                <p class="text-muted small">Click "Add New Plan" to create your first subscription tier.</p>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($plans as $plan): ?>
            <?php 
                $features = json_decode($plan['features_list'] ?? '[]', true) ?: [];
            ?>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card h-100 border shadow-sm rounded-3 overflow-hidden position-relative <?= $plan['is_popular'] ? 'border-primary' : '' ?>" style="background-color: #ffffff;">
                    <?php if ($plan['is_popular']): ?>
                        <div class="position-absolute top-0 end-0 px-3 py-1 bg-primary text-white fw-bold small rounded-bottom-start" style="font-size: 0.72rem; z-index: 2;">
                            <i class="fas fa-star me-1"></i> POPULAR / FEATURED
                        </div>
                    <?php endif; ?>

                    <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge px-2 py-1 text-white fw-bold" style="background-color: #1a2340; font-size: 0.75rem;">
                                    <?= esc($plan['badge_text'] ?: 'Standard') ?>
                                </span>
                                <?php if ($plan['is_active']): ?>
                                    <span class="badge bg-success-subtle text-success border border-success px-2 py-1"><i class="fas fa-circle-check me-1"></i>Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger-subtle text-danger border border-danger px-2 py-1"><i class="fas fa-ban me-1"></i>Disabled</span>
                                <?php endif; ?>
                            </div>

                            <h5 class="fw-bold text-navy mb-1"><?= esc($plan['name']) ?></h5>
                            <div class="badge bg-light text-dark border mb-2 fw-semibold"><i class="fas fa-bed text-primary me-1"></i><?= esc($plan['bed_capacity']) ?></div>
                            <p class="text-muted small mb-3" style="min-height: 40px;"><?= esc($plan['tagline']) ?></p>

                            <div class="p-3 bg-light rounded-3 mb-3 border">
                                <div class="d-flex align-items-baseline">
                                    <span class="h3 fw-bold text-navy mb-0"><?= esc($plan['currency']) ?><?= number_format((float)$plan['price_monthly'], 0) ?></span>
                                    <span class="text-muted small ms-1">/ month</span>
                                </div>
                                <div class="text-muted small mt-1" style="font-size: 0.78rem;">
                                    <strong>Yearly:</strong> <?= esc($plan['currency']) ?><?= number_format((float)$plan['price_yearly'], 0) ?> billed annually
                                </div>
                                <div class="text-muted small" style="font-size: 0.78rem;">
                                    <strong>Max Users:</strong> <?= $plan['max_users'] > 0 ? esc($plan['max_users']) . ' Staff Accounts' : 'Unlimited Users' ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <span class="fw-bold text-navy small d-block mb-2"><i class="fas fa-list-check text-primary me-1"></i>Included Features (<?= count($features) ?>):</span>
                                <ul class="list-unstyled mb-0 small text-muted">
                                    <?php foreach (array_slice($features, 0, 5) as $feat): ?>
                                        <li class="mb-1 d-flex align-items-start gap-1">
                                            <i class="fas fa-check text-success mt-1" style="font-size: 0.7rem;"></i>
                                            <span><?= esc($feat) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                    <?php if (count($features) > 5): ?>
                                        <li class="text-primary fw-semibold" style="font-size: 0.75rem;">+ <?= count($features) - 5 ?> more features...</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- Card Footer Controls -->
                        <div class="pt-3 border-top d-flex align-items-center justify-content-between mt-2">
                            <div class="d-flex gap-1">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal_<?= $plan['id'] ?>" title="Edit Plan">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </button>
                                <form method="post" action="<?= site_url('admin/pricing/toggle-active/' . $plan['id']) ?>" class="d-inline">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm <?= $plan['is_active'] ? 'btn-outline-warning' : 'btn-outline-success' ?>" title="Toggle Active">
                                        <i class="fas <?= $plan['is_active'] ? 'fa-pause' : 'fa-play' ?>"></i>
                                    </button>
                                </form>
                            </div>

                            <form method="post" action="<?= site_url('admin/pricing/delete/' . $plan['id']) ?>" onsubmit="return confirm('Are you sure you want to delete this plan?');" class="d-inline">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Plan">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Plan Modal -->
            <div class="modal fade" id="editModal_<?= $plan['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel_<?= $plan['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('admin/pricing/update/' . $plan['id']) ?>">
                            <?= csrf_field() ?>
                            <div class="modal-header bg-light">
                                <h5 class="modal-title fw-bold text-navy" id="editModalLabel_<?= $plan['id'] ?>">Edit Plan: <?= esc($plan['name']) ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small text-navy">Plan Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="<?= esc($plan['name']) ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small text-navy">Slug <span class="text-danger">*</span></label>
                                        <input type="text" name="slug" class="form-control" value="<?= esc($plan['slug']) ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small text-navy">Badge / Tagline Badge</label>
                                        <input type="text" name="badge_text" class="form-control" value="<?= esc($plan['badge_text']) ?>" placeholder="e.g. Most Popular, Starter">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small text-navy">Bed Capacity <span class="text-danger">*</span></label>
                                        <input type="text" name="bed_capacity" class="form-control" value="<?= esc($plan['bed_capacity']) ?>" placeholder="e.g. Up to 50 Beds" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold small text-navy">Tagline / Brief Description</label>
                                        <textarea name="tagline" class="form-control" rows="2"><?= esc($plan['tagline']) ?></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold small text-navy">Monthly Price (₹) <span class="text-danger">*</span></label>
                                        <input type="number" step="0.01" name="price_monthly" class="form-control" value="<?= esc($plan['price_monthly']) ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold small text-navy">Yearly Price (₹) <span class="text-danger">*</span></label>
                                        <input type="number" step="0.01" name="price_yearly" class="form-control" value="<?= esc($plan['price_yearly']) ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold small text-navy">Max Staff Users (0 = Unlimited)</label>
                                        <input type="number" name="max_users" class="form-control" value="<?= esc($plan['max_users']) ?>" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold small text-navy">Features List (1 per line)</label>
                                        <textarea name="features_text" class="form-control" rows="6" placeholder="Enter each feature on a new line"><?= esc(implode("\n", $features)) ?></textarea>
                                        <small class="text-muted">Enter each bullet point feature on a new line.</small>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold small text-navy">Sort Order</label>
                                        <input type="number" name="sort_order" class="form-control" value="<?= esc($plan['sort_order']) ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold small text-navy">CTA Button Text</label>
                                        <input type="text" name="cta_text" class="form-control" value="<?= esc($plan['cta_text']) ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold small text-navy">CTA Link</label>
                                        <input type="text" name="cta_url" class="form-control" value="<?= esc($plan['cta_url']) ?>">
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_popular" value="1" id="isPop_<?= $plan['id'] ?>" <?= $plan['is_popular'] ? 'checked' : '' ?>>
                                            <label class="form-check-label fw-semibold small text-navy" for="isPop_<?= $plan['id'] ?>">Mark as Popular / Featured Plan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isAct_<?= $plan['id'] ?>" <?= $plan['is_active'] ? 'checked' : '' ?>>
                                            <label class="form-check-label fw-semibold small text-navy" for="isAct_<?= $plan['id'] ?>">Active (Visible on public pricing)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-light">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-sm fw-bold" style="background-color: #0c74c5;">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Add New Plan Modal -->
<div class="modal fade" id="createPlanModal" tabindex="-1" aria-labelledby="createPlanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" action="<?= site_url('admin/pricing/create') ?>">
                <?= csrf_field() ?>
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold text-navy" id="createPlanModalLabel"><i class="fas fa-plus-circle text-primary me-2"></i>Create New SaaS Pricing Tier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-navy">Plan Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. NABH Day Care / Dental Suite" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-navy">Slug <span class="text-danger">*</span></label>
                            <input type="text" name="slug" class="form-control" placeholder="e.g. day-care-suite" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-navy">Badge / Tag</label>
                            <input type="text" name="badge_text" class="form-control" placeholder="e.g. Special Offer, Entry">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-navy">Bed Capacity <span class="text-danger">*</span></label>
                            <input type="text" name="bed_capacity" class="form-control" placeholder="e.g. Up to 25 Beds" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-navy">Tagline / Brief Description</label>
                            <textarea name="tagline" class="form-control" rows="2" placeholder="Brief 1-2 line description for hospital administrators"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-navy">Monthly Price (₹) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="price_monthly" class="form-control" placeholder="9999.00" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-navy">Yearly Price (₹) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="price_yearly" class="form-control" placeholder="99990.00" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-navy">Max Staff Users (0 = Unlimited)</label>
                            <input type="number" name="max_users" class="form-control" value="10" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-navy">Features List (1 per line)</label>
                            <textarea name="features_text" class="form-control" rows="6" placeholder="NABH Digital SOPs&#10;Equipment PPM Tracking&#10;Departmental Audit Checklists&#10;Standard Support"></textarea>
                            <small class="text-muted">Enter each feature on a separate new line.</small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-navy">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="4">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-navy">CTA Button Text</label>
                            <input type="text" name="cta_text" class="form-control" value="Start 14-Day Free Trial">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-navy">CTA Link</label>
                            <input type="text" name="cta_url" class="form-control" value="contact">
                        </div>
                        <div class="col-md-6 pt-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_popular" value="1" id="isPopNew">
                                <label class="form-check-label fw-semibold small text-navy" for="isPopNew">Mark as Popular / Featured Plan</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActNew" checked>
                                <label class="form-check-label fw-semibold small text-navy" for="isActNew">Active (Visible on public pricing)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold" style="background-color: #0c74c5;">Create Plan</button>
                </div>
            </form>
        </div>
    </div>
</div>
