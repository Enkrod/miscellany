<div class="panel panel-default">
    <div class="panel-heading">
        <h4>{{ trans('crud.panels.entry') }}</h4>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::textarea('entry', $formService->prefill('history', $source), ['class' => 'form-control html-editor', 'id' => 'entry']) !!}
        </div>
    </div>
    <div class="panel-footer">
        <a href="{{ route('helpers.link') }}" target="_blank">{{ trans('crud.linking_help') }}</a>
    </div>
</div>