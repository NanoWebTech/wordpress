<?php

	//print_r($datearr);
	
						
					/***** percentage working *****/
					
							/*****************************    15 back dates         **************************/
						
							$datefirstval = $datearr[0]; // get first index date value
							
							$prv_datefirstval = date('Y-m-d',strtotime($datefirstval . "-1 days")); // get tomorrow from first val
							
							$datearrpreviousarr[] = $prv_datefirstval; // assign at first index tommorw value
							
							for($i=1 ;$i<$number_of_day ;$i++) // loop through 15 back
							{
								$tomorrow = date('Y-m-d',strtotime($prv_datefirstval . "-$i days"));
								$datearrpreviousarr[] = $tomorrow;
							}
							
							/*****************************    15 back dates         **************************/
							
						/************** get 15 back pins record ************/
							
							$total_count_pinsold = array();
							$pinsvalold = '';
							foreach($datearrpreviousarr as $key => $val)
								{
									$datearrpreviousarr[$key];	
										
									$condataold = $obj->countPinData($datearrpreviousarr[$key]);
									$total_count_pinsold[] = $condataold;
								}
							
						/************** get 15 back pins record ************/
		
		
	// number of pins	
			$number_of_day = count($datearr);
	
			$total_count_pins = array();
			$pinsvalcsv = '';
			$pinsval = '';
			
			//print_r($datearr);
			
			foreach($datearr as $key => $val)
			{
				$datearr[$key];		
				$condata = $obj->countPinData($datearr[$key]);
				$total_count_pins[] = $condata;
				
				count($condata);
				//echo '<br/>';				
				$pinsvalcsv.= $condata.',';
				$pinsval .= '['.$condata.'],';
			}
		  
		 $fi_pinsval = '['.$pinsval.']';
		  
	//[[0],[6],]
	
	$sumOfPins = array_sum($total_count_pins);
	$sumOfPinsold = array_sum($total_count_pinsold); // old dates pins sum
	
					/*************** calculate pins percentage     *********/
 	 
						 $totalsum = $sumOfPins-$sumOfPinsold;
						 $temp = ($totalsum/$number_of_day);
						 $percentagepins = $temp*100;
						 $finalpinspercentage =  number_format($percentagepins,2,".",",");

					 /*************** calculate pins percentage     *********/
					 
					 
					 // number of pinners %  1
					 
					  $total_count_pinnersold = array();
	 	 	
		 foreach($datearrpreviousarr as $key => $val)
		 {
			 $datearrpreviousarr[$key];	 		 		
			$condatapnrsold = $obj->countPinnerData($datearrpreviousarr[$key]);
			$total_count_pinnersold[] = $condatapnrsold;	 	
		 }	 
	 
	 /*********************** 15 days back information ****************************/
					 // end number of pinners % 2
					 
	
	// number of Pinners	 
			$pinnersval = '';
			$pinnersvalcsv = '';
			$total_count_pinners = array();
		
		// days count			
			
	// end days count
			
			
	foreach($datearr as $key => $val)
	{
		$condata =  $obj->countPinnerData($datearr[$key]);
		$total_count_pinners[] = $condata;
		$pinnersvalcsv .= $condata.',';
		$pinnersval .= '['.$condata.'],';
	}
		
		
		$fi_pinnersval = '['.$pinnersval.']';
		$sumOfPinners = array_sum($total_count_pinners);
		
	//[[0],[6],]		
	
	 $pins_avrage = $sumOfPins/$number_of_day;
		 $pins_avrage =  floor($pins_avrage);
	
	 $pinners_avrage = $sumOfPinners/$number_of_day;
		$pinners_avrage =  floor($pinners_avrage);
	/**************** pinners percentage working ***********/
		 
		$sumOfPinnersold = array_sum($total_count_pinnersold); // old dates working
		
		$sumOfPinners = array_sum($total_count_pinners);
		
		$totalsumpnrs = $sumOfPinners-$sumOfPinnersold;
		$temp = ($totalsumpnrs/$number_of_day);
		$percentagepinners = $temp*100;
		$finalpinnerspercentage =  number_format($percentagepinners,2,".",",");
		
	/**************** pinners percentage working ***********/
 
?>
<div class="pi_analytic">
<div class="left_antic">
<div class="pins">
<h2>
Pins
</h2>
<div class="pin_qus">
<a href="#"><img src="<?php bloginfo('template_url');?>/internal-plugins/analytics/images/qus.png" alt="img" border="0" title="Pins are the daily average number of pins from your website." /></a>

<span style="font-size:15px; margin: 60px -25px -33px;float:right;font-weight: bold;color: #B7A9A9;"><?php echo $finalpinspercentage.'%'; ?></span>
</div>

<div class="clear"></div>
<div class="pin_zero">
<h3 style="font-size:33px;font-weight: bold;color: #367CBD;"><?php echo $pins_avrage; ?></h3>
</div>
</div>

<div class="pins pinners">
<h2>
Pinners
</h2>
<div class="pin_qus">
<a href="#"><img src="<?php bloginfo('template_url');?>/internal-plugins/analytics/images/o_qus.png" alt="img" border="0" title="Pinners are the daily average number of people who pinned from your website. " /></a>
<span style="font-size:15px; margin: 60px -25px -33px;float:right;font-weight: bold;color: #B7A9A9;"><?php echo $finalpinnerspercentage.'%'; ?></span>
</div>
<div class="clear"></div>
<div class="pin_zero">
<h3 style="font-size:33px;font-weight: bold;color: #C06506;"><?php echo $pinners_avrage; ?></h3>
</div>
</div>


</div>
<div class="right_antic">
<div class="analytic_img">

<!---------------------------graph1------------------------------>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">


$(function () {
    $('#pins_pinners').highcharts({
	    chart: {
                type: 'spline'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                 day: '%m/%e'
		   
            }
        },
	 plotOptions: {
         series: {
            pointStart: Date.UTC(<?php echo $y1; ?>, <?php echo $m1; ?>, <?php echo $d1; ?>),
            pointInterval: 24 * 3600 * 1000  // one day
        }
    },
	  yAxis: {
                title: {
                    text: ''
                },
                min: 0,
		  
            },
	      tooltip: {
                formatter: function() {
                        return  '<b>'+ Highcharts.dateFormat('%A', this.x) +'</b><br/>'+
									Highcharts.dateFormat('%b %e,%Y', this.x) +':'+ 
									'<b>'+this.y +'</b>';
                }},

      series: [{
                name: 'Pins',
                // Define the data points. All series have a dummy year
                // of 1970/71 in order to be compared on the same x axis. Note
                // that in JavaScript, months start at 0 for January, 1 for February etc.
                data: <?php echo $fi_pinsval; ?>
            }, {
                name: 'Pinners',
                data: <?php echo $fi_pinnersval; ?>
            }, ]
        });
    
});


		</script>
             
<script type="text/javascript">
var templateDir = "<?php bloginfo('template_directory') ?>";
</script>

<script src="<?php echo get_template_directory_uri(); ?>/js/exporting.js">  </script>


<div id="pins_pinners" style="width:745px; height: 400px; margin: 0 auto"> </div>


<!-------------------------------graph--------------------------->

</div>
</div>

</div>

	
    
    