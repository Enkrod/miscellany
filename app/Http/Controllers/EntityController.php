<?php

namespace App\Http\Controllers;

use App\Exceptions\TranslatableException;
use App\Http\Requests\CreateEntityRequest;
use App\Http\Requests\MoveEntityRequest;
use App\Models\Entity;
use App\Services\EntityService;
use Illuminate\Support\Facades\Auth;

class EntityController extends Controller
{
    protected $entityService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EntityService $entityService)
    {
        $this->middleware('auth');
        $this->middleware('campaign.member');
        $this->entityService = $entityService;
    }

    /**
     * @param Entity $entity
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function move(Entity $entity)
    {
        $entities = $this->entityService->labelledEntities(true, $entity->pluralType(), true);
        return view('cruds.move', ['entity' => $entity, 'entities' => $entities]);
    }

    /**
     * @param Entity $entity
     * @return mixed
     */
    public function export(Entity $entity)
    {
        $realEntity = $entity;
        $pdf = \App::make('dompdf.wrapper');
        $entities = [$realEntity->child];
        $name = $realEntity->pluralType();
        $entity = $realEntity->pluralType();
        $exporting = true; // This can be used in views to know we are exporting

        if (request()->has('html')) {
            return view('cruds.export', compact('entity', 'name', 'entities', 'exporting'));
        }
        return $pdf
            ->loadView('cruds.export', compact('entity', 'name', 'entities', 'exporting'))
            ->download('kanka ' . strip_tags($realEntity->name) . ' export.pdf');
    }

    /**
     * @param MoveEntityRequest $request
     * @param Entity $entity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post(MoveEntityRequest $request, Entity $entity)
    {
        $this->authorize('move', $entity->child);

        try {
            $entity = $this->entityService->move($entity, $request->only('target', 'campaign'));

            if ($entity->child->campaign_id != Auth::user()->campaign->id) {

                return redirect()->route($entity->pluralType() . '.index') // can't use child->id, not new
                ->with('success', trans('crud.move.success', ['name' => $entity->name]));
            }
            return redirect()->route($entity->pluralType() . '.show', $entity->entity_id) // can't use child->id, not new
            ->with('success', trans('crud.move.success', ['name' => $entity->name]));
        } catch (TranslatableException $ex) {
            return redirect()->route($entity->pluralType() . '.show', $entity->entity_id) // can't use child->id, not new
            ->with('error', trans($ex->getMessage(), ['name' => $entity->name]));
        }
    }

    /**
     * @param CreateEntityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateEntityRequest $request)
    {
        $entity = $this->entityService->create($request->post('name'), $request->post('target'));
        return response()->json([
            'id' => $entity->id,
            'name' => $entity->name
        ]);
    }

    public function files(Entity $entity)
    {
        $this->authorize('view', $entity->child);

        return view('entities.components._files', compact('entity'));
    }
}
