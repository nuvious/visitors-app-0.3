<?php
defined('ABSPATH') or die();
if (! current_user_can ('manage_options')) wp_die (__ ('No tienes suficientes permisos para acceder a esta página.'));
?>
     <div class="wrap">
        <h1 class="wp-heading-inline"><?php echo __("Visitors", "Visitors"); ?></h1>

        <hr class="wp-header-end">

       <ul class="subsubsub">
            <li class="all"><a href="admin.php?page=<?php echo VST_NAMEPLUGIN; ?>/admin/start.php" class="current" aria-current="page"><?php echo __("Start", "Visitors"); ?></a> |</li>
            <li class="active"><a href="admin.php?page=<?php echo VST_NAMEPLUGIN; ?>/admin/about.php"><?php echo __("About", "Visitors"); ?></a></li>
        </ul>

         <table class="wp-list-table widefat plugins" style="text-align: center">
             <tr>
                 <th scope="col" colspan="4">
                     <center>
                         <form method="get" action="admin.php">
                             <input type="hidden" name="page" value="<?php echo VST_NAMEPLUGIN; ?>/admin/start.php"></input>
                             <select name="time" onchange="this.form.submit()">
                                 <option value="today" <?php if($_GET["time"] == "today" || !$_GET["time"]) {echo "selected"; $date_start = VST_today(); $date_finish = VST_today();} ?>><?php echo __("Today", "Visitors"); ?> (<?php echo VST_today()->format(get_option('date_format')); ?>)</option>
                                 <option value="yesterday" <?php if($_GET["time"] == "yesterday") {echo "selected"; $date_start = VST_yesterday(); $date_finish = VST_yesterday();} ?>><?php echo __("Yesterday", "Visitors"); ?> (<?php echo VST_yesterday()->format(get_option('date_format')); ?>)</option>
                                 <option value="week" <?php if($_GET["time"] == "week") {echo "selected"; $date_start = VST_this_week()[0]; $date_finish = VST_this_week()[1];} ?>><?php echo __("This Week", "Visitors"); ?> (<?php echo VST_this_week()[0]->format(get_option('date_format'))." - ". VST_this_week()[1]->format( get_option( 'date_format' ) ); ; ?>)</option>
                                 <option value="month" <?php if($_GET["time"] == "month") {echo "selected"; $date_start = VST_this_month()[0]; $date_finish = VST_this_month()[1];} ?>><?php echo __("This Month", "Visitors"); ?> (<?php echo VST_this_month()[0]->format(get_option('date_format'))." - ". VST_this_month()[1]->format( get_option( 'date_format' ) ); ; ?>)</option>
                                 <option value="year" <?php if($_GET["time"] == "year") {echo "selected"; $date_start = VST_this_year()[0]; $date_finish = VST_this_year()[1];} ?>><?php echo __("This Year", "Visitors"); ?> (<?php echo VST_this_year()[0]->format(get_option('date_format'))." - ". VST_this_year()[1]->format( get_option( 'date_format' ) ); ; ?>)</option>
                             </select>
                         </form>
                     </center>
                 </th>
             </tr>
             <tr>
                 <th scope="col" ><center><b><?php echo __("Users", "Visitors"); ?></b></center></th>
                 <th scope="col"><center><b><?php echo __("Visits", "Visitors"); ?></b></center></th>
             </tr>
             <tr>
                 <th><center><?php echo VST_get_statistics($date_start, $date_finish)[0]; ?></center></th>
                 <th><center><?php echo VST_get_statistics($date_start, $date_finish)[1]; ?></center></th>
             </tr>
         </table>
         <table class="wp-list-table widefat plugins">
                <thead>
                <tr>
                    <th scope="col" id="description" class="manage-column column-description"><b>#</b></th>
                    <th scope="col" id="description" class="manage-column column-description"><b><?php echo __("Date and Time", "Visitors"); ?></b></th>
                    <th scope="col" id="name" class="manage-column column-name column-primary"><b><?php echo __("URL", "Visitors"); ?></b></th>
                    <th scope="col" id="description" class="manage-column column-description"><b><?php echo __("IP", "Visitors"); ?></b></th>
                    <th scope="col" id="description" class="manage-column column-description"><b><?php echo __("Browser", "Visitors"); ?></b></th>
                </tr>
                </thead>

                <tbody id="the-list">
                <?php
                $i=count(VST_get_records($date_start, $date_finish));
                foreach(VST_get_records($date_start, $date_finish) as $record) {
	                echo '
                        <tr class="active" >
                            <td scope="row" >'.$i.'</td>
                            <td scope="row" >'.date_format(date_create($record->datetime), get_option("links_updated_date_format")).'</td>
                            <td scope="row" >'.$record->patch.'</td>
                            <td scope="row" ><a href="https://www.geolocation.com/es?ip='.$record->ip.'#ipresult">'.$record->ip.'</a></td>
                            <td>'.$record->useragent.'</td>
                        </tr>';
	                $i--;
                }
                ?>
                </tbody>
       </table>

        <span class="spinner"></span>
    </div>
<?php
?>