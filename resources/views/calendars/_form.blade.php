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
                    <label>{{ trans('calendars.fields.name') }}</label>
                    {!! Form::text('name', $formService->prefill('name', $source), ['placeholder' => trans('calendars.placeholders.name'), 'class' => 'form-control', 'maxlength' => 191]) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('calendars.fields.type') }}</label>
                    {!! Form::text('type', $formService->prefill('type', $source), ['placeholder' => trans('calendars.placeholders.type'), 'class' => 'form-control', 'maxlength' => 191]) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('calendars.fields.suffix') }}</label>
                    {!! Form::text('suffix', $formService->prefill('suffix', $source), ['placeholder' => trans('calendars.placeholders.suffix'), 'class' => 'form-control', 'maxlength' => 191]) !!}
                </div>
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

        <div class="panel panel-default">
            <div class="panel-heading panel-toggable">
                <h4>{{ trans('calendars.fields.date') }} <i class="fa fa-caret-down pull-right"></i></h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">

                        <div class="form-group">
                            <label>{{ trans('calendars.fields.current_year') }}</label>
                            {!! Form::number('current_year', !empty($model) ? $model->currentDate('year') : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label>{{ trans('calendars.fields.current_month') }}</label>
                            {!! Form::number('current_month', !empty($model) ? $model->currentDate('month') : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label>{{ trans('calendars.fields.current_day') }}</label>
                            {!! Form::number('current_day', !empty($model) ? $model->currentDate('date') : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading panel-toggable">
                <h4>{{ trans('calendars.fields.months') }} <i class="fa fa-caret-down pull-right"></i></h4>
            </div>
            <div class="panel-body">
                <p class="help-block">{{ __('calendars.hints.months') }}</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">{{ trans('calendars.parameters.month.name') }}</div>
                        <div class="col-md-6">{{ trans('calendars.parameters.month.length') }}</div>
                    </div>
                </div>
                <?php
                $months = [];
                $names = old('month_name');
                $lengths = old('month_length');
                if (!empty($names)) {
                    $cpt = 0;
                    foreach ($names as $name) {
                        if (!empty($name) || !empty($lengths[$cpt])) {
                            $months[] = [
                                'name' => $name,
                                'length' => $lengths[$cpt]
                            ];
                        }
                        $cpt++;
                    }
                } elseif (isset($model)) {
                    $months = $model->months();
                } elseif (isset($source)) {
                    $months = $source->months();
                }?>
                <div class="calendar-months">
                    @foreach ($months as $month)
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="fa fa-arrows-alt-v"></span>
                                    </span>
                                        {!! Form::text('month_name[]', $month['name'], ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        {!! Form::text('month_length[]', $month['length'], ['class' => 'form-control']) !!}
                                        <span class="input-group-btn">
                                        <span class="month-delete btn btn-danger" data-remove="4" title="{{ trans('crud.remove') }}">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="btn btn-default" id="add_month" href="#" title="{{ trans('calendars.actions.add_month') }}">
                    <i class="fa fa-plus"></i> {{ trans('calendars.actions.add_month') }}
                </a>

                <div class="form-group" id="template_month" style="display: none">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="fa fa-arrows-alt-v"></span>
                                </span>
                                {!! Form::text('month_name[]', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::text('month_length[]', null, ['class' => 'form-control']) !!}
                                <span class="input-group-btn">
                                    <span class="month-delete btn btn-danger" data-remove="4" title="{{ trans('crud.remove') }}">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading panel-toggable">
                <h4>{{ trans('calendars.fields.moons') }} <i class="fa fa-caret-down pull-right"></i></h4>
            </div>
            <div class="panel-body">
                <p class="help-block">{{ __('calendars.hints.moons') }}</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">{{ trans('calendars.parameters.moon.name') }}</div>
                        <div class="col-md-6">{{ trans('calendars.parameters.moon.fullmoon') }}</div>
                    </div>
                </div>
                <?php
                $moons = [];
                $names = old('moon_name');
                $fullmoons = old('moon_fullmoon');
                if (!empty($names)) {
                    $cpt = 0;
                    foreach ($names as $name) {
                        if (!empty($name) || !empty($fullmoons[$cpt])) {
                            $moons[] = [
                                'name' => $name,
                                'length' => $fullmoons[$cpt]
                            ];
                        }
                        $cpt++;
                    }
                } elseif (isset($model)) {
                    $moons = $model->moons();
                } elseif (isset($source)) {
                    $moons = $source->moons();
                }?>
                <div class="calendar-moons">
                    @foreach ($moons as $fullmoon => $moon)
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="fa fa-arrows-alt-v"></span>
                                    </span>
                                        {!! Form::text('moon_name[]', $moon, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        {!! Form::text('moon_fullmoon[]', $fullmoon, ['class' => 'form-control']) !!}
                                        <span class="input-group-btn">
                                        <span class="month-delete btn btn-danger" data-remove="4" title="{{ trans('crud.remove') }}">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="btn btn-default" id="add_moon" href="#" title="{{ trans('calendars.actions.add_moon') }}">
                    <i class="fa fa-plus"></i> {{ trans('calendars.actions.add_moon') }}
                </a>

                <div class="form-group" id="template_moon" style="display: none">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="fa fa-arrows-alt-v"></span>
                                </span>
                                {!! Form::text('moon_name[]', null, ['class' => 'form-control', 'placeholder' => __('calendars.parameters.moon.name')]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::text('moon_fullmoon[]', null, ['class' => 'form-control', 'placeholder' => __('calendars.parameters.moon.fullmoon')]) !!}
                                <span class="input-group-btn">
                                    <span class="month-delete btn btn-danger" data-remove="4" title="{{ trans('crud.remove') }}">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{{ trans('crud.panels.entry') }}</h4>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    {!! Form::textarea('entry', $formService->prefill('entry', $source), ['class' => 'form-control html-editor', 'id' => 'entry']) !!}
                </div>
            </div>
            <div class="panel-footer">
                <a href="{{ route('helpers.link') }}" target="_blank">{{ trans('crud.linking_help') }}</a>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading  panel-toggable">
                <h4>{{ trans('calendars.fields.weekdays') }} <i class="fa fa-caret-down pull-right"></i></h4>
            </div>
            <div class="panel-body">
                <p class="help-block">{{ __('calendars.hints.weekdays') }}</p>
                <?php
                $weekdays = [];
                $names = old('weekday');
                if (!empty($names)) {
                    foreach ($names as $name) {
                        if (!empty($name)) {
                            $weekdays[] = $name;
                        }
                    }
                } elseif (isset($model)) {
                    $weekdays = $model->weekdays();
                } elseif (isset($source)) {
                    $weekdays = $source->weekdays();
                } ?>
                <div class="calendar-weekdays">
                    @foreach ($weekdays as $weekday)
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <span class="fa fa-arrows-alt-v"></span>
                            </span>
                                {!! Form::text('weekday[]', $weekday, ['class' => 'form-control']) !!}
                                <span class="input-group-btn">
                                <span class="month-delete btn btn-danger" title="{{ trans('crud.remove') }}">
                                    <i class="fa fa-trash"></i>
                                </span>
                            </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="btn btn-default" id="add_weekday" href="#" title="{{ trans('calendars.actions.add_weekday') }}">
                    <i class="fa fa-plus"></i> {{ trans('calendars.actions.add_weekday') }}
                </a>

                <div class="form-group" id="template_weekday" style="display: none">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="fa fa-arrows-alt-v"></span>
                        </span>
                        {!! Form::text('weekday[]', null, ['class' => 'form-control']) !!}
                        <span class="input-group-btn">
                            <span href="#" class="month-delete btn btn-danger" title="{{ trans('crud.remove') }}">
                                <i class="fa fa-trash"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading panel-toggable">
                <h4>{{ trans('calendars.panels.years') }} <i class="fa fa-caret-down pull-right"></i></h4>
            </div>
            <div class="panel-body">
                <p class="help-block">{{ __('calendars.hints.years') }}</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">{{ trans('calendars.parameters.year.number') }}</div>
                        <div class="col-md-6">{{ trans('calendars.parameters.year.name') }}</div>
                    </div>
                </div>
                <?php
                $years = [];
                $numbers = old('year_number');
                $names = old('year_name');
                if (!empty($numbers)) {
                    $cpt = 0;
                    foreach ($numbers as $number) {
                        if (!empty($number) || !empty($names[$cpt])) {
                            $years[$number] = $names[$cpt];
                        }
                        $cpt++;
                    }
                } elseif (isset($model)) {
                    $years = $model->years();
                } elseif (isset($source)) {
                    $years = $source->years();
                } ?>
                <div class="calendar-years">
                    @foreach ($years as $year => $name)
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="fa fa-arrows-alt-v"></span>
                                    </span>
                                        {!! Form::text('year_number[]', $year, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        {!! Form::text('year_name[]', $name, ['class' => 'form-control']) !!}
                                        <span class="input-group-btn">
                                        <span class="month-delete btn btn-danger" data-remove="4" title="{{ trans('crud.remove') }}">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="btn btn-default" id="add_year" href="#" title="{{ trans('calendars.actions.add_year') }}">
                    <i class="fa fa-plus"></i> {{ trans('calendars.actions.add_year') }}
                </a>

                <div class="form-group" id="template_year" style="display: none">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="fa fa-arrows-alt-v"></span>
                                </span>
                                {!! Form::number('year_number[]', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::text('year_name[]', null, ['class' => 'form-control']) !!}
                                <span class="input-group-btn">
                                    <span class="month-delete btn btn-danger" data-remove="4" title="{{ trans('crud.remove') }}">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading panel-toggable">
                <h4>{{ trans('calendars.panels.leap_year') }} <i class="fa fa-caret-down pull-right"></i></h4>
            </div>
            <div class="panel-body">
                <div class="form-group checkbox">
                    {!! Form::hidden('has_leap_year', 0) !!}
                    <label>{!! Form::checkbox('has_leap_year', 1, $formService->prefill('has_leap_year', $source)) !!}
                        {{ trans('calendars.fields.has_leap_year') }}
                    </label>
                </div>
                <div class="" id="calendar-leap-year" style="@if (isset($model) && $model->has_leap_year || request()->old('has_leap_year') || (isset($source) && $source->has_leap_year))@else display:none; @endif">
                    <div class="form-group">
                        <label>{{ trans('calendars.fields.leap_year_amount') }}</label>
                        {!! Form::number('leap_year_amount', $formService->prefill('leap_year_amount', $source), ['placeholder' => trans('calendars.placeholders.leap_year_amount'), 'class' => 'form-control', 'maxlength' => 191]) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('calendars.fields.leap_year_month') }}</label>
                        {!! Form::number('leap_year_month', $formService->prefill('leap_year_month', $source), ['placeholder' => trans('calendars.placeholders.leap_year_month'), 'class' => 'form-control', 'maxlength' => 191]) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('calendars.fields.leap_year_offset') }}</label>
                        {!! Form::number('leap_year_offset', $formService->prefill('leap_year_offset', $source), ['placeholder' => trans('calendars.placeholders.leap_year_offset'), 'class' => 'form-control', 'maxlength' => 191]) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ trans('calendars.fields.leap_year_start') }}</label>
                        {!! Form::number('leap_year_start', $formService->prefill('leap_year_start', $source), ['placeholder' => trans('calendars.placeholders.leap_year_start'), 'class' => 'form-control', 'maxlength' => 191]) !!}
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading panel-toggable">
                <h4>{{ trans('calendars.fields.seasons') }} <i class="fa fa-caret-down pull-right"></i></h4>
            </div>
            <div class="panel-body">
                <p class="help-block">{{ __('calendars.hints.seasons') }}</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">{{ trans('calendars.parameters.seasons.name') }}</div>
                        <div class="col-md-4">{{ trans('calendars.parameters.seasons.month') }}</div>
                        <div class="col-md-4">{{ trans('calendars.parameters.seasons.day') }}</div>
                    </div>
                </div>
                <?php
                $seasons = [];
                $seasonNames = old('season_name');
                $seasonMonths = old('season_month');
                $seasonDays = old('season_day');
                if (!empty($seasonNames)) {
                    $cpt = 0;
                    foreach ($seasonNames as $name) {
                        if (!empty($name) || !empty($seasonMonths[$cpt])) {
                            $seasons[] = [
                                'name' => $name,
                                'month' => $seasonMonths[$cpt],
                                'day' => $seasonDays[$cpt]
                            ];
                        }
                        $cpt++;
                    }
                } elseif (isset($model)) {
                    $seasons = $model->seasons();
                } elseif (isset($source)) {
                    $seasons = $source->seasons();
                }?>
                <div class="calendar-seasons">
                    @foreach ($seasons as $season)
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="fa fa-arrows-alt-v"></span>
                                        </span>
                                        {!! Form::text('season_name[]', $season['name'], ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    {!! Form::number('season_month[]', $season['month'], ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        {!! Form::number('season_day[]', $season['day'], ['class' => 'form-control']) !!}
                                        <span class="input-group-btn">
                                        <span class="month-delete btn btn-danger" data-remove="4" title="{{ trans('crud.remove') }}">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="btn btn-default" id="add_season" href="#" title="{{ trans('calendars.actions.add_season') }}">
                    <i class="fa fa-plus"></i> {{ trans('calendars.actions.add_season') }}
                </a>

                <div class="form-group" id="template_season" style="display: none">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="fa fa-arrows-alt-v"></span>
                                </span>
                                {!! Form::text('season_name[]', null, ['class' => 'form-control', 'placeholder' => __('calendars.parameters.seasons.name')]) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            {!! Form::number('season_month[]', null, ['class' => 'form-control', 'placeholder' => __('calendars.parameters.seasons.month')]) !!}
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                {!! Form::number('season_day[]', null, ['class' => 'form-control', 'placeholder' => __('calendars.parameters.seasons.day')]) !!}
                                <span class="input-group-btn">
                                    <span class="month-delete btn btn-danger" data-remove="4" title="{{ trans('crud.remove') }}">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('cruds.fields.save')