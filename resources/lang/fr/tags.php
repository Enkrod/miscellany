<?php

return [
    'create'        => [
        'description'   => 'Ajouter une nouvelle étiquette',
        'success'       => 'Nouvelle étiquette \':name\' ajoutée.',
        'title'         => 'Nouvelle Etiquette',
    ],
    'destroy'       => [
        'success'   => 'L\'étiquette \':name\' a été retirée.',
    ],
    'edit'          => [
        'success'   => 'L\'étiquette \':name\' a été mise à jour.',
        'title'     => 'Modifier l\'étiquette :name',
    ],
    'fields'        => [
        'characters'    => 'Personnages',
        'children'      => 'Enfants',
        'name'          => 'Nom',
        'tag'           => 'Etiquette',
        'tags'          => 'Etiquettes',
        'type'          => 'Type',
    ],
    'helpers'       => [
        'nested'    => 'Ce mode de naviguation permet d\'afficher les étiquettes de manière imbriquée. Les étiquettes sans étiquette parent seront affichés par défaut. Les étiquettes possédant des sous-étiquettes peuvent être cliqués pour afficher ces enfants. Tu peux continuer à cliquer jusqu\'à ce qu\'il n\'y ait plus d\'enfants à voir.',
    ],
    'hints'         => [
        'children'  => 'Cette liste contient toutes les entités directement dans cette étiquette et toutes les étiquettes enfants.',
        'tag'       => 'Affiché ci-dessous sont toutes les étiquettes enfants de cette étiquette.',
    ],
    'index'         => [
        'actions'       => [
            'explore_view'  => 'Mode Exploration',
        ],
        'add'           => 'Nouvelle Etiquette',
        'description'   => 'Gérer les étiquettes pour :name.',
        'header'        => 'Les étiquettes dans :name',
        'title'         => 'Etiquettes',
    ],
    'new_tag'       => 'Nouvelle Etiquette',
    'placeholders'  => [
        'name'  => 'Nom de l\'étiquette',
        'tag'   => 'Choix de l\'étiquette parent',
        'type'  => 'Légende, Guerres, Histoire, Religion',
    ],
    'show'          => [
        'description'   => 'Vue détaillée de l\'étiquette',
        'tabs'          => [
            'children'      => 'Enfants',
            'information'   => 'Information',
            'tags'          => 'Etiquettes',
        ],
        'title'         => 'Etiquette :name',
    ],
];
