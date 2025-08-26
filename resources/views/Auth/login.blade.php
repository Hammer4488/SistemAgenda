<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin dan Pegawai</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #333; /* Warna fallback jika gambar tidak termuat */
        }
        .bg-container {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-image: url("{{ asset('image/background.jpg') }}");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        .bg-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(1, 41, 95, 0.75); /* Overlay biru tua transparan */
        }
        .header-text {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            opacity: 0.8;
            font-size: 14px;
        }
        .login-card {
            position: relative;
            background-color: #F8FAFC; /* Warna putih sedikit keabu-abuan */
            padding: 40px 48px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 420px;
            text-align: center;
        }
        .login-card img.logo {
            width: 80px;
            height: auto;
            margin-bottom: 16px;
        }
        .login-card h2 {
            margin: 0 0 32px 0;
            font-size: 24px;
            font-weight: 600;
            color: #1E293B;
        }
        .input-group {
            margin-bottom: 20px;
            text-align: left;
            position: relative;
        }
        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #475569;
            font-size: 14px;
            font-weight: 500;
        }
        .input-group input {
            width: 100%;
            padding: 12px 12px 12px 40px; /* Padding kiri untuk ikon */
            border: 1px solid #CBD5E1;
            border-radius: 8px;
            background-color: #F1F5F9;
            color: #1E293B;
            font-size: 14px;
        }
        .input-group input::placeholder {
            color: #94A3B8;
        }
        .input-group .icon {
            position: absolute;
            left: 14px;
            top: 39px;
            width: 20px;
            height: 20px;
            opacity: 0.4;
        }
        /* Untuk Ikon Mata di Kanan */
        .toggle-icon {
            position: absolute;
            right: 14px;
            top: 42px; 
            cursor: pointer;
            width: 16px;
            height: 16px;
            opacity: 0.5;
        }

        .toggle-icon img {
            width: 100%;
            height: 100%;
        }

        /* Class untuk menyembunyikan ikon */
        .hidden {
            display: none;
        }
        .actions {
            text-align: right;
            margin-top: -12px;
            margin-bottom: 24px;
        }
        .actions a {
            font-size: 13px;
            color: #2563EB;
            text-decoration: none;
        }
        .btn-login {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background-color: #1E40AF;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .btn-login:hover {
            background-color: #1D4ED8;
        }
        .error-message {
            color: #DC2626;
            font-size: 14px;
            margin-top: 16px;
        }
    </style>
</head>x

<body>

    <div class="bg-container">
        <div class="login-card">
            <img src="{{ asset('image/logo-banjarmasin.png') }}" alt="Logo Banjarmasin" class="logo">
            <h2>Login</h2>

            <form method="POST" action="{{ route('login.perform') }}">
                @csrf

                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username" value="{{ old('username') }}" required autofocus>
                    <img src="{{ asset('image/icon_user.png') }}" class="icon" alt="Username Icon">
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                    <img src="{{ asset('image/icon_password.png') }}" class="icon" alt="Username Icon">
                    <span id="togglePassword" class="toggle-icon">
                    <img id="eye_open" src="{{ asset('image/eye_open.png') }}" alt="Lihat Password">
                    <img id="eye_closed" class="hidden" src="{{ asset('image/eye_closed.png') }}" alt="Sembunyi Password">
                    </span>
                </div>

                <div class="actions">
                    <a href="#">Lupa Password?</a>
                </div>

                <button type="submit" class="btn-login">Login</button>

                @if ($errors->any())
                    <div class="error-message">
                        {{ $errors->first() }}
                    </div>
                @endif
            </form>
        </div>
    </div>

</body>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeOpen = document.getElementById('eye_open');
    const eyeClosed = document.getElementById('eye_closed');

    togglePassword.addEventListener('click', function () {
        // Mengganti tipe input dari password ke text atau sebaliknya
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Menukar gambar ikon mata yang ditampilkan
        eyeOpen.classList.toggle('hidden');
        eyeClosed.classList.toggle('hidden');
    });
</script>   
</html>