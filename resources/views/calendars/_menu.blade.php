<?php /** @var \App\Models\Calendar $model */ ?>
@inject('dateRenderer', 'App\Renderers\DateRenderer')

<div class="box">
    <div class="box-body box-profile">
        @include ('cruds._image')

        <h3 class="profile-username text-center">{{ $model->name }}
            @if ($model->is_private)
                <i class="fa fa-lock" title="{{ trans('crud.is_private') }}"></i>
            @endif
        </h3>

        <ul class="list-group list-group-unbordered">
            @if ($model->type)
                <li class="list-group-item">
                    <b>{{ trans('calendars.fields.type') }}</b> <span class="pull-right">{{ $model->type }}</span>
                    <br class="clear" />
                </li>
            @endif
            @if ($model->suffix)
                <li class="list-group-item">
                    <b>{{ trans('calendars.fields.suffix') }}</b> <span class="pull-right">{{ $model->suffix }}</span>
                    <br class="clear" />
                </li>
            @endif
            @if ($model->date)
                <li class="list-group-item">
                    <b>{{ trans('calendars.fields.date') }}</b> <span class="pull-right">{{ $dateRenderer->render($model->date) }}</span>
                    <br class="clear" />
                </li>
            @endif
            @include('entities.components.tags')
            @include('entities.components.files')
        </ul>

        @include('.cruds._actions')
    </div>
</div>


@if (!isset($exporting))
    <div class="box box-solid">
        <div class="box-header with-border visible-xs">
            <h3 class="box-title">
                {{ __('crud.tabs.menu') }}
            </h3>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li class="@if(empty($active))active @endif">
                    <a href="{{ route('calendars.show', $model) }}">
                        {{ __('crud.panels.entry') }}
                    </a>
                </li>
                <li class="@if(!empty($active) && $active == 'events')active @endif">
                    <a href="{{ route('calendars.events', $model) }}" title="{{ __('calendars.show.tabs.events') }}">
                        {{ __('calendars.show.tabs.events') }}
                        <span class="label label-default pull-right">
                            <?=$model->calendarEvents()->entityAcl()->count()?>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endif