<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SEMAS DIGITAL</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/res/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/res/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/res/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/res/admin/index2.html" class="h5"><b>SEMAS DIGITAL </b>SD</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Insira seus dados de acesso</p>

      <form action="/admin/login" method="post">
        <div class="input-group mb-3">
          <input type="text" name="login" class="form-control" placeholder="Login">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Lembrar dados
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">ENTRAR</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="forgot-password.html">Eu esqueci minha senha</a>
      </p>
      <p class="mb-0">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro">Crie uma nova conta</button>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<!-- NOVO USUÁRIO USUÁRIO -->
<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>SEMAS</b>DIGITAL</a>
    </div>
    <div class="card-body">
      <form action="/admin/administracao/usuarios/novo" method="post">
        <input type="text" hidden="true" class="form-control" name="cargo" id="cargo" value="99">
        <input type="text" hidden="true" class="form-control" name="setor" id="setor" value="99">
        <input type="text" hidden="true" class="form-control" name="grupo" id="grupo" value="99">
        <input type="text" hidden="true" class="form-control" name="status" id="status" value="0">
        <input type="text" hidden="true" class="form-control" name="loginsga" id="loginsga" value="99">
        <input type="text" hidden="true" class="form-control" name="idsga" id="idsga" value="99">
        <div class="row">
          <div class="input-group mb-3 col-8">
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira seu nome">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3 col-4">
            <input type="text" class="form-control" name="datanascimento" id="aniversario" placeholder="Data de Nascimento">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-calendar"></span>
              </div>
            </div>
          </div>
          </div>
        <div class="row">       
          <div class="input-group mb-3 col-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3 col-3">
            <input type="text" class="form-control" name="documento" id="documento" placeholder="Insira seu CPF...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3 col-3">
            <input type="text" class="form-control" name="celular" id="celular" placeholder="Insira seu celular">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-mobile-alt"></span>
              </div>
            </div>          
          </div>
        </div>
        <div class="row">
          <div class="input-group mb-3 col-8">
            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Escolha seu Login">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3 col-4">
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Insira uma senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
    </div>
  </div>
</div>
</div>

<!-- jQuery -->
<script src="/res/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/res/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/res/admin/dist/js/adminlte.min.js"></script>

<script>
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function str_replace(busca, subs, valor) {
    var ret = valor;
    var pos = ret.indexOf(busca);
    while (pos !== -1) {
        ret = ret.substring(0, pos) + subs + ret.substring(pos + busca.length, ret.length);
        pos = ret.indexOf(busca);
    }
    return ret;
}

function mascara(valor, masc) {
    var res = valor, mas = str_replace("?", "", str_replace("9", "", masc));
    for (var i = 0; i < mas.length; i++) {
        res = str_replace(mas.charAt(i), "", res);
        mas = str_replace(mas.charAt(i), "", mas);
    }
    var ret = "";
    for (var i = 0; i < masc.length && res !== ""; i++) {
        switch (masc.charAt(i)) {
            case"?":
                ret += res.charAt(0);
                res = res.substring(1, res.length);
                break;
            case"9":
                while (res !== "" && (res.charCodeAt(0) > 57 || res.charCodeAt(0) < 48))
                    res = res.substring(1, res.length);
                if (res !== "") {
                    ret += res.charAt(0);
                    res = res.substring(1, res.length);
                }
                break;
            default:
                ret += masc.charAt(i);
        }
    }
    return ret;
}

$(document).ready(function () {

    $('#documento').keyup(function () {

        if ($(this).val().length <= 14)
            $(this).val(mascara($(this).val(), '999.999.999-99'));
        else
            $(this).val(mascara($(this).val(), '999.999.999-99'));
    });

    $('#celular').keyup(function () {

        if ($(this).val().length <= 14)
            $(this).val(mascara($(this).val(), '(99)99999-9999'));
        else
            $(this).val(mascara($(this).val(), '(99)99999-9999'));
    });

    $('#aniversario').keyup(function () {

        if ($(this).val().length <= 10)
            $(this).val(mascara($(this).val(), '99/99/9999'));
        else
            $(this).val(mascara($(this).val(), '99/99/9999'));
    });

    return false;
});
</script>

<script>
$('#modalCadastro').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Cadastro de Novo Usuário')
})
</script>

</body>
</html>
