<?php

require_once './stricttype.php';


interface Model{
    public static function getModelName(): string;
}