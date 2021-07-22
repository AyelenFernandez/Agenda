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

    'accepted'             => 'El :attribute debe ser aceptado.',
    'active_url'           => 'El :attribute no es una URL válida.',
    'after'                => 'El :attribute debe ser una fecha después de :date.',
    'alpha'                => 'El :attribute solamente puede contener letras.',
    'alpha_dash'           => 'El :attribute solamente puede contener letras, números y guiones.',
    'alpha_num'            => 'El :attribute solamente puede contener letras y números.',
    'array'                => 'El :attribute debe ser un arreglo.',
    'before'               => 'El :attribute debe ser una fecha antes :date.',
    'between'              => [
        'numeric' => 'El :attribute debe ser entre :min y :max.',
        'file'    => 'El :attribute debe ser entre :min y :max kilobytes.',
        'string'  => 'El :attribute debe ser entre :min y :max caracteres.',
        'array'   => 'El :attribute debe tener entre :min y :max items.',
    ],
    'boolean'              => 'El :attribute campo debe ser verdadero or falso.',
    'confirmed'            => 'El :attribute confirmación no coincide.',
    'date'                 => 'El :attribute no es una feha válidad.',
    'date_format'          => 'El :attribute no coincide con  el formato :format.',
    'different'            => 'El :attribute y :other deben ser diferentes.',
    'digits'               => 'El :attribute debe ser :digits digitos.',
    'digits_between'       => 'El :attribute debe ser entre :min y :max dígitos.',
    'email'                => 'El :attribute debe ser una dirección de email válida.',
    'exists'               => 'El selected :attribute no es válido.',
    'filled'               => 'El :attribute campo es obligatorio.',
    'image'                => 'El :attribute debe ser una imágen.',
    'in'                   => 'El selected :attribute no es válido.',
    'integer'              => 'El :attribute debe ser un entero.',
    'ip'                   => 'El :attribute debe ser una dirección de IP válida.',
    'json'                 => 'El :attribute debe ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => 'El :attribute may not be greater than :max.',
        'file'    => 'El :attribute may not be greater than :max kilobytes.',
        'string'  => 'El :attribute may not be greater than :max characters.',
        'array'   => 'El :attribute may not have more than :max items.',
    ],
    'mimes'                => 'El :attribute debe ser a file of type: :values.',
    'min'                  => [
        'numeric' => 'El :attribute debe ser at least :min.',
        'file'    => 'El :attribute debe ser at least :min kilobytes.',
        'string'  => 'El :attribute debe ser at least :min characters.',
        'array'   => 'El :attribute must have at least :min items.',
    ],
    'not_in'               => 'El selected :attribute is invalid.',
    'numeric'              => 'El :attribute debe ser un número.',
    'regex'                => 'El :attribute formato no es válido.',
    'required'             => 'El :attribute campo es obligatorio.',
    'required_if'          => 'El :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'El :attribute field is required unless :other está en :values.',
    'required_with'        => 'El :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El :attribute es obligatorio cuando ninguno de los:values está presente.',
    'same'                 => 'El :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El :attribute debe ser :size.',
        'file'    => 'El :attribute debe ser :size kilobytes.',
        'string'  => 'El :attribute debe ser :size caracteres.',
        'array'   => 'El :attribute debe contener :size items.',
    ],
    'string'               => 'El :attribute debe ser una cadena.',
    'timezone'             => 'El :attribute debe ser a zona válid.',
    'unique'               => 'El :attribute ya ha sido tomado.',
    'url'                  => 'El :attribute formato no es válido.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
