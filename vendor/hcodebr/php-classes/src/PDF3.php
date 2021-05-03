<?php 
namespace Hcode;

use Rain\Tpl;
use Dompdf\Dompdf;

class PDF {
	
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

		//inserindo o HTML que queremos converter

		$this->dompdf->loadHtml($html);



		// Definindo o papel e a orientação

		$this->dompdf->setPaper('A4', 'portrait');

		// Renderizando o HTML como PDF

		$this->dompdf->render();

		// Enviando o PDF para o browser


	}

	public function pdf()
	{

		return $this->dompdf->stream("documento.pdf", array("Attachment"=>0));

	}

}

 ?>