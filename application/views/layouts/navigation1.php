
    <!-- end::Body -->
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <!-- BEGIN: Header -->
            <header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
                <div class="m-container m-container--fluid m-container--full-height">
                    <div class="m-stack m-stack--ver m-stack--desktop">
                        <!-- BEGIN: Brand -->
                        <div class="m-stack__item m-brand  m-brand--skin-light ">
                            <div class="m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                    <a href="index.html" class="m-brand__logo-wrapper">
                                        <img height="70" width="75" src="<?php echo base_url('assets/images/logo.png') ?>"/>
                                    </a>
                                    <h3 class="m-header__title">
                                        Apps
                                    </h3>
                                </div>
                                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                    <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                    <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                            <!-- BEGIN: Responsive Header Menu Toggler -->
                                    <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
            <!-- BEGIN: Topbar Toggler -->
                                    <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                        <i class="flaticon-more"></i>
                                    </a>
                                    <!-- BEGIN: Topbar Toggler -->
                                </div>
                            </div>
                        </div>
                        <!-- END: Brand -->
                        <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                            <div class="m-header__title">
                                <h3 class="m-header__title-text">
                                    Tiketu
                                </h3>
                            </div>
                            <!-- BEGIN: Horizontal Menu -->
                            <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn">
                                <i class="la la-close"></i>
                            </button>
                            <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light "  >
                                <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                                    <li class="m-menu__item  <?php echo $aktif ?> m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                        <a  href="<?php echo site_url() ?>" class="m-menu__link">
                                            <span class="m-menu__item-here"></span>
                                            <span class="m-menu__link-text">
                                                Homepage
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item <?php echo $aktiftik ?> m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                        <a  href="#" class="m-menu__link m-menu__toggle">
                                            <span class="m-menu__item-here"></span>
                                            <span class="m-menu__link-text">
                                                Pembelian Tiket
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-down"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                            <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item" data-redirect="true" aria-haspopup="true">
                                                    <a  href="<?php echo site_url('tiket/pesawat') ?>" class="m-menu__link ">
                                                        <i class="m-menu__link-icon fa fa-plane"></i>
                                                        <span class="m-menu__link-text">
                                                            Pesawat
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                    <a  href="<?php echo site_url('tiket/kereta') ?>" class="m-menu__link ">
                                                        <i class="m-menu__link-icon fa fa-train"></i>
                                                        <span class="m-menu__link-text">
                                                            Kereta Api
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php 
                                        if ($this->session->userdata('level') == "1") {
                                            ?>
                                        <li class="m-menu__item  <?php echo $aktiflap ?> m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
                                        <a  href="#" class="m-menu__link m-menu__toggle">
                                            <span class="m-menu__item-here"></span>
                                            <span class="m-menu__link-text">
                                                Laporan
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-down"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu  m-menu__submenu--fixed m-menu__submenu--left" style="width:600px">
                                            <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                            <div class="m-menu__subnav">
                                                <ul class="m-menu__content">
                                                    <li class="m-menu__item">
                                                        <h3 class="m-menu__heading m-menu__toggle">
                                                            <span class="m-menu__link-text">
                                                                Laporan Keuangan
                                                            </span>
                                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                                        </h3>
                                                        <ul class="m-menu__inner">
                                                            <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                                <a  href="<?php echo site_url('laporan/pendapatan') ?>" class="m-menu__link ">
                                                                    <i class="m-menu__link-icon flaticon-graphic-2"></i>
                                                                    <span class="m-menu__link-text">
                                                                        Laporan Pendapatan
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                                <a  href="<?php echo site_url('laporan/pemberangkatan') ?>" class="m-menu__link ">
                                                                    <i class="m-menu__link-icon flaticon-graphic-2"></i>
                                                                    <span class="m-menu__link-text">
                                                                        Laporan Pemberangkatan
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li class="m-menu__item">
                                                        <h3 class="m-menu__heading m-menu__toggle">
                                                            <span class="m-menu__link-text">
                                                                Laporan Aplikasi
                                                            </span>
                                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                                        </h3>
                                                        <ul class="m-menu__inner">
                                                            <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                                <a  href="<?php echo site_url('laporan/penumpang') ?>" class="m-menu__link ">
                                                                    <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="m-menu__link-text">
                                                                        Penumpang
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                                <a  href="<?php echo site_url('laporan/transportasi') ?>" class="m-menu__link ">
                                                                    <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="m-menu__link-text">
                                                                        Transportasi
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                                <a  href="<?php echo site_url('laporan/user') ?>" class="m-menu__link ">
                                                                    <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="m-menu__link-text">
                                                                        User
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
                                                                <a  href="<?php echo site_url('laporan/rute') ?>" class="m-menu__link ">
                                                                    <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="m-menu__link-text">
                                                                        Rute
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                            <?php
                                        }
                                     ?>
                                </ul>
                            </div>
                            <!-- END: Horizontal Menu -->               
                <!-- BEGIN: Topbar -->
                            <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-topbar__nav-wrapper">
                                    <ul class="m-topbar__nav m-nav m-nav--inline">
                                        <li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-topbar__userpic m--hide">
                                                    <img src="<?php echo base_url('assets/') ?>app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                                </span>
                                                <span class="m-nav__link-icon m-topbar__usericon">
                                                    <span class="m-nav__link-icon-wrapper">
                                                        <i class="flaticon-user-ok"></i>
                                                    </span>
                                                </span>
                                                <span class="m-topbar__username m--hide">
                                                    Nick
                                                </span>
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center">
                                                        <div class="m-card-user m-card-user--skin-light">
                                                            <div class="m-card-user__pic">
                                                                <img src="<?php echo base_url('assets/') ?>app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/>
                                                            </div>
                                                            <div class="m-card-user__details">
                                                                <span class="m-card-user__name m--font-weight-500">
                                                                    <?php echo $this->session->userdata('fullname') ?>
                                                                </span>
                                                                <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                                    <?php 
                                                                        if ($this->session->userdata('level') == "1") {
                                                                            echo "Admin";
                                                                        }else{
                                                                            echo "Operator";
                                                                        }
                                                                     ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-dropdown__body">
                                                        <div class="m-dropdown__content">
                                                            <ul class="m-nav m-nav--skin-light">
                                                                <li class="m-nav__separator m-nav__separator--fit"></li>
                                                                <li class="m-nav__item">
                                                                    <a href="<?php echo site_url('login/logout') ?>" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                        Logout
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END: Topbar -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: Header -->