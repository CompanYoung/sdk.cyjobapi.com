<?php

return '
<tr data-id="{id}" class="clickable">
    <td>
     <input type="checkbox" name="all_users" value="{id}" id="person_{id}" class="inline list_checkbox">
                            <label for="person_{id}" class="radiobutton_label">
                                <span></span>
                                <div class="radio_circle"></div>
                            </label>
</td>
    <td><div class="msg-note {message_read}"></div> <img src="{picture.size50}" class="img-circle" style="width:50px;max-height:50px;"> {first_name} {last_name}</td>
    <td>{created_at}</td>
    <td>{jobagents}</td>
    <td>{companies}</td>
    <td>{status}</td>
	<td>
	</td>
</tr>
';
//<li role="presentation"><a role="menuitem" tabindex="-1" class="edit" href="/users/{id}/user-info">' . trans('general.edit') . '</a></li>
