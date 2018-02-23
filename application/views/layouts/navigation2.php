        
        <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                <!-- BEGIN: Left Aside -->
                <button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-light ">
                    <!-- BEGIN: Aside Menu -->
    <div 
        id="m_ver_menu" 
        class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " 
        data-menu-vertical="true"
         data-menu-scrollable="true" data-menu-dropdown-timeout="500"  
        >
                        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                            <?php 
                                if ($this->session->userdata('level') == "1") {
                                    ?>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-layers"></i>
                                    <span class="m-menu__link-text">
                                        Data Master
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                            <span class="m-menu__link">
                                                <span class="m-menu__link-text">
                                                    Data Master
                                                </span>
                                            </span>
                                        </li>
                                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                            <a  href="<?php echo site_url('user') ?>" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                    User
                                                </span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                            <a  href="#" class="m-menu__link m-menu__toggle">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                    Transportasi
                                                </span>
                                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="m-menu__submenu ">
                                                <span class="m-menu__arrow"></span>
                                                <ul class="m-menu__subnav">
                                                    <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                                        <a  href="<?php echo site_url('Transportasi/pesawat') ?>" class="m-menu__link ">
                                                            <i class="m-menu__link-icon fa fa-plane"></i>
                                                            <span class="m-menu__link-title">
                                                                <span class="m-menu__link-wrap">
                                                                    <span class="m-menu__link-text">
                                                                        Pesawat
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                                        <a  href="<?php echo site_url('Transportasi/kereta') ?>" class="m-menu__link ">
                                                            <i class="m-menu__link-icon fa fa-train"></i>
                                                            <span class="m-menu__link-title">
                                                                <span class="m-menu__link-wrap">
                                                                    <span class="m-menu__link-text">
                                                                        Kereta Api
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                            <a  href="<?php echo site_url('tipe') ?>" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                    Tipe Transportasi
                                                </span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                            <a  href="#" class="m-menu__link m-menu__toggle">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                    Rute
                                                </span>
                                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="m-menu__submenu ">
                                                <span class="m-menu__arrow"></span>
                                                <ul class="m-menu__subnav">
                                                    <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                                        <a  href="<?php echo site_url('rute/pesawat') ?>" class="m-menu__link ">
                                                            <i class="m-menu__link-icon fa fa-plane"></i>
                                                            <span class="m-menu__link-title">
                                                                <span class="m-menu__link-wrap">
                                                                    <span class="m-menu__link-text">
                                                                        Pesawat
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                                        <a  href="<?php echo site_url('rute/kereta') ?>" class="m-menu__link ">
                                                            <i class="m-menu__link-icon fa fa-train"></i>
                                                            <span class="m-menu__link-title">
                                                                <span class="m-menu__link-wrap">
                                                                    <span class="m-menu__link-text">
                                                                        Kereta Api
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                            <a  href="<?php echo site_url('bandara') ?>" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                    Bandara
                                                </span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                            <a  href="<?php echo site_url('stasiun') ?>" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                    Stasiun
                                                </span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                                    <?php
                                }
                             ?>
                        </ul>
                    </div>
                    <!-- END: Aside Menu -->
                </div>
                <!-- END: Left Aside -->
                