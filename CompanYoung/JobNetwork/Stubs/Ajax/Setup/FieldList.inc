<?php
return '
<tr data-id="{id}">
    <td>{name}</td>
    <td>{status}</td>
    <td>{type_name}</td>
	<td>
		<div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
                ' . trans('general.actions') . '
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" data-id="{id}" class="edit">' . trans('general.edit') . '</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" data-id="{id}" class="activate">{activateText}</a></li>
                <li class="divider"></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" data-id="{id}" class="delete">'. trans('general.delete') .'</a></li>
            </ul>
        </div>
	</td>
</tr>
';