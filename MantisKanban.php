<?php
/**
 * MantisBT - A PHP based bugtracking system
 *
 * MantisBT is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * MantisBT is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with MantisBT.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @copyright Copyright 2002  MantisBT Team - mantisbt-dev@lists.sourceforge.net
 */

 /**
 * Mantis Kanban plugin
 */
class MantisKanbanPlugin extends MantisPlugin {

    function register() {
        $this->name        = 'Mantis Kanban';
        $this->description = 'Advanced Kanban board view';
        $this->page        = 'config_page';

        $this->version = '2.0';
        
        $this->requires = array(
            'MantisCore' => '2.0.0',
            'jQueryUI'   => '1.12.1',
        );

        $this->author  = 'Joanna Chlasta, Stefan Moises, Joscha Krug, Andreas Lindner';
        $this->contact = 'mantiskanban@mycircuit.net';
        $this->url     = 'https://github.com/CircuitSoftware/MantisKanban';
    }

    function init() {
        spl_autoload_register(array('MantisKanbanPlugin', 'autoload'));

        $t_path = config_get_global('plugin_path') . plugin_get_current() . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR;

        set_include_path(get_include_path() . PATH_SEPARATOR . $t_path);

        // register our custom tables
        #$GLOBALS['g_db_table']['mantis_team_user_table']    = '%db_table_prefix%_team_user%db_table_suffix%';
        #$GLOBALS['g_db_table']['mantis_team_table']         = '%db_table_prefix%_team%db_table_suffix%';
    }

    public static function autoload($className) {
        if (class_exists('ezcBase')) {
            ezcBase::autoload($className);
        }
    }

    function config() {
        return array(
            'kanban_simple_columns'    => ON,
            // Access rights
            'kanban_manage__threshold' => DEVELOPER,
            'kanban_view_threshold'    => DEVELOPER,
            'kanban_edit_threshold'    => DEVELOPER,
        );
    }

    function hooks() {
        $hooks = array(
            'EVENT_MENU_MAIN'        => 'main_menu',
            'EVENT_LAYOUT_RESOURCES' => 'resources',
        );
        return $hooks;
    }

    /**
     * Adds a new link to the main menu to enter the kanban board
     * @return array new link for the main menu
     */
    function main_menu() {
        //return array('<a href="' . plugin_page('kanban_page') . '">' . plugin_lang_get('main_menu_kanban') . '</a>',);
        $links = array();
        $links[] = array(
            'title'        => plugin_lang_get('main_menu_kanban'),
            'url'          => plugin_page('kanban_page'),
            'access_level' => plugin_config_get( 'kanban_view_threshold' ),
            'icon'         => 'fa-columns'
        );
        return $links;
    }

    /**
     * Create the resource link to load the jQuery library.
     */
    function resources( $p_event ) {
        
        return '<link rel="stylesheet" type="text/css" href="' . plugin_file( 'kanban.css' ) . '" />' . 
               '<script type="text/javascript" src="' . plugin_file( 'kanban.js' ) . '"></script>';
    }

}