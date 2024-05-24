<?php

class Symbol {
    private $symbol;
    private $value;

    public function __construct($symbol, $value) {
        $this->symbol = $symbol;
        $this->value = $value;
    }

    public function getSymbol() {
        return $this->symbol;
    }

    public function getValue() {
        return $this->value;
    }
}
