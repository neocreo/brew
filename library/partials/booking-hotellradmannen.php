<div class="hrm_box">
	
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<h3>Hotell Rådmannen - bara 15 minuter bort</h3>
			<p>Bästa hotellet nära Arenastaden är Sweden Hotels Hotel Rådmannen i Alvesta.
			Alvesta är en järnvägsknut, bara 16 kilometer bort och det går snabbt och enkelt att ta sig till Arenastaden med bil eller buss på så lite tid som 15 minuter via väg 25.</p>
			<p>Sweden Hotels Hotel Rådmannen erbjuder prisbelönta frukostar, lugnt boende och lyxiga familjerum i modern design.</p>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="hrm_booking_form cfix">
				
			
				<h4><?php _e('Stay at Hotell Rådmannen', 'bonestheme') ?></h4>
				<img src="http://www.hotelradmannen.se/wordpress/wp-content/themes/hotell/library/images/branding.png" class="img-responsive" alt="Sweden Hotels Hotel Rådmannen" style="width: 80px; height: auto; float: right;">
				<form class="form-horizontal" id="hrm_form" name="hrm_form" action="http://www.shecenter.com/book" method="get" target="_blank">
					<fieldset>
							<div class="form-group">
								<input type="hidden" name="h" id="h" value="54">
								<label class="col-xs-12"><?php _e('Check-in Date', 'bonestheme') ?></label>
								<div class="col-xs-12"><input type="text" name="dateIn" id="hrm_dateIn" class="date" value=""></div>
							</div>
							<div class="form-group">
								<label class="col-xs-12"><?php _e('Check-out Date', 'bonestheme') ?></label>
								<div class="col-xs-12"><input type="text" name="dateOut" id="hrm_dateOut" class="date" value=""></div>
							</div>
						
					</fieldset>
						<div class="vspacer-xs">
							<button type="submit" id="book-button" class="btn btn-primary"><?php _e('Search room', 'bonestheme') ?></button>
						
							<a href="https://www.shecenter.com/book?h=54&sc=1" target="_blank" title="<?php _e('Opens in a new window','bonestheme')?>" class="btn btn-info"><?php _e('Price calendar','bonestheme') ?></a>
						</div>
				
					
				</form>
			</div>
		</div>
	</div>
</div>
	<script  type="text/javascript" charset="utf-8" async defer>
		var d = new Date();
			var month = d.getMonth()+1;
			var day = d.getDate();
			var output = d.getFullYear() + '-' +
				((''+month).length<2 ? '0' : '') + month + '-' +
				((''+day).length<2 ? '0' : '') + day;

				$('#hrm_dateIn').datepicker({ 
					showOn: "both",
					buttonImage: "http://hotellradmannen.kund.griffel.se/wordpress/wp-content/themes/hotell/library/images/calendar.png",
					buttonImageOnly: true,
					showWeek: true,
					firstDay: 1,
					numberOfMonths: 1,
					changeMonth: true,
					dateFormat: 'yy-mm-dd',
					defaultDate: "+1d",
					minDate: output,
					maxDate: "+12m",
					dayNamesMin: ['S', 'M', 'T', 'O', 'T', 'F', 'L'],
					onClose: function( selectedDate ){
						$( "#dateOut" ).datepicker( "option", "minDate", selectedDate );
					},

				 
				});
				$('#hrm_dateOut').datepicker({ 
					showOn: "both",
					buttonImage: "http://hotellradmannen.kund.griffel.se/wordpress/wp-content/themes/hotell/library/images/calendar.png",
					buttonImageOnly: true,
					showWeek: true,
					firstDay: 1,
					numberOfMonths: 1,
					changeMonth: true,
					dateFormat: 'yy-mm-dd',
					defaultDate: "+1d",
					minDate: output,
					maxDate: "+12m",
					dayNamesMin: ['S', 'M', 'T', 'O', 'T', 'F', 'L'],
					onClose: function( selectedDate ){
						$( "#dateIn" ).datepicker( "option", "maxDate", selectedDate );
					}
				 
				});
	</script>