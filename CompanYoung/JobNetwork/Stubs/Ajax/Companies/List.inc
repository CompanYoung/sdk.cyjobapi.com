<?php

return '
<tr data-id="{id}">
    <td><img src="{logo.size50}" class="img-circle" style="width:50px;max-height:50px;"> {name}</td>
    <td>{created_at}</td>
    <td>{status}</td>
    <td>{type}</td>
    <td>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
                ' . trans('general.actions') . '
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="/companies/{id}/company-info">' . trans('general.edit') . '</a></li>
                <li class="divider"></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" class="{activateState}">{activateText}</a></li>
            </ul>
        </div>
    </td>
</tr>
';