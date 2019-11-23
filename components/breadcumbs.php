<?php

function renderBreadcumb($path = [])
{
    echo '<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
        ';
    if (sizeof($path) > 0) {
        foreach ($path as $page)
            echo '<li class="breadcrumb-item active">' . $page . '</li>';
    }
    echo '
    </ol>
</nav>';
}
