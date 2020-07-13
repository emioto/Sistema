<?= $this->extend('padrao/PadraoView') ?>
<?= $this->section('titulo') ?>Login<?= $this->endSection() ?>
<?= $this->section('estilo') ?>
<style>
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
    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 align-self-center">
        <form class="form-signin">
            <center><h1 class="h3 mb-3">. . : Autenticação : . .</h1></center>
            <label for="inputEmail" class="sr-only">E-mail</label>
            <input type="email" id="inputEmail" class="form-control mb-3" placeholder="E-mail" required autofocus>
            <label for="inputSenha" class="sr-only">Senha</label>
            <input type="password" id="inputSenha" class="form-control mb-3" placeholder="Senha" required>
            <div class="checkbox mb-3">
                <label><input type="checkbox" value="remember-me"> Lembrar</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>