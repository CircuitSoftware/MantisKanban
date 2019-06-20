<?php
# MantisBT - a php based bugtracking system
# Copyright (C) 2002 - 2013  MantisBT Team - mantisbt-dev@lists.sourceforge.net
# MantisBT is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 2 of the License, or
# (at your option) any later version.
#
# MantisBT is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with MantisBT.  If not, see <http://www.gnu.org/licenses/>.

auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

layout_page_header( plugin_lang_get( 'name_plugin_description_page' ) );

layout_page_begin( 'manage_overview_page.php' );

print_manage_menu( 'manage_plugin_page.php' );

?>

<div class="col-md-12 col-xs-12">
    <div class="space-10"></div>
    <div class="form-container">
        <form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post" enctype="multipart/form-data"> 
            <?php echo form_security_field( 'plugin_kanban_config_edit' ) ?>
            <div class="widget-box widget-color-blue2">
                <div class="widget-header widget-header-small">
                    <h4 class="widget-title lighter">
                        <i class="ace-icon fa fa-cubes"></i>
                        <?php echo plugin_lang_get( 'title' ) . ': ' . plugin_lang_get( 'config' ) ?>
                    </h4>
                </div>
				<div class="widget-body">
                    <div class="widget-main no-padding">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">

							<tr <?php echo helper_alternate_class( )?>>
								<td class="category" width="50%">
									<?php echo plugin_lang_get( 'columns' )?>
								</td>
								<td class="center">
									<label><input type="radio" name="kanban_simple_columns" value="1" <?php echo( ON == plugin_config_get( 'kanban_simple_columns' ) ) ? 'checked="checked" ' : ''?>/>
										<?php echo plugin_lang_get( 'simple_columns' )?></label>
								</td>
								<td class="center">
									<label><input type="radio" name="kanban_simple_columns" value="0" <?php echo( OFF == plugin_config_get( 'kanban_simple_columns' ) ) ? 'checked="checked" ' : ''?>/>
										<?php echo plugin_lang_get( 'combined_columns' )?></label>
								</td>
							</tr>

							<tr>
								<td class="center" colspan="3">
									<input type="submit" class="button" value="<?php echo plugin_lang_get( 'change_configuration' )?>" />
								</td>
							</tr>

							</table>
						</div>
                    </div>
                </div>
            </div>
        </form>
	</div>
</div>

<?php
	if( !function_exists( 'html_page_bottom' ) ) {
		layout_page_end();
	} else {
		html_page_bottom();
	}
