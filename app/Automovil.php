<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovil extends Model
{
    //attributes id, disponible, price, created_at, updated_at, user_id
    protected $fillable = ['placa', 'marca', "modelo",'valor_comercial','valor_alquiler','disponible'];

    public function getPlaca()
    {
        return $this->attributes['placa'];
    }

    public function setPlaca($id)
    {
        $this->attributes['placa'] = $id;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getMarca()
    {
        return $this->attributes['marca'];
    }

    public function setMarca($marca)
    {
        $this->attributes['marca'] = $marca;
    }

    public function getModelo()
    {
        return $this->attributes['modelo'];
    }

    public function setModelo($modelo)
    {
        $this->attributes['modelo'] = $modelo;
    }

    public function getDisponible()
    {
        return $this->attributes['disponible'];
    }

    public function setDisponible($disponible)
    {
        $this->attributes['disponible'] = $disponible;
    }

    public function getValorComercial()
    {
        return $this->attributes['valor_comercial'];
    }

    public function setValorComercial($valor_comercial)
    {
        $this->attributes['valor_comercial'] = $valor_comercial;
    }

    public function getValorAlquiler()
    {
        return $this->attributes['valor_alquiler'];
    }

    public function setValorAlquiler($valor_alquiler)
    {
        $this->attributes['valor_alquiler'] = $valor_alquiler;
    }

    public static function validate(){
        return [
            "marca" => "required",   
            "valor_comercial" => "required|numeric|gt:0",
            "valor_alquiler" => "required|numeric|gt:0",      
            "disponible" => "required",            
            "modelo" => "required",
            "placa" => "required|unique:automovils"
        ];
    }

}
