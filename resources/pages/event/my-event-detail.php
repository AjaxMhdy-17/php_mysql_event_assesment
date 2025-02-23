<?php
veiwAllErrors();
userNotLoggedInRedirectToLogin();
$event = fetchMyEventWithId();
$users = fetAllUsersAttendingThisEvent();
$start = explode(' ', $event['start_time']);
$startDate = $start[0];
$startTime = substr($start[1], 0, 5);
$end = explode(' ', $event['end_time']);
$endDate = $end[0];
$endTime = substr($end[1], 0, 5); 
?>

<section class="row">
    <div class="col-md-6 col-lg-8 <?php echo((getUserRole() != 'admin') ? 'mx-auto' : '') ?> ">
        <div class="my-3 page-heading d-flex justify-content-between">
            <h3 class="">
                Event Details</h3>

                

            <?php if (getUserRole() == 'admin'): ?>
                <a href="/ollyo/public/index.php?page=generate-event-csv/<?php echo $event['id']; ?>/details" class="btn btn-info">
                    Download Records
                </a>
            <?php endif; ?>
        </div>
        <form method="post" class="page-heading">
            <div class="my-3">
                <label for="name">Event Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $event['name'] ?>">
            </div>
            <div class="my-3">
                <label for="name">Event Description</label>
                <textarea name="description" id="" class="form-control"><?php echo trim($event['description'], " "); ?></textarea>
            </div>
            <div class="my-3">
                <label for="name">Event Seat Limit</label>
                <input type="number" name="seat_limit" min=1 class="form-control" value="<?php echo $event['seat_limit'] ?>">
            </div>
            <div class="my-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="event_start_time">Event Start Time</label>
                        <input type="time" id="event_start_time" value="<?php echo $startTime; ?>" name="event_start_time" class="form-control" placeholder="Event Start Time">
                    </div>
                    <div class="col-md-6">
                        <label for="event_end_time">Event End Time</label>
                        <input type="time" id="event_end_time" value="<?php echo $endTime; ?>" name="event_end_time" class="form-control" placeholder="Event End Time">
                    </div>
                </div>

            </div>
        </form>
    </div>
    <?php if (getUserRole() == 'admin') { ?>
        <div class="col-md-6 col-lg-4">
            <div class="my-3">
                <?php foreach ($users as $user) { ?>
                    <div class="page-heading my-2">
                        <h6>
                            Name: <?php echo $user['name'] ?>
                        </h6>
                        <p>
                            Email: <?php echo $user['email'] ?>
                        </p>
                        <p>
                            Role: <?php echo $user['role'] ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }  ?>

</section>