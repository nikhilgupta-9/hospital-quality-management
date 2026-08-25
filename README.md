# Hospital Quality Management — NABH Compliance Portal

CodeIgniter 4 + MySQL implementation of the NABH compliance portal. Full
design context lives in two published references:

- **Project overview** — what the portal does, the three panels, plain-language feature breakdown.
- **NABH Portal Blueprint** — the technical architecture this codebase implements (schema, RBAC, routing, deployment).

## Status: Foundation phase complete

- ✅ Project scaffolded, MySQL-ready
- ✅ All 28 tables migrated (Core/Tenancy, Document, HR, Equipment & Infrastructure, Shared Services)
- ✅ Auth (session-based login/logout) + two-layer RBAC (route filter + department-scoping helper)
- ✅ Routes wired for all five route groups, with placeholder screens so every role can click through their own section
- ✅ Seeders: 4 roles, permission matrix, first Super Admin login
- ⬜ Real project theme wired into the view layer (next phase — attach your theme files)
- ⬜ Panel functionality: Document, HR, Equipment & Infrastructure (phase by phase after the theme)

## Setup on XAMPP

1. Copy this whole folder to `D:\xampp\htdocs\hospital-quality` (if it's not already there).
2. In phpMyAdmin (or the `mysql` CLI), create an empty database: `hospital_quality`.
3. Copy `.env.example` to `.env`. The defaults already match XAMPP's stock MySQL (`root` / no password) — adjust only if you've changed that.
4. Generate an encryption key:
   ```
   php spark key:generate
   ```
5. Run migrations and seed the starter data:
   ```
   php spark migrate --all
   php spark db:seed DatabaseSeeder
   ```
   This prints your first Super Admin login (defaults to `superadmin@example.com` / `ChangeMe!123` unless you set `SUPERADMIN_EMAIL` / `SUPERADMIN_PASSWORD` in `.env` first). **Sign in and change it immediately.**
6. Visit `http://localhost/hospital-quality/public/` and sign in.

No `composer install` needed for any of the above — see the note below.

## Why `system/` and `vendor/` are committed to git

This sandbox couldn't reach Packagist while building the foundation, so the
framework and its two runtime dependencies were vendored directly from
their GitHub sources instead of via `composer install`. That's not a hack —
it's CodeIgniter 4's officially supported ["manual installation"](https://codeigniter.com/user_guide/installation/index.html)
method: `system/` sits at the project root, `app/Config/Paths.php` points
straight at it, and `vendor/autoload.php` is a small hand-written PSR-4
loader (see its header comment) instead of Composer's generated one.

Practical effect: this project runs immediately after a clone — no
`composer install` step, no Packagist dependency for your team day-to-day.

If your machine has normal internet access and you'd prefer Composer to
manage things the usual way, `composer.json` is included and accurate —
just remove `vendor/` from `.gitignore`'s notes, run `composer install`,
and flip `discoverInComposer` back to `true` in `app/Config/Modules.php`.
Neither is required to keep working on this project.

## Project structure

```
app/Controllers/   Admin\*, HospitalAdmin\*, Document\*, HR\*, Equipment\*
app/Models/         One per core table so far — more land with each panel
app/Filters/        RoleFilter (route-level), DeptScopeFilter (dept_user safety net)
app/Helpers/         auth_helper.php — current_user(), has_role(), scope_to_department()
app/Database/
  Migrations/       28 tables, in dependency order
  Seeds/            RoleSeeder, PermissionSeeder, RolePermissionSeeder, SuperAdminSeeder
app/Views/
  layouts/main.php   The app shell (sidebar + header) — swap the real theme in here
  auth/login.php     Sign-in screen
```

## Roles

| Role | Slug | Lands on |
|---|---|---|
| Super Admin | `super_admin` | `/admin` |
| Hospital Admin | `hospital_admin` | `/hospital-admin` |
| NABH Coordinator | `nabh_coordinator` | `/document` (full hospital-wide access to all three panels) |
| Dept / Staff User | `dept_user` | `/document` (narrowed to their own department) |

## Git

This repo is initialized with real commit history, one milestone per commit,
so `git log` on its own tells the story of how the foundation was built.
No remote is configured — add one with `git remote add origin <url>` and
push whenever you're ready.
