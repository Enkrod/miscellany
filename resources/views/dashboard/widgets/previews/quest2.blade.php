<?php
/** @var \App\Models\Quest $model */
$model = $widget->entity->child;
?>
<div class="box box-widget widget-user" id="dashboard-widget-{{ $widget->id }}">
    <div class="widget-user-header bg-gray" @if (!empty($model->image)) style="background-image: url({{ $model->getImageUrl() }})" @endif >
        <div class="widget-user-overlay">
            <h3 class="widget-user-username">
                <a href="{{ $model->getLink() }}">{{ $widget->entity->name }}</a>
                @if ($model->is_private)
                    <i class="fa fa-lock pull-right" title="{{ trans('crud.is_private') }}"></i>
                @endif
            </h3>
            @if ($campaign->enabled('characters') && !empty($model->character))
            <h5 class="widget-user-desc">
                <a href="{{ route('characters.show', $model->character->id) }}" data-toggle="tooltip" title="{{ $model->character->tooltip() }}">
                    {{ $model->character->name }}
                </a>
            </h5>
            @endif

            @if ($model->is_completed)
                <h5>{{ __('quests.fields.is_completed') }}</h5>
            @endif
        </div>
    </div>
    <div class="box-body">
        {!! $model->entry !!}
    </div>
</div>