<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-navy mb-1" style="font-family: var(--font-heading);">
            <i class="fas fa-sliders text-primary me-2"></i> Global Site &amp; Contact Settings
        </h4>
        <p class="text-muted small mb-0">Changes saved here are instantly applied across the entire website, including the header, top contact bar, footer, and contact page.</p>
    </div>
</div>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
        <i class="fas fa-circle-check me-2"></i> <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<form action="<?= site_url('admin/settings/update') ?>" method="post">
    <?= csrf_field() ?>

    <div class="row g-4">
        <!-- Contact Information Column -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                <h5 class="fw-bold text-navy mb-3 d-flex align-items-center gap-2">
                    <i class="fas fa-headset text-primary"></i> Contact &amp; Emergency Lines
                </h5>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Emergency Line Phone</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-phone-volume text-danger"></i></span>
                        <input type="text" name="emergency_phone" class="form-control" value="<?= esc($settings['emergency_phone'] ?? '+1 (234) 567 890 43') ?>" required>
                    </div>
                    <div class="form-text">Displayed on the pre-footer pink bar, header, and emergency banners.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Toll-Free Helpline</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-phone text-primary"></i></span>
                        <input type="text" name="helpline_tollfree" class="form-control" value="<?= esc($settings['helpline_tollfree'] ?? '+91 1800-419-5959') ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Primary Support Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-envelope text-info"></i></span>
                        <input type="email" name="support_email" class="form-control" value="<?= esc($settings['support_email'] ?? 'support@hinton.com') ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Accreditation Advisory Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-envelope-open-text text-secondary"></i></span>
                        <input type="email" name="advisory_email" class="form-control" value="<?= esc($settings['advisory_email'] ?? 'advisory@hospitalquality.org') ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Office Physical Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-location-dot text-danger"></i></span>
                        <input type="text" name="office_address" class="form-control" value="<?= esc($settings['office_address'] ?? '245 14h Street, Toronto, Canada') ?>" required>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-navy small">Working Hours</label>
                        <input type="text" name="office_hours" class="form-control" value="<?= esc($settings['office_hours'] ?? 'Mon - Sat: 8:30 AM - 8:00 PM') ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-navy small">Emergency Availability</label>
                        <input type="text" name="emergency_hours" class="form-control" value="<?= esc($settings['emergency_hours'] ?? '24/7 Available Everyday') ?>">
                    </div>
                </div>
            </div>

            <!-- Google Map Embed -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h5 class="fw-bold text-navy mb-3 d-flex align-items-center gap-2">
                    <i class="fas fa-map-location-dot text-primary"></i> Map Location Embed
                </h5>
                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Google Map iframe src URL</label>
                    <textarea name="google_map_embed" class="form-control font-monospace small" rows="3"><?= esc($settings['google_map_embed'] ?? '') ?></textarea>
                    <div class="form-text">Paste the URL from Google Maps Embed (https://www.google.com/maps/embed?...).</div>
                </div>
            </div>
        </div>

        <!-- Branding & Social Media Column -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                <h5 class="fw-bold text-navy mb-3 d-flex align-items-center gap-2">
                    <i class="fas fa-hospital text-primary"></i> Site Branding &amp; Platform Info
                </h5>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Brand Platform Name</label>
                    <input type="text" name="site_name" class="form-control" value="<?= esc($settings['site_name'] ?? 'Hinton Quality') ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Platform Tagline</label>
                    <input type="text" name="site_tagline" class="form-control" value="<?= esc($settings['site_tagline'] ?? 'HOSPITAL STANDARDS & ACCREDITATION') ?>">
                </div>
            </div>

            <!-- Social Media Profiles -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                <h5 class="fw-bold text-navy mb-3 d-flex align-items-center gap-2">
                    <i class="fas fa-share-nodes text-primary"></i> Social Media Links
                </h5>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Facebook URL</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fab fa-facebook-f text-primary"></i></span>
                        <input type="url" name="facebook_url" class="form-control" value="<?= esc($settings['facebook_url'] ?? 'https://facebook.com') ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Twitter / X URL</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fab fa-twitter text-info"></i></span>
                        <input type="url" name="twitter_url" class="form-control" value="<?= esc($settings['twitter_url'] ?? 'https://twitter.com') ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">LinkedIn URL</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fab fa-linkedin-in text-primary"></i></span>
                        <input type="url" name="linkedin_url" class="form-control" value="<?= esc($settings['linkedin_url'] ?? 'https://linkedin.com') ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">Instagram URL</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fab fa-instagram text-danger"></i></span>
                        <input type="url" name="instagram_url" class="form-control" value="<?= esc($settings['instagram_url'] ?? 'https://instagram.com') ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-navy small">YouTube URL</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fab fa-youtube text-danger"></i></span>
                        <input type="url" name="youtube_url" class="form-control" value="<?= esc($settings['youtube_url'] ?? 'https://youtube.com') ?>">
                    </div>
                </div>
            </div>

            <!-- Save Action Button -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="fw-bold text-navy">Save Site-wide Updates</div>
                        <div class="text-muted small">Immediately synchronizes all public pages.</div>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                        <i class="fas fa-floppy-disk me-1"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
