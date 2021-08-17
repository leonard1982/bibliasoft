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

	public function setIdHeader($titulo){
      $this->IdHeader = $titulo;
    }
	
    function Header()
    {
        if($this->grid)
            $this->DrawGrid();

		// Tipo de fonte
		$this->SetFont('helvetica', 'B', 20);

		// Titulo
		$this->Cell(0, 15, utf8_decode('LISTA DE CLIENTE - ORDEM ALFABETICA'),0, false, 'C', 0, '', 0, false, 'M', 'M');
		$this->Ln(5);

		$this->SetXY(15,15);
		$this->Cell(0,10,$this->IdHeader,1,0,'C');	
		
		$this->Ln(5);
		
		// Tipo de fonte
		$this->SetFont('helvetica', 'B', 14);

		// Sub-Titulo
		$this->SetXY(11,30);
		$this->Cell(0, 10, 'Nome do CLiente',0, false, 'L', 0, '', 0, false, 'M', 'M');

		$this->SetXY(60,30);
		$this->Cell(0, 10, 'Contato do CLiente',0, false, 'L', 0, '', 0, false, 'M', 'M');

		$this->SetXY(110,30);
		$this->Cell(0, 10, 'Contato do CLiente',0, false, 'L', 0, '', 0, false, 'M', 'M');

		$this->SetXY(162,30);
		$this->Cell(0, 10, 'Tipo',0, false, 'L', 0, '', 0, false, 'M', 'M');

		$this->SetXY(175,30);
		$this->Cell(0, 10, 'CNPJ/CPF',0, false, 'L', 0, '', 0, false, 'M', 'M');
		
		$this->Ln(200);
		
    }

    //Rodape
    public function Footer()
    {
        // Posicionado a 15mm do final da p&#65533;gina
        $this->SetY(-15);
        // Tipo de fonte
        $this->SetFont('helvetica', 'I', 8);
        // Numero da Pagina
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
	
}
?>