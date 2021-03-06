<?php

return [
    'actions'           => [
        'back'          => 'Zurück',
        'copy'          => 'Kopieren',
        'export'        => 'Exportieren',
        'find_out_more' => 'Mehr erfahren',
        'go_to'         => 'Gehe zu :name',
        'more'          => 'Mehr Aktionen',
        'move'          => 'Verschieben',
        'new'           => 'Neu',
        'private'       => 'Privat',
        'public'        => 'Öffentlich',
    ],
    'add'               => 'Hinzufügen',
    'attributes'        => [
        'actions'       => [
            'add'               => 'Attribut hinzufügen',
            'apply_template'    => 'Eine Attributvorlage anwenden',
            'manage'            => 'Verwalten',
        ],
        'create'        => [
            'description'   => 'Erstelle ein neues Attribut',
            'success'       => 'Attribut :name zu :entity hinzugefügt',
            'title'         => 'Neues Attribute für :name',
        ],
        'destroy'       => [
            'success'   => 'Attribut :name für :entity entfernt',
        ],
        'edit'          => [
            'description'   => 'Aktualisiere ein bestehendes Attribut',
            'success'       => 'Attribut :name für :entity aktualisiert',
            'title'         => 'Aktualisiere Attribut für :name',
        ],
        'fields'        => [
            'attribute' => 'Attribut',
            'template'  => 'Vorlage',
            'value'     => 'Wert',
        ],
        'index'         => [
            'success'   => 'Attribute für :entity aktualisiert',
            'title'     => 'Attribute für :name',
        ],
        'placeholders'  => [
            'attribute' => 'Anzahl der Eroberungen, Challenge Rating, Initiative, Bevölkerung',
            'template'  => 'Wähle eine Vorlage',
            'value'     => 'Wert des Attributs',
        ],
        'template'      => [
            'success'   => 'Attributvorlage :name wird auf :entity angewendet',
            'title'     => 'Wende eine Attributvorlage auf :name an',
        ],
    ],
    'bulk'              => [
        'errors'    => [
            'admin' => 'Nur Kampagnenadmins können den "Privat" Status eines Objektes ändern.',
        ],
        'success'   => [
            'private'   => ':count Objekt ist jetzt privat.|:count Objekte sind jetzt privat.',
            'public'    => ':count Objekt ist jetzt sichtbar.|:count Objekte sind jetzt sichtbar.',
        ],
    ],
    'cancel'            => 'Abbrechen',
    'click_modal'       => [
        'close'     => 'Schließen',
        'confirm'   => 'Bestätigen',
        'title'     => 'Bestätige deine Aktion',
    ],
    'create'            => 'Erstellen',
    'delete_modal'      => [
        'close'         => 'Schließen',
        'delete'        => 'Löschen',
        'description'   => 'Bist du sicher das du :tag entfernen möchtest?',
        'title'         => 'Löschen bestätigen',
    ],
    'destroy_many'      => [
        'success'   => ':count Objekt gelöscht|:count Objekte gelöscht',
    ],
    'edit'              => 'Bearbeiten',
    'errors'            => [
        'node_must_not_be_a_descendant' => 'Ungültiges Objekt (Kategorie, Ort): es würde ein Nachkomme von sich selbst sein.',
    ],
    'events'            => [
        'hint'  => 'Kalenderereignisse, die mit diesem Objekt verknüpft sind, werden hier dargestellt.',
    ],
    'export'            => 'Exportieren',
    'fields'            => [
        'attribute_template'    => 'Attributsvorlage',
        'calendar'              => 'Kalender',
        'calendar_date'         => 'Datum',
        'character'             => 'Charakter',
        'creator'               => 'Ersteller',
        'dice_roll'             => 'Würfelwürf',
        'entity'                => 'Objekt',
        'entry'                 => 'Eintrag',
        'event'                 => 'Ereignis',
        'family'                => 'Familie',
        'files'                 => 'Dateien',
        'image'                 => 'Bild',
        'is_private'            => 'Privat',
        'item'                  => 'Gegenstand',
        'location'              => 'Ort',
        'name'                  => 'Name',
        'organisation'          => 'Organisation',
        'race'                  => 'Rasse',
        'tag'                   => 'Tag',
        'tags'                  => 'Tags',
    ],
    'files'             => [
        'actions'   => [
            'drop'      => 'Klicken zum Hinzufügen oder Datei hierher ziehen (Drag & Drop).',
            'manage'    => 'Verwalte Objektdateien',
        ],
        'errors'    => [
            'max'   => 'Du hast die maximale Anzahl (:max) von Dateien in diesem Objekt erreicht.',
        ],
        'files'     => 'Hochgeladene Dateien',
        'hints'     => [
            'limit'         => 'In jedem Objekt kann eine maximale Anzahl von :max Dateien hochgeladen werden.',
            'limitations'   => 'Unterstütze Formate: jpg, png, gif, und pdf. Max. Dateigröße: :size',
        ],
        'title'     => 'Objektdateien für :name',
    ],
    'filter'            => 'Filter',
    'filters'           => [
        'clear' => 'Filter zurücksetzen',
        'hide'  => 'Verstecken',
        'show'  => 'Zeigen',
        'title' => 'Filter',
    ],
    'forms'             => [
        'actions'   => [
            'calendar'  => 'Füge Datum hinzu',
        ],
    ],
    'hidden'            => 'Versteckt',
    'hints'             => [
        'attribute_template'    => 'Wende eine Attributsvorlage direkt beim erstellen des Objektes an.',
        'calendar_date'         => 'Ein Datum erlaubt es, Listen einfach zu filtern und pflegt ein Ereignis im ausgewählten Kalender.',
        'image_limitations'     => 'Unterstützte Formate: jpg, png und gif. Maximale Dateigröße: :size.',
        'image_patreon'         => 'Erhöhe das Limit indem du uns bei Patreon unterstützt.',
        'is_private'            => 'Vor \'Zuschauern\' verbergen',
        'map_limitations'       => 'Unterstützte Formate: jpg, png, gif und svg. Max Dateigröße: :size.',
    ],
    'history'           => [
        'created'   => 'Erstellt von <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
        'unknown'   => 'Unbekannt',
        'updated'   => 'Zuletzt aktualisiert von <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
    ],
    'image'             => [
        'error' => 'Wir konnten das von dir angeforderte Bild nicht laden. Es könnte sein, dass die Website nicht erlaubt, Bilder herunterzuladen (typisch für Squarespace und DeviantArt) oder dass der Link nicht mehr gültig ist.',
    ],
    'is_private'        => 'Dieses Objekt ist privat und nicht von Zuschauern einsehbar.',
    'linking_help'      => 'Wie kann ich zu anderen Objekten verlinken?',
    'manage'            => 'Verwalten',
    'move'              => [
        'description'   => 'Verschiebe diese Objekt an einen anderen Ort',
        'errors'        => [
            'permission'        => 'Du hast keine Berechtigung, Objekte diesen Typs in dieser Kampagne zu erstellen.',
            'same_campaign'     => 'Du musst eine andere Kampagne auswählen, in welche du das Objekt verschieben willst.',
            'unknown_campaign'  => 'Unbekannte Kampagne.',
        ],
        'fields'        => [
            'campaign'  => 'Neue Kampagne',
            'target'    => 'Neuer Typ',
        ],
        'hints'         => [
            'campaign'  => 'Du kannst auch versuchen, diese Objekt in eine andere Kampagne zu verschieben.',
            'target'    => 'Bitte beachte, das einige Daten verloren gehen können, wenn ein Objekt von einem Typ zu einem anderen verschoben wird.',
        ],
        'success'       => 'Objekt :name verschoben',
        'title'         => 'Verschiebe :name an einen anderen Ort',
    ],
    'new_entity'        => [
        'error' => 'Bitte überprüfe deine Eingabe.',
        'fields'=> [
            'name'  => 'Name',
        ],
        'title' => 'Neues Objekt',
    ],
    'notes'             => [
        'actions'       => [
            'add'   => 'Notiz hinzufügen',
        ],
        'create'        => [
            'description'   => 'Erstelle eine neue Notiz',
            'success'       => 'Notiz \':name\' zu :entity hinzugefügt.',
            'title'         => 'Neue Notiz für :name',
        ],
        'destroy'       => [
            'success'   => 'Notiz \':name\' von :entity entfernt.',
        ],
        'edit'          => [
            'description'   => 'Aktualisiere eine bestehende Notiz',
            'success'       => 'Notiz \':name\' für :entity aktualisiert.',
            'title'         => 'Aktualisiere Notiz für :name',
        ],
        'fields'        => [
            'creator'   => 'Ersteller',
            'entry'     => 'Eintrag',
            'name'      => 'Name',
        ],
        'hint'          => 'Informationen, die nicht ganz in die Standardfelder eines Objektes passen oder privat bleiben sollen, können als Notiz hinzugefügt werden.',
        'index'         => [
            'title' => 'Notizen für :name',
        ],
        'placeholders'  => [
            'name'  => 'Name der Notiz, Beobachtung oder Anmerkung',
        ],
        'show'          => [
            'title' => 'Objektnotiz :name für :entity',
        ],
    ],
    'or_cancel'         => 'oder <a href=":url">abbrechen</a>',
    'panels'            => [
        'appearance'            => 'Aussehen',
        'attribute_template'    => 'Attributsvorlage',
        'calendar_date'         => 'Datum',
        'entry'                 => 'Eintrag',
        'general_information'   => 'Allgemeine Informationen',
        'move'                  => 'Verschieben',
        'system'                => 'System',
    ],
    'permissions'       => [
        'action'    => 'Aktion',
        'actions'   => [
            'delete'    => 'Löschen',
            'edit'      => 'Bearbeiten',
            'read'      => 'Lesen',
        ],
        'allowed'   => 'Erlaubt',
        'fields'    => [
            'member'    => 'Mitglied',
            'role'      => 'Rolle',
        ],
        'helper'    => 'Benutze dieses Interface um die Berechtigungen von Nutzern und Rollen mit diesem Objekt  fein zu justieren.',
        'success'   => 'Berechtigungen gespeichert.',
        'title'     => 'Berechtigungen',
    ],
    'placeholders'      => [
        'calendar'      => 'Wähle einen Kalender',
        'character'     => 'Wähle einen Character',
        'entity'        => 'Objekt',
        'event'         => 'Wähle ein Ereignis',
        'family'        => 'Wähle eine Familie',
        'image_url'     => 'Du kannst ein Bild auch von einer URL hochladen',
        'item'          => 'Wähle einen Gegenstand',
        'location'      => 'Wähle einen Ort',
        'organisation'  => 'Wähle eine Organisation',
        'race'          => 'Wähle eine Rasse',
        'tag'           => 'Wähle ein Tag',
    ],
    'relations'         => [
        'actions'   => [
            'add'   => 'Füge eine Beziehung hinzu',
        ],
        'fields'    => [
            'location'  => 'Ort',
            'name'      => 'Name',
            'relation'  => 'Beziehung',
        ],
        'hint'      => 'Beziehungen zwischen Objekten können erstellt werden, um deren Verbindung darzustellen.',
    ],
    'remove'            => 'Löschen',
    'rename'            => 'Umbenennen',
    'save'              => 'Speichern',
    'save_and_close'    => 'Speichern und schließen',
    'save_and_new'      => 'Speichern und neu',
    'save_and_update'   => 'Speichern und aktualisieren',
    'save_and_view'     => 'Speichern und ansehen',
    'search'            => 'Suchen',
    'select'            => 'Auswählen',
    'tabs'              => [
        'attributes'    => 'Attribute',
        'calendars'     => 'Kalender',
        'events'        => 'Ereignisse',
        'menu'          => 'Menü',
        'notes'         => 'Notizen',
        'permissions'   => 'Berechtigungen',
        'relations'     => 'Beziehungen',
    ],
    'update'            => 'Aktualisieren',
    'users'             => [
        'unknown'   => 'Unbekannt',
    ],
    'view'              => 'Ansehen',
];
