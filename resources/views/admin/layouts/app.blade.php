<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Portal Karanganyar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-bg: #1a1d2e;
            --sidebar-hover: #252840;
            --accent: #d1121b;
            --accent-hover: #b30f16;
            --body-bg: #f0f2f5;
            --card-bg: #fff;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--body-bg);
            margin: 0;
            min-height: 100vh;
        }

        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            color: #fff;
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar-brand h4 {
            font-weight: 800;
            font-size: 1rem;
            margin: 0;
            color: #fff;
        }

        .sidebar-brand small {
            color: rgba(255,255,255,0.5);
            font-size: 0.75rem;
        }

        .sidebar-menu {
            list-style: none;
            padding: 16px 0;
            margin: 0;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }

        .sidebar-menu li a:hover,
        .sidebar-menu li a.active {
            background: var(--sidebar-hover);
            color: #fff;
            border-left-color: var(--accent);
        }

        .sidebar-menu li a i {
            font-size: 1.15rem;
            width: 22px;
            text-align: center;
        }

        .sidebar-divider {
            border-top: 1px solid rgba(255,255,255,0.08);
            margin: 8px 0;
        }

        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        .admin-topbar {
            background: var(--card-bg);
            padding: 16px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .admin-topbar .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-topbar .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--accent);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
        }

        .admin-content {
            padding: 28px;
        }

        /* Cards */
        .stat-card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 24px;
            border: 1px solid #e8e8e8;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
        }

        .stat-card .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 16px;
        }

        .stat-card .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #1a1d2e;
        }

        .stat-card .stat-label {
            font-size: 0.85rem;
            color: #888;
            margin-top: 4px;
        }

        /* Table */
        .admin-table {
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid #e8e8e8;
            overflow: hidden;
        }

        .admin-table .table {
            margin: 0;
        }

        .admin-table .table th {
            background: #f8f9fa;
            font-weight: 600;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #666;
            border-bottom: 2px solid #e8e8e8;
            padding: 14px 16px;
        }

        .admin-table .table td {
            padding: 14px 16px;
            font-size: 0.9rem;
            vertical-align: middle;
        }

        /* Buttons */
        .btn-accent {
            background: var(--accent);
            color: #fff;
            border: none;
            font-weight: 600;
        }

        .btn-accent:hover {
            background: var(--accent-hover);
            color: #fff;
        }

        /* Badge */
        .badge-approved {
            background: #dcfce7;
            color: #166534;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .badge-admin {
            background: #ede9fe;
            color: #5b21b6;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        /* Mobile Sidebar Toggle */
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.4rem;
            color: #333;
            cursor: pointer;
        }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .admin-main {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block;
            }

            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 999;
                display: none;
            }

            .sidebar-overlay.show {
                display: block;
            }
        }
    </style>
</head>

<body>
    {{-- Sidebar --}}
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <h4><i class="bi bi-shield-lock me-2"></i>Admin Panel</h4>
            <small>Portal Kab. Karanganyar</small>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Kelola Berita
                </a>
            </li>
            <li>
                <a href="{{ route('admin.menu-links.index') }}" class="{{ request()->routeIs('admin.menu-links.*') ? 'active' : '' }}">
                    <i class="bi bi-link-45deg"></i> Kelola Link Menu
                </a>
            </li>
            <div class="sidebar-divider"></div>
            <li>
                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> Kelola Akun
                </a>
            </li>
            <div class="sidebar-divider"></div>
            <li>
                <a href="{{ route('home') }}" target="_blank">
                    <i class="bi bi-box-arrow-up-right"></i> Lihat Website
                </a>
            </li>
            <li>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <a href="#" onclick="this.closest('form').submit(); return false;">
                        <i class="bi bi-box-arrow-left"></i> Logout
                    </a>
                </form>
            </li>
        </ul>
    </aside>

    {{-- Mobile Overlay --}}
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    {{-- Main Content --}}
    <div class="admin-main">
        <div class="admin-topbar">
            <div class="d-flex align-items-center gap-3" style="min-width: 0;">
                <button class="sidebar-toggle flex-shrink-0" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>
                <h5 class="mb-0 fw-bold text-truncate">@yield('page-title', 'Dashboard')</h5>
            </div>
            <div class="user-info ms-3">
                <div class="text-end d-none d-sm-block">
                    <div class="fw-semibold text-truncate" style="font-size:0.9rem; max-width: 140px;">{{ auth()->user()->name }}</div>
                    <div class="text-muted" style="font-size:0.75rem">{{ auth()->user()->is_admin ? 'Administrator' : 'Editor' }}</div>
                </div>
                <div class="user-avatar flex-shrink-0">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            </div>
        </div>

        <div class="admin-content">
            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('adminSidebar').classList.toggle('show');
            document.getElementById('sidebarOverlay').classList.toggle('show');
        }
    </script>
    @yield('scripts')
</body>

</html>
