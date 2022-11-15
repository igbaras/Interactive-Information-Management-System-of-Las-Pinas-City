<!-- Login Modal -->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Chivo:wght@400;700&family=Poppins:wght@400;600&display=swap');

  body {
    font-family: 'Poppins', sans-serif;
    background: #DADFD9;
    color: #00180A;
  }
</style>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style=" background: #DADFD9;  color: #00180A;">
      <div class="modal-header" style="background-color:#CAD2C9;">
        <h5 class="modal-title" id="loginModal">Login Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="public_users/_handleLogin.php" method="post">
          <div class="text-left my-2">
            <b><label for="username">Username</label></b>
            <input class="form-control border-secondary" id="loginusername" name="loginusername" placeholder="Enter Your Username" type="text" required>
          </div>
          <div class="text-left my-2">
            <b><label for="password">Password</label></b>
            <input class="form-control border-secondary" id="loginpassword" name="loginpassword" placeholder="Enter Your Password" type="password" required data-toggle="password" required style="color: #00180A;">
          </div>
          <button type="submit" class="btn btn-warning">Submit</button>
        </form>
        <p class="mb-0 mt-1">Don't have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Sign up now</a>.</p>
      </div>
    </div>
  </div>
</div>