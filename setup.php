<?php
/**
 * SETUP.PHP - Configuração Automática do Banco de Dados
 * 
 * Este arquivo cria todas as tabelas necessárias automaticamente
 * Execute uma única vez: http://localhost/futevolei_mensalidades/setup.php
 */

// Configurações de conexão
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'futevolei';

// Conectar ao MySQL (sem banco de dados ainda)
try {
    $pdo = new PDO("mysql:host=$host", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Erro ao conectar ao MySQL: " . $e->getMessage());
}

// 1. Criar banco de dados
try {
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "✅ Banco de dados '$database' criado/verificado<br>";
} catch (PDOException $e) {
    die("❌ Erro ao criar banco: " . $e->getMessage());
}

// 2. Selecionar o banco
try {
    $pdo->exec("USE $database");
} catch (PDOException $e) {
    die("❌ Erro ao selecionar banco: " . $e->getMessage());
}

// 3. Criar tabelas (ORDEM IMPORTANTE: turma ANTES de aluno)
$tabelas = [
    // Tabela de usuários (login)
    "CREATE TABLE IF NOT EXISTS usuario (
        id INT PRIMARY KEY AUTO_INCREMENT,
        usuario VARCHAR(50) UNIQUE NOT NULL,
        senha VARCHAR(255) NOT NULL
    )" => "Tabela 'usuario'",
    
    // Tabela de turmas (CRIAR PRIMEIRO!)
    "CREATE TABLE IF NOT EXISTS turma (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(100) NOT NULL,
        horario VARCHAR(50),
        professor VARCHAR(100)
    )" => "Tabela 'turma'",
    
    // Tabela de alunos (DEPOIS, porque referencia turma)
    "CREATE TABLE IF NOT EXISTS aluno (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(100) NOT NULL,
        telefone VARCHAR(20),
        email VARCHAR(100),
        turma_id INT,
        data_inscricao DATE,
        FOREIGN KEY (turma_id) REFERENCES turma(id) ON DELETE SET NULL
    )" => "Tabela 'aluno'",
    
    // Tabela de pagamentos (DEPOIS de aluno)
    "CREATE TABLE IF NOT EXISTS pagamento (
        id INT PRIMARY KEY AUTO_INCREMENT,
        aluno_id INT NOT NULL,
        valor DECIMAL(10, 2),
        data_pagamento DATE,
        status VARCHAR(50),
        mes_referencia VARCHAR(50),
        FOREIGN KEY (aluno_id) REFERENCES aluno(id) ON DELETE CASCADE
    )" => "Tabela 'pagamento'",
    
    // Tabela de aluguéis
    "CREATE TABLE IF NOT EXISTS aluguel (
        id INT PRIMARY KEY AUTO_INCREMENT,
        cliente VARCHAR(100) NOT NULL,
        telefone VARCHAR(20),
        data_aluguel DATE,
        hora_inicio TIME,
        hora_fim TIME,
        quadra VARCHAR(50),
        valor DECIMAL(10, 2)
    )" => "Tabela 'aluguel'"
];

// Executar criação de tabelas (em ordem!)
foreach ($tabelas as $sql => $nome) {
    try {
        $pdo->exec($sql);
        echo "✅ $nome criada/verificada<br>";
    } catch (PDOException $e) {
        echo "❌ Erro ao criar $nome: " . $e->getMessage() . "<br>";
        // Continuar mesmo se houver erro
    }
}

// 4. Inserir dados padrão
$dados = [
    // Usuário de login
    "INSERT IGNORE INTO usuario (usuario, senha) VALUES ('professor', 'e10adc3949ba59abbe56e057f20f883e')" => "Usuário 'professor'",
    
    // Turmas de exemplo
    "INSERT IGNORE INTO turma (id, nome, horario, professor) VALUES 
    (1, 'Turma A - Iniciantes', '19:00 - 20:30', 'Professor João'),
    (2, 'Turma B - Intermediários', '20:30 - 22:00', 'Professor Maria'),
    (3, 'Turma C - Avançados', '18:00 - 19:30', 'Professor Pedro')" => "Turmas de exemplo",
    
    // Alunos de exemplo
    "INSERT IGNORE INTO aluno (id, nome, telefone, email, turma_id, data_inscricao) VALUES 
    (1, 'Vitor Sussel da Silva', '11987654321', 'vitor@email.com', 1, '2026-01-15'),
    (2, 'João Silva', '11987654322', 'joao@email.com', 1, '2026-01-20'),
    (3, 'Maria Santos', '11987654323', 'maria@email.com', 2, '2026-02-01')" => "Alunos de exemplo",
    
    // Pagamentos de exemplo
    "INSERT IGNORE INTO pagamento (id, aluno_id, valor, data_pagamento, status, mes_referencia) VALUES 
    (1, 1, 150.00, '2026-02-10', 'Pendente', 'Janeiro'),
    (2, 1, 150.00, '2026-03-10', 'Pago', 'Fevereiro'),
    (3, 2, 150.00, '2026-02-15', 'Pago', 'Janeiro')" => "Pagamentos de exemplo",
    
    // Aluguéis de exemplo
    "INSERT IGNORE INTO aluguel (id, cliente, telefone, data_aluguel, hora_inicio, hora_fim, quadra, valor) VALUES 
    (1, 'Carlos Oliveira', '11999999999', '2026-06-20', '14:00:00', '15:30:00', 'Quadra 1', 80.00),
    (2, 'Ana Costa', '11988888888', '2026-06-21', '16:00:00', '17:30:00', 'Quadra 2', 80.00)" => "Aluguéis de exemplo"
];

// Executar inserção de dados
foreach ($dados as $sql => $nome) {
    try {
        $pdo->exec($sql);
        echo "✅ $nome inseridos<br>";
    } catch (PDOException $e) {
        echo "⚠️ Aviso ao inserir $nome: " . $e->getMessage() . "<br>";
    }
}

echo "<hr>";
echo "<h2>✅ SETUP CONCLUÍDO COM SUCESSO!</h2>";
echo "<p><strong>Banco de dados configurado!</strong></p>";
echo "<p><strong>Credenciais de login:</strong></p>";
echo "<ul>";
echo "<li><strong>Usuário:</strong> professor</li>";
echo "<li><strong>Senha:</strong> 123456</li>";
echo "</ul>";
echo "<p><a href='VIEW/index.php' style='background-color: #1565c0; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;'>Ir para Login</a></p>";
echo "<p><small>⚠️ Você pode deletar este arquivo (setup.php) após a configuração.</small></p>";
?>
