<?php
veiwAllErrors();
userNotLoggedInRedirectToLogin();
userRoleAttendee() ; 
?>

<section class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
        <div class="my-3">
            <h3 class="page-heading my-3">Create Event</h3>
        </div>
        <form action="/ollyo/public/index.php?page=create-event-handler" class="form-card my-3" method="post">
            <div class="my-3">
                <label for="topic">Event Topic</label>
                <input type="text" name="topic" class="form-control">
            </div>
            <div class="my-3">
                <label for="name">Event Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="my-3">
                <label for="name">Event Description</label>
                <textarea name="description" id="" class="form-control"></textarea>
            </div>
            <div class="my-3">
                <label for="name">Event Seat Limit</label>
                <input type="number" name="seat_limit" min=1 class="form-control">
            </div>
            <div class="my-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="event_start_date">Event Start Date</label>
                        <input type="date" id="event_start_date" name="event_start_date" class="form-control" placeholder="Event Start Date">
                    </div>
                    <div class="col-md-6">
                        <label for="event_start_time">Event Start Time</label>
                        <input type="time" id="event_start_time" name="event_start_time" class="form-control" value="15:00">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="event_end_date">Event End Date</label>
                        <input type="date" id="event_end_date" name="event_end_date" class="form-control" placeholder="Event End Date">
                    </div>
                    <div class="col-md-6">
                        <label for="event_end_time">Event End Time</label>
                        <input type="time" id="event_end_time" name="event_end_time" class="form-control" value="18:00">
                    </div>
                </div>
            </div>
            <div class="my-3">
                <button class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
</section>