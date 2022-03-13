<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Les termes doivent être acceptés.',
    'email' => "Doit être une adresse email valide.",
    'exists' => "La sélection est invalide.",
    'integer' => "Doit correspondre à un identifiant d'établissement",
    'max' => [
        'numeric' => 'Le :attribute ne peut pas être plus grand que :max.',
        'file' => 'Le :attribute ne peut pas faire plus de :max ko.',
        'string' => 'Le :attribute ne peut pas faire plus de :max caractères.',
        'array' => 'Le :attribute ne peut pas avoir plus de :max éléments.',
    ],
    'required' => 'Le champ :attribute est requis.',
    'string' => 'Le :attribute doit contenir du texte.',
    'unique' => 'Cet :attribute a déjà été utilisé.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'first_name' => 'prénom',
        'last_name' => 'nom',
        'institution' => 'établissement',
        'institution_id' => 'établissement',
        'category' => 'activité',
        'register' => 'termes',
    ],

];
