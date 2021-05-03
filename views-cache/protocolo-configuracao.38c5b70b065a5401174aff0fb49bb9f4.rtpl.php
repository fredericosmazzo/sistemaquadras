<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">SEMAS | DIGITAL</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Semas</a></li>
              <li class="breadcrumb-item"><a href="/admin/protocolo/inicio">Protocolo</a></li>
              <li class="breadcrumb-item active">Início Protocolo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Bem vindo ao Protocolo</h5>
              </div>
              <div class="card-body">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><strong>LOCAIS PARA PROTOCOLO &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalNovoLocal"><i class="fas fa-location-arrow"></i>&nbsp;&nbsp;NOVO LOCAL</button></strong></h5>
              </div>
              <div class="card-body">
                <table id="protocoloLocais" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 90%;">Nº</th>
                    <th style="width: 5%;">Recibo</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $counter1=-1;  if( isset($locaisDocumentos) && ( is_array($locaisDocumentos) || $locaisDocumentos instanceof Traversable ) && sizeof($locaisDocumentos) ) foreach( $locaisDocumentos as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo $value1["iddestino"]; ?></td>
                    <td><?php echo $value1["destino"]; ?></td>
                    <td><button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modalEditarDestino"  data-iddestino="<?php echo $value1["iddestino"]; ?>" data-destino="<?php echo $value1["destino"]; ?>"><i class="fas fa-edit"></i></button></td>
                  </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><strong>TIPOS DE DOCUMENTOS PROTOCOLO &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalNovoTipo"><i class="fas fa-file-archive"></i>&nbsp;&nbsp;NOVO TIPO</button></strong></h5>
              </div>
              <div class="card-body">
                <table id="protocoloTipos" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 90%;">Nº</th>
                    <th style="width: 5%;">Recibo</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $counter1=-1;  if( isset($tiposDocumentos) && ( is_array($tiposDocumentos) || $tiposDocumentos instanceof Traversable ) && sizeof($tiposDocumentos) ) foreach( $tiposDocumentos as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo $value1["idtipodocumento"]; ?></td>
                    <td><?php echo $value1["tipodocumento"]; ?></td>
                    <td><button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modalEditarTipo" data-idtipodocumento="<?php echo $value1["idtipodocumento"]; ?>" data-tipodocumento="<?php echo $value1["tipodocumento"]; ?>"><i class="fas fa-edit"></i></button></td>
                  </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar  -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
<!-- NOVO LOCAL -->
<div class="modal fade" id="modalNovoLocal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <span class="h5"><b>SEMAS</b> | DIGITAL - <b>NOVO LOCAL</b></span>
    </div>
    <div class="card-body">
      <form action="/admin/protocolo/configuracoes/local" method="post">
        <div class="row">
          <div class="col-sm-12">
            <input type="text" class="form-control" name="origem" id="origem">
          </div>
        </div><br>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">INCLUIR LOCAL</button>
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

<!-- NOVO LOCAL -->
<div class="modal fade" id="modalNovoTipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <span class="h5"><b>SEMAS</b> | DIGITAL - <b>NOVO TIPO DE DOCUMENTO</b></span>
    </div>
    <div class="card-body">
      <form action="/admin/protocolo/configuracoes/doc" method="post">
        <div class="row">
          <div class="col-sm-12">
            <input type="text" class="form-control" name="tipodocumento" id="tipodocumento">
          </div>
        </div><br>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">INCLUIR TIPO</button>
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
<!-- NOVO LOCAL -->
<div class="modal fade" id="modalNovoLocal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <span class="h5"><b>SEMAS</b> | DIGITAL - <b>NOVO LOCAL</b></span>
    </div>
    <div class="card-body">
      <form action="/admin/protocolo/documento/novo" method="post">
        <div class="row">
          <div class="col-sm-12">
            <input type="text" class="form-control" name="destino" id="destino">
          </div>
        </div><br>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">INCLUIR LOCAL</button>
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

<!-- EDITAR LOCAL -->
<div class="modal fade" id="modalEditarTipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <span class="h5"><b>SEMAS</b> | DIGITAL - <b>EDITAR TIPO DE DOCUMENTO</b></span>
    </div>
    <div class="card-body">
      <form action="/admin/protocolo/documento/novo" method="post">
        <div class="row">
          <div class="col-sm-12">
            <input type="text" class="form-control" name="idtipodocumento" id="idtipodocumento">
            <input type="text" class="form-control" name="tipodocumento" id="tipodocumento">
          </div>
        </div><br>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">ALTERAR TIPO</button>
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
