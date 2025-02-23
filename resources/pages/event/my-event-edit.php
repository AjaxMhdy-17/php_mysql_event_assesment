<?php
veiwAllErrors();
userNotLoggedInRedirectToLogin();

$event = fetchMyEventWithId();

if($event['user_id'] != getUserId()){
    die("Error : Unauthorized user") ; 
}




$start = explode(' ', $event['start_time']);
$startDate = $start[0];
$startTime = $start[1];

$end = explode(' ', $event['end_time']);
$endDate = $end[0];
$endTime = $end[1];

?>

<section class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
        <div class="my-3">
            <h3 class="page-heading my-3">Update Event</h3>
        </div>
        <form action="/ollyo/public/index.php?page=my-event-update" class="form-card" method="post">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name='event_id' value="<?php echo $event['id'] ?>">

            <div class="my-3">
                <label for="topic">Event Topic</label>
                <input type="text" name="topic" class="form-control" value="<?php echo $event['topic'] ?>">
            </div>

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
            <div class="my-3">
                <button class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</section>