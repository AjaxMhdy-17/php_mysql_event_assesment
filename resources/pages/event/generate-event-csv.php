<?php

veiwAllErrors();
$adminCheck = getUserRole();
if ($adminCheck != 'admin') {
    die("Error : Something Went Wrong");
}
$id = intval($_REQUEST['params'][1]);
$export = generateUsersDataForEachEvent();

?>
<div>
    <a class="btn btn-success" href="/ollyo/public/index.php?page=my-event-detail/<?php echo $id; ?>/detail">Back</a>
    <a class="btn btn-info" href="/ollyo/public/index.php?page=submitted-events">All Events list</a>
</div>