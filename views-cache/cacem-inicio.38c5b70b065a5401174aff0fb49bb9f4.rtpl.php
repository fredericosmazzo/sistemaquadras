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
              <li class="breadcrumb-item"><a href="/admin/protocolo/inicio">CACEM 0800</a></li>
              <li class="breadcrumb-item active">Início Cacem</li>
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
                <h5 class="m-0"><strong>DADOS GERAIS</strong></h5>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-12 text-center">
                      <span class="text-primary h6"><strong>PERÍODO DA AMOSTRAGEM:&nbsp;&nbsp;</strong></span><span class="text-muted h6"><?php $counter1=-1;  if( isset($periodoEstudo) && ( is_array($periodoEstudo) || $periodoEstudo instanceof Traversable ) && sizeof($periodoEstudo) ) foreach( $periodoEstudo as $key1 => $value1 ){ $counter1++; ?>&nbsp;&nbsp;<strong><?php echo $value1["inicial"]; ?></strong>&nbsp;até&nbsp;<strong><?php echo $value1["final"]; ?></strong><?php } ?></span>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <span class="text-primary h6"><strong>TELEFONES QUE LIGARAM:&nbsp;&nbsp;</strong></span><span class="text-muted h6"><?php $counter1=-1;  if( isset($totalNumerosLigaram) && ( is_array($totalNumerosLigaram) || $totalNumerosLigaram instanceof Traversable ) && sizeof($totalNumerosLigaram) ) foreach( $totalNumerosLigaram as $key1 => $value1 ){ $counter1++; ?><?php echo $value1["totalNumerosLigaram"]; ?><?php } ?></span>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <span class="text-primary h6"><strong>LIGAÇÕES REALIZADAS:&nbsp;</strong></span><span class="text-muted h6"><?php $counter1=-1;  if( isset($totalLigacoes) && ( is_array($totalLigacoes) || $totalLigacoes instanceof Traversable ) && sizeof($totalLigacoes) ) foreach( $totalLigacoes as $key1 => $value1 ){ $counter1++; ?><?php echo $value1["totalLigacoes"]; ?><?php } ?></span>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <span class="text-primary h6"><strong>LIGAÇÕES ATENDIDAS:&nbsp;</strong></span><span class="text-muted h6"><?php $counter1=-1;  if( isset($totalLigacoesAtendidos) && ( is_array($totalLigacoesAtendidos) || $totalLigacoesAtendidos instanceof Traversable ) && sizeof($totalLigacoesAtendidos) ) foreach( $totalLigacoesAtendidos as $key1 => $value1 ){ $counter1++; ?><?php echo $value1["totalLigacoesAtendidos"]; ?><?php } ?></span>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <span class="text-primary h6"><strong>LIGAÇÕES PERDIDAS:&nbsp;</strong></span><span class="text-muted h6"><?php $counter1=-1;  if( isset($totalLigacoesNaoAtendidos) && ( is_array($totalLigacoesNaoAtendidos) || $totalLigacoesNaoAtendidos instanceof Traversable ) && sizeof($totalLigacoesNaoAtendidos) ) foreach( $totalLigacoesNaoAtendidos as $key1 => $value1 ){ $counter1++; ?><?php echo $value1["totalLigacoesNaoAtendidos"]; ?><?php } ?></span>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><strong>LISTAGENS</strong></h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <table id="dados01" class="table table-bordered table-striped">
                      <thead>
                      <tr><th colspan="2">&nbsp;Ligações Realizadas por Nº</th></tr>
                      <tr>
                        <th>Nº Telefone</th>
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $counter1=-1;  if( isset($listarTotalLigaçõesNumero) && ( is_array($listarTotalLigaçõesNumero) || $listarTotalLigaçõesNumero instanceof Traversable ) && sizeof($listarTotalLigaçõesNumero) ) foreach( $listarTotalLigaçõesNumero as $key1 => $value1 ){ $counter1++; ?>

                      <tr>
                        <td><?php echo $value1["numOrigem"]; ?></td>
                        <td><?php echo $value1["total"]; ?></td>
                      </tr>
                      <?php } ?>

                      </tbody>
                    </table>
                </div>
                  <div class="col-4">
                    <table id="dados02" class="table table-bordered table-striped">
                      <thead>
                      <tr><th colspan="3">&nbsp;Ligações por Nº Atendidas</th></tr>
                      <tr>
                        <th>Nº Telefone</th>
                        <th>Total</th>
                        <th>Atendidas</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $counter1=-1;  if( isset($listarTotalLigaçõesNumeroAtendida) && ( is_array($listarTotalLigaçõesNumeroAtendida) || $listarTotalLigaçõesNumeroAtendida instanceof Traversable ) && sizeof($listarTotalLigaçõesNumeroAtendida) ) foreach( $listarTotalLigaçõesNumeroAtendida as $key1 => $value1 ){ $counter1++; ?>

                      <tr>
                        <td><?php echo $value1["numero"]; ?></td>
                        <td><?php echo $value1["totalLigacoes"]; ?></td>
                        <td><?php echo $value1["totalAtendido"]; ?></td>
                      </tr>
                      <?php } ?>

                      </tbody>
                    </table>
                </div>
                  <div class="col-4">
                    <table id="dados03" class="table table-bordered table-striped">
                      <thead>
                      <tr><th colspan="2">&nbsp;Ligações por Nº Não Atendidas</th></tr>
                      <tr>
                        <th>Nº Telefone</th>
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $counter1=-1;  if( isset($listarTotalLigaçõesNumeroNaoAtendida) && ( is_array($listarTotalLigaçõesNumeroNaoAtendida) || $listarTotalLigaçõesNumeroNaoAtendida instanceof Traversable ) && sizeof($listarTotalLigaçõesNumeroNaoAtendida) ) foreach( $listarTotalLigaçõesNumeroNaoAtendida as $key1 => $value1 ){ $counter1++; ?>

                      <tr>
                        <td><?php echo $value1["Numero"]; ?></td>
                        <td><?php echo $value1["TOTAL"]; ?></td>
                      </tr>
                      <?php } ?>

                      </tbody>
                    </table>
                </div>
              </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><strong>GRÁFICOS</strong></h5>
              </div>
              <div class="card-body">
                            <!-- PIE CHART -->
            <!-- DONUT CHART -->
            <div class="row">
              <div class="col-4">
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">NÚMERO DE TELEFONES ATENDIDAS POR DIA</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="graficoAtendidas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
                </div>
            </div>
              <div class="col-4">
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">NÚMERO DE TELEFONES NÃO ATENDIDAS POR DIA</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="graficoNaoAtendidas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
                </div>
            </div>
              <div class="col-4">
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">NÚMERO TOTAL DE LIGAÇÕES POR DIA</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="graficoLigacoesDatas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
                </div>
            </div>
          </div>
            <!-- /.card -->
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
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