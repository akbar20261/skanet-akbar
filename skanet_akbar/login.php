<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem - Modern</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient;
            background-size: 400% 400%;
            animation: gradientBG 12s ease infinite;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-box {
            width: 400px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 40px 30px;
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .login-title {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 700;
            color: #333;
            letter-spacing: 0.5px;
        }

        .form-floating .form-control {
            border-radius: 12px;
            border: 1px solid #ced4da;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-floating .form-control:focus {
            box-shadow: 0 0 0 4px rgba(78, 84, 200, 0.15);
            border-color: #4e54c8;
        }

        .btn-custom {
            border-radius: 12px;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            border: none;
            font-weight: 600;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(78, 84, 200, 0.4);
            background: linear-gradient(135deg, #4348b5, #7e83e6);
        }

        .logo-container {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px auto;
            color: white;
            font-size: 32px;
            box-shadow: 0 8px 20px rgba(78, 84, 200, 0.3);
        }
    </style>
</head>
<body>

<div class="login-box">

    <div class="logo-container">
        <i class="bi bi-mortarboard-fill"></i>
    </div>

    <h3 class="login-title">Selamat Datang</h3>

    <form action="" method="post">

        <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
            <label for="username"><i class="bi bi-person me-2"></i>Username</label>
        </div>

        <div class="form-floating mb-4 position-relative">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            <label for="password"><i class="bi bi-lock me-2"></i>Password</label>
            <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer; z-index: 10;" onclick="togglePassword()">
                <i class="bi bi-eye-slash" id="toggleIcon"></i>
            </span>
        </div>

        <button class="btn btn-primary btn-custom w-100 mb-3" name="login">
            Masuk ke Sistem
        </button>

    </form>

<?php
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password']; // Pertimbangkan menggunakan password_verify() jika sudah hashing

    $query = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'")
    or die(mysqli_error($koneksi));

    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $_SESSION['status'] = "sukses";
        $_SESSION['username'] = $username;

        echo "
        <div class='alert alert-success mt-3 text-center rounded-3 shadow-sm border-0'>
            <i class='bi bi-check-circle-fill me-2'></i> Login Berhasil! Mengalihkan...
        </div>
        <meta http-equiv='refresh' content='1.5;url=index.php'>
        ";
        exit();
    } else {
        echo "
        <div class='alert alert-danger mt-3 text-center rounded-3 shadow-sm border-0 animate__animated animate__shakeX'>
            <i class='bi bi-exclamation-triangle-fill me-2'></i> Username atau Password Salah!
        </div>
        ";
    }
}
?>

</div>

<!-- Script untuk Toggle Show/Hide Password -->
<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('bi-eye-slash');
        toggleIcon.classList.add('bi-eye');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash');
    }
}
</script>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>