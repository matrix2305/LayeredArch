<?php
declare(strict_types = 1);

namespace AppCore\Entities;

class Post
{
    private $id, $tittle, $text;


    /**
     * @return integer
     */

    public function GetID() : int
    {
        return $this->id;
    }

    public function GetTittle() : string
    {
        return $this->tittle;
    }

    public function GetText() : string
    {
        return $this->text;
    }

    public function SetID($input){
        $this->id = $input;
    }

    public function SetTittle($input){
        $this->tittle = $input;
    }

    public function SetText($input){
        $this->text = $input;
    }

}