<?php
// Conexão com o banco de dados
$host = 'localhost';
$user = 'seu_usuario';
$pass = 'sua_senha';
$dbname = 'ESCOLA';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Definindo valores padrão
$situacao = isset($_POST['situacao']) ? $_POST['situacao'] : 'todos';
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : 'todos';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Monta a consulta SQL de acordo com a situação e o sexo selecionados
    switch ($situacao) {
        case 'aprovados':
            $sql = "SELECT * FROM alunos WHERE (bim1 + bim2 + bim3 + bim4) / 4 >= 7";
            break;
        case 'reprovados':
            $sql = "SELECT * FROM alunos WHERE (bim1 + bim2 + bim3 + bim4) / 4 < 7";
            break;
        default:
            $sql = "SELECT * FROM alunos WHERE 1=1"; // Alteração feita aqui
            break;
    }

    // Adiciona a condição do sexo, se não for "todos"
    if ($sexo != 'todos') {
        $sql .= " AND sexo = :sexo";
    }

    // Ordena pelo nome
    $sql .= " ORDER BY nome";

    // Prepara e executa a consulta SQL
    $stmt = $pdo->prepare($sql);
    if ($sexo != 'todos') {
        $stmt->bindParam(':sexo', $sexo);
    }
    $stmt->execute();
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise de Alunos</title>
    <link rel="stylesheet" href="CODIGO.css">
</head>
<body>
    <div class="container">
        <h1>Análise de Alunos</h1>
        <form action="" method="post">
            <fieldset>
                <legend>Situação:</legend>
                <input type="radio" name="situacao" id="todos" value="todos" <?= ($situacao == 'todos') ? 'checked' : ''; ?>>
                <label for="todos">Todos</label><br>
                <input type="radio" name="situacao" id="aprovados" value="aprovados" <?= ($situacao == 'aprovados') ? 'checked' : ''; ?>>
                <label for="aprovados">Aprovados</label><br>
                <input type="radio" name="situacao" id="reprovados" value="reprovados" <?= ($situacao == 'reprovados') ? 'checked' : ''; ?>>
                <label for="reprovados">Reprovados</label><br>
            </fieldset>

            <fieldset>
                <legend>Sexo:</legend>
                <input type="radio" name="sexo" id="todosSexo" value="todos" <?= ($sexo == 'todos') ? 'checked' : ''; ?>>
                <label for="todosSexo">Todos</label><br>
                <input type="radio" name="sexo" id="masculino" value="M" <?= ($sexo == 'M') ? 'checked' : ''; ?>>
                <label for="masculino">Masculino</label><br>
                <input type="radio" name="sexo" id="feminino" value="F" <?= ($sexo == 'F') ? 'checked' : ''; ?>>
                <label for="feminino">Feminino</label><br>
            </fieldset>
            
            <button type="submit">ANALISAR</button>
        </form>

        <?php
        // Exibe a tabela de alunos
        if (isset($alunos) && $alunos) {
            echo "<h2>Resultado da Análise</h2>";
            echo "<table>";
            echo "<thead><tr><th>Nome</th><th>Sexo</th><th>1º BIM</th><th>2º BIM</th><th>3º BIM</th><th>4º BIM</th></tr></thead>";
            echo "<tbody>";
            foreach ($alunos as $aluno) {
                echo "<tr>";
                echo "<td>{$aluno['nome']}</td>";
                echo "<td>{$aluno['sexo']}</td>";
                echo "<td>{$aluno['bim1']}</td>";
                echo "<td>{$aluno['bim2']}</td>";
                echo "<td>{$aluno['bim3']}</td>";
                echo "<td>{$aluno['bim4']}</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>
