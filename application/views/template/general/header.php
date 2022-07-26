<?php $user = $this->session->userdata('signapps'); ?>
<div class="logo center">
    <img src ="<?php echo base_url() ?>assets/images/sign_apps_pic.png" alt = "icon_web" width="73px" height="73px" />
</div>
<div class="headerinner">
    <ul class="headmenu">          
        <li class="right">
            <div class="userloggedinfo">
                <?php if (!empty($user[0]->foto)) { ?>
                    <img src = "<?php echo base_url() . $user[0]->foto; ?>" alt = "<?php echo base_url() . $user[0]->foto; ?>" />
                <?php } else { ?>
                    <img src = "<?php echo base_url() ?>/uploads/no_image.jpg" alt = "no image" />
                <?php } ?>
                <div class = "userinfo">
                    <h5><?php echo ucwords($user[0]->username);
                ?> <small>- <?php echo $user[0]->email; ?></small></h5>
                    <ul>                       
                        <li><a href="<?php echo site_url('auth/do_logout'); ?>">Keluar</a></li>                        
                    </ul>
                </div>
            </div>
        </li>
    </ul><!--headmenu-->
</div>