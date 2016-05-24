<?php

return '
<tr data-job="{id}">
    <td><img src="{picture.size50}" class="img-circle" style="width:50px;max-height:50px;"> {first_name} {last_name}</td>
    <td>{created_at}</td>
    <td>{jobagents}</td>
    <td>{companies}</td>
    <td>{status}</td>
	<td>
		<div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
                ' . trans('general.actions') . '
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" class="statistics">' . trans('general.send_new_password') . '</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" class="edit" href="/users/{id}/user-info">' . trans('general.edit') . '</a></li>
                <li class="divider"></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" class="{activateState}">{activateText}</a></li>
            </ul>
        </div>
	</td>
</tr>
';