<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Portal Karanganyar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #1a1d2e 0%, #2d1520 50%, #1a1d2e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 440px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px 36px;
            color: #fff;
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header .logo-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: linear-gradient(135deg, #d1121b, #ff4757);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 1.6rem;
        }

        .login-header h3 {
            font-weight: 800;
            font-size: 1.4rem;
            margin-bottom: 4px;
        }

        .login-header p {
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
            margin: 0;
        }

        .form-floating {
            margin-bottom: 16px;
        }

        .form-floating .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            border-radius: 10px;
            height: 54px;
            font-size: 0.9rem;
        }

        .form-floating .form-control:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: #d1121b;
            box-shadow: 0 0 0 3px rgba(209, 18, 27, 0.15);
            color: #fff;
        }

        .form-floating label {
            color: rgba(255,255,255,0.5);
        }

        .btn-login {
            background: linear-gradient(135deg, #d1121b, #ff4757);
            border: none;
            color: #fff;
            padding: 14px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.95rem;
            width: 100%;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(209, 18, 27, 0.3);
            color: #fff;
        }

        .alert {
            border-radius: 10px;
            font-size: 0.85rem;
        }

        .tab-buttons {
            display: flex;
            gap: 4px;
            background: rgba(255,255,255,0.05);
            border-radius: 10px;
            padding: 4px;
            margin-bottom: 24px;
        }

        .tab-btn {
            flex: 1;
            padding: 10px;
            border: none;
            background: transparent;
            color: rgba(255,255,255,0.5);
            font-weight: 600;
            font-size: 0.85rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .tab-btn.active {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }

        .tab-content-panel {
            display: none;
        }

        .tab-content-panel.active {
            display: block;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: rgba(255,255,255,0.4);
            font-size: 0.82rem;
            text-decoration: none;
        }

        .back-link:hover {
            color: rgba(255,255,255,0.7);
        }

        /* Password toggle */
        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-control {
            padding-right: 46px;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255,255,255,0.4);
            cursor: pointer;
            z-index: 5;
            padding: 4px;
            font-size: 1.1rem;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: rgba(255,255,255,0.8);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo-icon">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
                <h3>Admin Panel</h3>
                <p>Portal Pemerintah Kab. Karanganyar</p>
            </div>

            {{-- Flash Messages --}}
            @if(session('error'))
                <div class="alert alert-danger py-2 px-3 mb-3">
                    <i class="bi bi-exclamation-triangle me-1"></i> {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success py-2 px-3 mb-3">
                    <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger py-2 px-3 mb-3">
                    @foreach($errors->all() as $error)
                        <div><i class="bi bi-x-circle me-1"></i> {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- Tab Buttons --}}
            <div class="tab-buttons">
                <button class="tab-btn active" onclick="switchTab('login')">Masuk</button>
                <button class="tab-btn" onclick="switchTab('register')">Daftar</button>
            </div>

            {{-- Login Form --}}
            <div class="tab-content-panel active" id="tab-login">
                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            value="{{ old('username') }}" required>
                        <label for="username"><i class="bi bi-person me-1"></i> Username</label>
                    </div>
                    <div class="form-floating password-wrapper">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password"><i class="bi bi-lock me-1"></i> Password</label>
                        <button type="button" class="password-toggle" onclick="togglePassword('password', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-white-50" for="remember" style="font-size:0.85rem">Ingat saya</label>
                    </div>
                    <button type="submit" class="btn btn-login">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                    </button>
                </form>
            </div>

            {{-- Register Form --}}
            <div class="tab-content-panel" id="tab-register">
                <form action="{{ route('admin.register') }}" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control" id="reg_name" name="name" placeholder="Nama Lengkap"
                            value="{{ old('name') }}" required>
                        <label for="reg_name"><i class="bi bi-person me-1"></i> Nama Lengkap</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="reg_username" name="username" placeholder="Username"
                            value="{{ old('username') }}" required>
                        <label for="reg_username"><i class="bi bi-at me-1"></i> Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="reg_email" name="email" placeholder="Email"
                            value="{{ old('email') }}" required>
                        <label for="reg_email"><i class="bi bi-envelope me-1"></i> Email</label>
                    </div>
                    <div class="form-floating password-wrapper">
                        <input type="password" class="form-control" id="reg_password" name="password" placeholder="Password" required>
                        <label for="reg_password"><i class="bi bi-lock me-1"></i> Password</label>
                        <button type="button" class="password-toggle" onclick="togglePassword('reg_password', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="form-floating password-wrapper">
                        <input type="password" class="form-control" id="reg_password_confirm" name="password_confirmation" placeholder="Konfirmasi Password" required>
                        <label for="reg_password_confirm"><i class="bi bi-lock me-1"></i> Konfirmasi Password</label>
                        <button type="button" class="password-toggle" onclick="togglePassword('reg_password_confirm', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <button type="submit" class="btn btn-login">
                        <i class="bi bi-person-plus me-2"></i>Daftar Akun
                    </button>
                    <p class="text-center text-white-50 mt-3" style="font-size:0.8rem">
                        <i class="bi bi-info-circle me-1"></i> Akun baru memerlukan persetujuan administrator
                    </p>
                </form>
            </div>

            <a href="{{ route('home') }}" class="back-link">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Website
            </a>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content-panel').forEach(panel => panel.classList.remove('active'));
            document.getElementById('tab-' + tab).classList.add('active');
            // Activate the correct tab button
            const buttons = document.querySelectorAll('.tab-btn');
            if (tab === 'login') buttons[0].classList.add('active');
            else buttons[1].classList.add('active');
        }

        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }

        // Auto-switch to register tab if ?tab=register is in the URL
        document.addEventListener('DOMContentLoaded', function() {
            const params = new URLSearchParams(window.location.search);
            if (params.get('tab') === 'register') {
                switchTab('register');
            }
        });
    </script>
</body>

</html>
