<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('rfc',13)->nullable();
            $table->string('curp',18)->nullable();
            $table->string('estado')->nullable();
            $table->string('municipio')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('cp')->nullable();
            $table->string('colonia')->nullable();
            $table->string('calle')->nullable();
            $table->string('num_exterior')->nullable();
            $table->string('num_interior')->nullable();
            $table->string('dc_estado')->nullable();
            $table->string('dc_municipio')->nullable();
            $table->string('dc_ciudad')->nullable();
            $table->string('dc_colonia')->nullable();
            $table->string('dc_cp')->nullable();
            $table->string('dc_calle')->nullable();
            $table->string('dc_num_exterior')->nullable();
            $table->string('dc_num_interior')->nullable();
            $table->string('con_nombre')->nullable();
            $table->string('con_cargo')->nullable();
            $table->string('con_departamento')->nullable();
            $table->string('con_genero')->nullable();
            $table->string('con_fecha_nacimiento')->nullable();
            $table->string('con_telefono1')->nullable();
            $table->string('con_ext1')->nullable();
            $table->string('con_telefono2')->nullable();
            $table->string('con_ext2')->nullable();
            $table->string('con_celular1')->nullable();
            $table->string('con_celular2')->nullable();
            $table->string('con_correo1')->nullable();
            $table->string('con_correo2')->nullable();
            $table->string('sv_nombre_ejecutivo')->nullable();
            $table->string('db_banco')->nullable();
            $table->string('db_cuenta')->nullable();
            $table->string('db_clabe');            
            $table->integer('db_dias_credito')->nullable();
            $table->decimal('db_limite_credito',10,2)->nullable();
            $table->string('db_cta_cli')->nullable();
            $table->enum('status_cliente', ['1' , '2'])->nullable();    // ['1' => 'Prospecto', '2' => 'Cliente']
            $table->enum('status_actividad', ['0' , '1'])->nullable();  //  ['0' => 'Inactivo', '1' => 'Activo']
            

/*
            
  =====> `nombre` VARCHAR(255) NULL,
  =====> `razon_social` VARCHAR(255) NULL,
  ====== `apellido_paterno` VARCHAR(255) NULL,
  ====== `apellido_materno` VARCHAR(255) NULL,
  ==== `rfc` VARCHAR(13) NULL,
  ==== `curp` VARCHAR(18) NULL,
  ==== `estado` VARCHAR(255) NULL,
  ==== `municipio` VARCHAR(255) NULL,
  ==== `ciudad` VARCHAR(255) NULL,
  ==== `cp` VARCHAR(10) NULL,
  ==== `colonia` VARCHAR(255) NULL,
  `calle` VARCHAR(255) NULL,
  `num_exterior` VARCHAR(20) NULL,
  `num_interior` VARCHAR(20) NULL,
  ===== `dc_estado` VARCHAR(255) NULL,
  `dc_municipio` VARCHAR(255) NULL,
  `dc_ciudad` VARCHAR(255) NULL,
  `dc_cp` VARCHAR(10) NULL,
  ==== `dc_colonia` VARCHAR(255) NULL,
  `dc_calle` VARCHAR(255) NULL,
  `dc_num_exterior` VARCHAR(20) NULL,
  ==== `dc_num_interior` VARCHAR(20) NULL,
  ====`con_nombre` VARCHAR(255) NULL,
  `con_cargo` VARCHAR(255) NULL,
  `con_departamento` VARCHAR(255) NULL,
  `con_genero` VARCHAR(255) NULL,
  `con_fecha_nacimiento` DATE NULL,
  `con_telefono1` VARCHAR(25) NULL,
  ==== `con_ext1` VARCHAR(10) NULL,
  `con_telefono2` VARCHAR(25) NULL,
  `con_ext2` VARCHAR(10) NULL,
  `con_celular1` VARCHAR(25) NULL,
  ==== `con_celular2` VARCHAR(25) NULL,
  `con_correo1` VARCHAR(255) NULL,
  ==== `con_correo2` VARCHAR(255) NULL,
  `db` VARCHAR(255) NULL,
  ==== `sv_nombre_ejecutivo` VARCHAR(255) NULL,
  =========   37    =========  


  `db_banco` VARCHAR(100) NULL,
  `db_cuenta` VARCHAR(100) NULL,
  `db_clabe` VARCHAR(100) NULL,
  `db_dias_credito` INT(11) NULL,
  `db_limite_credito` DECIMAL(10,0) NULL,
  `db_cta_cli` VARCHAR(50) NULL,


  `fk_iva_impuesto` INT NOT NULL,
  `fk_clase_pm` INT NOT NULL,
  `fk_tipo_cliente` INT NOT NULL,
  `fk_forma_juridica` INT NOT NULL,
  `fk_tipo_empresa` INT NOT NULL,
  `fk_centro_negocio` INT NOT NULL,
  `fk_medio_contacto` INT NOT NULL,
  `fk_status` INT NOT NULL,
  `fk_registro_patronal` INT NOT NULL,
  `fk_forma_pago` INT NOT NULL,
  `fk_actividad_economica` INT NOT NULL,
  PRIMARY KEY (`id_cliente_prospecto`),
  INDEX `fk_clientes_prospectos_iva_impuestos1_idx` (`fk_iva_impuesto` ASC),
  INDEX `fk_clientes_prospectos_clases_pm1_idx` (`fk_clase_pm` ASC),
  INDEX `fk_clientes_prospectos_tipos_clientes1_idx` (`fk_tipo_cliente` ASC),
  INDEX `fk_clientes_prospectos_formas_juridicas1_idx` (`fk_forma_juridica` ASC),
  INDEX `fk_clientes_prospectos_tipos_empresas_facturacion1_idx` (`fk_tipo_empresa` ASC),
  INDEX `fk_clientes_prospectos_centros_negocio1_idx` (`fk_centro_negocio` ASC),
  INDEX `fk_clientes_prospectos_medios_contacto1_idx` (`fk_medio_contacto` ASC),
  INDEX `fk_clientes_prospectos_status1_idx` (`fk_status` ASC),
  INDEX `fk_clientes_prospectos_registros_patronales1_idx` (`fk_registro_patronal` ASC),
  INDEX `fk_clientes_prospectos_formas_pagos1_idx` (`fk_forma_pago` ASC),
  INDEX `fk_clientes_prospectos_actividades_economicas1_idx` (`fk_actividad_economica` ASC),
  CONSTRAINT `fk_clientes_prospectos_iva_impuestos1`
    FOREIGN KEY (`fk_iva_impuesto`)
    REFERENCES `CRM-FINAL`.`iva_impuestos` (`id_iva_impuesto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_prospectos_clases_pm1`
    FOREIGN KEY (`fk_clase_pm`)
    REFERENCES `CRM-FINAL`.`clases_pm` (`id_clase_pm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_prospectos_tipos_clientes1`
    FOREIGN KEY (`fk_tipo_cliente`)
    REFERENCES `CRM-FINAL`.`tipos_clientes` (`id_tipo_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_prospectos_formas_juridicas1`
    FOREIGN KEY (`fk_forma_juridica`)
    REFERENCES `CRM-FINAL`.`formas_juridicas` (`id_forma_juridica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_prospectos_tipos_empresas_facturacion1`
    FOREIGN KEY (`fk_tipo_empresa`)
    REFERENCES `CRM-FINAL`.`tipos_empresas_facturacion` (`id_tipo_empresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_prospectos_centros_negocio1`
    FOREIGN KEY (`fk_centro_negocio`)
    REFERENCES `CRM-FINAL`.`centros_negocio` (`id_centro_negocio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_prospectos_medios_contacto1`
    FOREIGN KEY (`fk_medio_contacto`)
    REFERENCES `CRM-FINAL`.`medios_contacto` (`id_medio_contacto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_prospectos_status1`
    FOREIGN KEY (`fk_status`)
    REFERENCES `CRM-FINAL`.`status` (`id_status`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_prospectos_registros_patronales1`
    FOREIGN KEY (`fk_registro_patronal`)
    REFERENCES `CRM-FINAL`.`registros_patronales` (`id_registro_patronal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_prospectos_formas_pagos1`
    FOREIGN KEY (`fk_forma_pago`)
    REFERENCES `CRM-FINAL`.`formas_pagos` (`id_forma_pago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_prospectos_actividades_economicas1`
    FOREIGN KEY (`fk_actividad_economica`)
    REFERENCES `CRM-FINAL`.`actividades_economicas` (`id_actividad_economica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


*/




















            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes');
    }
}
