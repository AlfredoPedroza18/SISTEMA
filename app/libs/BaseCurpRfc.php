<?php 

namespace App\Libs;


class BaseCurpRfc{
	protected $atributos = [];
	protected $vocales = ['A','E','I','O','U'];
	protected $acentos_vocales = ['Á','É','ï','Ó','Ú'];
	private   $string;

	//Establece el atributo de la clase 
	public function __set($atributo,$valor){
		$this->atributos[$atributo] = $valor;
		
	}

	//Se obtiene un atributo de la clase guardado en el array atributos
	public function __get($atributo){


		if (array_key_exists($atributo, $this->atributos)) {
            return $this->atributos[$atributo];
        }
	}


	protected function letraPrimerApellido(){

		$primer_letra = $this->primerLetra($this->atributos['apellido_paterno']);

		return $primer_letra; 
	}

	protected function vocalPrimerApelldio(){
		
		$apellido 		= strtoupper($this->atributos['apellido_paterno']);
		$arr_apellido 	= str_split($apellido);
		$longitud		= count($arr_apellido);
		$vocal 			= '';
		for($i=0; $longitud > $i; $i++ ){
			if(in_array($arr_apellido[$i],$this->vocales)){
				$vocal = $arr_apellido[$i];
				break;
			}
		}

		return $vocal;


	}

	protected function letraSegundoApellido(){
		$primer_letra = $this->primerLetra($this->atributos['apellido_materno']);

		return $primer_letra;
	}

	protected function letraPrimerNombre(){
		$primer_letra_name = $this->primerLetra($this->atributos['nombres']);

		return $primer_letra_name;
	}

	protected function fechaNacimiento(){
		//01/10/1990
		$fecha_nacimiento = explode('-', $this->atributos['fecha_nacimiento']);
		$dia			  = $fecha_nacimiento[2];
		$mes			  = $fecha_nacimiento[1];
		$anio			  = substr($fecha_nacimiento[0],2);
		$fecha_curp		  = $anio.$mes.$dia;
		
		return $fecha_curp; 



	}

	protected function genero(){
		return strtoupper($this->atributos['genero']);
	}

	protected function lugarNacimiento(){
		return strtoupper($this->atributos['lugar_nacimiento']);

	}

	protected function siguienteConsonanteApp(){
		$siguiente_consonante_app = $this->siguienteConsonante($this->atributos['apellido_paterno']);

		return $siguiente_consonante_app;
	}

	protected function siguienteConsonanteApm(){
		$siguiente_consonante_apm = $this->siguienteConsonante($this->atributos['apellido_materno']);

		return $siguiente_consonante_apm;
	}

	protected function siguienteConsonantePn(){
		$siguiente_consonante_pn = $this->siguienteConsonante($this->atributos['nombres']);

		return $siguiente_consonante_pn;
	}

	protected function primerLetra($apellido){
		$longitud 		= strlen($apellido);
		$primer_letra 	= substr($apellido,0,($longitud - ($longitud - 1)));
		$primer_letra 	= strtoupper($primer_letra);

		return $primer_letra;

	}

	protected function siguienteConsonante($datos){
		$apellido 		= strtoupper($datos);
		$apellido 		= substr($apellido,1);
		$arreglo	 	= str_split($apellido);
		$longitud		= count($arreglo);
		$consonante		= '';
		for($i=0; $longitud > $i; $i++ ){
			if(in_array($arreglo[$i],$this->vocales)){
				unset($arreglo[$i]);				
			}
		}

		$keys = array_keys($arreglo);
		$consonante = $arreglo[$keys[0]];
		return $consonante;	
	}


	protected function limpiarString($curp){

		//echo '<br>Antes:::: ' . $curp . '<br>';

		$this->string = mb_convert_encoding($curp,'UTF-8' ,'UTF-8');
		$this->string = trim($curp);
	 	$contador = 0;

	 

	    $this->string =
	     str_replace(
	        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä','Ã','?'),
	        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A','A','A'),
	        $this->string
	    );
	 //echo '<br> Letra A: ' . $this->string.' '.$contador. '<br>';
	    $this->string = str_replace(
	        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
	        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
	        $this->string
	    );
	 
	    $this->string = str_replace(
	        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
	        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
	        $this->string
	    );
	 
	    $this->string = str_replace(
	        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
	        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
	        $this->string
	    );
	 
	    $this->string = str_replace(
	        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
	        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
	        $this->string
	    );
	 
	    $this->string = str_replace(
	        array('ñ', 'Ñ', 'ç', 'Ç'),
	        array('x', 'X', 'c', 'C'),
	        $this->string
	    );
	    //echo '<br> Termino: '.$this->string.'   <br>';


	    return utf8_decode($this->string);
	}
}