<div class="modal fade" id="signupModalLable" tabindex="-1" aria-labelledby="signupModalLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLable">Singup to Speedup Forum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/partials/_handleSignup.php" method="post">
                    <div class="mb-3">
                        <label for="signupusername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="signupusername" name="signupusername"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="useremail" name="useremail"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="signuppassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signuppassword" name="signuppassword">
                    </div> 
                    <div class="mb-3">
                        <label for="signupcpassword" class="form-label">Conform Password</label>
                        <input type="password" class="form-control" id="signupcpassword" name="signupcpassword">
                    </div>
                    <button type="submit" class="btn btn-primary signup">signup</button>
                </form>
            </div>
        </div>
    </div>
</div>