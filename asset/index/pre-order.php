<?php
    $url = "asset/json/pre-order.json";    
    $response = file_get_contents($url);
    $result = json_decode($response);
?>

<style>
    #pre-order {
        background: #F4F5F6;
    }
</style>


<div id="pre-order">
    <div class="row no-gutters padding-content d-flex justify-content-center">
        <div class="container p-0">
            <h2 id="title">Pre-Order</h2>
            <div class="row align-self-start mt-4">
                <?php 
                for ($i=0; $i<count($result); $i++){
                    echo "<div class=\"col-6 col-md \" id=\"books\">";
                    echo "<div class=\"card\" style=\"border: none; text-align: center; padding: 2vh; background: #F4F5F6\">";
                    if ($i < 2){
                        echo "<a href='pages/".$result[$i]->key.".php'> <img class=\"card-img-top img-fluid ml-auto mr-auto mb-3\" src=\"images/cover/pre-order/".$result[$i]->img."\"></a>";
                    }else{
                        echo "<a href=''> <img class=\"card-img-top img-fluid ml-auto mr-auto mb-3\" src=\"images/cover/pre-order/".$result[$i]->img."\"></a>";
                    }
                    
                    if($result[$i]->covertag[0] == "new release"){
                        echo "<div class=\"new-release\"></div>";
                    }
                    else if($result[$i]->covertag[0] == "Pre-Order"){
                        echo "<div class=\"pre-order\"></div>";
                    }
                    else{
                        continue;
                    }
                    
                    echo "<a class=\"thainame mb-1 text-decoration-none\" ";
                    if ($i < 2){
                        echo "href='pages/".$result[$i]->key.".php' id=\"book-title\">";
                    }else{
                        echo "href='' id=\"book-title\">";
                    }

                    echo $result[$i]->thainame;
                    echo "</a>";
                    echo "<a class=\"artist mb-1 text-decoration-none\" href=\"\" id=\"book-author\">";
                    echo $result[$i]->artist;
                    echo "</a>";
                    echo "<p class=\"mb-1\">";
                    echo "<span class=\"price-grey\">";
                    echo "฿".number_format($result[$i]->cost, 2, '.', '');
                    echo "</span>";
                    echo "<span class=\"price-red\">";
                    echo " ฿".number_format(($result[$i]->cost*(100 - $result[$i]->discount))/100, 2, '.', '');
                    echo "</span></p>";
                    echo "<p class=\"price-red\">(Pre-Order)</p></div></div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<hr style="border-top: 1px solid#f0f0f0; margin: 0;">