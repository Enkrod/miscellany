@inject('quick', 'App\Services\EntityQuickService')
<div class="panel panel-default">
    @if ($ajax)
        <div class="panel-heading">
            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('crud.delete_modal.close') }}"><span aria-hidden="true">&times;</span></button>
            <h4>{{ __('crud.quick.title') }}</h4>
        </div>
    @endif
    <div class="panel-body">
        <div class="row">
            @foreach ($quick->main() as $entity)
            <div class="col-md-4">
                <div class="btn btn-app btn-quick" data-type="{{ $entity }}">
                    <i class="{{ $quick->icon($entity) }}"></i>
                    {{ __('entities.' . $entity) }}
                </div>
            </div>
            @endforeach
        </div>

        <p class="text-center">
            <a href="#" class="quick-show-more-options">{{ __('crud.quick.actions.show_more') }}</a>
        </p>

        <div class="quick-more-options" style="display: none">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($quick->secondary() as $entity)
                    <div class="btn btn-app" data-type="{{ $entity }}">
                        <i class="{{ $quick->icon($entity) }}"></i>
                        {{ __('entities.' . $entity) }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>