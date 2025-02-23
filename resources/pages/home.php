<?php
veiwAllErrors();
$events = fetchUnAttentedEvents();
?>

<section class="wrapper">
    <div class="container">
        <div class="row">

            <?php if (count($events) > 0) { ?>
                <?php foreach ($events as $event) { ?>
                    
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <div class="card text-dark card-has-bg click-col">
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="card-body">
                                    <small class="card-meta mb-2"><?php echo $event['topic'] ?></small>
                                    <h4 class="card-title mt-0 ">
                                        <a href="/ollyo/public/index.php?page=event-view/<?php echo $event['id'] ?>/details" class="text-dark text-capitalize"><?php echo $event['name'] ?> </a>
                                    </h4>
                                    <small><i class="far fa-clock"></i> <?php $start = explode(' ', $event['start_time']);
                                                                        $startDate = $start[0];
                                                                        $startTime = $start[1];
                                                                        $date = new DateTime('2025-01-29');
                                                                        echo $date->format("jS F, Y"); ?></small>
                                    <div>
                                        <a href="/ollyo/public/index.php?page=event-view/<?php echo $event['id'] ?>/details" class="text-dark">
                                            <strong><i>view details about this event. <br>
                                                    To join this event click here...</i></strong>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="media">
                                       
                                        <a href="/ollyo/public/index.php?page=about/<?php echo ($event['user_id']) ?>/profile">
                                            <img class="mr-3 rounded-circle" src="/ollyo/public/assets/images/default.png" alt="Generic placeholder image" style="max-width:50px">
                                            <div class="media-body">
                                                <h6 class="my-0 text-dark d-block"><i><?php echo $event['user_name'] ?></i></h6>
                                                <small> <i>Email : </i> <?php echo $event['user_email'] ?></small>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            <?php } else { ?>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="card text-dark card-has-bg click-col">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">
                                <small class="card-meta mb-2">No Data To Show</small>
                                <h4 class="card-title mt-0 ">
                                    <a href="" class="text-dark">No Data To Show</a>
                                </h4>
                                <small><i class="far fa-clock"></i> No Data To Show </small>
                                <div>
                                    <a class="text-dark">
                                        <strong><i>No Data To Show</i></strong>
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="media">
                                    <img class="mr-3 rounded-circle" src="/ollyo/public/assets/images/default.png" alt="Generic placeholder image" style="max-width:50px">
                                    <div class="media-body">
                                        <h6 class="my-0 text-dark d-block"><i>No Data To Show</i></h6>
                                        <small> <i>Email : </i> No Data To Show</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>