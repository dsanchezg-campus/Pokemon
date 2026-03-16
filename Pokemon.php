<?php

class Pokemon
{
    private string $nombre;
    private string $tipo;
    private array $elemento;
    private array $movimientos;
    private array $vida;
    private int $nivel;
    private int $ataque;
    private int $defensa;
    private int $velocidad;
    public function __construct(string $nombre, string $tipo, array $elemento, string $movimiento, int $damage, int $precision, int $usos,
                                int $vida, int $ataque, int $defensa, int $velocidad){
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->elemento = $elemento;
        $this->movimientos[]['nombre'] = $movimiento;
        $this->movimientos[]['damage'] = $damage;
        $this->movimientos[]['precision'] = $precision;
        $this->movimientos[]['usosTotal'] = $usos;
        $this->movimientos[]['usosActual'] = $usos;
        $this->movimientos[]['activo'] = true;
        $this->vida['total'] = $vida;
        $this->vida['actual'] = $vida;
        $this->ataque = $ataque;
        $this->defensa = $defensa;
        $this->velocidad = $velocidad;
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
    public function Evolucionar(int $vida, int $ataque, int $defensa, int $velocidad) : void{
        $this->nivel += 1;
        $this->vida['actual'] += $vida;
        $this->vida['total'] += $vida;
        $this->ataque += $ataque;
        $this->defensa += $defensa;
        $this->velocidad += $velocidad;
    }

    /**
     * El pokemon va a quitarle su ataque a la vida de otro pokemon
     * una probabilidad de acertar dependiendo de su precision
     *
     * @param Pokemon $pokemonDef Pokemon que va a ser víctima del ataque
     * @param int $idAtq Ataque ha realizar, posición del array de movimientos
     * @return string Devuelve un mensaje con el movimiento usado
     */
    public function Atacar(Pokemon $pokemonDef, int $idAtq ) : string{
        if(rand(1, 100) <= $this->movimientos[$idAtq]['precision']){
            $dano = ($this->movimientos[$idAtq]['potencia'] * $this->ataque) / $pokemonDef->defensa;
            $pokemonDef->vida['actual'] -= $dano;
            return "$this->nombre uso ". $this->movimientos[$idAtq]['nombre']. "haciendo $dano de daño";
        } else {
            return "$this->nombre uso $this->ataque['nombre'] pero falló";
        }

    }
}