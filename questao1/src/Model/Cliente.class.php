<?php
    namespace AvaliacaoPW\Model;
 
    class Cliente implements \JsonSerializable {
        private $_id;
        private $nome;
        private $avatar;
        private $receitas;
        private $despesas;

        public function __construct($pId = null, $pAvatar = null, $pNome = null) {
            $this->_id = $pId;
            $this->avatar = $pAvatar;
            $this->nome = $pNome;            
            $this->receitas = [];
            $this->despesas = [];
        }

        public function addReceita($pValor) {
            array_push($this->receitas, $pValor);
        }

        public function addDespesa($pValor) {
            array_push($this->despesas, $pValor);
        }

        public function getId() { return $this->_id; }
        public function setId($pId) { $this->_id = $pId; }

        public function getNome() { return $this->nome; }
        public function setNome($pNome) { $this->nome = $pNome; }

        public function getAvatar() { return $this->avatar; }
        public function setAvatar($pAvatar) { $this->avatar = $pAvatar; }

        public function getReceitas() { return $this->receitas ;}
        public function setReceitas($valores) { 
            foreach($valores as $valor)
                array_push($this->receitas, $valor) ;
        }

        public function getDespesas() { return $this->despesas ;}

        public function setDespesas($valores) { 
            foreach($valores as $valor)
                array_push($this->despesas, $valor) ;
        }

        public function jsonSerialize(): mixed {
            $vars = get_object_vars($this);
            return $vars;
        }

        public function __toString() {
            $ret = "Id: $this->_id<br>"
                    ."Nome: $this->nome<br>"
                    ."Avatar: $this->avatar<br>"
                    ."Receitas: "; 
                    foreach($this->receitas as $valor)           
                            $ret .= $valor." ";
                    $ret .= "<br>Despesas: ";
                    
                    foreach($this->despesas as $valor)           
                            $ret .= $valor." ";
                    $ret .= "<br>";
            return $ret;
        }
    }
?>