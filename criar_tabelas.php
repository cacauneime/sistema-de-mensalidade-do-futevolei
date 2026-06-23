<?php

namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/conexao.php";

try {
    $con = Conexao::conectar();
    
    // SQL para criar tabela aluguel
    $sql = "CREATE TABLE IF NOT EXISTS aluguel (
        id INT AUTO_INCREMENT PRIMARY KEY,
        data_aluguel DATE NOT NULL,
        hora_inicio TIME NOT NULL,
        hora_fim TIME NOT NULL,
        quadra VARCHAR(50) NOT NULL,
        valor DECIMAL(10, 2) NOT NULL,
        cliente VARCHAR(100) NOT NULL,
        telefone VARCHAR(20) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    $con->exec($sql);
    
    $con = Conexao::desconectar();
    
    echo "✅ Tabela 'aluguel' criada com sucesso!";
    
} catch (\PDOException $e) {
    echo "❌ Erro ao criar tabela: " . $e->getMessage();
}

?>
