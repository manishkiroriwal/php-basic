<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class demo{
        public $clr;
        public $model;

        public function __construct($c,$m){
            $this->clr = $c;
            $this->model = $m;
        }
        public function message(){
            return "My car is a " .$this->clr." ".$this->model."!";
        }
    }
    $demo = new demo("black","BMW");
    print $demo -> message();
    echo "<br>";
    $demo = new demo("white","audi");
    print $demo -> message();
    ?>
</body>
</html>