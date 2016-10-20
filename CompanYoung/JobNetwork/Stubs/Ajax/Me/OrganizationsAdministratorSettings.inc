<?php

return '
<div class="col-xs-12">
    <div class="row">
        <div class="panel panel-organization">
            <div class="panel-body">
                <div class="heading">
                    <div class="col-md-2 organization-logo">
                        <div>
                            <img src="{logo.size100}" class="img-circle"/>
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
                <div class="settings">
                    <div class="header col-md-12">
                        <h4>' . trans('general.admin_settings') . '</h2>
                    </div>
                    <div class="informations col-md-12">
                        <div class="row">
                            <div class="col-md-5 text-right pad-t-27">
                                '. trans('general.account_status') .'
                            </div>
                            <div class="col-md-7 bg-grey pad-22">
                                <div class="dropdown filter-dropdown">
                                    <button type="button" class="btn dropdown-toggle language-dropdown"
                                            data-toggle="dropdown" aria-expanded="true">
                                        <div class="selected" data-active="{active}">{selected_text}</div>
                                    </button>
                                    <ul id="options" class="dropdown-menu dropdown-menu-left" role="menu"
                                        aria-labelledby="options">
                                        <li data-id="1">'. trans('general.active') .'</li>
                                        <li data-id="0">'. trans('general.inactive') .'</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 text-right marg-t-25">
                                <a class="btn marg-r-12" href="/me/organizations/">'. trans('general.cancel') .'</a>
                                <a data-id="{id}" id="set_status" class="btn blue">'. trans('general.save') .'</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';