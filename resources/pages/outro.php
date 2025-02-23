<section class="wrapper">
    <div class="container">
        <div class="row">
            <div class="">
                <!-- <div class="cardd text-dark card-has-bg click-col"> -->


                <div class="card-body">
                    <small class="card-meta mb-2">Ollyo Events</small>
                    <h4 class="card-title mt-0 ">
                        <a href="" class="text-dark">This Page is about given assesment, <span class="d-block my-1">This Application is build with php-mysql and bootstrap</span></a>
                    </h4>
                    <div class="mt-5">
                        <a class="text-dark">
                            <strong><i>Functionality added in this application</i></strong>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="my-2">
                                <small><i class="far fa-clock" style="margin-right : 5px"></i>Authentication</small>
                                <ul>
                                    <li>
                                        An user can register and login as a admin or event_maker or attendee
                                    </li>

                                    <li class="">
                                        <ul class="mt-3">
                                            <li>
                                                <h5>Registration :</h5>
                                            </li>
                                            <li>name : admin</li>
                                            <li>email : admin@gmail.com</li>
                                            <li>password : 11111111</li>
                                            <li>role : admin</li>
                                        </ul>
                                        <ul class="mt-3">
                                            <li>
                                                <h5>Login : </h5>
                                            </li>
                                            <li>email : admin@gmail.com</li>
                                            <li>password : 11111111</li>
                                        </ul>
                                    </li>

                                    <li class="">
                                        <ul class="mt-3">
                                            <li>
                                                <h5>Registration :</h5>
                                            </li>
                                            <li>name : event_maker_1</li>
                                            <li>email : event1@gmail.com</li>
                                            <li>password : 11111111</li>
                                            <li>role : event_maker</li>
                                        </ul>
                                        <ul class="mt-3">
                                            <li>
                                                <h5>Login : </h5>
                                            </li>
                                            <li>email : event1@gmail.com</li>
                                            <li>password : 11111111</li>
                                        </ul>
                                    </li>

                                    <li class="">
                                        <ul class="mt-3">
                                            <li>
                                                <h5>Registration :</h5>
                                            </li>
                                            <li>name : attendee_1</li>
                                            <li>email : attendee1@gmail.com</li>
                                            <li>password : 11111111</li>
                                            <li>role : attendee</li>
                                        </ul>
                                        <ul class="mt-3">
                                            <li>
                                                <h5>Login : </h5>
                                            </li>
                                            <li>email : attendee1@gmail.com</li>
                                            <li>password : 11111111</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-5">
                                <a class="text-dark">
                                    <strong><i>Trying to follow Design Patterns in this project</i></strong>
                                </a>
                            </div>
                            <div class="">
                                <ul>
                                    <li class="my-2">
                                        singletone - for database connection 
                                    </li>
                                    <li class="my-2">
                                        MVC pattern - routes reffer to controller 
                                    </li>
                                    <li class="my-2">
                                        Service pattern - Controller pass to Service to apply bussiness logic inside service 
                                    </li>
                                    <li class="my-2">
                                        Repository pattern - Service pass to Repository to deal will tables interaction in database
                                    </li>
                                    <li class="my-2">
                                        finally returned processed data is export in view file by a helper function and show data in a view-page 
                                    </li>
                                    <li class="my-2">
                                        Authentication is validated with front end validation using js and backend validation using php 
                                    </li>
                                    <li class="my-2">
                                        by setting session checked user is logged in or not , which user in currenly logged in 
                                    </li>
                                    <li class="my-2">
                                        by triggering in logged out session has been cleared 
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="my-2">
                                <small><i class="far fa-clock" style="margin-right : 5px"></i>Event Management</small>
                                <ul>
                                    <li>
                                        admin and event_maker can manage his own events by create , view , update and delete
                                    </li>
                                    <ul>
                                        <li>
                                            by register and login as a admin or event maker , user will get <b>create events</b> and <b>my events</b> menu in header
                                        </li>
                                        <li class="my-2">by clicking <b>my events</b> user will get a list inside a table this table is searchable , sortable and support pagination</li>
                                        <li>this table is a list of created events of logged in user</li>
                                        <li class="my-2">user can <b>view , edit and delete event</b> from clicking expected icon of action column</li>
                                        <li>
                                            login as a admin user will get an extra menu in header named <b>All submitted events</b>
                                            by click on this option admin will find all submitted events list view and delete
                                            option button in action column of table ,
                                            by clicking <b>view icon</b> admin will view details of event and list of all attendees
                                            by click in <b>Download Records button</b> admin will download attendee details list
                                            in <b>export folder</b> with event_name in csv format
                                        </li>
                                    </ul>
                                </ul>
                            </div>

                            <div class="my-2">
                                <small><i class="far fa-clock" style="margin-right : 5px"></i>Event Attendee</small>
                                <ul>
                                    <li>
                                        in heading section by clicking events users will get list of all events
                                    </li>
                                    <li>
                                        <b>by clicking on each event , user will view event details</b>
                                    </li>
                                    <li>
                                        by <b>clicking</b> on <b>join now button</b> user will join the event
                                    </li>
                                    <li>
                                        if <b>user is not logged in</b> then user will get <b>non clickable please login to join the event button</b>
                                    </li>
                                    <li>
                                        <b>if user is logged in then user will get join now button</b>
                                    </li>
                                    <li>
                                        by clicking logged in user we will collect all registered without password from users table
                                        this will not force the user to fillup form , will <b>improve ux</b> and user can join in <b>one click solution</b>
                                    </li>
                                    <li>
                                        if user already join or seat limit filled then user will get another not clickable button
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>