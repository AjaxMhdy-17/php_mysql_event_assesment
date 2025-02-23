<?php
veiwAllErrors();
userNotLoggedInRedirectToLogin();
$events = fetchMyEventsAsEventMaker();
userRoleAttendee();
?>
<div class="row">
    <div class="col-12">
        <h3 class="page-heading my-3">My Events</h3>
    </div>
    <div class="col-12">
        <table id="myTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Topic</th>
                    <th>Available Seat</th>
                    <th>Attending</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event) { ?>
                    <tr>
                        <td><?php echo $event['event_id']; ?></td>
                        <td><?php echo $event['name']; ?></td>
                        <td><?php echo $event['topic']; ?></td>
                        <td><?php echo $event['seat_limit']; ?></td>
                        <td><?php echo $event['total_attendees']; ?></td>
                        <td class="text-end d-flex justify-content-end">
                            <a href="/ollyo/public/index.php?page=my-event-detail/<?php echo $event['event_id']; ?>/detail" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="View Details"><i class="fa-solid fa-file"></i></a>
                            <a href="/ollyo/public/index.php?page=my-event-edit/<?php echo $event['event_id']; ?>/edit" class="btn btn-warning mx-2" data-toggle="tooltip" data-placement="top" title="Edit Event"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="/ollyo/public/index.php?page=my-event-delete/<?php echo $event['event_id']; ?>/delete" method="POST" id="delete-form-<?php echo $event['event_id']; ?>">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name='event_id' value="<?php echo $event['event_id'] ?>">
                                <button class="btn btn-danger" type="button" style="margin-right: 20px;" onclick="confirmDelete(<?php echo $event['event_id']; ?>)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>