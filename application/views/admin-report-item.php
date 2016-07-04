<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script type="text/javascript">

$(document).ready(function(){	
    $('.btn-edit').click(function(){
        $('.edit-item').show();
        $('.item-details').hide();
    });

    $('.btn-back').click(function(){
        $('.edit-item').hide();
        $('.item-details').show();
    });

});

function itemBarcode(id){
	$("#bcTarget"+id).barcode(id, "code39");
}

function printPage(){
	window.print();
}
</script>

	<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income">

					

						<div class="table-bank-row">
							<div class="col-xs-6">
								<p style="text-align: left;">These are all your inventory. Today is: <?php echo $today = date('F j, Y');?></p>
								<div id="print" onClick="printPage();" class="call-links">PRINT INVENTORY RECORDS</div>
							</div>

							<div class="col-xs-6 table-filter">
								<?php echo form_open(); ?>
								<label>Filter Inventory:</label>
								<input id="inventory-filter-box" type="text" class="datepicker" placeholder="Enter item here.." name="filter_start_date">
								<?php
									echo form_close();
								?>
							</div>
						</div>
					
						<div class="head-contain">
							<h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i></i>
							INVENTORY REPORT</h4>
						</div>
						<div class="col-xs-12">
						<div class="row table-title table-title-general table-title-income padding-alter">
							
							<div class="col-xs-2">Item Code</div>								
							<div class="col-xs-3 alter-xs-3">Item Name</div>
							<div class="col-xs-1">Price</div>
							<div class="col-xs-2">Item Supplier</div>

							<div class="col-xs-1 tright">Delivered</div>
							<div class="col-xs-1 tright">Pulled Out</div>
							<div class="col-xs-1 alter-xs-1 tright">Sold</div>
							<div class="col-xs-1 tright">Current</div>
							<div class="col-xs-1 alter-xs-1"></div>
						</div>
						</div>
						<div class="col-xs-12" id="ajax-content-container">
							
							
						</div>

						

					</div>
	</div>

	<script type="text/javascript">
	$(document).ready(function () {
		ajax_suggest();
		ajax_suggest_code();
	});

	function ajax_suggest(){

		$('#inventory-filter-box').keydown(function(e) {
	        var code = (e.keyCode ? e.keyCode : e.which);
	        var username = $('#inventory-filter-box').val();
	        if(code==13) {// Enter key hit
	        
			$.ajax({
				url: "filter-inventory-item",
				async: false,
				type: "POST",
				data: "type="+username,
				dataType: "html",
				success: function(data) {
					$('#ajax-content-container').empty();
					$('#ajax-content-container').prepend(data);
				}

			})

			return false;	
	        }
		});

	}  
	</script>