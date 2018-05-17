
            <div class="fundpress-tab-nav-v5">
                <h5 id="wp_fundraising_msg"></h5>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#login" role="tab" data-toggle="tab">
                            <?php echo wf_login_label(); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#signup" role="tab" data-toggle="tab">
                            <?php echo wf_signup_label(); ?>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- fundpress-tab-nav-v3 -->
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fadeInRights show fade in active" id="login">
                    <form action="#" method="post" id="wp_fundraising_login_form">
                        <div class="xs-input-group-v2">
                            <i class="icon icon-profile-male"></i>
                            <input type="text" id="login_user_name" class="fundpress-required xs-input-control" name="user_name" placeholder="<?php esc_attr_e('Enter your username','wp-fundraising');?>">
                        </div>
                        <div class="xs-input-group-v2">
                            <i class="icon icon-key2"></i>
                            <input type="password" name="user_password" id="login_user_pass" class="fundpress-required xs-input-control" placeholder="<?php esc_attr_e('Enter your password','wp-fundraising');?>">
                        </div>
                        <?php do_action('wf_login_recaptcha');?>
                        <div class="xs-submit-wraper xs-mb-20">
                            <input type="submit" name="submit" value="<?php echo wf_login_button_text(); ?>" id="xs_contact_get_action" class="btn btn-warning btn-block">
                        </div>
                    </form>
                </div><!-- tab-pane -->

                <div role="tabpanel" class="tab-pane fadeInRights fade" id="signup">
                    <form action="#" method="POST" id="wp_fundraising_register_form">
                        <div class="xs-input-group-v2">
                            <i class="icon icon-profile-male"></i>
                            <input type="text" name="name" id="xs_register_name" class="fundpress-required xs-input-control" placeholder="<?php esc_attr_e('Enter your username','wp-fundraising');?>">
                        </div>
                        <div class="xs-input-group-v2">
                            <i class="icon icon-envelope2"></i>
                            <input type="email" name="email" id="xs_register_email" class="fundpress-required xs-input-control" placeholder="<?php esc_attr_e('Enter your email','wp-fundraising');?>">
                        </div>
                        <div class="xs-input-group-v2">
                            <i class="icon icon-key2"></i>
                            <input type="password" name="name" id="xs_register_password" class="fundpress-required xs-input-control" placeholder="<?php esc_attr_e('Enter your password','wp-fundraising');?>">
                        </div>
                        <?php do_action('wf_registration_recaptcha');?>
                        <div class="xs-submit-wraper xs-mb-20">
                            <input type="submit" name="submit" value="<?php echo wf_signup_button_text(); ?>" id="xs_register_get_action" class="btn btn-warning btn-block">
                        </div>
                    </form>
                </div><!-- tab-pane -->
            </div><!-- tab-content -->
        </div>
    </div>
</div>