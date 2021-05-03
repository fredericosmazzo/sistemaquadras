<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administração de Permissões</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Administração</li>
              <li class="breadcrumb-item active">Lista de Permissões</li>
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
                <h3 class="card-title">Grupos <strong>Ativos</strong> no Sistema<br><br>
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalNovoGrupo">Inserir Novo Grupo</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="grupoSistema" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Grupo</th>
                    <th style="text-align: center;" colspan="4">Permisões</th>
                    <th style="width: 40px; text-align: center;">Excluir</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php $counter1=-1;  if( isset($usersGrupos) && ( is_array($usersGrupos) || $usersGrupos instanceof Traversable ) && sizeof($usersGrupos) ) foreach( $usersGrupos as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo $value1["idgrupo"]; ?></td>
                    <td><?php echo $value1["nomegrupo"]; ?></td>
                    <td style="width: 50px; text-align: center; font-size: 10px;">
                      <?php if( menu($value1["idgrupo"],tabelaGrupo($value1["idgrupo"]), 'Gestao')!=0 ){ ?>

                      <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#modalRemovePermissao" data-menu="Gestão" data-controle="1" data-nomegrupo="Gestao" data-idgrupo="<?php echo $value1["idgrupo"]; ?>" data-tabela='<?php echo tabelaGrupo($value1["idgrupo"]); ?>'>GESTÃO</button>
                      <?php }else{ ?>

                      <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalNovaPermissao" data-menu="Gestão" data-controle="1" data-nomegrupo="Gestao" data-idgrupo="<?php echo $value1["idgrupo"]; ?>" data-tabela='<?php echo tabelaGrupo($value1["idgrupo"]); ?>'>GESTÃO</button>
                      <?php } ?>

                    </td>
                    <td style="width: 50px; text-align: center; font-size: 10px;">
                      <?php if( menu($value1["idgrupo"],tabelaGrupo($value1["idgrupo"]), 'Agendamento')!=0 ){ ?>

                      <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#modalRemovePermissao" data-menu="Agendamento" data-controle="2" data-nomegrupo="Agendamento" data-idgrupo="<?php echo $value1["idgrupo"]; ?>" data-tabela='<?php echo tabelaGrupo($value1["idgrupo"]); ?>'>AGENDAMENTOS</button>
                      <?php }else{ ?>

                      <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalNovaPermissao" data-menu="Agendamento" data-controle="2" data-nomegrupo="Agendamento" data-idgrupo="<?php echo $value1["idgrupo"]; ?>" data-tabela='<?php echo tabelaGrupo($value1["idgrupo"]); ?>'>AGENDAMENTOS</button>
                      <?php } ?>

                    </td>
                    <td style="width: 50px; text-align: center; font-size: 10px;">
                      <?php if( menu($value1["idgrupo"],tabelaGrupo($value1["idgrupo"]), 'Horários')!=0 ){ ?>

                      <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#modalRemovePermissao" data-menu="Horários" data-controle="2" data-nomegrupo="Horários" data-idgrupo="<?php echo $value1["idgrupo"]; ?>" data-tabela='<?php echo tabelaGrupo($value1["idgrupo"]); ?>'>HORÁRIOS</button>
                      <?php }else{ ?>

                      <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalNovaPermissao" data-menu="Horários" data-controle="2" data-nomegrupo="Horários" data-idgrupo="<?php echo $value1["idgrupo"]; ?>" data-tabela='<?php echo tabelaGrupo($value1["idgrupo"]); ?>'>HORÁRIOS</button>
                      <?php } ?>

                    </td>
                    <td style="width: 50px; text-align: center; font-size: 10px;">
                      <?php if( menu($value1["idgrupo"],tabelaGrupo($value1["idgrupo"]), 'Torneios')!=0 ){ ?>

                      <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#modalRemovePermissao" data-menu="Torneios" data-controle="2" data-nomegrupo="Torneios" data-idgrupo="<?php echo $value1["idgrupo"]; ?>" data-tabela='<?php echo tabelaGrupo($value1["idgrupo"]); ?>'>TORNEIOS</button>
                      <?php }else{ ?>

                      <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalNovaPermissao" data-menu="Torneios" data-controle="2" data-nomegrupo="Torneios" data-idgrupo="<?php echo $value1["idgrupo"]; ?>" data-tabela='<?php echo tabelaGrupo($value1["idgrupo"]); ?>'>TORNEIOS</button>
                      <?php } ?>

                    </td>
                    <td style="width: 40px; text-align: center;"><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalExcluirGrupo" data-nomegrupo="<?php echo $value1["nomegrupo"]; ?>" data-idgrupo="<?php echo $value1["idgrupo"]; ?>"><i class="nav-icon fas fa-user-times"></i></button></td>
                  </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Cargos <strong>Existentes</strong> no Sistema<br><br>
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalNovoCargo">Inserir Novo Cargo</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="cargoUsuario" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Grupo</th>
                    <th style="text-align: center;" colspan="2">Permisões</th>
                    <th style="width: 40px; text-align: center;">Excluir</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php $counter1=-1;  if( isset($usersCargos) && ( is_array($usersCargos) || $usersCargos instanceof Traversable ) && sizeof($usersCargos) ) foreach( $usersCargos as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo $value1["idcargo"]; ?></td>
                    <td><?php echo $value1["nomecargo"]; ?></td>
                    <td>1</td>
                    <td>2</td>
                    <td style="width: 40px; text-align: center;"><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalExcluirCargo" data-nomecargo="<?php echo $value1["nomecargo"]; ?>" data-idcargo="<?php echo $value1["idcargo"]; ?>"><i class="nav-icon fas fa-user-times"></i></button></td>
                  </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Setores <strong>Existentes</strong> no Sistema<br><br>
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalCadastro">Inserir Novo Setor</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="setorUsuario" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Grupo</th>
                    <th style="text-align: center;" colspan="2">Permisões</th>
                    <th style="width: 40px; text-align: center;">Excluir</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php $counter1=-1;  if( isset($usersSetores) && ( is_array($usersSetores) || $usersSetores instanceof Traversable ) && sizeof($usersSetores) ) foreach( $usersSetores as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo $value1["idsetor"]; ?></td>
                    <td><?php echo $value1["nomesetor"]; ?></td>
                    <td>1</td>
                    <td>2</td>
                    <td style="width: 40px; text-align: center;"><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalAtivar" data-idgrupo="<?php echo $value1["idsetor"]; ?>"><i class="nav-icon fas fa-user-times"></i></button></td>
                  </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
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
<!-- MODAIS DA PÁGINA PERMISSÕES -->
<!-- ========================================================================================================= -->

<!-- ========================================================================================================= -->
<!-- MODAIS AÇÕES PERMISSÕES -->
<!-- ========================================================================================================= -->

<!-- NOVA PERMISSÃO -->
<div class="modal fade" id="modalNovaPermissao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/administracao/usuarios/permissoes/novo" method="post">
          <input type="text" hidden="true" class="form-control" name="idgrupo" id="idgrupo">
          <input type="text" hidden="true" class="form-control" name="nomegrupo" id="nomegrupo">
          <input type="text" hidden="true" class="form-control" name="tabela" id="tabela">          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
            <button type="submit" class="btn btn-info">Sim</button>
          </div>          
        </form>
    </div>
  </div>
</div>

<!-- EXCLUIR EXCLUIR PERMISSÃO -->
<div class="modal fade" id="modalRemovePermissao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/administracao/usuarios/permissoes/excluir" method="post">
          <input type="text" hidden="true" class="form-control" name="idgrupo" id="idgrupo">
          <input type="text" hidden="true" class="form-control" name="nomegrupo" id="nomegrupo">
          <input type="text" hidden="true" class="form-control" name="tabela" id="tabela">          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
            <button type="submit" class="btn btn-info">Sim</button>
          </div>          
        </form>
    </div>
  </div>
</div>

<!-- ========================================================================================================= -->
<!-- MODAIS AÇÕES GRUPOS -->
<!-- ========================================================================================================= -->

<!-- NOVO GRUPO -->
<div class="modal fade" id="modalNovoGrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/administracao/usuarios/grupos/novo" method="post">
          <div class="form-group">
            <label for="grupo" class="col-form-label">Novo Grupo</label>
            <input type="text" class="form-control" name="nomegrupo" id="nomegrupo"> 
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Janela</button>
            <button type="submit" class="btn btn-info">Incluir Grupo</button>
          </div>          
        </form>
    </div>
  </div>
</div>

<!-- EXCLUIR GRUPO -->
<div class="modal fade" id="modalExcluirGrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/administracao/usuarios/grupos/excluir" method="post">
          <input hidden="True" type="text" class="form-control" name="idgrupo" id="idgrupo"> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
            <button type="submit" class="btn btn-info">Sim</button>
          </div>          
        </form>
    </div>
  </div>
</div>

<!-- ========================================================================================================= -->
<!-- MODAIS AÇÕES CARGOS -->
<!-- ========================================================================================================= -->

<!-- NOVO CARGO -->
<div class="modal fade" id="modalNovoCargo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/administracao/usuarios/cargos/novo" method="post">
          <div class="form-group">
            <label for="grupo" class="col-form-label">Novo Cargo</label>
            <input type="text" class="form-control" name="nomecargo" id="nomecargo"> 
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar Janela</button>
            <button type="submit" class="btn btn-info">Incluir Cargo</button>
          </div>          
        </form>
    </div>
  </div>
</div>

<!-- EXCLUIR CARGO -->
<div class="modal fade" id="modalExcluirCargo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/administracao/usuarios/cargos/excluir" method="post">
          <input hidden="True" type="text" class="form-control" name="idcargo" id="idcargo"> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
            <button type="submit" class="btn btn-info">Sim</button>
          </div>          
        </form>
    </div>
  </div>
</div>

<!-- ========================================================================================================= -->
<!-- MODAIS AÇÕES SETORES -->
<!-- ========================================================================================================= -->
