<section class="min__height__80vh">

<?php 
    userIsLoggedInRedirectToIndex();
?>

    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
            <h2 class="page-heading">Login Page</h2>
            <form id="loginFor" method="POST" action="/ollyo/public/index.php?page=auth/login-handler">
                <div class="form-row align-items-center form-card">
                    <div class="my-3">
                        <label>Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="text" id="email" name="email" class="form-control" placeholder="User Email">
                        </div>
                        <div class="error" id="emailError"></div>
                    </div>
                    <div class="my-3">
                        <label>Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Password">

                        </div>
                        <div class="error" id="passwordError"></div>
                    </div>
                    <div class="col-auto my-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>