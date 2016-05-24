<?php

return '
<div class="col-md-6">
    <div class="panel panel-organization">
        <div class="panel-body">

            <div class="row heading">
                <div class="col-md-5 organization-logo">
                	<div>
						<img src="{logo.size100}" class="img-circle" />
					</div>
                </div>

                <div class="col-md-7 name">
                    <span>{name}</span>
                </div>
            </div>

            <div class="row information">
                <div class="col-md-4">
                    <span class="number">{posts_count}</span>
                    <div class="text">' . trans('general.jobs') . '</div>
                </div>

                <div class="col-md-4">
                    <span class="number">{users_count}</span>
                    <div class="text">' . trans('general.profiles') . '</div>
                </div>

                <div class="col-md-4">
                    <span class="number">{jobagents_count}</span>
                    <div class="text">' . trans('general.jobagents') . '</div>
                </div>
            </div>

			<div class="buttons">
				<div class="row">
					<div class="col-md-4">
						<a class="btn btn-default" href="//{subdomain}.' . env('DOMAIN') . '/settings/organization">' . trans('general.settings') . '</a>
					</div>
					<div class="col-md-8">
						<a class="btn btn-secondary pull-right" href="//{subdomain}.' . env('DOMAIN') . '">' . trans('general.go_to_organization') . '</a>
					</div>
				</div>
			</div>

        </div>
    </div>
</div>
';