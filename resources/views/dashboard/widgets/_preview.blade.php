<?php
/** @var \App\Models\MiscModel $model */
$model = $widget->entity->child;

$specificPreview = 'dashboard.widgets.previews.' . $widget->entity->type;
?>
@if(view()->exists($specificPreview))
    @include($specificPreview)
@else
<div class="panel panel-default widget-preview" id="dashboard-widget-{{ $widget->id }}">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="{{ $model->getLink() }}">
                @if (!empty($model->image))
                    <div class="entity-image" style="background-image: url({{ $model->getImageUrl(true) }})"></div>
                @endif
                {{ $widget->entity->name }}
            </a>

            @if ($model->is_private)
                <i class="fa fa-lock pull-right" title="{{ trans('crud.is_private') }}"></i>
            @endif
        </h3>
    </div>
    <div class="panel-body">
        <div class="pinned-entity preview" data-toggle="preview" id="widget-preview-body-{{ $widget->id }}">
            {!! $model->entry !!}
        </div>
        <a href="#" class="preview-switch hidden"
           id="widget-preview-switch-{{ $widget->id }}" data-widget="{{ $widget->id }}">
            <i class="fa fa-chevron-down"></i>
        </a>
    </div>

    @if ($widget->entity->type == \App\Models\Entity::TYPE_LOCATION)
        @if (!empty($widget->entity->child->map))
            <div class="panel-footer text-right">
                <a href="{{ $widget->entity->child->getLink('map') }}">
                    <i class="fa fa-map"></i> {{ __('locations.show.tabs.map') }}
                </a>
            </div>
        @endif
    @endif
</div>
@endif