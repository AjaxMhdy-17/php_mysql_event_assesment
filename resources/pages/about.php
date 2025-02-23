<?php
veiwAllErrors();
$user = fetchUserProfileInfo();

?>


<section class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                <div class="card text-dark card-has-bg click-col">
                    <div class="card-img-overlay d-flex flex-column">
                        <div class="card-body">
                            <small class="card-meta mb-2">Ollyo Events</small>
                            <h4 class="card-title mt-0 ">
                                <a href="" class="text-dark"><?php echo $user['name'] ?></a>
                            </h4>
                            <small><i class="fa-solid fa-envelope" style="margin-right: 5px;"></i> <?php echo $user['email'] ?></small>
                            <div>
                                <a class="text-dark">
                                    <strong><i class="fa-solid fa-guitar"></i> <?php echo $user['role'] ?></strong>
                                </a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="media">
                                <img class="mr-3 rounded-circle" src="/ollyo/public/assets/images/default.png" alt="Generic placeholder image" style="max-width:50px">
                                <div class="media-body">
                                    <h6 class="my-0 text-dark d-block"><i><?php echo $user['name'] ?></i></h6>
                                    <small> <i>Email : </i> <?php echo $user['email'] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>