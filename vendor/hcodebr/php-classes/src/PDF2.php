<?php 
namespace Hcode;

use Rain\Tpl;
use Dompdf\Dompdf;

class PDF2 {
	
	private $dompdf;

	public function __construct($tplName, $data = array())
    {
 
        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/impressoes/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
            "debug"         => false
        );
 
        Tpl::configure( $config );
 
        $tpl = new Tpl;
 
        foreach ($data as $key => $value) {
            $tpl->assign($key, $value);
        }
 		
 		$this->dompdf = new DOMPDF();
		//lendo o arquivo HTML correspondente
		$html=$tpl->draw($tplName, true);
		$html .= '	<link rel="stylesheet" href="/var/www/html/res/admin/css/styles.css">
  					<link rel="stylesheet" href="/var/www/html/res/site/dist/css/adminlte.min.css">
  					<link rel="stylesheet" href="/var/www/html/res/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  					<link rel="stylesheet" href="/var/www/html/res/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  				 ';
		//inserindo o HTML que queremos converter

		$this->dompdf->loadHtml($html);



		// Definindo o papel e a orientação

		$this->dompdf->setPaper('A4', 'landscape');

		// Renderizando o HTML como PDF

		$this->dompdf->render();

		// Enviando o PDF para o browser


	}

	public function pdf2()
	{

		return $this->dompdf->stream("documento.pdf", array("Attachment"=>0));

	}

		public function pdf3($nome)
	{

		return $this->dompdf->stream("$nome.pdf");

	}

}

 ?>