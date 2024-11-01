<?php

class WPPST_Widget extends WP_Widget {

	function WPPST_Widget() {
		$widget_ops = array('classname' => 'wppsts', 'description' => __('Allows you to get all statistics.', 'wp-parsi-st'));
		$control_ops = array('width' => 250, 'height' => 250, 'id_base' => 'wppsts-widget');
		$this -> WP_Widget('wppsts-widget', __('Statistics', 'wp-parsi-st'), $widget_ops, $control_ops);

	}

	function form($instance) {
?>
  <!--  how Show widget in Front-End  -->
<table class="widefat">
   	<tr>
	  	<td>
           <!-- get unique id  -->
            <label for="<?php echo $this -> get_field_id('get_all_today_visit'); ?>"><?php _e('All today visits', 'wp-parsi-st'); ?></label>
        </td>
        <td>
                    <!-- if user choose the item in Back-end Show in Front-End  -->
           <input type="checkbox" name="<?php echo $this -> get_field_name('get_all_today_visit'); ?>" id="<?php echo $this -> get_field_id('get_all_today_visit'); ?>"  <?php
if ($instance['wpp_get_all_today_visit'] == 'on') {echo 'checked';
}
 ?>/>

        </td>
   </tr>

    <tr>
        <td>
            <label for="<?php echo $this -> get_field_id('get_all_yest_visit'); ?>"><?php _e('All yesterday visits', 'wp-parsi-st'); ?></label>
        </td>
        <td>
           <input type="checkbox" name="<?php echo $this -> get_field_name('get_all_yest_visit'); ?>" id="<?php echo $this -> get_field_id('get_all_yest_visit'); ?>"  <?php
if ($instance['wpp_get_all_yest_visit'] == 'on') {echo 'checked';
}
 ?>/>

        </td>
    </tr>

    <tr>
       <td>
           <label for="<?php echo $this -> get_field_id('get_all_week_visit'); ?>"><?php _e('All last week visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
           <input type="checkbox" name="<?php echo $this -> get_field_name('get_all_week_visit'); ?>" id="<?php echo $this -> get_field_id('get_all_week_visit'); ?>"  <?php
if ($instance['wpp_get_all_week_visit'] == 'on') {echo 'checked';
}
 ?>/>

       </td>
    </tr>

    <tr>
       <td>
           <label for="<?php echo $this -> get_field_id('get_all_month_visit'); ?>"><?php _e('All last month visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
           <input type="checkbox" name="<?php echo $this -> get_field_name('get_all_month_visit'); ?>" id="<?php echo $this -> get_field_id('get_all_month_visit'); ?>"  <?php
if ($instance['wpp_get_all_month_visit'] == 'on') {echo 'checked';
}
 ?>/>

       </td>
   </tr>

   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_all_year_visit'); ?>"><?php _e('All last year visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
          <input type="checkbox" name="<?php echo $this -> get_field_name('get_all_year_visit'); ?>" id="<?php echo $this -> get_field_id('get_all_year_visit'); ?>"  <?php
if ($instance['wpp_get_all_year_visit'] == 'on') {echo 'checked';
}
 ?>/>
  
       </td>
   </tr>

   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_today'); ?>"><?php _e('Today visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
          <input type="checkbox" name="<?php echo $this -> get_field_name('get_today'); ?>" id="<?php echo $this -> get_field_id('get_today'); ?>"  <?php
if ($instance['wpp_get_today'] == 'on') {echo 'checked';
}
 ?>/>

       </td>
   </tr>

   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_yest'); ?>"><?php _e('Yesteday visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
          <input type="checkbox" name="<?php echo $this -> get_field_name('get_yest'); ?>" id="<?php echo $this -> get_field_id('get_yest'); ?>"  <?php
if ($instance['wpp_get_yest'] == 'on') {echo 'checked';
}
 ?>/>
  
       </td>
       </tr>

   <tr>
       <td>
           <label for="<?php echo $this -> get_field_id('get_week'); ?>"><?php _e('Week visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
           <input type="checkbox" name="<?php echo $this -> get_field_name('get_week'); ?>" id="<?php echo $this -> get_field_id('get_week'); ?>"  <?php
if ($instance['wpp_get_week'] == 'on') {echo 'checked';
}
 ?>/>
  
       </td>
   </tr>

   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_month'); ?>"><?php _e('Month visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
          <input type="checkbox" name="<?php echo $this -> get_field_name('get_month'); ?>" id="<?php echo $this -> get_field_id('get_month'); ?>"  <?php
if ($instance['wpp_get_month'] == 'on') {echo 'checked';
}
 ?>/>
  
       </td>
   </tr>

   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_year'); ?>"><?php _e('Year visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
          <input type="checkbox" name="<?php echo $this -> get_field_name('get_year'); ?>" id="<?php echo $this -> get_field_id('get_year'); ?>"  <?php
if ($instance['wpp_get_year'] == 'on') {echo 'checked';
}
 ?>/>
  
       </td>
   </tr>

   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_all_visit'); ?>"><?php _e('All visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
          <input type="checkbox" name="<?php echo $this -> get_field_name('get_all_visit'); ?>" id="<?php echo $this -> get_field_id('get_all_visit'); ?>"  <?php
if ($instance['wpp_get_all_visit'] == 'on') {echo 'checked';
}
 ?>/>
 
       </td>
   </tr>

   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_unique_today'); ?>"><?php _e('Unique today visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
         <input type="checkbox" name="<?php echo $this -> get_field_name('get_unique_today'); ?>" id="<?php echo $this -> get_field_id('get_unique_today'); ?>"  <?php
if ($instance['wpp_get_unique_today'] == 'on') {echo 'checked';
}
 ?>/>
  
       </td>
   </tr>

   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_unique_yest'); ?>"><?php _e('Unique yesterday visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
          <input type="checkbox" name="<?php echo $this -> get_field_name('get_unique_yest'); ?>" id="<?php echo $this -> get_field_id('get_unique_yest'); ?>"  <?php
if ($instance['wpp_get_unique_yest'] == 'on') {echo 'checked';
}
 ?>/>
  
       </td>
   </tr>

   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_unique_week'); ?>"><?php _e('Unique last week visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
         <input type="checkbox" name="<?php echo $this -> get_field_name('get_unique_week'); ?>" id="<?php echo $this -> get_field_id('get_unique_week'); ?>"  <?php
if ($instance['wpp_get_unique_week'] == 'on') {echo 'checked';
}
 ?>/>
  
       </td>
   </tr>


   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_unique_month'); ?>"><?php _e('Unique last month visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
          <input type="checkbox" name="<?php echo $this -> get_field_name('get_unique_month'); ?>" id="<?php echo $this -> get_field_id('get_unique_month'); ?>"  <?php
if ($instance['wpp_get_unique_month'] == 'on') {echo 'checked';
}
 ?>/>
  
       </td>
   </tr>


   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_unique_year'); ?>"><?php _e('Unique last year visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
          <input type="checkbox" name="<?php echo $this -> get_field_name('get_unique_year'); ?>" id="<?php echo $this -> get_field_id('get_unique_year'); ?>"  <?php
if ($instance['wpp_get_unique_year'] == 'on') {echo 'checked';
}
 ?>/>
  
       </td>
   </tr>

   <tr>
       <td>
          <label for="<?php echo $this -> get_field_id('get_all_unique_visit'); ?>"><?php _e('All unique visits', 'wp-parsi-st'); ?></label>
       </td>
       <td>
          <input type="checkbox" name="<?php echo $this -> get_field_name('get_all_unique_visit'); ?>" id="<?php echo $this -> get_field_id('get_all_unique_visit'); ?>"  <?php
if ($instance['wpp_get_all_unique_visit'] == 'on') {echo 'checked';
}
 ?>/>
  
       </td>
   </tr>
    </table>
		<?php
    }

    
function update($new_instance, $old_instance) {
	global $instance;
	$instance = array();
	$instance = $old_instance;
	$instance['wpp_get_all_today_visit'] = strip_tags($new_instance['get_all_today_visit']);
	$instance['wpp_get_all_yest_visit'] = strip_tags($new_instance['get_all_yest_visit']);
	$instance['wpp_get_all_week_visit'] = strip_tags($new_instance['get_all_week_visit']);
	$instance['wpp_get_all_month_visit'] = strip_tags($new_instance['get_all_month_visit']);
	$instance['wpp_get_all_year_visit'] = strip_tags($new_instance['get_all_year_visit']);
	$instance['wpp_get_today'] = strip_tags($new_instance['get_today']);
	$instance['wpp_get_yest'] = strip_tags($new_instance['get_yest']);
	$instance['wpp_get_week'] = strip_tags($new_instance['get_week']);
	$instance['wpp_get_month'] = strip_tags($new_instance['get_month']);
	$instance['wpp_get_year'] = strip_tags($new_instance['get_year']);
	$instance['wpp_get_all_visit'] = strip_tags($new_instance['get_all_visit']);
	$instance['wpp_get_unique_today'] = strip_tags($new_instance['get_unique_today']);
	$instance['wpp_get_unique_yest'] = strip_tags($new_instance['get_unique_yest']);
	$instance['wpp_get_unique_week'] = strip_tags($new_instance['get_unique_week']);
	$instance['wpp_get_unique_month'] = strip_tags($new_instance['get_unique_month']);
	$instance['wpp_get_unique_year'] = strip_tags($new_instance['get_unique_year']);
	$instance['wpp_get_all_unique_visit'] = strip_tags($new_instance['get_all_unique_visit']);

	return $instance;
}

    function widget($args, $instance)
    {
        include_once( dirname( __FILE__ ) . '/class/statistic_class.php');
        include_once( dirname( __FILE__ ) . '/class/get_page_val.php');
        include_once( dirname( __FILE__ ) . '/class/get_all_statistic_val.php');
        $pageVal=new get_page_statistic_val();
        $allVisit=new get_all_statistic_val();
        
        $dummy = new WPPST_Widget();
        $settings = $dummy->get_settings();
        ?>
        <div id="wppvisits">
        	<table>
        	    <tr><th colspan="2"><h2><?php _e('Statistics', 'wp-parsi-st'); ?></h2></th></tr>
                <?php if($instance['wpp_get_all_today_visit']=='on'){echo '<tr><td>'.__('All today visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($allVisit->wpp_get_all_today_visit()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_all_yest_visit']=='on'){echo '<tr><td>'.__('All yesterday visits ', 'wp-parsi-st') .'</td><td>'. wpp_farsinum(intval($allVisit->wpp_get_all_yest_visit()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_all_week_visit']=='on'){echo '<tr><td>'.__('All last week visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($allVisit->wpp_get_all_week_visit()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_all_month_visit']=='on'){echo '<tr><td>'.__('All last month visits ', 'wp-parsi-st') .'</td><td>'. wpp_farsinum(intval($allVisit->wpp_get_all_month_visit()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_all_year_visit']=='on'){echo '<tr><td>'.__('All last year visits', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($allVisit->wpp_get_all_year_visit()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_today']=='on'){echo '<tr><td>'.__('Today visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($pageVal->wpp_get_today()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_yest']=='on'){echo '<tr><td>'.__('Yesterday visits ', 'wp-parsi-st') .'</td><td>'. wpp_farsinum(intval($pageVal->wpp_get_yest()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_week']=='on'){echo '<tr><td>'.__('Last week visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($pageVal->wpp_get_week()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_month']=='on'){echo '<tr><td>'.__('Last month visits ', 'wp-parsi-st') .'</td><td>'. wpp_farsinum(intval($pageVal->wpp_get_month()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_year']=='on'){echo '<tr><td>'.__('Last year visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($pageVal->wpp_get_year()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_all_visit']=='on'){echo '<tr><td>'.__('All visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($pageVal->wpp_get_all_visit()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_unique_today']=='on'){echo '<tr><td>'.__('Unique today visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($pageVal->wpp_get_unique_today()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_unique_yest']=='on'){echo '<tr><td>'.__('Unique yesterday visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($pageVal->wpp_get_unique_yest()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_unique_week']=='on'){echo '<tr><td>'.__('Unique last week visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($pageVal->wpp_get_unique_week()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_unique_month']=='on'){echo '<tr><td>'.__('Unique last month visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($pageVal->wpp_get_unique_month()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_unique_year']=='on'){echo '<tr><td>'.__('Unique last year visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($pageVal->wpp_get_unique_year()))."</td></tr>\n";} ?>
                <?php if($instance['wpp_get_all_unique_visit']=='on'){echo '<tr><td>'.__('All unique  visits ', 'wp-parsi-st') .'</td><td>'.  wpp_farsinum(intval($pageVal->wpp_get_all_unique_visit()))."</td></tr>\n";} ?>
        	</table>
        </div>
        <?php    }

} //CLASS

function wpp_farsinum($text) {
   $en_numbrers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
   $fa_numbrers = array('٠', '١', '٢', '٣', '۴', '۵', '۶', '٧', '٨', '٩');
   
   
   global $locale;
   if($locale=='fa_IR'){
      return str_replace($en_numbrers, $fa_numbrers, $text);
   }else{
      return $text;
   }
}


?>