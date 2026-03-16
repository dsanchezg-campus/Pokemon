<?php

class Entrenadora
{
    private string $nombre;
    private array $pokemon;
    public function __construct(string $nombre){
        $this->nombre = $nombre;
    }

    /**
     * Devuelve el nombre de la entrenadora
     *
     * @return string
     */
    public function MostrarInfo(): string{
        return $this->nombre;
    }

    /**
     * Añade un pokemon al array de pokemones de la entrenadora
     *
     * @param Pokemon $pokemon
     * @return void
     */
    public function CapturarPokemon(Pokemon $pokemon) : void{
        $this->pokemon[] = $pokemon;
    }
}