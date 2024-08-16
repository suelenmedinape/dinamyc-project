<?php
    namespace AvaliacaoPW\Database;

    require __DIR__.'/../Model/Cliente.class.php';

    use AvaliacaoPW\Model\Cliente;

    class ClienteDatabase {
        private $clientes;
        private $arquivo;
        public function __construct() {
            $this->arquivo = fopen(__DIR__.'/clientes.txt', 'r');
            $this->clientes = [];            
        }        
        
        public function lerArquivo() {            
            while (!feof($this->arquivo)) {                
                $c = new Cliente();
                for ($i = 0; $i < 5; $i++) {                    
                    switch($i) {
                        case 0:
                            $c->setId(rtrim(fgets($this->arquivo)));
                        break;
                        case 1:
                            $c->setNome(\rtrim(fgets($this->arquivo)));
                        break;
                        case 2:
                            $c->setAvatar(\rtrim(fgets($this->arquivo)));
                        break;
                        case 3:
                            $c->setReceitas(array_map('floatval', explode(' ', \rtrim(fgets($this->arquivo)))));
                        break;
                        case 4:
                            $c->setDespesas(array_map('floatval', explode(' ', \trim(fgets($this->arquivo)))));
                        break;
                    }
                }
                array_push($this->clientes, $c);
                fgets($this->arquivo);
            }
            fclose($this->arquivo);
        }

        /**
         * @return array contendo todos os clientes lidos do arquivo
         */
        public function getClientes() {
            return $this->clientes;
        }
    }

?>