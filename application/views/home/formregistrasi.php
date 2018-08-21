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
              <p class="lead">Register to your account</p>
            </div>
            <form class="form-auth-small" action="<?php echo site_url('login/prosesregistrasi');?>" method="post">
              <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nama Depan">
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nama Belakang">
                    </div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="nomer tlp">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
              </div>
              <div class="form-group">
                <select class="form-control" name="group" id="group">
                  <option value="1">Admin</option>
                  <option value="2">Member</option>
                </select>
                <input type="submit" name="submit" class="btn btn-danger" value="Daftar">
              </div>
              Belum mempunyai akun? <a href="<?php echo base_url();?>index.php/login">Login? </a>
            </form>
            <?php if ($message!=null): ?>
                <div class="alert alert-warning"><?php echo $message;?></div>
            <?php endif; ?>
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
