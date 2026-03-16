<?php

class Pokemon
{
    private string $nombre;
    private string $tipo;
    private array $elemento;
    private array $ataque;
    private array $vida;
    private int $nivel;
    public function __construct(string $nombre, string $tipo, array $elemento, string $ataque, int $damage, int $precision, int $vida){
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->elemento = $elemento;
        $this->ataque['nombre'] = $ataque;
        $this->ataque['damage'] = $damage;
        $this->ataque['precision'] = $precision;
        $this->vida['total'] = $vida;
        $this->vida['actual'] = $vida;
        $this->nivel = 1;
    }

    /**
     * Devuelve el nombre del pokemon con su tipo
     *
     * @return string
     */
    public function MostrarInfo() : string{
        return $this->nombre . " - " . $this->tipo;
    }

    /**
     * Devuelve un array con los elementos del pokemon
     *
     * @return array
     */
    public function MostrarElementos() : array{
        return $this->elemento;
    }

    /**
     * Sube el nivel del pokemon, aumentando su vida
     *
     * @return void
     */
    public function Evolucionar() : void{
        $this->nivel += 1;
        $this->vida['actual'] += 10;
        $this->vida['total'] += 10;
    }

    /**
     * El pokemon va a quitarle su ataque a la vida de otro pokemon
     * una probabilidad de acertar dependiendo de su precision
     *
     * @param Pokemon $pokemon Pokemon que va a ser víctima del ataque
     * @return string Devuelve un mensaje con el movimiento usado
     */
    public function Atacar(Pokemon $pokemon) : string{
        if(rand(1, 100) <= $this->ataque['precision']){
            $pokemon->vida -= $this->ataque['damage'];
            return "$this->nombre uso ". $this->ataque['nombre']. "haciendo $this->ataque['damage'] de daño";
        } else {
            return "$this->nombre uso $this->ataque['nombre'] pero falló";
        }

    }
}