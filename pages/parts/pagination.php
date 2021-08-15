<nav>
    <ul class="pagination">
        <?php
        $current_page = ($_GET['page']) ?? 1;
        for ($i = 1; $i <= $total_pages; $i++):
            $current_class = '';
            if ($current_page == $i) {
                $current_class = 'bg-primary text-light';
            }
            ?>
            <li class="page-item">
                <a class="page-link <?=$current_class?>"
                   href="<?php echo ($current_page == $i) ? '#' : '?page=' . $i; ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>