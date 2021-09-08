<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doação de Comida - Login</title>

    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    
    <?php include('includes/header.php') ?>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex w-100 conteudo-login p-0">
                    <div class="item item-img">
                        <div class="block-image py-4">
                            <img src="assets/img/undraw_unlock_24mb.svg" alt="União">
                        </div>
                    </div>
                    <div class="item item-form mt-5 mt-md-0">
                        <div class="block-form d-flex flex-column">
                            <h1 class="mb-3">Login</h1>
                            <form action="controllers/LoginController.php" method="POST" class="row g-3 loginForm needs-validation mt-2" novalidate>
                                <div class="col-12 my-2">
                                    <label for="emailLabel">Email</label>
                                    <input type="email" name="email" class="form-control" id="emailLabel" placeholder="example@example.com" aria-label="Email" required>
                                    <div class="invalid-feedback">
                                        Por favor verifique a sua senha
                                    </div>
                                </div>
                                <div class="col-12 my-2">
                                    <label for="senhaLabel">Senha</label>
                                    <input type="password" name="confirmSenha" class="form-control" id="senhaLabel" placeholder="********" aria-label="Senha" required>
                                    <div class="invalid-feedback">
                                        Por favor verifique a sua senha
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    <button class="btn btnConfirm" type="submit">Login</button>
                                </div>

                                <a href="register.php" class="linkReturnForm" title="Página de registre-se">Fazer Casdastro</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('includes/footer.php') ?>
</body>

</html>