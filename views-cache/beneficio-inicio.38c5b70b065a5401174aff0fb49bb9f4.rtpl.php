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
              <li class="breadcrumb-item"><a href="/admin/protocolo/inicio">Benefício Municipal</a></li>
              <li class="breadcrumb-item active">Início Benefício</li>
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
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><strong>Lista Beneficiários CADU</strong></h5>
              </div>
              <div class="card-body">
                <table id="beneficioMunicipal" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NIS</th>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th>Idade</th>
                    <th>Bairro</th>
                    <th>Percapita</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php $counter1=-1;  if( isset($listarCadastrados) && ( is_array($listarCadastrados) || $listarCadastrados instanceof Traversable ) && sizeof($listarCadastrados) ) foreach( $listarCadastrados as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo $value1["NIS"]; ?></td>
                    <td><?php echo $value1["CPF"]; ?></td>
                    <td><?php echo $value1["Nome"]; ?></td>
                    <td><?php echo $value1["Nascimento"]; ?></td>
                    <td><?php echo $value1["IDADE"]; ?></td>
                    <td><?php echo $value1["Bairro"]; ?></td>
                    <td><?php echo formatarMoeda($value1["RendaPercapita"]); ?></td>
                  </tr>
                    <?php } ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>NIS</th>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th>Idade</th>
                    <th>Bairro</th>
                    <th>Percapita</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><strong>CADASTROS INELEGÍVEIS</strong></h5>
              </div>
              <div class="card-body">
                <table id="movimentoProtocolo" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NIS</th>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>Motivo</th>
                    <th>Dia/Hora</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php $counter1=-1;  if( isset($listarInelegiveis) && ( is_array($listarInelegiveis) || $listarInelegiveis instanceof Traversable ) && sizeof($listarInelegiveis) ) foreach( $listarInelegiveis as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo $value1["nis"]; ?></td>
                    <td><?php echo $value1["cpf"]; ?></td>
                    <td><?php echo $value1["nome"]; ?></td>
                    <td><?php echo $value1["celular"]; ?></td>
                    <td><?php echo motivosNegativa($value1["motivo"]); ?></td>
                    <td><?php echo $value1["Dia"]; ?>&nbsp; - &nbsp; <?php echo $value1["Hora"]; ?></td>
                  </tr>
                    <?php } ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>NIS</th>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>Motivo</th>
                    <th>Dia/Hora</th>
                  </tr>
                  </tfoot>
                </table>
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
<!-- NOVO DOCUMENTO -->
<div class="modal fade" id="modalNovoDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <span class="h3"><b>SEMAS</b> | DIGITAL - <b>NOVO DOCUMENTO</b></span>
    </div>
    <div class="card-body">
      <form action="/admin/protocolo/documento/novo" method="post">
        <input type="text" hidden="true" class="form-control" name="cadastrante" id='cadastrante' value='<?php echo getAgenteID(); ?>'>

        <div class="row">
          <div class="col-sm-2">
            <div class="form-group">
            <label>Nº</label>
            <input type="text" class="form-control" name="num_documento" id="num_documento" >
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
            <label>Tipo</label>
              <select class="form-control select2" style="width: 100%;" name="tipo_documento">
                <option selected="selected"></option>
                <?php $counter1=-1;  if( isset($tiposDocumentos) && ( is_array($tiposDocumentos) || $tiposDocumentos instanceof Traversable ) && sizeof($tiposDocumentos) ) foreach( $tiposDocumentos as $key1 => $value1 ){ $counter1++; ?>

                <option value="<?php echo $value1["idtipodocumento"]; ?>"><?php echo $value1["tipodocumento"]; ?></option>
                <?php } ?>

              </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
            <label>Origem</label>
              <select class="form-control select2" style="width: 100%;" name="local_origem">
                <option selected="selected"></option>
                <?php $counter1=-1;  if( isset($locaisDocumentos) && ( is_array($locaisDocumentos) || $locaisDocumentos instanceof Traversable ) && sizeof($locaisDocumentos) ) foreach( $locaisDocumentos as $key1 => $value1 ){ $counter1++; ?>

                <option value="<?php echo $value1["iddestino"]; ?>"><?php echo $value1["destino"]; ?></option>
                <?php } ?>

              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
            <label>Referência</label>
            <textarea class="form-control" rows="3" name="referencia"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">INSERIR DOCUMENTO</button>
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


<!-- NOVO PROTOCOLO -->
<div class="modal fade" id="modalNovoProtocolo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <span class="h3"><b>SEMAS</b> | DIGITAL - <b>NOVO PROTOCOLO</b></span>
    </div>
    <div class="card-body">
      <form action="/admin/protocolo/documento/movimento" method="post">
        <input type="text" hidden="true"  class="form-control" name="cadastrante" id='cadastrante' value='<?php echo getAgenteID(); ?>'>
        <input type="text" hidden="true"  class="form-control" name="documento_id" id='documento_id'>
        <input type="text" hidden="true"  class="form-control" name="id_entrada" id='id_entrada'>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
            <label>Local Encaminhamento</label>
              <select class="form-control select2" style="width: 100%;" name="local_destino" id="local_destino">
                <option selected="selected"></option>
                <?php $counter1=-1;  if( isset($locaisDocumentos) && ( is_array($locaisDocumentos) || $locaisDocumentos instanceof Traversable ) && sizeof($locaisDocumentos) ) foreach( $locaisDocumentos as $key1 => $value1 ){ $counter1++; ?>

                <option value="<?php echo $value1["iddestino"]; ?>"><?php echo $value1["destino"]; ?></option>
                <?php } ?>

              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
            <label>Observações</label>
            <textarea class="form-control" rows="3" name="saida_nota" id="saida_nota"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">INSERIR DOCUMENTO</button>
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