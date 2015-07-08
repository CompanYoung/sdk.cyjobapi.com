<?php

return '
<tr data-job="{id}">
    <td><img src="{logo.url}" class="img-circle" style="width:50px;max-height:50px;"> {name}</td>
    <td>{created_at}</td>
    <td>{status}</td>
    <td>{type}</td>
    <td>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
                Actions
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="/companies/{id}">Redigér</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Deaktivér</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Slet</a></li>
            </ul>
        </div>
    </td>
</tr>
';