<?php	
session_start();
//include_once("db.php");

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/../../../wp-load.php');
//echo '<pre>';
//print_r($_REQUEST);

// create file pointer 
//$fp = fopen('wesitev/filename.html', 'w') or die('Could not open file, or fike does not exist and failed to create.'); 

// create file pointer 	
	
//contype  => website url
	
 if(isset($_REQUEST['contype']))
 {
	$website_url = trim($_REQUEST['contype']);
	$meta_code = session_id();
	$html_file_name = 'piformula-'.rand().'.html';
	$uid = $_REQUEST['uid'];
	
	global  $wpdb;
	
	$str =  "select * from wp_users where ID='".$uid."'";	
	$executefiledata = $wpdb->get_results($str);
	

	$qry = 'select * from wp_usermeta where user_id="'.$uid.'" and meta_key="website_url" ';
	$wpdb->query($qry);	
	$cntrows = $wpdb->num_rows;	
	
	
	// update wp_usermeta database table if the the user website url infomation already exists
	
	if($cntrows>0)
	{
		$z11='update wp_usermeta set meta_value="'.$website_url.'" where meta_key="website_url" and user_id="'.$uid.'"';
		
		$wpdb->query($z11);
		
		$z22='update wp_usermeta set meta_value="'.$meta_code.'" where meta_key="meta_code" and user_id="'.$uid.'"';
	
		$wpdb->query($z22);
		
		$z33='update wp_usermeta set meta_value="'.$html_file_name.'" where meta_key="html_file_name" and user_id="'.$uid.'"';
		
		$wpdb->query($z33);		
		
		$z3='update wp_usermeta set meta_value="no" where meta_key="url_verified" and user_id="'.$uid.'"';	
		
		$wpdb->query($z3);		
		
	}
	else
	{
			// insert user meta if already not exists in wp_usermeta
		
		$z1='insert into wp_usermeta(user_id,meta_key,meta_value) values("'.$uid.'","website_url","'.$website_url.'") ' ;
			
		$wpdb->query($z1);
		
		$z2='insert into wp_usermeta(user_id,meta_key,meta_value) values("'.$uid.'","meta_code","'.$meta_code.'") ' ;
		
		$wpdb->query($z2);
		
		$z3='insert into wp_usermeta(user_id,meta_key,meta_value) values("'.$uid.'","html_file_name","'.$html_file_name.'") ' ;
			
		$wpdb->query($z3);
		
		$z4='insert into wp_usermeta(user_id,meta_key,meta_value) values("'.$uid.'","url_verified","no")' ;
			
		$wpdb->query($z4);				
	}
	
	$tagdata = '<meta name="p:domain_verify" content="'.$meta_code.'" />';
	
	echo $txtnameset = $html_file_name.','.$website_url.','.$meta_code.','.$uid.','.$tagdata;
    
	//$strupdate  = "update wp_users set website_url='".$website_url."' , meta_code='".$meta_code."' , html_file_name='".$html_file_name."' where ID='".$uid."'";
	//$delblog = mysql_query($strupdate);

	$fp = @fopen('../verifyfiles/'.$html_file_name.'', 'w') or die('Could not open file, or fike does not exist and failed to create.');

$mytext = '

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="p:domain_verify" content="'.$meta_code.'" />
    <title></title>
</head>
<body lang="en" style="background-color:#f7f5f5;background:none repeat scroll 0 0 #F2F2F2">
<table cellspacing="0" cellpadding="0" border="0" width="100%" background="">
    <tr>
        <td id="wrapper" style="padding:20px 20px 40px;">
            <table id="content" cellspacing="0" cellpadding="0" border="0" align="center" width="620">
                <!-- begin Branding Header -->
                <tr>
                    <td id="logo" align="center" style="padding:20px 0 40px;">
                        <a href="http://piformula.com/verify-website/" Title="Verify domain" style="border:none;">
                          <img src="http://piformula.com/wp-content/uploads/2013/11/Piformula_revision.png" width="200" height="52" style="vertical-align:top;outline:none;border:none;" alt="Verify website" />
                        </a>
                    </td>
                </tr>
                <!-- end Branding Header -->
                <!-- begin Primary Section Header -->
                <tr>
                    <td class="header" background="" align="center">
                        <table cellspacing="0" cellpadding="0" border="0" align="center">
                            <tr>
                                <td background="" style="background-color:#f7f5f5;">
                                    <h1 style="font-family:georgia,serif;font-weight:normal;font-size:22px;line-height:21px;color:#211922 !important;text-shadow:0 1px 0 #FFFFFF;margin:0;padding:0 20px;">


                                                Hi, '.$executefiledata[0]->display_name.'


                                    </h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- end Primary Section Header -->



    <!-- begin Comment -->
    <tr>
        <td class="comment_wrap" style="padding:30px 0 30px 8px;">
            <table cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td width="1" style="background-color:#eceaeb"></td>
                    <td class="" style="background-color:#FFFFFF;padding:0px;border-top:1px solid #eae9e9;border-bottom:1px solid #b2b1b1;border-left:1px solid #d4d2d3;border-right:1px solid #d4d2d3;">
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <table class="comment_container" cellspacing="0" cellpadding="0" border="0" width="617">
                                        <tr>

    <td class="profile_image" width="80" valign="top">
      
    </td>
        <td class="comment_text" width="341">
            <p style="font-family:"helvetica neue",helvetica,arial,sans-serif;font-size:14px;color:#211922;line-height:20px;text-shadow:0 1px 0 #FFFFFF;margin:0;padding:5px 0 5px 15px;">You are ready to return to the verification page and complete the process.</p>
        </td>




<td class="button_row" width="140" align="right" style="padding:20px;">
    <table class="button" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td class="button_text" height="34" align="center" background="" style="background-repeat:repeat-x;-moz-border-radius:6px;-webkit-border-radius:6px;-o-border-radius:6px;-ms-border-radius:6px;-khtml-border-radius:6px;border-radius:6px;background-position:top left;background-color:#d43638;border:1px solid #910101;white-space:nowrap;height:34px;">
                <a href="http://piformula.com/verify-website/" style="color:#fcf9f9;cursor:pointer;text-align:center;text-decoration:none;vertical-align:baseline;" title="Go To Board">
                    <!--[if gte mso 9]>&nbsp;&nbsp;<![endif]-->
                    <span style="padding:9px 15px;color:#fcf9f9;text-decoration:none;color:#fcf9f9;font-family:"helvetica neue",helvetica,arial,sans-serif;font-weight:bold;font-size:18px;line-height:18px;text-shadow:0 -1px #933640;white-space:nowrap;">Go To Piformula</span>
                    <!--[if gte mso 9]>&nbsp;&nbsp;<![endif]-->
                </a>
            </td>
        </tr>
    </table>
</td>



                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="1" style="background-color:#eceaeb"></td>
                </tr>
                <tr>
                    <td width="1" style="background-color:#eceaeb"></td>
                    <td height="1" style="background-color:#d5d3d4"></td>
                    <td width="1" style="background-color:#eceaeb"></td>
                </tr>
                <tr>
                    <td width="1"></td>
                    <td height="1" style="background-color:#e8e6e7"></td>
                    <td width="1"></td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- end Comment -->




                <tr>
                    <td align="center" style="padding:10px 0 30px;">

                        <h4 style="font-family:georgia,serif;font-weight:normal;font-size:21px;color:#211922 !important;text-shadow:0 1px 0 #FFFFFF;margin:0;padding:0;">Happy pinning!</h4>

                    </td>
                </tr>
                   <!-- begin Badge Rule -->
                <tr>
                    <td id="badge_rule" height="18" width="100%" background="" align="center"></td>
                </tr>
                <!-- end Badge Rule -->
                <!-- begin Subscription Notification -->
                <tr>
                    <td align="center" style="padding:30px 0 15px;">
                    </td>
                </tr>
                <!-- end Subscription Notification -->
                <!-- begin Copyright and Legal -->
                <tr>
                    <td align="center">
                        <p style="font-family:"helvetica neue",helvetica,arial,sans-serif;font-size:10px;color:#999999;text-shadow:0 1px 0 #FFFFFF;line-height:1.35em;margin:0;padding:0;"><span class="symbolfix">&copy;</span>2013 Piformula, Inc. <font style="color:#AAA;padding:0 2px;">|</font> All Rights Reserved<br/><a href="/about/privacy/" style="color:#999;text-decoration:underline;text-shadow:0 1px 0 #FFFFFF;">Privacy Policy</a> <font style="color:#AAA;padding:0 2px;"> |</font> <a href="/about/terms/" style="color:#999;text-decoration:underline;text-shadow:0 1px 0 #FFFFFF;">Terms and Conditions</a></p>
                    </td>
                </tr>
                <!-- end Copyright and Legal -->
            </table>
        </td>
    </tr>
</table>
</body>
</html>
'; 

// write text to file 
@fwrite($fp, $mytext) or die('Could not write to file.'); 

// close file 
@fclose($fp);
}

?>