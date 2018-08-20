<div id="wrapper">
  <div class="vertical-align-wrap">
    <div class="vertical-align-middle">
      <div class="auth-box ">
        <div class="left">
          <div class="content">
            <div class="header">
              <div class="logo text-center">
                <span><h1>GloftMaps</h1></span>
              </div>
              <p class="lead">Login to your account</p>
            </div>
            <form class="form-auth-small" action="<?php echo site_url('login'); ?>" method="post">
              <div class="form-group">
                <label for="signin-email" class="control-label sr-only">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="admin@gmail.com">
              </div>
              <div class="form-group">
                <label for="signin-password" class="control-label sr-only">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
              <div class="form-group clearfix">
                <label class="fancy-checkbox element-left">
                  <input type="checkbox">
                  <span>Remember me</span>
                </label>
              </div>
              <button class="btn-primary btn form-control" id="loginbutton">Login</button>
              <div class="form-group">
                            <p>
                                Belum mempunyai akun? <a href="<?php echo site_url('login/registrasi');?>">Daftar disini</a>
                              </p>
              </div>
            </form>
          </div>
        </div>
        <div class="right">
          <div class="overlay"></div>
          <div class="content text">
            <p>GloftMaps Web Application</p>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>


<!-- <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
    			<div class="panel-heading"><span class="glyphicon glyphicon-log-in"></span> Login</div>
    			<div class="panel-body">
    				<form action="<?php echo site_url('login'); ?>" method="post">
    					<div class="form-group">

    						<label for="email">Email</label>
    						<input type="email" class="form-control" id="email" name="email">
    					</div>
    					<div class="form-group">
    						<label for="password">Password</label>
    						<input type="password" class="form-control" id="password" name="password">
    					</div>
    					<div class="form-group">
    						<button class="btn-primary btn form-control" id="loginbutton">Login</button>
    					</div>
              <div class="form-group">
                            <p>
                                Belum mempunyai akun? <a href="<?php echo site_url('login/registrasi');?>">Daftar disini</a>
                              </p>
              </div>
    				</form>
    			</div>
    		</div>
        </div>
    </div>
</div> -->
