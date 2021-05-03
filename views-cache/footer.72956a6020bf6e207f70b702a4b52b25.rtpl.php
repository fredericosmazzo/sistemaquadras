<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      SEMAS LAB | Soluções
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021-2025 <a href="https://adminlte.io">SEMAS DIGITAL</a>.</strong> Todos os direitos reservados.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/res/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/res/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/res/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/res/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/res/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/res/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/res/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/res/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/res/admin/plugins/jszip/jszip.min.js"></script>
<script src="/res/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/res/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/res/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/res/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/res/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="/res/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="/res/admin/dist/js/adminlte.min.js"></script>
<!-- jquery-validation -->
<script src="/res/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/res/admin/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/res/admin/dist/js/demo.js"></script>
<!-- SRCRIPTS -->
<!-- Select2 -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>

<!-- DataTables -->
<script>
  $(function () {
    $("#example").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,  "ordering": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#usuarios_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Tabelas Usuários -->
<script>
  $(function () {
    $('#usuarios').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      language: {

    sEmptyTable:     "Nenhum registro encontrado na tabela",
    sInfo: "Mostrar _START_ até _END_ do _TOTAL_ registros",
    sInfoEmpty: "Mostrar 0 até 0 de 0 Registros",
    sInfoFiltered: "(Filtrar de _MAX_ total registros)",
    sInfoPostFix:    "",
    sInfoThousands:  ".",
    sLengthMenu: "Mostrar _MENU_ registros por pagina",
    sLoadingRecords: "Carregando...",
    sProcessing:     "Processando...",
    sZeroRecords: "Nenhum registro encontrado",
    sSearch: "Pesquisar: ",      
    paginate: {
                 first:    "Primeiro",
                 previous: "Anterior",
                 next:     "Próximo",
                 last:     "Último"
               }
        }
    });
  });
</script>
<script>
  $(function () {
    $('#adolescentes1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
            language: {

    sEmptyTable:     "Nenhum registro encontrado na tabela",
    sInfo: "Mostrar _START_ até _END_ do _TOTAL_ registros",
    sInfoEmpty: "Mostrar 0 até 0 de 0 Registros",
    sInfoFiltered: "(Filtrar de _MAX_ total registros)",
    sInfoPostFix:    "",
    sInfoThousands:  ".",
    sLengthMenu: "Mostrar _MENU_ registros por pagina",
    sLoadingRecords: "Carregando...",
    sProcessing:     "Processando...",
    sZeroRecords: "Nenhum registro encontrado",
    sSearch: "Pesquisar: ",
    paginate: {
                 first:    "Primeiro",
                 previous: "Anterior",
                 next:     "Próximo",
                 last:     "Último"
               }
        }
    });
  });
</script>
<script>
  $(function () {
    $('#adolescentes2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
            language: {

    sEmptyTable:     "Nenhum registro encontrado na tabela",
    sInfo: "Mostrar _START_ até _END_ do _TOTAL_ registros",
    sInfoEmpty: "Mostrar 0 até 0 de 0 Registros",
    sInfoFiltered: "(Filtrar de _MAX_ total registros)",
    sInfoPostFix:    "",
    sInfoThousands:  ".",
    sLengthMenu: "Mostrar _MENU_ registros por pagina",
    sLoadingRecords: "Carregando...",
    sProcessing:     "Processando...",
    sZeroRecords: "Nenhum registro encontrado",
    sSearch: "Pesquisar: ",      
    paginate: {
                 first:    "Primeiro",
                 previous: "Anterior",
                 next:     "Próximo",
                 last:     "Último"
               }
               
        }
    });
  });
</script>
<script>
  $(function () {
    $('#adolescentes3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
            language: {

    sEmptyTable:     "Nenhum registro encontrado na tabela",
    sInfo: "Mostrar _START_ até _END_ do _TOTAL_ registros",
    sInfoEmpty: "Mostrar 0 até 0 de 0 Registros",
    sInfoFiltered: "(Filtrar de _MAX_ total registros)",
    sInfoPostFix:    "",
    sInfoThousands:  ".",
    sLengthMenu: "Mostrar _MENU_ registros por pagina",
    sLoadingRecords: "Carregando...",
    sProcessing:     "Processando...",
    sZeroRecords: "Nenhum registro encontrado",
    sSearch: "Pesquisar: ",      
    paginate: {
                 first:    "Primeiro",
                 previous: "Anterior",
                 next:     "Próximo",
                 last:     "Último"
               }
               
        }
    });
  });
</script>
<script>
  $(function () {
    $('#grupoSistema').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
            language: {

    sEmptyTable:     "Nenhum registro encontrado na tabela",
    sInfo: "Mostrar _START_ até _END_ do _TOTAL_ registros",
    sInfoEmpty: "Mostrar 0 até 0 de 0 Registros",
    sInfoFiltered: "(Filtrar de _MAX_ total registros)",
    sInfoPostFix:    "",
    sInfoThousands:  ".",
    sLengthMenu: "Mostrar _MENU_ registros por pagina",
    sLoadingRecords: "Carregando...",
    sProcessing:     "Processando...",
    sZeroRecords: "Nenhum registro encontrado",
    sSearch: "Pesquisar: ",      
    paginate: {
                 first:    "Primeiro",
                 previous: "Anterior",
                 next:     "Próximo",
                 last:     "Último"
               }
               
        }
    });
  });
</script>
<script>
  $(function () {
    $('#cargoUsuario').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
            language: {

    sEmptyTable:     "Nenhum registro encontrado na tabela",
    sInfo: "Mostrar _START_ até _END_ do _TOTAL_ registros",
    sInfoEmpty: "Mostrar 0 até 0 de 0 Registros",
    sInfoFiltered: "(Filtrar de _MAX_ total registros)",
    sInfoPostFix:    "",
    sInfoThousands:  ".",
    sLengthMenu: "Mostrar _MENU_ registros por pagina",
    sLoadingRecords: "Carregando...",
    sProcessing:     "Processando...",
    sZeroRecords: "Nenhum registro encontrado",
    sSearch: "Pesquisar: ",      
    paginate: {
                 first:    "Primeiro",
                 previous: "Anterior",
                 next:     "Próximo",
                 last:     "Último"
               }
               
        }
    });
  });
</script>
<script>
  $(function () {
    $('#setorUsuario').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
            language: {

    sEmptyTable:     "Nenhum registro encontrado na tabela",
    sInfo: "Mostrar _START_ até _END_ do _TOTAL_ registros",
    sInfoEmpty: "Mostrar 0 até 0 de 0 Registros",
    sInfoFiltered: "(Filtrar de _MAX_ total registros)",
    sInfoPostFix:    "",
    sInfoThousands:  ".",
    sLengthMenu: "Mostrar _MENU_ registros por pagina",
    sLoadingRecords: "Carregando...",
    sProcessing:     "Processando...",
    sZeroRecords: "Nenhum registro encontrado",
    sSearch: "Pesquisar: ",      
    paginate: {
                 first:    "Primeiro",
                 previous: "Anterior",
                 next:     "Próximo",
                 last:     "Último"
               }
               
        }
    });
  });
</script>

<script>
  $(function () {
    $('#aguardandoProtocolo').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
            language: {

    sEmptyTable:     "Nenhum registro encontrado na tabela",
    sInfo: "Mostrar _START_ até _END_ do _TOTAL_ registros",
    sInfoEmpty: "Mostrar 0 até 0 de 0 Registros",
    sInfoFiltered: "(Filtrar de _MAX_ total registros)",
    sInfoPostFix:    "",
    sInfoThousands:  ".",
    sLengthMenu: "Mostrar _MENU_ registros por pagina",
    sLoadingRecords: "Carregando...",
    sProcessing:     "Processando...",
    sZeroRecords: "Nenhum registro encontrado",
    sSearch: "Pesquisar: ",      
    paginate: {
                 first:    "Primeiro",
                 previous: "Anterior",
                 next:     "Próximo",
                 last:     "Último"
               }
               
        }
    });
  });
</script>

<script>
  $(function () {
    $('#movimentoProtocolo').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
            language: {

    sEmptyTable:     "Nenhum registro encontrado na tabela",
    sInfo: "Mostrar _START_ até _END_ do _TOTAL_ registros",
    sInfoEmpty: "Mostrar 0 até 0 de 0 Registros",
    sInfoFiltered: "(Filtrar de _MAX_ total registros)",
    sInfoPostFix:    "",
    sInfoThousands:  ".",
    sLengthMenu: "Mostrar _MENU_ registros por pagina",
    sLoadingRecords: "Carregando...",
    sProcessing:     "Processando...",
    sZeroRecords: "Nenhum registro encontrado",
    sSearch: "Pesquisar: ",
    paginate: {
                 first:    "Primeiro",
                 previous: "Anterior",
                 next:     "Próximo",
                 last:     "Último"
               }
        }
    });
  });
</script>
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal 
  var grupo = button.data('grupo') // Extract info from data-* attributes
  var gruponome = button.data('gruponome')
  var cargo = button.data('cargo') // Extract info from data-* attributes
  var cargonome = button.data('cargonome')
  var setor = button.data('setor') // Extract info from data-* attributes
  var setornome = button.data('setornome')
  var idusuario = button.data('idusuario') // Extract info from data-* attributes
  var name = button.data('name') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Editar permissões de ' + name)
  modal.find('#selectgrupo').val(grupo)
  modal.find('#selectcargo').val(cargo)
  modal.find('#selectsetor').val(setor)
  modal.find('#idusuario').val(idusuario)
})
</script>
<script>
$('#modalAtivar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var status = button.data('status') // Extract info from data-* attributes
  var idusuario = button.data('idusuario') // Extract info from data-* attributes
  var name = button.data('name') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Alterar Status de ' + name)
  modal.find('#selectgrupo').val(status)
  modal.find('#idusuario').val(idusuario)
})
</script>
<script>
$('#modalCadastro').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modalmodalCadastroEntidade
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Cadastro de Novo Usuário')
})
</script>

<script>
$('#modalNovoGrupo').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Cadastro de Novo Grupo')
})
</script>
<script>
$('#modalExcluirGrupo').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modalmodalExcluirEntidade
  var idgrupo = button.data('idgrupo') // Extract info from data-* attributes
  var nomegrupo = button.data('nomegrupo')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Deseja realmente excluir o Grupo ' + nomegrupo + ' ?')
  modal.find('#idgrupo').val(idgrupo)
})
</script>

<script>
$('#modalNovoCargo').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Cadastro de Novo Cargo')
})
</script>
<script>
$('#modalExcluirCargo').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idcargo = button.data('idcargo') // Extract info from data-* attributes
  var nomecargo = button.data('nomecargo')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Deseja realmente excluir o Cargo '  + nomecargo + ' ?')
  modal.find('#idcargo').val(idcargo)
})
</script>

<script>
$('#modalNovaPermissao').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var menu = button.data('menu') // Extract info from data-* attributes
  var idgrupo = button.data('idgrupo') // Extract info from data-* attributes
  var nomegrupo = button.data('nomegrupo')
  var controle = button.data('controle')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Icluir o Grupo no Menu '  + menu + ' ?')
  modal.find('#idgrupo').val(idgrupo)
  modal.find('#nomegrupo').val(nomegrupo)
  modal.find('#controle').val(controle)
})
</script>

<script>
$('#modalRemovePermissao').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var menu = button.data('menu') // Extract info from data-* attributes
  var idgrupo = button.data('idgrupo') // Extract info from data-* attributes
  var nomegrupo = button.data('nomegrupo')
  var controle = button.data('controle')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Excluir o Grupo no Menu '  + menu + ' ?')
  modal.find('#idgrupo').val(idgrupo)
  modal.find('#nomegrupo').val(nomegrupo)
  modal.find('#controle').val(controle)
})
</script>

<script>
$('#modalmodalCadastroEntidade').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Cadastro de Nova Entidade')
})
</script>
<script>
$('#modalExcluirEntidade').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id_entidade = button.data('id_entidade') // Extract info from data-* attributes
  var entidade = button.data('entidade')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Deseja realmente excluir o Grupo ' + entidade + ' ?')
  modal.find('#id_entidade').val(id_entidade)
})
</script>
<script>
$('#modalEditarEntidade').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id_entidade = button.data('id_entidade') // Extract info from data-* attributes
  var entidade = button.data('entidade')
  var cep_entidade = button.data('cep_entidade') // Extract info from data-* attributes
  var bairro_entidade = button.data('bairro_entidade')
  var cidade_entidade = button.data('cidade_entidade') // Extract info from data-* attributes
  var endereco_entidade = button.data('endereco_entidade')
  var email_entidade = button.data('email_entidade') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#id_entidade').val(id_entidade)
  modal.find('#entidade').val(entidade)
  modal.find('#cep').val(cep_entidade)
  modal.find('#bairro').val(bairro_entidade)
  modal.find('#cidade').val(cidade_entidade)
  modal.find('#endereco').val(endereco_entidade)
  modal.find('#email_entidade').val(email_entidade)
})
</script>
<script>
$('#modalEditarAdolescente').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idadolescente = button.data('idadolescente') // Extract info from data-* attributes
  var nome = button.data('nome')
  var data_nascimento = button.data('data_nascimento') // Extract info from data-* attributes
  var sexo = button.data('sexo')
  var mae = button.data('mae') // Extract info from data-* attributes
  var pai = button.data('pai')
  var rg = button.data('rg')
  var cpf = button.data('cpf')
  var rua = button.data('rua')
  var bairro = button.data('bairro')
  var cep = button.data('cep')
  var cidade = button.data('cidade')
  var uf = button.data('uf')
  var telefone = button.data('telefone')
  var celular = button.data('celular')  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#idadolescente').val(idadolescente)
  modal.find('#nome').val(nome)
  modal.find('#aniversario').val(data_nascimento)
  modal.find('#sexo').val(sexo)
  modal.find('#mae').val(mae)
  modal.find('#pai').val(pai)
  modal.find('#rg').val(rg)
  modal.find('#documento').val(cpf)
  modal.find('#endereco').val(rua)
  modal.find('#bairro').val(bairro)
  modal.find('#cep').val(cep)
  modal.find('#cidade').val(cidade)
  modal.find('#uf').val(uf)
  modal.find('#telefone').val(telefone)
  modal.find('#celular').val(celular)
})
</script>

<script>
$('#modalinserirMedida').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the
  var nome = button.data('nome')
  var idadolescente = button.data('idadolescente')
  var cadastrante = button.data('cadastrante')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Cadastro de Nova Medida de - ' + nome + '')
  modal.find('#idadolescente').val(idadolescente)
  modal.find('#cadastrante').val(cadastrante)
})
</script>

<script>
$('#modaEncerrarMedida').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the
  var nome = button.data('nome')
  var idadolescente = button.data('idadolescente')
  var cadastrante = button.data('cadastrante')
  var situacao = button.data('situacao')
  var andamento = button.data('andamento')
  var medida = button.data('medida')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Encerrar Medida de - ' + nome + '')
  modal.find('#idadolescente').val(idadolescente)
  modal.find('#cadastrante').val(cadastrante)
  modal.find('#situacao').val(situacao)
  modal.find('#andamento').val(andamento)
  modal.find('#medida').val(medida)

})
</script>

<script>
$('#modalNovoDoc').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal 
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Incluir novo Documento')
})
</script>

<script>
$('#modalNovoProtocolo').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the
  var documento_id = button.data('documento_id')
  var id_entrada = button.data('id_entrada')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Protocolo de Documento')
  modal.find('#documento_id').val(documento_id)
  modal.find('#id_entrada').val(id_entrada)

})
</script>

<script>
$('#detalhesProtocolo').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the
  var documento_id = button.data('documento_id')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Histórico de Protocolos')
  modal.find('#documento_id').val(documento_id)

})
</script>

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
            $(this).val(mascara($(this).val(), '99.999.999/9999-99'));

    });

    $('#ies').keyup(function () {

        if ($(this).val().length <= 15)
            $(this).val(mascara($(this).val(), '999.999.999.999'));
        else
            $(this).val(mascara($(this).val(), '999.999.999.999'));

    });

    $('#contato').keyup(function () {

        if ($(this).val().length <= 13)
            $(this).val(mascara($(this).val(), '(99)9999-9999'));
        else
            $(this).val(mascara($(this).val(), '(99)99999-9999'));

    });

    $('#telefone').keyup(function () {

        if ($(this).val().length <= 13)
            $(this).val(mascara($(this).val(), '(99)9999-9999'));
        else
            $(this).val(mascara($(this).val(), '(99)99999-9999'));

    });

    $('#celular').keyup(function () {

        if ($(this).val().length <= 13)
            $(this).val(mascara($(this).val(), '(99)9999-9999'));
        else
            $(this).val(mascara($(this).val(), '(99)99999-9999'));

    });

    $('#aniversario').keyup(function () {

        if ($(this).val().length <= 10)
            $(this).val(mascara($(this).val(), '99/99/9999'));
        else
            $(this).val(mascara($(this).val(), '99/99/9999'));

    });

    $('#dataMedida').keyup(function () {

        if ($(this).val().length <= 10)
            $(this).val(mascara($(this).val(), '99/99/9999'));
        else
            $(this).val(mascara($(this).val(), '99/99/9999'));

    });

        $('#cep').keyup(function () {

        if ($(this).val().length <= 9)
            $(this).val(mascara($(this).val(), '99999-999'));
        else
            $(this).val(mascara($(this).val(), '99999-999'));

    });

        $('#execucao').keyup(function () {

        if ($(this).val().length <= 24)
            $(this).val(mascara($(this).val(), '9999999-99.9999.9.99.9999'));
        else
            $(this).val(mascara($(this).val(), '9999999-99.9999.9.99.9999'));

    });

        $('#controle').keyup(function () {

        if ($(this).val().length <= 7)
            $(this).val(mascara($(this).val(), '9999/99'));
        else
            $(this).val(mascara($(this).val(), '99999/99'));

    });

        $('#dataExtincao').keyup(function () {

        if ($(this).val().length <= 10)
            $(this).val(mascara($(this).val(), '99/99/9999'));
        else
            $(this).val(mascara($(this).val(), '99/99/9999'));

    });

    return false;
});
</script>

<script>
  /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// BUSCA CEP ENDEREÇO CADASTRO
// Registra o evento blur do campo "cep", ou seja, quando o usuário sair do campo "cep" faremos a consulta dos dados
$("#cep").blur(function(){
// Para fazer a consulta, removemos tudo o que não é número do valor informado pelo usuário
var cep = this.value.replace(/[^0-9]/, "");
// Validação do CEP; caso o CEP não possua 8 números, então cancela a consulta
if(cep.length!== 8){
return false;
}
// Utilizamos o webservice "viacep.com.br" para buscar as informações do CEP fornecido pelo usuário.
// A url consiste no endereço do webservice ("http://viacep.com.br/ws/"), mais o cep que o usuário
// informou e também o tipo de retorno que desejamos, podendo ser "xml", "piped", "querty" ou o que
// iremos utilizar, que é "json"
var url = "http://viacep.com.br/ws/"+cep+"/json/";
// Aqui fazemos uma requisição ajax ao webservice, tratando o retorno com try/catch para que caso ocorra algum
// erro (o cep pode não existir, por exemplo) o usuário não seja afetado, assim ele pode continuar preenchendo os campos
$.getJSON(url, function(dadosRetorno){
try{
// Insere os dados em cada campo
$("#endereco").val(dadosRetorno.logradouro);
$("#bairro").val(dadosRetorno.bairro);
$("#cidade").val(dadosRetorno.localidade);
$("#uf").val(dadosRetorno.uf);
}catch(ex){}
});
});
</script>
<!-- FORMULÁRIOS COM VALIDAÇÃO-->

</body>
</html>


