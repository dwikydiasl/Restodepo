<?php
$totaldata 	= $total;
$res 		= $totaldata%$limit;
$totalpage 	= ($totaldata-$res)/$limit;
if($totaldata <= 0){
    $style = 'style="display:none"';
} else {
    $style = '';
}
if($res>0){
    $totalpage++;
}
if($current==""){
    $current 	= 1;
}

$minbtn 	= $current - 2;
if($minbtn<=0){
    $minbtn = 1;
}

$maxbtn 	= $current + 2;
if($maxbtn>$totalpage){
    $maxbtn = $totalpage;
}
?>


    <nav aria-label="Page navigation example">
        <ul id="pagination" class="pagination">
            <li class="page-item <?php echo (($current-1)<=0)?"disabled":""?>"><a class="page-link" onclick="<?php echo(($current-1)<=0)?"":"prevPage(".$current.")"?>" aria-label="Previous" <?php echo(($current-1)<=0)?'':'style="cursor:pointer"'?><span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span></a></li>
            <?php for($i=$minbtn; $i<=$maxbtn; $i++): ?>
                <?php if($current==$i): ?>
                    <li class="page-item active">
                        <span class="page-link" style="background-color: #20E9AD; border-color: #20E9AD;"><?php echo number_format($i)?> <span class="sr-only">(current)</span></span>
                    </li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" onclick="gotoPage(<?php echo $i?>);" style="cursor:pointer"><?php echo number_format($i)?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
            <li class="page-item <?php echo(($current+1)>$totalpage)?"disabled":""?>"><a class="page-link" onclick="<?php echo(($current+1)>$totalpage)?"":"nextPage(".$current.")"?>" aria-label="Next" <?php echo (($current+1)>$totalpage)?'':'style="cursor:pointer"'?>><span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span></a></li>
        </ul>
    </nav>

