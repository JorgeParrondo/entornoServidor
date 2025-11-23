<?php

class Reloj
{
    private $hora;
    private $minutos;
    private $segundos;
    private $formato24 = true; // por defecto

    // CONSTRUCTOR
    public function __construct ( int $hora, int $minutos, int $segundos){
       $this->hora =  $hora;
       $this->minutos = $minutos;
       $this->segundos = $segundos;
    }
    
    // Mostrar la hora en formato 24h o 12h
    public function mostrar(): string{
        if($this->formato24 === true){
            return sprintf("%02d:%02d:%02d", 
                $this->hora, $this->minutos, $this->segundos);
        } else {
            $hora12 = $this->hora % 12;
            if ($hora12 == 0) $hora12 = 12;
            $ampm = ($this->hora < 12) ? "am" : "pm";
            
            return sprintf("%02d:%02d:%02d %s", 
                $hora12, $this->minutos, $this->segundos, $ampm);
        }
    }
    
    // Cambiar formato
    public function  cambiarFormato24( bool $formato24){
        $this->formato24 = $formato24;
    }
    
    // Incrementa un segundo
    public function tictac (){
        $this->segundos++;

        if ($this->segundos >= 60){
            $this->segundos = 0;
            $this->minutos++;
        }

        if ($this->minutos >= 60){
            $this->minutos = 0;
            $this->hora++;
        }

        if ($this->hora >= 24){
            $this->hora = 0;
        }
    }
    
    // Comparar: devuelve diferencia en segundos
    public function comparar ( Reloj $otroreloj){
        
        $s1 = $this->hora * 3600 + $this->minutos * 60 + $this->segundos;
        $s2 = $otroreloj->hora * 3600 + $otroreloj->minutos * 60 + $otroreloj->segundos;

        return abs($s1 - $s2);
    }    
}
