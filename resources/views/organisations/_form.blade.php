@inject('formService', 'App\Services\FormService')

{{ csrf_field() }}
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{{ trans('crud.panels.general_information') }}</h4>
            </div>
            <div class="panel-body">
                <div class="form-group required">
                    <label>{{ trans('organisations.fields.name') }}</label>
                    {!! Form::text('name', $formService->prefill('name', $source), ['placeholder' => trans('organisations.placeholders.name'), 'class' => 'form-control', 'maxlength' => 191]) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('organisations.fields.type') }}</label>
                    {!! Form::text('type', $formService->prefill('type', $source), ['placeholder' => trans('organisations.placeholders.type'), 'class' => 'form-control', 'maxlength' => 191]) !!}
                </div>
                <div class="form-group">
                    {!! Form::select2(
                        'organisation_id',
                        (isset($model) && $model->organisation ? $model->organisation : $formService->prefillSelect('organisation', $source)),
                        App\Models\Organisation::class,
                        true,
                        'organisations.fields.organisation'
                    ) !!}
                </div>

                @include('cruds.fields.location')

                @if ($campaign->enabled('characters'))
                    <div class="form-group">
                        {!! Form::members(
                            'id',
                            [
                                'model' => isset($model) ? $model : null
                            ]
                        ) !!}
                    </div>
                @endif

                @include('cruds.fields.tags')


                @include('cruds.fields.attribute_template')

                @if (Auth::user()->isAdmin())
                    <hr>
                    @include('cruds.fields.private')
                @endif
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{{ trans('crud.panels.appearance') }}</h4>
            </div>
            <div class="panel-body">
                @include('cruds.fields.image')
            </div>
        </div>
    </div>
    <div class="col-md-6">
        @include('cruds.fields.entry')
        @include('cruds.fields.copy')
    </div>
</div>

@include('cruds.fields.save')

@section('scripts')
    @parent
    <script src="{{ mix('js/organisation.js') }}" defer></script>
@endsection