<?php
class Animal
{
  public function bark()
  {
    var_dump('----------1-----------');
    print("<br>");

    echo 'Yeah, it’s barking.' . PHP_EOL;
  }
}

class Dog extends Animal
{
  public $name;
  public $age;

  public function __construct($name, $age=1)
  {
    var_dump('----------2-----------');
    print("<br>");

    $this->name = $name;
    $this->age = $age;
  }
}

class MechaDog extends Dog
{
  private $data;

  public function __construct($name, $age=1)
  {
    var_dump('----------3-----------');
    print("<br>");

    parent::__construct($name);
    $this->data = array(
      'apache' => 'apache',
      'bsd' => 'mit',
      'chef' => 'apache'
    );
  }

  public function proc($arg)
  {
    print("<br>");
    var_dump('----------4-----------');
    print("<br>");

    $path = explode("/", explode(" ", $arg)[0]);
    array_shift($path);
    if( is_null($path) ) {
      var_dump('----------5-----------');
      print("<br>");

      $keys = array();
      while (list($key, $val) = each($this->data)) {
        array_push($keys, $key);
      }
      var_dump($keys);
    }
    else if(count($path) == 2){
      var_dump('----------6-----------');
      print("<br>");

      $this->data[$path[0]] = $path[1];
      echo $path[1] . PHP_EOL;
    }
    else {
      var_dump('----------7-----------');
      print("<br>");

      echo $path[0] . "=>" . $this->data[$path[0]] . PHP_EOL;
    }
  }
}

$mdog = new MechaDog('tom');
$mdog->bark();
echo $mdog->name . PHP_EOL;
echo $mdog->age . PHP_EOL;
$mdog->proc("GET /bsd HTTP/1.1");
