<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administração de Usuários</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Administração</li>
              <li class="breadcrumb-item active">Lista de Usuários</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista com <strong>Usuários Ativos</strong> no Sistema</h3> &nbsp; &nbsp;
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalCadastro"><i class="nav-icon fas fa-user-plus"></i> &nbsp; &nbsp;Novo Usuário</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="usuarios" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Setor</th>
                    <th>Grupo</th>
                    <th>Celular</th>
                    <th>E-mail</th>
                    <th style="width: 40px; text-align: center;">Editar</th>
                    <th style="width: 40px; text-align: center;">Excluir</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo $value1["nome"]; ?></td>
                    <td><?php echo $value1["cargo"]; ?></td>
                    <td><?php echo $value1["setor"]; ?></td>
                    <td><?php echo $value1["grupo"]; ?></td>
                    <td><?php echo $value1["celular"]; ?></td>
                    <td><?php echo $value1["email"]; ?></td>
                    <td style="width: 40px; text-align: center;"><button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal" data-grupo="<?php echo $value1["grupoid"]; ?>" data-gruponome="<?php echo $value1["grupo"]; ?>" data-cargo="<?php echo $value1["cargoid"]; ?>" data-cargonome="<?php echo $value1["cargo"]; ?>" data-setor="<?php echo $value1["setorid"]; ?>" data-setornome="<?php echo $value1["setor"]; ?>" data-name="<?php echo $value1["nome"]; ?>" data-idusuario="<?php echo $value1["idusuario"]; ?>"><i class="nav-icon fas fa-user-edit"></i></button></td>
                    <td style="width: 40px; text-align: center;"><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalAtivar" data-status="<?php echo $value1["status"]; ?>" data-name="<?php echo $value1["nome"]; ?>" data-idusuario="<?php echo $value1["idusuario"]; ?>"><i class="nav-icon fas fa-user-times"></i></button></td>
                  </tr>
                    <?php } ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Função</th>
                    <th>Grupo</th>
                    <th>Celular</th>
                    <th>E-mail</th>
                    <th style="width: 40px; text-align: center;">Editar</th>
                    <th style="width: 40px; text-align: center;">Excluir</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista com <strong>Usuários Inativos</strong> no Sistema</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="usuarios" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Setor</th>
                    <th>Grupo</th>
                    <th>Celular</th>
                    <th>E-mail</th>
                    <th style="width: 40px; text-align: center;">Editar</th>
                    <th style="width: 40px; text-align: center;">Ativar</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php $counter1=-1;  if( isset($usersExcluidos) && ( is_array($usersExcluidos) || $usersExcluidos instanceof Traversable ) && sizeof($usersExcluidos) ) foreach( $usersExcluidos as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo $value1["nome"]; ?></td>
                    <td><?php echo $value1["cargo"]; ?></td>
                    <td><?php echo $value1["setor"]; ?></td>
                    <td><?php echo $value1["grupo"]; ?></td>
                    <td><?php echo $value1["celular"]; ?></td>
                    <td><?php echo $value1["email"]; ?></td>
                    <td style="width: 40px; text-align: center;"><button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal" data-grupo="<?php echo $value1["grupoid"]; ?>" data-gruponome="<?php echo $value1["grupo"]; ?>" data-cargo="<?php echo $value1["cargoid"]; ?>" data-cargonome="<?php echo $value1["cargo"]; ?>" data-setor="<?php echo $value1["setorid"]; ?>" data-setornome="<?php echo $value1["setor"]; ?>" data-name="<?php echo $value1["nome"]; ?>" data-idusuario="<?php echo $value1["idusuario"]; ?>"><i class="nav-icon fas fa-user-edit"></i></button></td>
                    <td style="width: 40px; text-align: center;"><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalAtivar" data-status="<?php echo $value1["status"]; ?>"data-name="<?php echo $value1["nome"]; ?>" data-idusuario="<?php echo $value1["idusuario"]; ?>"><i class="nav-icon fas fa-user-plus"></i></button></td>
                  </tr>
                    <?php } ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Função</th>
                    <th>Grupo</th>
                    <th>Celular</th>
                    <th>E-mail</th>
                    <th style="width: 40px; text-align: center;">Editar</th>
                    <th style="width: 40px; text-align: center;">Ativar</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
<!-- ========================================================================================================= -->
<!-- MODAIS DA PÁGINA USUÁRIOS -->
<!-- ========================================================================================================= -->

<!-- ========================================================================================================= -->
<!-- MODAIS AÇÕES USUÁRIOS -->
<!-- ========================================================================================================= -->

<!-- EDIÇÃO DO USUÁRIO -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/administracao/usuarios/permicoes/alterar" method="post">
          <input type="text" hidden="true" class="form-control" name="idusuario" id="idusuario">
          <div class="form-group">
            <label for="grupo" class="col-form-label"><h6 class="label"></h6><h6 class="gruponome"></h6></label>
                  <select class="form-control select2" style="width: 100%;" name="grupo" id="selectgrupo">
                    <?php $counter1=-1;  if( isset($usersGrupos) && ( is_array($usersGrupos) || $usersGrupos instanceof Traversable ) && sizeof($usersGrupos) ) foreach( $usersGrupos as $key1 => $value1 ){ $counter1++; ?>

                    <option value="<?php echo $value1["idgrupo"]; ?>"><?php echo $value1["nomegrupo"]; ?></option>
                    <?php } ?>

                  </select>
          </div>
          <div class="form-group">
            <label for="grupo" class="col-form-label"><h6 class="label"></h6><h6 class="cargonome"></h6></label>
                  <select class="form-control select2" style="width: 100%;" name="cargo" id="selectcargo">
                    <?php $counter1=-1;  if( isset($usersCargos) && ( is_array($usersCargos) || $usersCargos instanceof Traversable ) && sizeof($usersCargos) ) foreach( $usersCargos as $key1 => $value1 ){ $counter1++; ?>

                    <option value="<?php echo $value1["idcargo"]; ?>"><?php echo $value1["nomecargo"]; ?></option>
                    <?php } ?>

                  </select>
          </div>
          <div class="form-group">
            <label for="grupo" class="col-form-label"><h6 class="label"></h6><h6 class="setornome"></h6></label>
                  <select class="form-control select2" style="width: 100%;" name="setor" id="selectsetor">
                    <?php $counter1=-1;  if( isset($usersSetores) && ( is_array($usersSetores) || $usersSetores instanceof Traversable ) && sizeof($usersSetores) ) foreach( $usersSetores as $key1 => $value1 ){ $counter1++; ?>

                    <option value="<?php echo $value1["idsetor"]; ?>"><?php echo $value1["nomesetor"]; ?></option>
                    <?php } ?>

                  </select>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Janela</button>
            <button type="submit" class="btn btn-info">Alterar Permissões</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- STATUS DO URUÁRIO -->
<div class="modal fade" id="modalAtivar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/administracao/usuarios/permicoes/status" method="post">
          <input type="text"  class="form-control" name="idusuario" id="idusuario">
          <div class="form-group">
            <label for="grupo" class="col-form-label"><h6 class="label"></h6><h6 class="gruponome"></h6></label>
                  <select class="form-control select2" style="width: 100%;" name="status" id="selectgrupo">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                  </select>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Janela</button>
            <button type="submit" class="btn btn-info">Alterar Status</button>
          </div>
        </form>
    </div>
  </div>
</div>

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
      <a href="../../index2.html" class="h1"><b>PROCON</b>SYS</a>
    </div>
    <div class="card-body">
      <form action="../../index.html" method="post">
        <input type="text" hidden="true" class="form-control" name="cargo" id="cargo" value="99">
        <input type="text" hidden="true" class="form-control" name="setor" id="setor" value="99">
        <input type="text" hidden="true" class="form-control" name="grupo" id="grupo" value="99">
        <input type="text" hidden="true" class="form-control" name="status" id="status" value="99">
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
            <input type="text" class="form-control" name="datanascimento" id="datanascimento" placeholder="Data de Nascimento">
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
            <input type="text" class="form-control" placeholder="Insira seu CPF...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3 col-3">
            <input type="text" class="form-control" placeholder="Insira seu celular">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-mobile-alt"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="input-group mb-3 col-8">
            <input type="text" class="form-control" placeholder="Escolha seu Login">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3 col-4">
            <input type="password" class="form-control" placeholder="Insira uma senha">
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

