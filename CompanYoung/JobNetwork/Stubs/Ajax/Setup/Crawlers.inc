<?php

return '
<tr data-id="{id}" class="{classStatus}">
    <td><img class="crawler-img" src="//' . getenv('IMAGE_DOMAIN') . '/crawlers/pictures/logos/{media_id}.jpg"></td>
    <td>{name}</td>
    <td>{updated_at}</td>
    <td>{status}</td>
    <td>
		<button class="set-inactive btn {classInactive} pull-right">' . trans('general.inactive') . '</button>
		<button class="set-active btn {classActive} pull-right">' . trans('general.active') . '</button>
    </td>
</tr>
';