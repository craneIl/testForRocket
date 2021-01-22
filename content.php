<?php 
class Tools {
    static function connect(
        $host="localhost",
        $user="root",
        $pass="",
        $dbname="rocket_db"
    ){
        $cs='mysql:hosts='.$host.';dbname='.$dbname.';charset=utf8';

        $options = array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'
        );
        try{
            $pdo = new PDO ( 
                $cs, 
                $user, 
                $pass, 
                $options
            );
            return $pdo;
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}

class News{
    public $id, $date, $header ;

    function __construct($id, $date, $header){
        $this->id=$id;
        $this->date=$date;
        $this->header=$header;
    }
    static function getNews(){
        $ps = null;

        try{
            $pdo = Tools::connect();
            $ps=$pdo->prepare('SELECT * FROM news');
            $ps->execute();

            while($row=$ps->fetch()){
                $new = new News(
                    $row['id'],
                    $row['date'],
                    $row['header']
                );
                $news[] = $new;
            }
            return $news;
        } catch(PDOException $e){
            echo $e->getMessage();
			return false;
        }
    }

    static function showNews($news, $qnt){
        for($i=0; $i<1; $i++){
            echo '<div class="carousel-item bg-white active mt-3 w-100">';    
            echo    '<div class="carousel-caption d-none d-md-block w-100 py-0 ">',
                        '<div class="d-flex justify-content-between">';
                
                    for($j=$i*3; $j<$i*3+3; $j++){
                        echo '<div class="card  mr-2 ">',
                                '<div class="d-flex flex-column align-items-start px-4">',
                                    '<p class=" text-dark text-muted pt-4 ">'.$news[$j]->date.'</p>',
                                    '<h4 class="card-text text-dark text-left">'.$news[$j]->header.'</h4>',
                                    '<a href="#" class="btn border border-danger btnNews text-danger "> Подробнее</a>',
                                '</div>',
                            '</div>';
                    }
            echo        '</div>',
                    '</div>',
                '</div>';
        }
        
        
        
        for($i=1; $i<$qnt; $i++){
            echo '<div class="carousel-item bg-white mt-3 w-100 ">';
            echo    '<div class="carousel-caption d-none d-md-block w-100 py-0">',
                        '<div class="d-flex justify-content-between">';
                
                    for($j=$i*3; $j<$i*3+3; $j++){
                        echo '<div class="card  mr-2 ">',
                                '<div class="d-flex flex-column align-items-start px-4">',
                                    '<p class=" text-dark text-muted pt-4 ">'.$news[$j]->date.'</p>',
                                    '<h4 class="card-text text-dark text-left">'.$news[$j]->header.'</h4>',
                                    '<a href="#" class="btn border border-danger btnNews text-danger "> Подробнее</a>',
                                '</div>',
                            '</div>';
                    }
            echo        '</div>',
                    '</div>',
                '</div>';
        }

    }
}
?>