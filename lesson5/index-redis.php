<?php
require_once('vendor/autoload.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

class redisCacheProvider {
	const REDIS_SERVER = '127.0.0.1';
    const  REDIS_PORT = '6379';
    private $connection = null;
    private function getConnection(){
        if($this->connection===null){
            $this->connection = new Redis();
            $this->connection->connect(REDIS_SERVER, REDIS_PORT);
        }
        return $this->connection;
    }

    public function get($key){
        $result = false;
        if($c = $this->getConnection()){
            $result = unserialize($c->get($key));
        }
        return $result;
    }
    public function set($key, $value, $time=0){
        if($c=$this->getConnection()){
            $c->set($key, serialize($value), $time);
        }
    }

    public function del($key){
        if($c=$this->getConnection()){
            $c->delete($key);
        }
    }

    public function clear(){
        if($c=$this->getConnection()){
            $c->flushDB();
        }
    }
}

?>
<?php
$a = new redisCacheProvider();?>
<div style="display: flex;">
    <?php  $key= '1';
    $value= '<div class="holder">    
    <p>Good 1</p>
    <div class="block">
        <h2>Good1</h2>
        Description of Good 1
    </div>
</div>
</div>';
    $a->setCash($key,$value);?>
    <?php  $key= '2';
    $value= '<div class="holder">    
    <p>Good 2</p>
    <div class="block">
        <h2>Good 2</h2>
        Description of Good 2
    </div>
</div>
</div>';
    $a->setCash($key,$value);?>
    <?php  $key= '3';
    $value= '<div class="holder">    
    <p>Good 3</p>
    <div class="block">
        <h2>Good 3</h2>
        Description of Good 3
    </div>
</div>
</div>';
    $a->setCash($key,$value);?>


    <?php echo $a->getCash(1);?>
    <?php echo $a->getCash(2);?>
    <?php echo $a->getCash(3);?>

</div>


</body>
</html>




