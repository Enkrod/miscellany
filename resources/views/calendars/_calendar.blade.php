@inject('renderer', 'App\Renderers\CalendarRenderer')
<?php $canEdit = auth()->check() && auth()->user()->can('update', $model) ?>
{{ $renderer->setCalendar($model) }}

{!! Form::open(['route' => ['calendars.show', $model], 'method' => 'GET']) !!}
<div class="calendar-toolbar">
    <div class="pull-left">
        <div class="btn-group">
            <a href="{{ $renderer->previous() }}" class="btn btn-default btn-corner-left">
                <i class="fa fa-angle-left"></i> {{ $renderer->previous(true) }}
            </a>
            <a href="{{ $renderer->next() }}" class="btn btn-default btn-corner-right">
                {{ $renderer->next(true) }} <i class="fa fa-angle-right"></i>
            </a>
        </div>
        {{ $renderer->todayButton() }}
    </div>
    <div class="pull-right">
        <div class="btn-group">
            <a href="{{ route('calendars.show', [$model, 'layout' => 'year', 'year' => $renderer->currentYear()]) }}" class="btn btn-default btn-corner-left"<?=($renderer->isYearlyLayout() ? ' disabled="disabled"' : null)?>>{{ trans('calendars.layouts.year') }}</a>
            <a href="{{ route('calendars.show', [$model, 'year' => $renderer->currentYear()]) }}" class="btn btn-default btn-corner-right"<?=(!$renderer->isYearlyLayout() ? ' disabled="disabled"' : null)?>>{{ trans('calendars.layouts.month') }}</a>
        </div>
    </div>
    <div class="calendar-center">
        <h2>{!! $renderer->current() !!}</h2>
        {!! Form::text('year', null, ['class' => 'form-input form-input-sm', 'id' => 'calendar-year-switcher-field', 'style' => 'display:none']) !!}
    </div>
</div>
@if ($renderer->isYearlyLayout())
    <input type="hidden" name="layout" value="yearly">
@else
    {!! Form::hidden('month', $renderer->currentMonthId()) !!}
@endif
{!! Form::close() !!}

<table class="calendar table table-bordered table-striped">
    <thead>
    <tr>
        @foreach ($model->weekdays() as $weekday)
            <th>{{ $weekday }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @if ($renderer->isYearlyLayout())
        <tr>
        @foreach ($renderer->weeks() as $key => $day)
            @if($key % count($model->weekdays()) == 0)
                </tr><tr>
            @endif
            @include('calendars._day', ['showMonth' => true])
        @endforeach
        </tr>
    @else
        @foreach ($renderer->month() as $week => $days)
            <tr>
            @foreach ($days as $day)
                @include('calendars._day')
            @endforeach
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

{!! Form::hidden('date', '', ['id' => 'date']) !!}
@if($renderer->isYearlyLayout())
    <input type="hidden" name="layout" value="year">
@endif
{{ csrf_field() }}
{!! Form::close() !!}