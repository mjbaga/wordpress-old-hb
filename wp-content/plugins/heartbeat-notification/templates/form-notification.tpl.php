<p>
  <label for="<?php print $data['title_name']; ?>"><?php _e( 'Title: ' ); ?></label>
  <input class="widefat" id="<?php print $data['title_id']; ?>" name="<?php print $data['title_name']; ?>" value="<?php print $data['title']; ?>"/>
</p>
<p>
  <label for="<?php print $data['notification_name']; ?>"><?php _e( 'Notification: ' ); ?></label>
  <textarea class="widefat" id="<?php print $data['notification_id']; ?>" name="<?php print $data['notification_name']; ?>"><?php print $data['notification']?></textarea>
</p>
<p>
  <label for="<?php print $data['notification_start_date_name']; ?>"><?php _e( 'Notification Start Date (YYYY/MM/DD): ' ); ?></label>
  <input class="widefat" id="<?php print $data['notification_start_date_id']; ?>" name="<?php print $data['notification_start_date_name']; ?>" value="<?php print $data['notification_start_date']; ?>"/>
</p>
<p>
  <label for="<?php print $data['notification_start_time_name']; ?>"><?php _e( 'Notification Start Time (HH:MM): ' ); ?></label>
  <input class="widefat" id="<?php print $data['notification_start_time_id']; ?>" name="<?php print $data['notification_start_time_name']; ?>" value="<?php print $data['notification_start_time']; ?>"/>
</p>
<p>
  <label for="<?php print $data['notification_end_date_name']; ?>"><?php _e( 'Notification End Date (YYYY/MM/DD): ' ); ?></label>
  <input class="widefat" id="<?php print $data['notification_end_date_id']; ?>" name="<?php print $data['notification_end_date_name']; ?>" value="<?php print $data['notification_end_date']; ?>"/>
</p>
<p>
  <label for="<?php print $data['notification_end_time_name']; ?>"><?php _e( 'Notification End Time (HH:MM): ' ); ?></label>
  <input class="widefat" id="<?php print $data['notification_end_time_id']; ?>" name="<?php print $data['notification_end_time_name']; ?>" value="<?php print $data['notification_end_time']; ?>"/>
</p>
