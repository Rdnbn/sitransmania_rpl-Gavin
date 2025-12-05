# Project Context — SITRANSMANIA

SITRANSMANIA is a web-based transportation rental and tracking system with 3 roles:

-   Admin
-   Pemilik (vehicle owner)
-   Peminjam (vehicle borrower)

The main purpose of the app is to manage rental transactions for campus/boarding-house transportation, handle communication between users, and automate notifications and payments.

---

## 🧱 Tech Stack

-   Laravel (Blade templating)
-   MySQL
-   Bootstrap 5
-   Standard MVC architecture

---

## 🧑‍🤝‍🧑 User Roles & Access

### 1. Admin

-   Manages all users (pemilik and peminjam)
-   Views asrama (boarding residents)
-   Views full transaction history (peminjaman & pembayaran)
-   Manages notifications
-   Export full activity reports
-   System configuration

### 2. Pemilik

-   Registers vehicles
-   Updates vehicle availability and status
-   Views transaction history of their vehicles
-   Checks payment proofs
-   Views real-time vehicle location (log map)
-   Sends & receives chat messages
-   Manages personal account

### 3. Peminjam

-   Searches for available vehicles
-   Requests and performs rental transactions
-   Uploads payment proof
-   Views rental and payment history
-   Sends & receives chat messages
-   Manages personal account

---

## 📌 Main Database Tables (based on SQL)

| Table         | Primary Purpose                           |
| ------------- | ----------------------------------------- |
| users         | login & role                              |
| user_profiles | additional user info                      |
| user_payments | QRIS image & payment settings for pemilik |
| kendaraan     | vehicle listings                          |
| peminjaman    | rental transactions                       |
| pembayaran    | payment records                           |
| chat          | messaging between pemilik ↔ peminjam      |
| notifikasi    | app notification system                   |
| riwayat       | global activity log                       |

### Key Foreign Relationships

-   kendaraan.id_pemilik → users.id_user
-   peminjaman.id_peminjam → users.id_user
-   peminjaman.id_kendaraan → kendaraan.id_kendaraan
-   pembayaran.id_peminjaman → peminjaman.id_peminjaman
-   chat.id_pengirim & chat.id_penerima → users.id_user
-   chat.id_peminjaman → peminjaman.id_peminjaman
-   notifikasi.id_user → users.id_user
-   user_profiles.id_user → users.id_user
-   user_payments.id_user → users.id_user

---

## 🔑 Synchronization Rules (very important for Copilot when fixing code)

1. A route must always correspond to an existing controller method.
2. A controller must always call an existing Blade file.
3. Data sent from controller → view must match variable names used inside Blade.
4. Blade forms must use route names (`route('name')`) — not hard-coded URLs.
5. Authorization must follow role:
    - admin can access all pages
    - pemilik can access only pages related to their vehicles
    - peminjam can access only personal rental & payment features
6. Controllers must check ownership for security:
    - pemilik can only view/edit their own kendaraan & peminjaman
    - peminjam can only view/edit their own peminjaman & pembayaran
7. Asset paths must follow Laravel conventions (`public/`, `storage/`, Vite or Mix config).

---

## 🔄 Preferred Code Style

-   Variable names in **Bahasa Indonesia**
-   Controller naming uses RESTful standards
-   Blade folder structure grouped per role/module

Examples:

-   /resources/views/admin/\*
-   /resources/views/pemilik/\*
-   /resources/views/peminjam/\*

---

## 🚨 Known Areas to Fix (Copilot should prioritize)

1. Route ↔ Controller mismatches
2. Controller ↔ Blade mismatched variables
3. Missing Blade files referenced by controller
4. Form actions pointing to incorrect route
5. Payment & rental logic not consistent across roles
6. Middleware role access inconsistencies

---

## 🪄 How Copilot Should Fix

-   Fix one category at a time (not everything at once)
-   After an accepted patch, continue automatically to the next problematic file
-   Do not rewrite features or redesign the application unless instructed
-   Maintain current database structure and business rules
