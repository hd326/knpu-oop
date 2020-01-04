<?php

namespace Model;

trait SettableJediFactorTrait
{
    private $jediFactor;

    public function getJediFactor()
    {
        return $this->jediFactor;
    }
  
    public function setJediFactor($jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }
}
// Traits cannot be instantiated directly, the purpose is the share code