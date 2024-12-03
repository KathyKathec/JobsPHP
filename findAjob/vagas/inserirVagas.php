<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Vagas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Gerenciamento de Vagas</h3>
                </div>
                <div class="card-body">
                    <form action="inserirVagas_ok.php" method="POST">
                        <!-- Título da Vaga -->
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título da Vaga</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <!-- Descrição -->
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
                        </div>
                        <!-- Categoria -->
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" required>
                        </div>
                        <!-- Contato -->
                        <div class="mb-3">
                            <label for="contato" class="form-label">Contato</label>
                            <input type="email" class="form-control" id="contato" name="contato" required>
                        </div>
                        <!-- Ativação -->
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="ativada" name="ativada">
                            <label class="form-check-label" for="ativada">Ativar Vaga</label>
                        </div>
                        <!-- Botões -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" name="acao" value="criar" class="btn btn-success me-md-2">Criar Vaga</button>
                            <button type="submit" name="acao" value="desativar" class="btn btn-warning">Desativar Vaga</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
