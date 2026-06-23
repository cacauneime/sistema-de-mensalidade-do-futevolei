<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Mensalidades Futevôlei</title>
    
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/materialize.min.css">
    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            padding: 40px;
            max-width: 400px;
            width: 100%;
        }
        
        .login-title {
            text-align: center;
            color: #1976d2;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: bold;
        }
        
        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-logo img {
            max-width: 120px;
            height: auto;
        }
        
        .input-field {
            margin-bottom: 20px;
        }
        
        .input-field input {
            border-bottom: 2px solid #1976d2 !important;
        }
        
        .input-field input:focus {
            border-bottom: 2px solid #1565c0 !important;
            box-shadow: 0 1px 0 0 #1565c0 !important;
        }
        
        .btn-login {
            width: 100%;
            background-color: #1976d2;
            color: white;
            padding: 12px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }
        
        .btn-login:hover {
            background-color: #1565c0;
        }
        
        .error-message {
            color: #f44336;
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #ffebee;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src="/futevolei_mensalidades/images/logo.png" alt="Logo Futevôlei">
        </div>
        
        <h2 class="login-title">Futevôlei</h2>
        <p style="text-align: center; color: #666; margin-bottom: 30px;">Sistema de Gestão de Mensalidades</p>
        
        <?php
            if (isset($_GET['erro'])) {
                echo '<div class="error-message">Usuário ou senha inválidos!</div>';
            }
        ?>
        
        <form method="POST" action="login.php">
            <div class="input-field">
                <input type="text" id="login" name="login" required class="validate">
                <label for="login">Usuário</label>
            </div>
            
            <div class="input-field">
                <input type="password" id="pwd" name="pwd" required class="validate">
                <label for="pwd">Senha</label>
            </div>
            
            <button type="submit" class="btn-login">Acessar</button>
        </form>
        
        <p style="text-align: center; color: #999; margin-top: 20px; font-size: 12px;">
            Credenciais padrão: professor / 123456
        </p>
    </div>
    
    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/materialize.min.js"></script>
    <script src="js/init.js"></script>
</body>
</html>
