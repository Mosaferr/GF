<?php

return [
    'accepted' => 'Pole :attribute musi zostać zaakceptowane.',
    'active_url' => 'Pole :attribute jest nieprawidłowym adresem URL.',
    'after' => 'Pole :attribute musi być datą późniejszą od :date.',
    'after_or_equal' => 'Pole :attribute musi być datą nie wcześniejszą niż :date.',
    'alpha' => 'Pole :attribute może zawierać jedynie litery.',
    'alpha_dash' => 'Pole :attribute może zawierać jedynie litery, cyfry i myślniki.',
    'alpha_num' => 'Pole :attribute może zawierać jedynie litery i cyfry.',
    'array' => 'Pole :attribute musi być tablicą.',
    'before' => 'Pole :attribute musi być datą wcześniejszą od :date.',
    'before_or_equal' => 'Pole :attribute musi być datą nie późniejszą niż :date.',
    'between' => [
        'numeric' => 'Pole :attribute musi zawierać się w granicach :min - :max.',
        'file' => 'Pole :attribute musi zawierać się w granicach :min - :max kilobajtów.',
        'string' => 'Pole :attribute musi zawierać się w granicach :min - :max znaków.',
        'array' => 'Pole :attribute musi składać się z :min - :max elementów.',
    ],
    'boolean' => 'Pole :attribute musi mieć wartość logiczną prawda albo fałsz.',
    'confirmed' => 'Potwierdzenie pola :attribute nie zgadza się.',
    'date' => 'Pole :attribute nie jest prawidłową datą.',
    'date_equals' => 'Pole :attribute musi być datą równą :date.',
    'date_format' => 'Pole :attribute nie jest w formacie :format.',
    'different' => 'Pole :attribute oraz :other muszą się różnić.',
    'digits' => 'Pole :attribute musi składać się z :digits cyfr.',
    'digits_between' => 'Pole :attribute musi mieć od :min do :max cyfr.',
    'dimensions' => 'Pole :attribute ma niepoprawne wymiary.',
    'distinct' => 'Pole :attribute ma zduplikowane wartości.',
    'email' => 'Pole :attribute nie jest poprawnym adresem e-mail.',
    'exists' => 'Zaznaczone pole :attribute jest nieprawidłowe.',
    'file' => 'Pole :attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi być wypełnione.',
    'image' => 'Pole :attribute musi być obrazkiem.',
    'in' => 'Zaznaczony element :attribute jest nieprawidłowy.',
    'in_array' => 'Pole :attribute nie znajduje się w :other.',
    'integer' => 'Pole :attribute musi być liczbą całkowitą.',
    'ip' => 'Pole :attribute musi być prawidłowym adresem IP.',
    'ipv4' => 'Pole :attribute musi być prawidłowym adresem IPv4.',
    'ipv6' => 'Pole :attribute musi być prawidłowym adresem IPv6.',
    'json' => 'Pole :attribute musi być poprawnym ciągiem znaków JSON.',
    'lowercase' => 'Pole :attribute nie może zawierać dużych liter.',
    'max' => [
        'numeric' => 'Pole :attribute nie może być większe niż :max.',
        'file' => 'Pole :attribute nie może być większe niż :max kilobajtów.',
        'string' => 'Pole :attribute nie może być dłuższe niż :max znaków.',
        'array' => 'Pole :attribute nie może mieć więcej niż :max elementów.',
    ],
    'mimes' => 'Pole :attribute musi być plikiem typu: :values.',
    'mimetypes' => 'Pole :attribute musi być plikiem typu: :values.',
    'min' => [
        'numeric' => 'Pole :attribute musi być nie mniejsze od :min.',
        'file' => 'Pole :attribute musi mieć przynajmniej :min kilobajtów.',
        'string' => 'Pole :attribute musi mieć przynajmniej :min znaków.',
        'array' => 'Pole :attribute musi mieć przynajmniej :min elementów.',
    ],
    'not_in' => 'Zaznaczony :attribute jest nieprawidłowy.',
    'not_regex' => 'Format pola :attribute jest nieprawidłowy.',
    'numeric' => 'Pole :attribute musi być liczbą.',
    'present' => 'Pole :attribute musi być obecne.',
    'regex' => 'Format pola :attribute jest nieprawidłowy.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_if' => 'Pole :attribute jest wymagane gdy :other ma wartość :value.',
    'required_unless' => 'Pole :attribute jest wymagane jeżeli :other nie znajduje się w :values.',
    'required_with' => 'Pole :attribute jest wymagane gdy wartość :values jest obecna.',
    'required_with_all' => 'Pole :attribute jest wymagane gdy wszystkie wartości :values są obecne.',
    'required_without' => 'Pole :attribute jest wymagane gdy wartość :values nie jest obecna.',
    'required_without_all' => 'Pole :attribute jest wymagane gdy żadna z wartości :values nie jest obecna.',
    'same' => 'Pole :attribute i :other muszą być takie same.',
    'size' => [
        'numeric' => 'Pole :attribute musi mieć :size.',
        'file' => 'Pole :attribute musi mieć :size kilobajtów.',
        'string' => 'Pole :attribute musi mieć :size znaków.',
        'array' => 'Pole :attribute musi zawierać :size elementów.',
    ],
    'starts_with' => 'Pole :attribute musi zaczynać się jedną z następujących wartości: :values.',
    'string' => 'Pole :attribute musi być ciągiem znaków.',
    'timezone' => 'Pole :attribute musi być prawidłową strefą czasową.',
    'unique' => 'Taki :attribute jest już zarejestrowany.',
    'uploaded' => 'Nie udało się wgrać pliku :attribute.',
    'url' => 'Format pola :attribute jest nieprawidłowy.',
    'uuid' => 'Pole :attribute musi być poprawnym identyfikatorem UUID.',
                                            

    'password' => [
        'letters' => 'Pole :attribute musi zawierać przynajmniej jedną literę.',
        'mixed' => 'Pole :attribute musi zawierać przynajmniej jedną wielką i jedną małą literę.',
        'numbers' => 'Pole :attribute musi zawierać przynajmniej jedną cyfrę.',
        'symbols' => 'Pole :attribute musi zawierać przynajmniej jeden znak specjalny.',
        'uncompromised' => 'Podane :attribute pojawiło się w wycieku danych. Proszę wybrać inne :attribute.',
    ],

                                            

    'custom' => [
        'name' => [
            'required' => 'Imię jest wymagane.',
            'alpha' => 'Imię może zawierać tylko litery.',
            'min' => 'Imię musi mieć przynajmniej 3 litery.',
            'max' => 'Imię nie może mieć więcej niż 20 znaków.',
        ],
        'last_name' => [
            'required' => 'Nazwisko jest wymagane.',
            'alpha' => 'Nazwisko może zawierać tylko litery.',
            'min' => 'Nazwisko musi mieć przynajmniej 2 litery.',
            'max' => 'Nazwisko nie może mieć więcej niż 50 znaków.',
        ],
        'phone' => [
            'regex' => 'Numer telefonu może zawierać tylko cyfry, spacje oraz symbol plusa (+).',
            'min' => 'Numer telefonu musi mieć przynajmniej 8 znaków.',
            'max' => 'Numer telefonu nie może mieć więcej niż 20 znaków.',
        ],

        'participants.*.name' => [
            'required' => 'Imię jest wymagane.',
            'string' => 'Imię musi być ciągiem znaków.',
            'alpha' => 'Imię może zawierać tylko litery.',
            'min' => 'Imię musi mieć przynajmniej 3 litery.',
            'max' => 'Imię nie może mieć więcej niż 20 znaków.',
        ],
        'participants.*.middle_name' => [
            'string' => 'Drugie imię musi być ciągiem znaków.',
            'alpha' => 'Drugie imię może zawierać tylko litery.',
            'min' => 'Drugie imię musi mieć przynajmniej 3 litery.',
            'max' => 'Drugie imię nie może mieć więcej niż 20 znaków.',
        ],
        'participants.*.last_name' => [
            'required' => 'Nazwisko jest wymagane.',
            'string' => 'Nazwisko musi być ciągiem znaków.',
            'alpha' => 'Nazwisko może zawierać tylko litery.',
            'min' => 'Nazwisko musi mieć przynajmniej 2 litery.',
            'max' => 'Nazwisko nie może mieć więcej niż 50 znaków.',
        ],
        'participants.*.birth_date' => [
            'required' => 'Data urodzenia jest wymagana.',
            'date' => 'Data urodzenia musi być poprawną datą.',
			'before_or_equal' => 'Uczestnik nie może mieć mniej niż 2 lata.',
        ],
        'participants.*.phone' => [
			'regex' => 'Numer telefonu może zawierać tylko cyfry, spacje oraz symbol plusa (+).',
			'min' => 'Numer telefonu musi mieć przynajmniej 8 znaków.',
			'max' => 'Numer telefonu nie może mieć więcej niż 20 znaków.',
        ],
        'participants.*.email' => [
            'required' => 'Adres email jest wymagany.',
            'email' => 'Adres email musi być poprawnym adresem email.',
        ],
        'participants.*.pesel' => [
            'required' => 'PESEL jest wymagany.',
            'string' => 'PESEL musi być ciągiem znaków.',
            'digits:11' => 'PESEL musi sie składać z 11 cyfr.',
            'unique' => 'Taki PESEL jest już zarejestrowany.',
        ],
        'participants.*.citizenship' => [
            'required' => 'Obywatelstwo jest wymagane.',
            'string' => 'Obywatelstwo musi być ciągiem znaków.',
        ],
        'participants.*.passport_number' => [
            'required' => 'Numer paszportu jest wymagany.',
            'string' => 'Numer paszportu musi być ciągiem znaków.',
            'regex' => 'Numer paszportu musi być ciągiem liter i cyfr.',
            'unique' => 'Taki numer paszportu jest już zarejestrowany.',
        ],
        'participants.*.passport_issue_date' => [
            'required' => 'Data wydania paszportu jest wymagana.',
            'date' => 'Data wydania paszportu musi być poprawną datą.',
			'before_or_equal' => 'Data wydania paszportu nie może być późniejsza niż dzisiaj.',
        ],
        'participants.*.passport_expiry_date' => [
            'required' => 'Data ważności paszportu jest wymagana.',
            'date' => 'Data ważności paszportu musi być poprawną datą.',
			'after' => 'Data ważności paszportu musi być późniejsza niż dzisiaj.',
            'after_or_equal' => 'Paszport musi być ważny co najmniej trzy miesiące.',
        ],
        'participants.*.street' => [
            'required' => 'Ulica jest wymagana.',
            'string' => 'Ulica musi być ciągiem znaków.',
        ],
        'participants.*.house_number' => [
            'required' => 'Numer domu jest wymagany.',
            'string' => 'Numer domu musi być ciągiem znaków.',
        ],
        'participants.*.apartment_number' => [
            'string' => 'Numer mieszkania musi być ciągiem znaków.',
        ],
        'participants.*.postal_code' => [
            'required' => 'Kod pocztowy jest wymagany.',
            'string' => 'Kod pocztowy musi być ciągiem znaków.',
        ],
        'participants.*.city_name' => [
            'required' => 'Miejscowość jest wymagana.',
            'string' => 'Miejscowość musi być ciągiem znaków.',
        ],
    ],

                                            

        'attributes' => [
            'email' => 'adres e-mail',
            'password' => 'hasło',
            'name' => 'imię',
            // Dodaj tutaj kolejne tłumaczenia atrybutów
        ],

                                            
];
