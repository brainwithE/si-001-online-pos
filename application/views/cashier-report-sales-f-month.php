<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script type="text/javascript">
	function printPage(){
		window.print();
	}
</script>
	
	<div class="container">

		<!--The overwatch Main element Container or MEC-->
		<div class="overwatch-mec mec-income">
		
			<?php
				$total = 0;

				foreach($sales->result_array() as $row){ 
					$amt = $row['sales_total'];
					$ddct = $amt*0.12;
					$net = $amt-$ddct;
					$total = $total + $net;
				}
			?>

				<div class="table-bank-row">
					<div class="col-xs-6 table-end-general table-end table-bank">
							<div class="col-md-12 total-label total-label-bank">TOTAL SALES -- <span class="total-amount"><?php echo number_format($total, 2, '.',','); ?></span>
							</div>
					</div>
					<div class="col-xs-6"><p style="text-align: left;">This report is from <?php echo date("M j, Y", strtotime($fro)); ?> to <?php echo date("M j, Y", strtotime($to)); ?>. Today is <?php echo $today = date('F j, Y');?></p>
						<div id="print" onClick="printPage();" class="call-links">PRINT SALES RECORDS</div>
					</div>
				</div>
				<div class="row">
					<!-- FILTER FUNCTION -->
					<div class="col-xs-12 table-filter">
					<?php echo form_open('admin/filter-sales-month'); ?>
						<label>Filter By Date: </label>
						<input type="text" id="datepickerstart" class="datepicker" placeholder="From" name="filter_start_date">
						<input type="text" id="datepickerend" class="datepicker" placeholder="To" name="filter_end_date">
					<?php
						echo form_submit(array('name'=>'submit','value'=>'FILTER','class'=>'call-links'));
						echo form_close();
					?>
					</div>
				</div>
				<div class="row table-title table-title-general table-title-income">
					<div class="col-xs-3">Item Name</div>
					<div class="col-xs-2">Date</div>
					<div class="col-xs-1">Type</div>
					<div class="col-xs-2">Supplier</div>
					<div class="col-xs-1">Amount</div>
					<div class="col-xs-1">Discount</div>
					<div class="col-xs-1">Deduction</div>
					<div class="col-xs-1 net-col">Net</div>	
				</div>
				<?php	
					$total_earnings = 0;
					foreach($sales->result_array() as $row){ 
						$sales_quantity = $row['sales_quantity'];
						$sales_item_name = $row['item_name'];
						$sales_amount = $row['sales_total'];
						$sales_category = $row['item_category'];
						$sales_supplier = $row['item_supplier'];
						$sales_date = $row['sales_date'];
						$sales_deduction = $sales_amount*0.12;
						$sales_net = $sales_amount-$sales_deduction;
						$total_earnings = $total_earnings + $sales_net;
				?>
					
					<div class="row table-entries table-entries-income">
						<div class="col-xs-3"><?php echo $sales_item_name;?></div>
						<div class="col-xs-2"><?php echo date("M j, Y", strtotime($sales_date)); ?></div>
						<div class="col-xs-1"><?php echo $sales_category; ?></div>
						<div class="col-xs-2"><?php echo $sales_supplier; ?></div>
						<div class="col-xs-1"><?php echo number_format($sales_amount,2,'.',','); ?></div>
						<div class="col-xs-1">--</div>
						<div class="col-xs-1"><?php echo "- ". number_format($sales_deduction,2,'.',',');?></div>
						<div class="col-xs-1 net-col"><?php echo number_format($sales_net, 2, '.',','); ?></div>	
					</div>

				<?php } ?>

			<div class="table-title table-end table-end-general table-end-income">
					<div class="col-xs-12 total-label">TOTAL EARNINGS <span class="total-amount"><?php echo number_format($total_earnings, 2, '.',','); ?></span>
					</div>
			</div>

		</div><!-- MEC end -->

	</div>