<?php

veiwAllErrors();
$event = fetchViewEvent();
$status = checkIsEventRequestSendOrNot();
$number = numberOfAttendeeinThisEvent() ; 
?>


<section class="light">
    <div class="container py-2">
        <article class="postcard light green">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="/ollyo/public/assets/images/details.jpg" alt="Image Title" />
            </a>
            <div class="postcard__text t-dark">
                <h1 class="postcard__title green"><a href="#"><?php echo $event['name'] ?></a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2" style="margin-right: 5px;"></i> <?php $start = explode(' ', $event['start_time']);
                                                                                            $startDate = $start[0];
                                                                                            $startTime = $start[1];
                                                                                            $date = new DateTime('2025-01-29');
                                                                                            echo $date->format("jS F, Y"); ?>
                    </time>
                    <span>
                        by <?php echo $event['user_name']; ?>
                    </span>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt"><?php echo $event['description'] ?> </div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"><i class="fas fa-tag mr-2" style="margin-right: 5px;"></i>
                        <?php echo $event['topic'] ?>
                    </li>
                    <li class="tag__item"><i class="fas fa-clock mr-2" style="margin-right: 5px;"></i>
                        <?php
                        $start = explode(' ', $event['start_time']);
                        $end = explode(' ', $event['end_time']);
                        $startTime = $start[1];
                        $endTime = $end[1];
                        echo "start:" . $startTime . " end: " . $endTime;
                        ?>
                    </li>
                    <li class="tag__item"><i class="fas fa-tag mr-2" style="margin-right: 5px;"></i> <?php echo ($event['seat_limit'] - $number >= 1) ? 'Only ' .($event['seat_limit'] - $number) . ' Seat left' : "Event Filled Up"; ?> </li>
                    <li class="">
                        <form id="loginFor" method="POST" action="/ollyo/public/index.php?page=event-join/<?php echo $event['id']; ?>/<?php echo getUserId(); ?>/join">
                            <input type="hidden" name="event_id" value="<?php echo $event['id'] ?>">
                            <input type="hidden" name="user_id" value="<?php echo getUserId() ?>">
                            <?php if ($status == 0 && (getUserRole() == 'attendee') || getUserRole() == 'event_maker') { ?>
                                <button type="submit" class="btn btn-success"  <?php echo ($event['seat_limit'] - $number == 0) ? "disabled" : "" ?> style="padding: 1px 20px;"><i class="fas fa-play" style="margin-right: 5px;"></i> <?php echo ($event['seat_limit'] - $number == 0) ? "Can not join this event" : "Join Now" ?></button>
                            <?php } else if ($status == 1) { ?>
                                <button type="button" disabled class="btn btn-success" style="padding: 1px 20px;"><i class="fas fa-play" style="margin-right: 5px;"></i>Joining Request Approved</button>
                            <?php  } else if ($status == 2) { ?>
                                <button type="button" disabled class="btn btn-success" style="padding: 1px 20px;"><i class="fas fa-play" style="margin-right: 5px;"></i>Joining Request Pending</button>
                            <?php } ?>
                        </form>

                        <?php if (getIsLoggedIn() == null) { ?>
                            <button type="button" disabled class="btn btn-success" style="padding: 1px 20px;"><i class="fas fa-play" style="margin-right: 5px;"></i>Please Login to Join the event</button>
                        <?php } ?>

                    </li>
                </ul>
            </div>
        </article>
    </div>
</section>