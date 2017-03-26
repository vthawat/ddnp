<div class="col-md-10">
        <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
        </div>
</div>
<div class="col-md-2">
<ul class="list-group">
 <?php foreach($provice_list as $item):?>
    <li class="list-group-item"><i style="color:<?=$item->CHART_COLOR?>;" class="fa fa-fw fa-square"></i><?=$item->PROVINCE_NAME?></li>
 <?php endforeach?>
</ul>
</div>