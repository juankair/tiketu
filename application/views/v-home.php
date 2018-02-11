<?php 
$this->load->view('layouts/header');
$this->load->view('layouts/navigation1');
$this->load->view('layouts/navigation2');
 ?>
			
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									Dashboard
								</h3>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
<!--Begin::Section-->
<div class="m-portlet">
							<div class="m-portlet__body  m-portlet__body--no-padding">
								<div class="row m-row--no-padding m-row--col-separator-xl">
									<div class="col-xl-4">
										<!--begin:: Widgets/Stats2-1 -->
										<div class="m-widget1">
											<div class="m-widget1__item">
												<div class="row m-row--no-padding align-items-center">
													<div class="col">
														<h3 class="m-widget1__title">
															Pendapatan
														</h3>
														<span class="m-widget1__desc">
															Awerage Weekly Profit
														</span>
													</div>
													<div class="col m--align-right">
														<span class="m-widget1__number m--font-brand">
															+$17,800
														</span>
													</div>
												</div>
											</div>
											<div class="m-widget1__item">
												<div class="row m-row--no-padding align-items-center">
													<div class="col">
														<h3 class="m-widget1__title">
															Penjualan
														</h3>
														<span class="m-widget1__desc">
															Weekly Customer Orders
														</span>
													</div>
													<div class="col m--align-right">
														<span class="m-widget1__number m--font-danger">
															+1,800
														</span>
													</div>
												</div>
											</div>
											<div class="m-widget1__item">
												<div class="row m-row--no-padding align-items-center">
													<div class="col">
														<h3 class="m-widget1__title">
															Pemberangkatan
														</h3>
														<span class="m-widget1__desc">
															System bugs and issues
														</span>
													</div>
													<div class="col m--align-right">
														<span class="m-widget1__number m--font-success">
															-27,49%
														</span>
													</div>
												</div>
											</div>
										</div>
										<!--end:: Widgets/Stats2-1 -->
									</div>
									<div class="col-xl-4">
										<!--begin:: Widgets/Daily Sales-->
										<div class="m-widget14">
											<div class="m-widget14__header m--margin-bottom-30">
												<h3 class="m-widget14__title">
													Penjualan Minggu Ini
												</h3>
												<span class="m-widget14__desc">
													Cek kolom untuk detail perhari
												</span>
											</div>
											<div class="m-widget14__chart" style="height:120px;">
												<canvas  id="m_chart_daily_sales"></canvas>
											</div>
										</div>
										<!--end:: Widgets/Daily Sales-->
									</div>
									<div class="col-xl-4">
										<!--begin:: Widgets/Profit Share-->
										<div class="m-widget14">
											<div class="m-widget14__header">
												<h3 class="m-widget14__title">
													Profit Share
												</h3>
												<span class="m-widget14__desc">
													Profit Share between customers
												</span>
											</div>
											<div class="row  align-items-center">
												<div class="col">
													<div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
														<div class="m-widget14__stat">
															45
														</div>
													</div>
												</div>
												<div class="col">
													<div class="m-widget14__legends">
														<div class="m-widget14__legend">
															<span class="m-widget14__legend-bullet m--bg-accent"></span>
															<span class="m-widget14__legend-text">
																37% Sport Tickets
															</span>
														</div>
														<div class="m-widget14__legend">
															<span class="m-widget14__legend-bullet m--bg-warning"></span>
															<span class="m-widget14__legend-text">
																47% Business Events
															</span>
														</div>
														<div class="m-widget14__legend">
															<span class="m-widget14__legend-bullet m--bg-brand"></span>
															<span class="m-widget14__legend-text">
																19% Others
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end:: Widgets/Profit Share-->
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-8">
								<div class="m-portlet  m-portlet--full-height">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Aktifitas Pemesanan Tiket Hari Ini
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide" data-scrollbar-shown="true" data-scrollable="true" data-max-height="380" style="overflow: visible; height: 380px; max-height: 380px; position: relative;">
											<!--Begin::Timeline 2 -->
											<div class="m-timeline-2">
												<?php 
													foreach ($aktivitas as $act) {
														?>
												<div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30"">
													<div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">
															<?php echo $act->depart_at ?>
														</span>
														<div class="m-timeline-2__item-cricle">
															<i class="fa fa-genderless m--font-brand"></i>
														</div>
														<div class="m-timeline-2__item-text m--padding-top-5">
															<?php echo $act->name ?> membeli tiket
															<a href="#" class="m-link m-link--brand m--font-bolder">
															<?php
																if ($act->transportation_typeid == "1") {
																	echo "Pesawat";
																}else{
																	echo "Kereta";
																}
															 ?> 
															</a>
															 ke <?php echo $act->city ?> menggunakan <?php echo $act->description ?>
														</div>
													</div>
												</div>
														<?php
													}
												 ?>
											</div>
											<!--End::Timeline 2 -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4">
								<!--begin:: Widgets/Top Products-->
								<div class="m-portlet m-portlet--full-height m-portlet--fit ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Top Products
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
													<a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
														All
													</a>
													<div class="m-dropdown__wrapper">
														<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 36.5px;"></span>
														<div class="m-dropdown__inner">
															<div class="m-dropdown__body">
																<div class="m-dropdown__content">
																	<ul class="m-nav">
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-share"></i>
																				<span class="m-nav__link-text">
																					Activity
																				</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-chat-1"></i>
																				<span class="m-nav__link-text">
																					Messages
																				</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-info"></i>
																				<span class="m-nav__link-text">
																					FAQ
																				</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																				<span class="m-nav__link-text">
																					Support
																				</span>
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
									<div class="m-portlet__body">
										<!--begin::Widget5-->
										<div class="m-widget4 m-widget4--chart-bottom" style="min-height: 480px">
											<div class="m-widget4__item">
												<div class="m-widget4__img m-widget4__img--logo">
													<img src="assets/app/media/img/client-logos/logo3.png" alt="">
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__title">
														Phyton
													</span>
													<br>
													<span class="m-widget4__sub">
														A Programming Language
													</span>
												</div>
												<span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">
														+$17
													</span>
												</span>
											</div>
											<div class="m-widget4__item">
												<div class="m-widget4__img m-widget4__img--logo">
													<img src="assets/app/media/img/client-logos/logo1.png" alt="">
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__title">
														FlyThemes
													</span>
													<br>
													<span class="m-widget4__sub">
														A Let's Fly Fast Again Language
													</span>
												</div>
												<span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">
														+$300
													</span>
												</span>
											</div>
											<div class="m-widget4__item">
												<div class="m-widget4__img m-widget4__img--logo">
													<img src="assets/app/media/img/client-logos/logo4.png" alt="">
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__title">
														Starbucks
													</span>
													<br>
													<span class="m-widget4__sub">
														Good Coffee & Snacks
													</span>
												</div>
												<span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">
														+$300
													</span>
												</span>
											</div>
											<div class="m-widget4__chart m-portlet-fit--sides m--margin-top-20" style="height:260px;">
												<canvas id="m_chart_trends_stats_2"></canvas>
											</div>
										</div>
										<!--end::Widget 5-->
									</div>
								</div>
								<!--end:: Widgets/Top Products-->
							</div>
						</div>
					
						<div class="row">
							<div class="col-xl-12">
								<!--begin:: Widgets/Best Sellers-->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Best Sellers
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget5_tab1_content" role="tab">
														Pesawat
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content" role="tab">
														Kereta
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="m-portlet__body">
										<!--begin::Content-->
										<div class="tab-content">
											<div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
												<!--begin::m-widget5-->
												<div class="m-widget5">
													<div class="m-widget5__item">
														<div class="m-widget5__pic">
															<img class="m-widget7__img" src="assets/app/media/img//products/product6.jpg" alt="">
														</div>
														<div class="m-widget5__content">
															<h4 class="m-widget5__title">
																Great Logo Designn
															</h4>
															<span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
															<div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
																<span class="m-widget5__info-label">
																	author:
																</span>
																<span class="m-widget5__info-author-name">
																	Fly themes
																</span>
																<span class="m-widget5__info-label">
																	Released:
																</span>
																<span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
															</div>
														</div>
														<div class="m-widget5__stats1">
															<span class="m-widget5__number">
																19,200
															</span>
															<br>
															<span class="m-widget5__sales">
																sales
															</span>
														</div>
														<div class="m-widget5__stats2">
															<span class="m-widget5__number">
																1046
															</span>
															<br>
															<span class="m-widget5__votes">
																votes
															</span>
														</div>
													</div>
													<div class="m-widget5__item">
														<div class="m-widget5__pic">
															<img class="m-widget7__img" src="assets/app/media/img//products/product10.jpg" alt="">
														</div>
														<div class="m-widget5__content">
															<h4 class="m-widget5__title">
																Branding Mockup
															</h4>
															<span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
															<div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
																<span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
																<span class="m-widget5__info-label">
																	Released:
																</span>
																<span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
															</div>
														</div>
														<div class="m-widget5__stats1">
															<span class="m-widget5__number">
																24,583
															</span>
															<br>
															<span class="m-widget5__sales">
																sales
															</span>
														</div>
														<div class="m-widget5__stats2">
															<span class="m-widget5__number">
																3809
															</span>
															<br>
															<span class="m-widget5__votes">
																votes
															</span>
														</div>
													</div>
													<div class="m-widget5__item">
														<div class="m-widget5__pic">
															<img class="m-widget7__img" src="assets/app/media/img//products/product11.jpg" alt="">
														</div>
														<div class="m-widget5__content">
															<h4 class="m-widget5__title">
																Awesome Mobile App
															</h4>
															<span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
															<div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
																<span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
																<span class="m-widget5__info-label">
																	Released:
																</span>
																<span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
															</div>
														</div>
														<div class="m-widget5__stats1">
															<span class="m-widget5__number">
																10,054
															</span>
															<br>
															<span class="m-widget5__sales">
																sales
															</span>
														</div>
														<div class="m-widget5__stats2">
															<span class="m-widget5__number">
																1103
															</span>
															<br>
															<span class="m-widget5__votes">
																votes
															</span>
														</div>
													</div>
												</div>
												<!--end::m-widget5-->
											</div>
											<div class="tab-pane" id="m_widget5_tab2_content" aria-expanded="false">
												<!--begin::m-widget5-->
												<div class="m-widget5">
													<div class="m-widget5__item">
														<div class="m-widget5__pic">
															<img class="m-widget7__img" src="assets/app/media/img//products/product11.jpg" alt="">
														</div>
														<div class="m-widget5__content">
															<h4 class="m-widget5__title">
																Branding Mockup
															</h4>
															<span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
															<div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
																<span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
																<span class="m-widget5__info-label">
																	Released:
																</span>
																<span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
															</div>
														</div>
														<div class="m-widget5__stats1">
															<span class="m-widget5__number">
																24,583
															</span>
															<br>
															<span class="m-widget5__sales">
																sales
															</span>
														</div>
														<div class="m-widget5__stats2">
															<span class="m-widget5__number">
																3809
															</span>
															<br>
															<span class="m-widget5__votes">
																votes
															</span>
														</div>
													</div>
													<div class="m-widget5__item">
														<div class="m-widget5__pic">
															<img class="m-widget7__img" src="assets/app/media/img//products/product6.jpg" alt="">
														</div>
														<div class="m-widget5__content">
															<h4 class="m-widget5__title">
																Great Logo Designn
															</h4>
															<span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
															<div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
																<span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
																<span class="m-widget5__info-label">
																	Released:
																</span>
																<span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
															</div>
														</div>
														<div class="m-widget5__stats1">
															<span class="m-widget5__number">
																19,200
															</span>
															<br>
															<span class="m-widget5__sales">
																sales
															</span>
														</div>
														<div class="m-widget5__stats2">
															<span class="m-widget5__number">
																1046
															</span>
															<br>
															<span class="m-widget5__votes">
																votes
															</span>
														</div>
													</div>
													<div class="m-widget5__item">
														<div class="m-widget5__pic">
															<img class="m-widget7__img" src="assets/app/media/img//products/product10.jpg" alt="">
														</div>
														<div class="m-widget5__content">
															<h4 class="m-widget5__title">
																Awesome Mobile App
															</h4>
															<span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
															<div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
																<span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
																<span class="m-widget5__info-label">
																	Released:
																</span>
																<span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
															</div>
														</div>
														<div class="m-widget5__stats1">
															<span class="m-widget5__number">
																10,054
															</span>
															<br>
															<span class="m-widget5__sales">
																sales
															</span>
														</div>
														<div class="m-widget5__stats2">
															<span class="m-widget5__number">
																1103
															</span>
															<br>
															<span class="m-widget5__votes">
																votes
															</span>
														</div>
													</div>
												</div>
												<!--end::m-widget5-->
											</div>
										</div>
										<!--end::Content-->
									</div>
								</div>
								<!--end:: Widgets/Best Sellers-->
							</div>
						</div>
						<!--End::Section-->
					</div>
				</div>
		<!-- end::Quick Sidebar -->		    
	    <!-- begin::Scroll Top -->
	<?php 
$this->load->view('layouts/footer');
	 ?>