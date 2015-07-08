<?php

return '
<tr data-id="{id}">
    <td><img src="//' . getenv('IMAGE_DOMAIN') . '/assets/pictures/crawlers/logos/{media_id}.jpg"></td>
    <td>{name}</td>
    <td>{updated_at}</td>
    <td>{status}</td>
    <td>
		<button class="set-inactive btn {inactive} pull-right">' . trans('general.inactive') . '</button>
		<button class="set-active btn {active} pull-right">' . trans('general.active') . '</button>
    </td>
</tr>
';