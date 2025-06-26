<?php
include_once "./model/emprestimo.php";
class EmprestimoController 
{
    private $db;
    private $emprestimoModel;

    function __construct($db)
    {
        $this->db = $db;
        $this->emprestimoModel = new Emprestimo($db);
    }

    

}

?>