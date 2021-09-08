<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doação de Comida - Cadastre-se</title>

    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    
    <?php include('includes/header.php') ?>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex w-100 conteudo-login p-0">
                    <div class="item item-img">
                        <div class="block-image py-4">
                            <img src="assets/img/undraw_welcome_cats_thqn.svg" alt="Welcome com gatinhos">
                        </div>
                    </div>
                    <div class="item item-form mt-5 mt-md-0">
                        <div class="block-form d-flex flex-column">
                            <h1 class="mb-3">Registro</h1>
                            <div class="row">
                                <div class="col-6 btnTypeClick btnFisicaLabel buttonTypeActive" onclick="btnSelectType(this);">
                                    <label>
                                        Pessoa Física
                                        <input type="radio" name="tipo" value="people" class="btnFisica active" checked>
                                    </label>
                                </div>
                                <div class="col-6 btnTypeClick btnOngLabel" onclick="btnSelectType(this);">
                                    <label>
                                        ONG
                                        <input type="radio" name="tipo" value="ONG" class="btnOng" id="ongLabel">
                                    </label>
                                </div>
                            </div>
                            <form action="Controllers/RegisterController.php" method="POST" class="row g-3 peopleForm needs-validation mt-2" novalidate>
                                <div class="col-12 col-md-6 ps-md-0 my-2">
                                    <label for="nomeLabel">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nomeLabel" placeholder="Nome" aria-label="Nome" required>
                                    <div class="invalid-feedback">
                                        Por favor preencher o Nome
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pe-md-0 my-2">
                                    <label for="sobrenomeLabel">Sobrenome</label>
                                    <input type="text" name="sobrenome" class="form-control" id="sobrenomeLabel" placeholder="Sobrenome" aria-label="Sobrenome" required>
                                    <div class="invalid-feedback">
                                        Por favor preencher o Sobrenome
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 ps-md-0 my-2">
                                    <label for="celularLabel">Celular</label>
                                    <input type="text" name="celular" class="form-control" id="celularLabel" placeholder="(11) 91234-5678" aria-label="Celular">
                                    <div class="invalid-feedback">
                                        Por favor preencher um número válido
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pe-md-0 my-2">
                                    <label for="emailLabel">Email</label>
                                    <input type="email" name="email" class="form-control" id="emailLabel" placeholder="example@example.com" aria-label="Email" required>
                                    <div class="invalid-feedback">
                                        Por favor preencher o Sobrenome
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 ps-md-0 my-2">
                                    <label for="senhaLabel">Senha</label>
                                    <input type="password" name="celular" class="form-control" id="senhaLabel" placeholder="********" aria-label="Senha" required>
                                    <div class="invalid-feedback">
                                        Por favor verifique a sua senha
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pe-md-0 my-2">
                                    <label for="confirmSenhaLabel">Confirmar Senha</label>
                                    <input type="password" name="confirmSenha" class="form-control" id="confirmSenhaLabel" placeholder="********" aria-label="Confirmar Senha" required>
                                    <div class="invalid-feedback">
                                        Por favor verifique a sua senha
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    <button class="btn btnConfirm" type="submit">Cadastrar-se</button>
                                </div>
                            </form>
                            <form action="Controllers/RegisterController.php" method="POST" class="row g-3 ongForm needs-validation mt-2" novalidate>
                                <div class="col-12 col-md-6 ps-md-0 my-2">
                                    <label for="nomeLabel">Razão Social</label>
                                    <input type="text" name="nome" class="form-control" id="nomeLabel" placeholder="Razão Social" aria-label="Razão Social" required>
                                    <div class="invalid-feedback">
                                        Por favor preencher o Nome
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pe-md-0 my-2">
                                    <label for="sobrenomeLabel">Sobrenome</label>
                                    <input type="text" name="sobrenome" class="form-control" id="sobrenomeLabel" placeholder="Sobrenome" aria-label="Sobrenome" required>
                                    <div class="invalid-feedback">
                                        Por favor preencher o Sobrenome
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 ps-md-0 my-2">
                                    <label for="celularLabel">Celular</label>
                                    <input type="text" name="celular" class="form-control" id="celularLabel" placeholder="(11) 91234-5678" aria-label="Celular">
                                    <div class="invalid-feedback">
                                        Por favor preencher um número válido
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pe-md-0 my-2">
                                    <label for="emailLabel">Email</label>
                                    <input type="email" name="email" class="form-control" id="emailLabel" placeholder="example@example.com" aria-label="Email" required>
                                    <div class="invalid-feedback">
                                        Por favor preencher o Sobrenome
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 ps-md-0 my-2">
                                    <label for="senhaLabel">Senha</label>
                                    <input type="password" name="senha" class="form-control" id="senhaLabel" placeholder="********" aria-label="Senha" required>
                                    <div class="invalid-feedback">
                                        Por favor verifique a sua senha
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pe-md-0 my-2">
                                    <label for="confirmSenhaLabel">Confirmar Senha</label>
                                    <input type="password" name="confirmSenha" class="form-control" id="confirmSenhaLabel" placeholder="********" aria-label="Confirmar Senha" required>
                                    <div class="invalid-feedback">
                                        Por favor verifique a sua senha
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    <button class="btn btnConfirm" type="submit">Cadastrar-se</button>
                                </div>
                            </form>
                            <a href="login.php" class="linkReturnForm" title="Página de Login">Fazer Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('includes/footer.php') ?>
</body>

</html>