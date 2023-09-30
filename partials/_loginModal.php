<div class="modal fade" id="loginModalLable" tabindex="-1" aria-labelledby="loginModalLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLable">Singup to Speedup Forum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/forum/partials/_handleLogin.php" method="post">
                    <div class="mb-3">
                        <label for="loginemail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="loginemail" name="loginemail"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="loginpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginpassword" name="loginpassword">
                    </div> 
                    <button type="submit" class="btn btn-primary login">login</button>
                </form>
            </div>
        </div>
    </div>
</div>