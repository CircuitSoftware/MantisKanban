Mantis Kanban
=============

This is a fork of the modified MantisKanban plugin which can be found here: https://github.com/mantisbt-plugins/MantisKanban (Origin: https://github.com/thinksentient/MantisKanban)
Since the plugin is not maintained anymore  I've decided to fork and extend it to work with MantisBT 2.x.

Installation
------------

__Prerequisites__
* MantisBT 2.0 or higher

__Setup__
*   Upload the "MantisKanban" folder to your Mantis "plugins" folder
*   Activate the plugin in your Mantis backend
*   edit "pages/kanban_page.php" and define at least your desired columns and "wip" limits. (see the "$columns" array)

Changelog
---------
__New features in version 2.0.:__
*   compatibility with MantisBT 2.x

__New features in version 1.2.:__
*   make use of the default states
*   filter directly in the kanban view
*   change user on the ticket
*   drag&drop of tickets
*   styled the readme

__New features in version 1.1.:__
*   fixed the base plugin, should run now "out of the box"
*   added AJAX support: you can now change the ticket status from the Kanban board via AJAX dropdown
*   made the tickets sortable by date or by priority
*   added alternative / optional view for "All projects" (separate row for each project)
*   added "work in progress" limits per column - if limit is reached, the column becomes red
*   made column titles multilingual
*   uses the most important filters from the general list view in Mantis (selected user etc.)
