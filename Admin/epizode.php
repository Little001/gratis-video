<?php
    class epizode { 
        public $name;
        public $serie_number; 
        public $epizode_number;
        public $path;
        public $visited;

        public function __construct ($name, $serie_number, $epizode_number, $path, $visited) {
            $this->name = $name;
            $this->serie_number = $serie_number;
            $this->epizode_number = $epizode_number;
            $this->path = $path;
            $this->visited = $visited;
        } 
    } 
?>