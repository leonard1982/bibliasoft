<?php
class MYPDF extends TCPDF {
    var $grid = false;

    function DrawGrid()
    {
        if($this->grid===true){
            $spacing = 5;
        } else {
            $spacing = $this->grid;
        }
        $this->SetDrawColor(204,255,255);
        $this->SetLineWidth(0.35);
        for($i=0;$i<$this->w;$i+=$spacing){
            $this->Line($i,0,$i,$this->h);
        }
        for($i=0;$i<$this->h;$i+=$spacing){
            $this->Line(0,$i,$this->w,$i);
        }
        $this->SetDrawColor(0,0,0);

        $x = $this->GetX();
        $y = $this->GetY();
        $this->SetTextColor(204,204,204);
        for($i=20;$i<$this->h;$i+=20){
            $this->SetXY(1,$i-3);
            $this->Write(4,$i);
        }
        for($i=20;$i<(($this->w)-($this->rMargin)-10);$i+=20){
            $this->SetXY($i-1,1);
            $this->Write(4,$i);
        }
        $this->SetXY($x,$y);
    }

	public function setIdHeader($titulo,$fecha_inicial,$fecha_final,$nombre_empresa){
      $this->IdHeader       = $titulo;
	  $this->FechaInicial   = $fecha_inicial;
	  $this->FechaFinal     = $fecha_final;
	  $this->NombreEmpresa  = $nombre_empresa;
    }
	
    function Header()
    {
        if($this->grid)
            $this->DrawGrid();

		// Tipo de fonte
		$this->SetFont('helvetica', 'B', 20);

		// Titulo
		//$this->Cell(0, 15, utf8_decode('LISTA DE CLIENTE - ORDEM ALFABETICA'),0, false, 'C', 0, '', 0, false, 'M', 'M');
		//$this->Ln(5);

		$this->SetXY(15,10);
		$this->Cell(0,10,$this->IdHeader,0,0,'C');	
		
		$this->SetFont('helvetica', 'B', 12);
		$this->Line(15,19,200,19);
		$this->SetXY(15,15);
		// Image example with resizing
		$this->Image('../logo.png', 15, 3, 18, 15, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
		$this->Cell(0,15,$this->NombreEmpresa,0,0,'C');	
		
		$this->Ln(5);
		
		// Tipo de fonte
		$this->SetFont('helvetica', 'B', 10);

		// Sub-Titulo
		$this->SetXY(15,35);
		$this->Cell(0, 35, 'Fecha Inicial: '.$this->FechaInicial,0, false, 'L', 0, '', 0, false, 'M', 'M');

		$this->SetXY(70,35);
		$this->Cell(0, 35, 'Fecha Final: '.$this->FechaFinal,0, false, 'L', 0, '', 0, false, 'M', 'M');

		/*
		$this->SetXY(110,23);
		$this->Cell(0, 10, 'Contato do CLiente',0, false, 'L', 0, '', 0, false, 'M', 'M');

		$this->SetXY(162,23);
		$this->Cell(0, 10, 'Tipo',0, false, 'L', 0, '', 0, false, 'M', 'M');

		$this->SetXY(175,23);
		$this->Cell(0, 10, 'CNPJ/CPF',0, false, 'L', 0, '', 0, false, 'M', 'M');
		*/
		
		$this->Ln(5);
		
    }

    //Rodape
    public function Footer()
    {
        // Posicionado a 15mm do final da p&#65533;gina
        $this->SetY(-17);
        // Tipo de fonte
        $this->SetFont('helvetica', 'I', 8);
        // Numero da Pagina
        $this->Cell(0, 10, 'Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, 'Impreso: '.date('d/m/Y H:i:s'), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
	
}
?>