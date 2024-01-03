<?php

namespace App\Libs;


class Curp extends BaseCurpRfc
{
	private $curp;

	private function generaCURP(){
		$curp = 
		$this->letraPrimerApellido().
		$this->vocalPrimerApelldio().
		$this->letraSegundoApellido().
		$this->letraPrimerNombre().
		$this->fechaNacimiento().	
		$this->genero().	
		$this->lugarNacimiento().
		$this->siguienteConsonanteApp().
		$this->siguienteConsonanteApm().		
		$this->siguienteConsonantePn();
		return $curp;
			
	}		

	public function getCurp(){
		$this->curp = $this->generaCURP();

		$curp = $this->limpiarString($this->curp);

		return $curp;
	}

}