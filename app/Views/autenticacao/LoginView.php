<?= $this->extend('padrao/PadraoView') ?>
<?= $this->section('titulo') ?>Login<?= $this->endSection() ?>
<?= $this->section('estilo') ?>
<style>
    a {
        text-decoration: none;
    }

    .alert > ul
    {
        margin-bottom: unset;
    }

    main {
        color: #fff;
        background-color: #343a40;
    }

    .form-control, .form-control:focus {
        color: #fff;
        background-color: #343a40;
    }

    .form-signin {
        width: 100%;
        padding: 15px;
    }
</style> 
<?= $this->endSection() ?>
<?= $this->section('conteudo') ?>
<div class="row justify-content-center" style="height: 90%;">
    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 align-self-center">
        <form class="form-signin" action="<?= base_url('autenticacao/autenticarusuario') ?>" method="post">
            <center><h1 class="h3 mb-3">. . : Autenticação : . .</h1></center>
            <?= view('/errors/BlocoDeErrosEMensagensView') ?>
            <label for="inputEmail" class="sr-only">E-mail</label>
            <input name="Email" type="email" id="inputEmail" class="form-control mb-3" placeholder="E-mail" required autofocus>
            <label for="inputSenha" class="sr-only">Senha</label>
            <input name="Senha" type="password" id="inputSenha" class="form-control mb-3" placeholder="Senha">
            <div class="d-flex justify-content-between mb-3">
                <span><input type="checkbox" value="remember-me"> Lembrar-me</span>
                <span><a href="">Esqueceu sua senha?</a></span>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>