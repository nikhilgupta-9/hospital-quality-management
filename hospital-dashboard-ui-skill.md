---
name: hospital-dashboard-ui
description: Professional, mobile-responsive hospital/clinical dashboard UI pattern for a MERN stack app (React + Tailwind CSS frontend, Node/Express/MongoDB backend). Use this whenever building or styling dashboard screens, sidebars, stat cards, patient tables, or clinical workflow panels.
---

# Hospital Dashboard UI Pattern (MERN Stack)

Reference inspiration: NABH-style hospital quality/clinical portal — dark navy sidebar,
blue gradient hero banner, clean white stat cards, pill filters, rounded panels.
This doc is a reusable design system + component spec. Give this whole file to
Antigravity (or any AI coding agent) as context before asking it to build screens.

---

## 1. Tech Stack Assumptions

- **Frontend:** React (Vite or CRA) + Tailwind CSS + lucide-react (icons) + react-router-dom
- **Backend:** Node.js + Express + MongoDB (Mongoose)
- **State/data:** React Query or simple fetch + Context API
- **Charts (optional):** recharts
- **Responsive strategy:** Tailwind breakpoints — mobile-first, sidebar collapses to a
  bottom nav / hamburger drawer under `md` (768px).

---

## 2. Design Tokens

### Colors (Tailwind config — extend theme)

```js
// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      colors: {
        brand: {
          navy: '#0F2A43',       // sidebar bg (deep navy/slate)
          navyLight: '#16375A',  // sidebar hover/active bg
          primary: '#1565C0',    // primary blue (buttons, links, active states)
          primaryDark: '#0D47A1',
          gradientFrom: '#0B3D63',
          gradientTo: '#1976D2',
          accentAmber: '#F5A623', // CTA buttons (e.g. "Fast Intake")
          accentGreen: '#16A34A', // success / verified badges
          accentRed: '#DC2626',   // critical / alert badges
          accentTeal: '#0EA5A4',  // NABH / compliance badges
        },
        surface: {
          page: '#F4F6F9',    // page background
          card: '#FFFFFF',
          border: '#E5E9F0',
          muted: '#6B7280',
        },
      },
      borderRadius: {
        card: '14px',
        pill: '999px',
      },
      boxShadow: {
        card: '0 1px 3px rgba(16,24,40,0.06), 0 1px 2px rgba(16,24,40,0.04)',
        cardHover: '0 4px 14px rgba(16,24,40,0.10)',
      },
      fontFamily: {
        sans: ['Inter', 'Segoe UI', 'system-ui', 'sans-serif'],
      },
    },
  },
}
```

### Typography

| Use | Size / weight |
|---|---|
| Page title (topbar) | 20px / 600 |
| Section heading | 16–18px / 600 |
| Card label (muted) | 12–13px / 500, `text-surface-muted` |
| Stat number | 24–28px / 700 |
| Body text | 14px / 400 |
| Badge/pill text | 11–12px / 600, uppercase tracking-wide (for status tags) |

### Spacing & Radius

- Page padding: `p-4 md:p-6`
- Card padding: `p-5`
- Card radius: `rounded-card` (14px) — never sharp corners
- Buttons/pills: fully rounded (`rounded-pill`)
- Grid gaps: `gap-4` to `gap-6`

---

## 3. Layout Structure

```
┌───────────────┬───────────────────────────────────────────┐
│               │  Topbar: Page title + subtitle | icons     │
│   Sidebar     ├───────────────────────────────────────────┤
│  (fixed,      │  Hero Banner (gradient, rounded)            │
│  dark navy,   │  - badges, title, subtitle, CTA buttons     │
│  icon+label   │  - optional illustration/photo on right     │
│  nav items)   ├───────────────────────────────────────────┤
│               │  Stat Cards Row (4–5 cards, responsive grid)│
│               ├───────────────────────────────────────────┤
│  User footer  │  Filter Pills + "New" action button          │
│  (avatar,     ├───────────────────────────────────────────┤
│  name, role,  │  Two-column content: list/table panel        │
│  logout)      │  (left, wide) + detail/side panel (right)    │
└───────────────┴───────────────────────────────────────────┘
```

### Responsive rules
- **Desktop (≥1024px):** sidebar fixed width 260px, main content area fluid, 4–5 stat
  cards per row, two-column content split (e.g. 60/40).
- **Tablet (768–1023px):** sidebar collapses to icon-only (64px) or an overlay drawer;
  stat cards wrap to 2 per row; content split stacks to single column.
- **Mobile (<768px):** sidebar becomes a slide-in drawer (hamburger in topbar) or a
  bottom tab bar for the 4 most-used sections; stat cards become a horizontal
  scroll-snap row or stack 1-per-row; hero banner stacks image below text; tables
  convert to stacked "card list" rows instead of a wide `<table>`.

---

## 4. Components

### 4.1 Sidebar (`<Sidebar />`)
- Dark navy background (`bg-brand-navy`), full height, fixed on desktop.
- Logo + app name at top.
- Nav grouped under uppercase section labels ("NAVIGATION HUB", "GUIDANCE & TOOLS").
- Each nav item: icon + label, rounded-lg hover bg (`hover:bg-brand-navyLight`),
  active item gets `bg-brand-primary text-white`.
- Bottom-pinned user block: avatar circle, name, role, logout icon.
- Mobile: becomes `<Drawer />` triggered by hamburger button in topbar, slides from left,
  overlay backdrop, closes on route change or backdrop click.

### 4.2 Topbar (`<Topbar />`)
- Page title (bold) + small subtitle/breadcrumb line with an icon.
- Right side: notification bell with count badge, user menu / logout button.
- Sticky top, white background, bottom border (`border-surface-border`).

### 4.3 Hero Banner (`<HeroBanner />`)
- Rounded-2xl card, gradient background (`bg-gradient-to-r from-brand-gradientFrom to-brand-gradientTo`), white text.
- Top row: 2 small pill badges (teal/outline style) for compliance/status tags.
- Title (large, bold), 1–2 line description (muted white/80%).
- Row of CTA buttons: one filled amber (primary action), one outline-white (secondary),
  one plain link-style (tertiary, e.g. "Public Portal").
- Optional image on the right (rounded corners), hidden on mobile (`hidden md:block`).

### 4.4 Stat Card (`<StatCard />`)
Props: `label`, `value`, `sublabel`, `icon`, `accentColor`.
- White card, `shadow-card`, `rounded-card`, `p-5`.
- Small muted label on top.
- Large bold value (colored by context: blue default, amber/red for alerts, green for
  positive/verified).
- Sublabel row with small icon + text (e.g. "✓ 3 Linked Accounts").
- Grid: `grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4`.

### 4.5 Filter Pills (`<FilterBar />`)
- Horizontal row of rounded-full buttons, active = filled blue, inactive = white with
  border.
- Scrollable on mobile (`overflow-x-auto no-scrollbar flex gap-2 whitespace-nowrap`).
- Right-aligned primary action button (e.g. "+ New Patient Intake").

### 4.6 List / Empty State Panel (`<RecordPanel />`)
- White rounded card, header row with icon + title + record count.
- Empty state: centered icon + muted message ("No records found under selected filter.").
- When populated: list of row-cards (avatar/icon, title, meta, status badge, chevron).

### 4.7 Detail / Side Panel (e.g. Consent/Info card)
- White rounded card with its own badge/tag at top, title, description.
- Nested "preview" sub-card with a colored header strip, key-value rows
  (label left, value right, monospace for codes/hashes), and a dashed-border
  upload/signature placeholder box.

### 4.8 Badges
- Status pill: `px-2.5 py-1 rounded-pill text-xs font-semibold` with soft background +
  matching text color (e.g. green-100/green-700 for "Verified", amber-100/amber-700 for
  "Pending", red-100/red-700 for "Critical").

### 4.9 Table → Card-list on mobile
- Desktop: standard `<table>` with sticky header, zebra-free white rows, hover bg.
- Mobile (`<768px`): each row renders as a stacked card showing label:value pairs
  instead of columns — never let a wide table force horizontal scroll on phones.

---

## 5. Suggested React Folder Structure

```
src/
  components/
    layout/
      Sidebar.jsx
      Topbar.jsx
      DashboardLayout.jsx
    ui/
      StatCard.jsx
      Badge.jsx
      FilterBar.jsx
      HeroBanner.jsx
      EmptyState.jsx
      DataTable.jsx        // auto-switches to card-list on mobile
    patient/
      PatientListPanel.jsx
      ConsentPanel.jsx
  pages/
    ClinicalDashboard.jsx
    DocumentPanel.jsx
    HRCredentialing.jsx
  hooks/
    useBreakpoint.js
  lib/
    api.js
  App.jsx
```

---

## 6. Accessibility & Polish Notes
- Maintain 4.5:1 text contrast minimum (white text only on sufficiently dark gradient).
- All icon-only buttons need `aria-label`.
- Focus-visible rings on all interactive elements (`focus-visible:ring-2 ring-brand-primary`).
- Use `prefers-reduced-motion` to skip hover-scale animations when set.
- Touch targets ≥ 44px on mobile.

---

## 7. How to use this in Antigravity
1. Paste/attach this whole file as project context.
2. Ask it to scaffold `DashboardLayout`, `Sidebar`, `Topbar`, `StatCard`, `HeroBanner`,
   `FilterBar` first (the shell), using the tokens in section 2.
3. Then build each page (Clinical, HR & Credentialing, Equipment, etc.) reusing those
   components — don't let it hardcode new colors/spacing per page.
4. Explicitly tell it: "mobile-first, sidebar → drawer under md breakpoint, tables →
   card-list under md breakpoint" so responsiveness isn't skipped.
