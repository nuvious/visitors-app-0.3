<?php
defined('ABSPATH') or die();
if (! current_user_can ('manage_options')) wp_die (__ ('No tienes suficientes permisos para acceder a esta página.'));
?>
    <div class="wrap">
        <h1 class="wp-heading-inline"><?php echo __("Visitors", "Visitors"); ?></h1>

        <hr class="wp-header-end">

        <ul class="subsubsub">
            <li class="all"><a href="admin.php?page=<?php echo VST_NAMEPLUGIN; ?>/admin/start.php" aria-current="page"><?php echo __("Start", "Visitors"); ?></a> |</li>
            <li class="active"><a href="admin.php?page=<?php echo VST_NAMEPLUGIN; ?>/admin/about.php" class="current" ><?php echo __("About", "Visitors"); ?></a></li>
        </ul>

        </br></br></br>
        <center>
                <table border="1">
                    <tr>
                        <td>
                            <center>
                                <h1 class="wp-heading-inline"><a href="https://github.com/domingoruiz/WORDPRESS_visitantes"><?php echo __("Visitors", "Visitors"); ?> v<?php echo VST_VERSION; ?></a></h1>
                                <h3><?php echo __("Small utility to register visitors to your Wordpress blog", "Visitors"); ?></h3>
                                <h3><a href="https://doming.es/"><?php echo __("Developed by Domingo Ruiz Arroyo", "Visitors"); ?></a></h3>
                            </center>
                        </td>
                    </tr>
                </table>
        </center>
    </div>
<?php
?>