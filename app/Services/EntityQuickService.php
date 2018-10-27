<?php

namespace App\Services;

class EntityQuickService
{
    /**
     * @var EntityService
     */
    protected $entityService;

    protected $order = [];

    protected $main = [];

    protected $ignore = [];

    /**
     * EntityQuickService constructor.
     * @param EntityService $entityService
     */
    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;

        // Order in which we want the main entities
        $this->order = [
            'characters',
            'locations',
            'items',
            'notes'
        ];

        $this->ignore = ['attribute_templates'];
    }

    /**
     * @return array
     */
    public function main()
    {
        foreach ($this->order as $entityName) {
            // Don't get more than 3
            if (count($this->main) == 3) {
                continue;
            }
            $entity = $this->entityService->getClass(($entityName));
            if (auth()->user()->can('create', $entity)) {
                $this->main[] = $entityName;
            }
        }

        // We want at least 3 options.
        if (count($this->main) < 3) {
            foreach ($this->entityService->entities($this->ignore) as $entityName => $entity) {
                if (count($this->main) == 3) {
                    continue;
                }
                if (auth()->user()->can('create', $entity)) {
                    $this->main[] = $entityName;
                }
            }
        }

        return $this->main;
    }

    /**
     * @return array
     */
    public function secondary()
    {
        $secondary = [];
        foreach ($this->entityService->entities($this->ignore) as $entityName => $entity) {
            if (in_array($entityName, $this->main)) {
                continue;
            }
            if (auth()->user()->can('create', $entity)) {
                $secondary[] = $entityName;
            }
        }
        return $secondary;
    }

    public function icon($entity)
    {
        switch($entity) {
            case 'characters': return 'fa fa-user'; break;
            case 'families': return 'ra ra-double-team'; break;
            case 'locations': return 'ra ra-tower'; break;
            case 'organisations': return 'ra ra-hood'; break;
            case 'items': return 'ra ra-gem-pendant'; break;
            case 'notes': return 'ra ra-quill-ink'; break;
            case 'events': return 'fa fa-calendar-o'; break;
            case 'calendars': return 'ra ra-moon-sun'; break;
            case 'races': return 'ra ra-wyvern'; break;
            case 'quests': return 'ra ra-wooden-sign'; break;
            case 'journals': return 'ra ra-scroll-unfurled'; break;
            case 'tags': return 'fa fa-tags'; break;
            case 'dice_rolls': return 'ra ra-dice-five'; break;
            case 'conversations': return 'ra ra-speech-bubbles'; break;
        }

        return 'fa fa-question';
    }
}