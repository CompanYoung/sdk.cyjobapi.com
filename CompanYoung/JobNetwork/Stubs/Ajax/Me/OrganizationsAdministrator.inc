<?php

return '
<div class="col-xs-12">
<div class="row">
    <div class="panel panel-organization">
        <div class="panel-body">
            <div class="heading">
                <div class="col-md-2 organization-logo">
                	<div>
						<img src="{logo.size100}" class="img-circle" />
					</div>
                </div>

                <div class="col-md-4 name">
                    <span>{name}</span>
                </div>
                <div class="col-md-2">
                    <span class="number">{posts_count}</span>
                    <div class="text">' . trans('general.jobs') . '</div>
                </div>

                <div class="col-md-2">
                    <span class="number">{users_count}</span>
                    <div class="text">' . trans('general.profiles') . '</div>
                </div>

                <div class="col-md-2">
                    <span class="number">{jobagents_count}</span>
                    <div class="text">' . trans('general.jobagents') . '</div>
                </div>
            </div>

			<div class="buttons">
			<div class="btn-left col-md-6">
									<a class="btn marg-r-12" href="//{subdomain}.' . env('DOMAIN') . '/settings/organization">' . trans('general.edit') . '</a>
						<a class="btn btn-connect {hiddenState}" data-unsubscribed="{unsubscribedText}" data-subscribed="{subscribedText}" data-id="{id}">{connectedText}</a>
			</div>
			<div class="btn-right col-md-6">

			            <a class="btn pull-right {multiBtnColor} {subscribeClass}" {multiBtnHref}  data-id="{id}">{multiBtnText}</a>
			</div>
			</div>

        </div>
    </div>
    </div>
</div>
';