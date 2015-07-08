<?php

return '
<tr data-job="{id}">
    <td><img src="{picture}" class="img-circle" style="width:50px;max-height:50px;"> {name}</td>
    <td>{created_at}</td>
    <td>{jobagents}</td>
    <td>{followers}</td>
	<td>
		<div class="dropdown">
			<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
				Actions <span class="caret"></span>
			</button>
			<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Send new password</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Set inactive</a></li>
				<li class="divider"></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Slet</a></li>
			</ul>
		</div>
	</td>
</tr>
';