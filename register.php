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
                <div class="col-md-7 vh-md-100 d-md-flex justify-content-center align-items-center">
                    <div class="block-image py-4">
                        <img class="img-fluid" src="assets/img/undraw_welcome_cats_thqn.svg" alt="Welcome com gatinhos">
                    </div>
                </div>
                <div class="col-md-5 d-flex align-items-center justify-content-center block-form">
                    <div class="row d-flex justify-content-center align-items-center">
                        <h1 class="mb-3">Registro</h1>
                        <div class="col-6 pe-0">
                            <label class="btnTypeClick btnFisicaLabel buttonTypeActive" onclick="btnSelectType(this);">
                                Pessoa Física
                                <input type="radio" name="tipo" value="people" class="btnFisica active" checked>
                            </label>
                        </div>
                        <div class="col-6 ps-0">
                            <label class="btnTypeClick btnOngLabel" onclick="btnSelectType(this);">
                                ONG
                                <input type="radio" name="tipo" value="ONG" class="btnOng" id="ongLabel">
                            </label>
                        </div>
                        <div class="col-12">
                            <form action="Controllers/RegisterController.php" method="POST" class="row peopleForm needs-validation mt-2" novalidate>
                                <div class="col-12 col-md-6 my-2">
                                    <label for="nomeLabel">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nomeLabel" placeholder="Nome" aria-label="Nome" required>
                                    <div class="invalid-feedback">
                                        Por favor preencher o Nome
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 my-2">
                                    <label for="sobrenomeLabel">Sobrenome</label>
                                    <input type="text" name="sobrenome" class="form-control" id="sobrenomeLabel" placeholder="Sobrenome" aria-label="Sobrenome" required>
                                    <div class="invalid-feedback">
                                        Por favor preencher o Sobrenome
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 my-2">
                                    <label for="celularLabel">Celular</label>
                                    <input type="text" name="celular" class="form-control phoneNumber" id="celularLabel" placeholder="(11) 91234-5678" aria-label="Celular">
                                    <div class="invalid-feedback">
                                        Por favor preencher um número válido
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 my-2">
                                    <label for="emailLabel">Email</label>
                                    <input type="email" name="email" class="form-control" id="emailLabel" placeholder="example@example.com" aria-label="Email" required>
                                    <div class="invalid-feedback">
                                        Por favor preencher o Email
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 my-2">
                                    <label for="senhaLabel">Senha</label>
                                    <input type="password" name="senha" class="form-control" id="senhaLabel" placeholder="********" aria-label="Senha" required>
                                    <div class="invalid-feedback">
                                        Por favor verifique a sua senha
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 my-2">
                                    <label for="confirmSenhaLabel">Confirmar Senha</label>
                                    <input type="password" name="confirmSenha" class="form-control" id="confirmSenhaLabel" placeholder="********" aria-label="Confirmar Senha" required>
                                    <div class="invalid-feedback">
                                        Por favor verifique a sua senha
                                    </div>
                                </div>
                                <div class="col-12 my-2 text-end">
                                    <button class="btn btnConfirm" type="submit">Cadastrar-se</button>
                                </div>
                            </form>
                            <div class="row">
                                <form action="Controllers/RegisterController.php" method="POST" class="ongForm mt-2 needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-4 my-2 pe-1 progressStep progressActived" data-step="firstStep">
                                            <span class="stepSpan">Etapa 01</span>
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>                                       
                                        </div>
                                        <div class="col-4 my-2 px-1 progressStep" data-step="secondStep">
                                            <span class="stepSpan">Etapa 02</span>
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                            </div>   
                                        </div>
                                        <div class="col-4 my-2 ps-1 progressStep" data-step="thirdStep">
                                            <span class="stepSpan">Etapa 03</span>
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="step firstStep row">
                                        <div class="col-12 my-2">
                                            <label for="cnpjLabel">CNPJ</label>
                                            <input type="text" name="nome" class="form-control" id="cnpjLabel" placeholder="CNPJ" aria-label="CNPJ" required>
                                            <div class="invalid-feedback">
                                                Por favor preencher com um CNPJ válido
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 my-2">
                                            <label for="razaoLabel">Razão Social</label>
                                            <input type="text" name="nome" class="form-control" id="razaoLabel" placeholder="Razão Social" aria-label="Razão Social" required>
                                            <div class="invalid-feedback">
                                                Por favor preencher a Razão Social
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 my-2">
                                            <label for="fantasiaLabel">Nome Fantasia</label>
                                            <input type="text" name="sobrenome" class="form-control" id="fantasiaLabel" placeholder="Nome Fantasia" aria-label="Nome Fantasia" required>
                                            <div class="invalid-feedback">
                                                Por favor preencher o Nome Fantasia
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 my-2">
                                            <label for="telefoneLabel">Telefone</label>
                                            <input type="text" name="telefone" class="form-control phoneNumber" id="telefoneLabel" placeholder="(11) 0000-0000" aria-label="Telefone">
                                            <div class="invalid-feedback">
                                                Por favor preencher um número válido
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 my-2">
                                            <label for="whatsLabel">Whatsapp da ONG</label>
                                            <input type="text" name="whatsOng" class="form-control phoneNumber" id="whatsLabel" placeholder="(11) 90000-0000" aria-label="Whatsapp da ONG" required>
                                            <div class="invalid-feedback">
                                                Por favor preencher um número válido
                                            </div>
                                        </div>
                                        <div class="col-12 my-2">
                                            <label for="descricaoLabel">Descrição da atividade da ONG</label>
                                            <textarea class="form-control" name="descricao" rows="5" id="descricaoLabel" placeholder="" aria-label="Descrição da atividade da ONG" required></textarea>
                                            <div class="invalid-feedback">
                                                Por favor preencher um número válido
                                            </div>
                                        </div>
                                        <div class="col-12 my-2 text-end">
                                            <button class="btn btnConfirm" type="button" onclick="nextStep(this)" data-step="firstStep" data-next="secondStep" data-prev="none">Próximo</button>
                                        </div>
                                    </div>
                                    <div class="step secondStep row invisibleStep">
                                        <div class="col-12 col-md-4 my-2">
                                            <label for="cepLabel">CEP</label>
                                            <input type="text" name="cep" class="form-control" id="cepLabel" placeholder="00000-000" aria-label="CEP" required>
                                            <div class="invalid-feedback">
                                                Por favor preencher com um CEP válido
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 my-2">
                                            <label for="logradouroLabel">Logradouro</label>
                                            <input type="text" name="logradouro" class="form-control" id="logradouroLabel" placeholder="Logradouro" aria-label="Logradouro" required>
                                            <div class="invalid-feedback">
                                                Por favor preencher o Logradouro
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2 my-2">
                                            <label for="numeroLabel">Número</label>
                                            <input type="text" name="numero" class="form-control" id="numeroLabel" placeholder="Número" aria-label="Número" required>
                                            <div class="invalid-feedback">
                                                Por favor preencher número do endereço
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 my-2">
                                            <label for="complementoLabel">Complemento</label>
                                            <input type="text" name="complemento" class="form-control" id="complementoLabel" placeholder="Complemento" aria-label="Complemento">
                                        </div>
                                        <div class="col-12 col-md-4 my-2">
                                            <label for="bairroLabel">Bairro</label>
                                            <input type="text" name="bairro" class="form-control" id="bairroLabel" placeholder="Bairro" aria-label="Bairro" required>
                                            <div class="invalid-feedback">
                                                Por favor preencher bairro correto
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 my-2">
                                            <label for="cidadeLabel">Cidade</label>
                                            <input type="text" name="cidade" class="form-control" id="cidadeLabel" placeholder="Cidade" aria-label="Cidade" required>
                                            <div class="invalid-feedback">
                                                Por favor preencher uma cidade válida
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 my-2">
                                            <label for="estadoLabel">Estado</label>
                                            <select name="estado" class="form-control" id="estadoLabel" required>
                                                <option selected disabled value=""></option>
                                                <option value="AC">Acre </option>
                                                <option value="AL">Alagoas </option>
                                                <option value="AP">Amapá </option>
                                                <option value="AM">Amazonas </option>
                                                <option value="BA">Bahia </option>
                                                <option value="CE">Ceará </option>
                                                <option value="DF">Distrito Federal </option>
                                                <option value="ES">Espírito Santo </option>
                                                <option value="GO">Goiás </option>
                                                <option value="MA">Maranhão </option>
                                                <option value="MT">Mato Grosso </option>
                                                <option value="MS">Mato Grosso do Sul </option>
                                                <option value="MG">Minas Gerais </option>
                                                <option value="PA">Pará </option>
                                                <option value="PB">Paraíba </option>
                                                <option value="PR">Paraná </option>
                                                <option value="PE">Pernambuco </option>
                                                <option value="PI">Piauí </option>
                                                <option value="RJ">Rio de Janeiro </option>
                                                <option value="RN">Rio Grande do Norte </option>
                                                <option value="RS">Rio Grande do Sul </option>
                                                <option value="RO">Rondônia </option>
                                                <option value="RR">Roraima </option>
                                                <option value="SC">Santa Catarina </option>
                                                <option value="SP">São Paulo </option>
                                                <option value="SE">Sergipe </option>
                                                <option value="TO">Tocantins </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor preencher o Logradouro
                                            </div>
                                        </div>
                                        <div class="col-6 my-2 text-start">
                                            <button class="btn btnConfirm" type="button" onclick="nextStep(this)" data-step="secondStep" data-next="firstStep">Voltar</button>
                                        </div>
                                        <div class="col-6 my-2 text-end">
                                            <button class="btn btnConfirm" type="button" onclick="nextStep(this)" data-step="secondStep" data-next="thirdStep">Próximo</button>
                                        </div>
                                    </div>
                                    <div class="step thirdStep row invisibleStep">
                                        <div class="col-12 my-2">
                                            <label for="emailLabel">Email</label>
                                            <input type="email" name="email" class="form-control" id="emailLabel" placeholder="example@example.com" aria-label="Email" required>
                                            <div class="invalid-feedback">
                                                Por favor preencher o Email
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 my-2">
                                            <label for="senhaLabel">Senha</label>
                                            <input type="password" name="senha" class="form-control" id="senhaLabel" placeholder="********" aria-label="Senha" required>
                                            <div class="invalid-feedback">
                                                Por favor verifique a sua senha
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 my-2">
                                            <label for="confirmSenhaLabel">Confirmar Senha</label>
                                            <input type="password" name="confirmSenha" class="form-control" id="confirmSenhaLabel" placeholder="********" aria-label="Confirmar Senha" required>
                                            <div class="invalid-feedback">
                                                Por favor verifique a sua senha
                                            </div>
                                        </div>
                                        <div class="col-6 my-2 text-start">
                                            <button class="btn btnConfirm" type="button" onclick="nextStep(this)" data-step="thirdStep" data-next="secondStep">Voltar</button>
                                        </div>
                                        <div class="col-6 my-2 text-end">
                                            <button class="btn btnConfirm" type="submit">Cadastrar-se</button>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 text-end invisible">
                                        <button class="btn btnConfirm" type="submit">Próximo</button>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                        <a href="login.php" class="linkReturnForm my-2" title="Página de Login">Fazer Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/vanilla-masker.min.js"></script>
    <?php include('includes/footer.php') ?>
    </body>

</html>