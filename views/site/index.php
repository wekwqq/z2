<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Claim;
use yii\bootstrap5;
/** @var yii\web\View $this */

$this->title = 'Главная';
?>

<div class="site-index">    
<center><img src="../web/logo/logo.png" alt="image"  width="270" height="172"></center>
<h1><center> Добро пожаловать! </center></h1>
<p align="justify">Городской портал "Сделаем лучше вместе!" </p>
<p id="count">Счетчик обновится в ближайшие 3 секунды!</p>

</div>


<?php $claims=Claim::find()->where(['status'=>'Решена'])->orderBy(['time'=>SORT_DESC])->limit(4)->all();
echo "<div class='d-flex flex-row flex-wrap justify-content-start align-items-end'>";
foreach ($claims as $claim){
        echo "<div class='card m-1' style='width:22%; min-width: 300px; height:50%; min-height:500px;'>
 <a href='/claim/view?id={$claim->id}'><img src='{$claim->photoaft}' data-before='$claim->photobef' data-after='$claim->photoaft'onMouseOver='hover(this)' onMouseOut='back(this)'class='card-img-top' style='height: 300px; width: 300px;' alt='image'></a>
 <div class='card-body'>
 <h5 class='card-title'>{$claim->name}</h5>
 <p >{$claim->description}</p>";      
echo "</div>
</div>";
}
?>

<script>

var i = 0;

function hover(el){
el.src=el.dataset.before;
}

function back(el){
el.src=el.dataset.after;
}

function updateCount(){
        $.ajax({
                type:'GET',
                url:'<?= Url::toRoute('/site/count')?>',
                dataType: 'text',
                success: function(response){
                        if(i!= response){
                                var audio = new Audio('../sound/Notif.mp3'); 
                                audio.play();
                                i = response;

                        }
                         $('#count').html('Решено заявок: ' + response);
                }
});       
}
setInterval(updateCount,3000);
</script>
