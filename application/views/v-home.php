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
															Perbulan ini
														</span>
													</div>
													<div class="col m--align-right">
														<span class="m-widget1__number m--font-brand">
															<span id="pendapatanblnini"></span>
														</span>
													</div>
												</div>
											</div>
											<div class="m-widget1__item">
												<div class="row m-row--no-padding align-items-center">
													<div class="col">
														<h3 class="m-widget1__title">
															Transaksi
														</h3>
														<span class="m-widget1__desc">
															Perbulan ini
														</span>
													</div>
													<div class="col m--align-right">
														<span class="m-widget1__number m--font-danger">
															<?php echo $transaksi[0]->transaksi ?>
														</span>
													</div>
												</div>
											</div>
										</div>
										<!--end:: Widgets/Stats2-1 -->
									</div>
									<div class="col-xl-8">
										<!--begin:: Widgets/Daily Sales-->
										<div class="m-widget14">
											<div class="m-widget14__header m--margin-bottom-30">
												<h3 class="m-widget14__title">
													Pemesanan Bulan Ini
												</h3>
												<span class="m-widget14__desc">
													Cek kolom untuk detail perhari
												</span>
											</div>
											<div class="m-widget14__chart" style="height:120px;">
												<canvas  id="m_chart_daily_sales1"></canvas>
											</div>
										</div>
										<!--end:: Widgets/Daily Sales-->
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
													Pemesanan Tiket Hari Ini
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
								<!--begin:: Widgets/Authors Profit-->
								<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Detail Pemberangkatan
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="m-widget4">
											<?php 
											foreach ($detail as $d) {
												?>

											<div class="m-widget4__item">
												<div class="m-widget4__img m-widget4__img--logo">
													<?php 
														if ($d->transportation_typeid == "1") {
																	?>
																	<i style="font-size: 30px"class="m-menu__link-icon fa fa-plane"></i>
																	<?php
														}else{
																	?>
																	<i style="font-size: 30px" class="m-menu__link-icon fa fa-train"></i>
																	<?php
														}
													 ?>
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__title">
														<?php echo $d->description ?>
													</span>
												</div>
												<span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">
														<?php echo $d->jml ?>x
													</span>
												</span>
											</div>
												<?php
											}
											 ?>
										</div>
									</div>
								</div>
								<!--end:: Widgets/Authors Profit-->
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

<script>
 
var isidata = [];
var tgldata = [];

var cek123;
<?php
for ($a=1; $a <= 31; $a++) { 
	?>
	cek123 = true;
	<?php
	for ($i = 0; $i < count($perbln); $i++) {
		if ($a == $perbln[$i]->tgl) {
			?>
				isidata.push(<?php echo $perbln[$i]->jml ?>);
				cek123 = false;
			<?php
		}
	}
	?>
				tgldata.push("Tanggal "+'<?php echo $a ?>');
				if (cek123) {
					isidata.push(0);
				}
			<?php
}
?>
var dailySales = function() {
        var chartContainer = $('#m_chart_daily_sales1');

        if (chartContainer.length == 0) {
            return;
        }
        
        var chartData = {
            labels: tgldata,
            datasets: [{
                //label: 'Dataset 1',
                backgroundColor: mUtil.getColor('success'),
                data: isidata
            }]
        };

        var chart = new Chart(chartContainer, {
            type: 'bar',
            data: chartData,
            options: {
                title: {
                    display: false,
                },
                tooltips: {
                    intersect: false,
                    mode: 'nearest',
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                legend: {
                    display: false
                },
                responsive: true,
                maintainAspectRatio: false,
                barRadius: 4,
                scales: {
                    xAxes: [{
                        display: false,
                        gridLines: false,
                        stacked: true
                    }],
                    yAxes: [{
                        display: false,
                        stacked: true,
                        gridLines: false
                    }]
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });
    }



dailySales();


var jmluang = "<?php echo $pendapatan[0]->pendapatan ?>";
$('#pendapatanblnini').text(accounting.formatMoney(jmluang));
</script>