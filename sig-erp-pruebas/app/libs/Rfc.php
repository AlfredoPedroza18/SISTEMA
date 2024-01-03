<?php
namespace App\Libs;

class Rfc extends BaseCurpRfc{

	private $rfc;

	private function generaRFC(){
		$this->rfc = 
		$this->letraPrimerApellido().
		$this->vocalPrimerApelldio().
		$this->letraSegundoApellido().
		$this->letraPrimerNombre().
		$this->fechaNacimiento();	

		return $this->rfc;
			
	}

	public function getRfc(){
		$this->rfc = $this->generaRFC();

		$rfc = $this->limpiarString($this->rfc);

		return $rfc;
	}
}