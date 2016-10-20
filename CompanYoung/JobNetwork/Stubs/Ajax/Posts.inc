<?php

return '
<tr data-id="{id}" class="clickable">
    <td><img src="{company.logo.size50}" class="img-circle" style="width:50px;max-height:50px;"> </td>
	<td>{title}</td>
    <td>{company.name}</td>
    <td>{status}</td>
    <td>{created_at}</td>
    <td>{deadline_at}</td>
    <td>{type}</td>
    <td>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
                ' . trans('general.actions') . '
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" class="statistics">' . trans('general.statistics') . '</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" class="edit" href="/jobs/{id}/company-info">' . trans('general.edit') . '</a></li>
                <li class="divider"></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" class="{activateState}">{activateText}</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" class="delete">'. trans('general.delete') .'</a></li>

            </ul>
        </div>
    </td>
</tr>
';