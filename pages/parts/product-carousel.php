<div id="<?=$product['slug']?>-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        foreach($product['images'] as $key => $image):
            ?>
            <div class="carousel-item <?php if($key ===0) echo "active";?>" style="background-image: url('/images/<?=$product['id']?>/<?=$image;?>')">
            </div>
        <?php endforeach;?>
    </div>
    <a class="carousel-control-prev" href="#<?=$product['slug']?>-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
    <a class="carousel-control-next" href="#<?=$product['slug']?>-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
</div>
