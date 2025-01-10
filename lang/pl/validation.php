<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Poniższe linie językowe zawierają domyślne komunikaty o błędach używane
    | przez klasę walidacji. Niektóre z tych zasad mają wiele wersji,
    | takich jak zasady dotyczące rozmiaru. Możesz dowolnie dostosować te
    | komunikaty do wymagań swojej aplikacji.
    |
    */

    'accepted' => ':attribute musi zostać zaakceptowany.',
    'active_url' => ':attribute nie jest prawidłowym adresem URL.',
    'after' => ':attribute musi być datą późniejszą niż :date.',
    'after_or_equal' => ':attribute musi być datą późniejszą lub równą :date.',
    'alpha' => ':attribute może zawierać tylko litery.',
    'alpha_dash' => ':attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => ':attribute może zawierać tylko litery i cyfry.',
    'array' => ':attribute musi być tablicą.',
    'before' => ':attribute musi być datą wcześniejszą niż :date.',
    'before_or_equal' => ':attribute musi być datą wcześniejszą lub równą :date.',
    'between' => [
        'numeric' => ':attribute musi mieć wartość pomiędzy :min a :max.',
        'file' => ':attribute musi mieć rozmiar pomiędzy :min a :max kilobajtów.',
        'string' => ':attribute musi mieć długość od :min do :max znaków.',
        'array' => ':attribute musi zawierać od :min do :max elementów.',
    ],
    'boolean' => 'Pole :attribute musi być prawdą lub fałszem.',
    'confirmed' => 'Potwierdzenie :attribute nie pasuje.',
    'date' => ':attribute nie jest prawidłową datą.',
    'date_equals' => ':attribute musi być datą równą :date.',
    'date_format' => ':attribute nie pasuje do formatu :format.',
    'different' => ':attribute i :other muszą się różnić.',
    'digits' => ':attribute musi mieć :digits cyfr.',
    'digits_between' => ':attribute musi mieć od :min do :max cyfr.',
    'dimensions' => ':attribute ma nieprawidłowe wymiary obrazu.',
    'distinct' => 'Pole :attribute zawiera zduplikowaną wartość.',
    'email' => ':attribute musi być prawidłowym adresem e-mail.',
    'ends_with' => ':attribute musi kończyć się jednym z następujących: :values.',
    'exists' => 'Wybrany :attribute jest nieprawidłowy.',
    'file' => ':attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi mieć wartość.',
    'gt' => [
        'numeric' => ':attribute musi być większy niż :value.',
        'file' => ':attribute musi mieć więcej niż :value kilobajtów.',
        'string' => ':attribute musi mieć więcej niż :value znaków.',
        'array' => ':attribute musi mieć więcej niż :value elementów.',
    ],
    'gte' => [
        'numeric' => ':attribute musi być większy lub równy :value.',
        'file' => ':attribute musi mieć co najmniej :value kilobajtów.',
        'string' => ':attribute musi mieć co najmniej :value znaków.',
        'array' => ':attribute musi mieć co najmniej :value elementów.',
    ],
    'image' => ':attribute musi być obrazem.',
    'in' => 'Wybrany :attribute jest nieprawidłowy.',
    'in_array' => 'Pole :attribute nie istnieje w :other.',
    'integer' => ':attribute musi być liczbą całkowitą.',
    'ip' => ':attribute musi być prawidłowym adresem IP.',
    'ipv4' => ':attribute musi być prawidłowym adresem IPv4.',
    'ipv6' => ':attribute musi być prawidłowym adresem IPv6.',
    'json' => ':attribute musi być prawidłowym ciągiem JSON.',
    'lt' => [
        'numeric' => ':attribute musi być mniejszy niż :value.',
        'file' => ':attribute musi mieć mniej niż :value kilobajtów.',
        'string' => ':attribute musi mieć mniej niż :value znaków.',
        'array' => ':attribute musi mieć mniej niż :value elementów.',
    ],
    'lte' => [
        'numeric' => ':attribute musi być mniejszy lub równy :value.',
        'file' => ':attribute musi mieć co najwyżej :value kilobajtów.',
        'string' => ':attribute musi mieć co najwyżej :value znaków.',
        'array' => ':attribute nie może mieć więcej niż :value elementów.',
    ],
    'max' => [
        'numeric' => ':attribute nie może być większy niż :max.',
        'file' => ':attribute nie może być większy niż :max kilobajtów.',
        'string' => ':attribute nie może mieć więcej niż :max znaków.',
        'array' => ':attribute nie może mieć więcej niż :max elementów.',
    ],
    'mimes' => ':attribute musi być plikiem typu: :values.',
    'mimetypes' => ':attribute musi być plikiem typu: :values.',
    'min' => [
        'numeric' => ':attribute musi być co najmniej :min.',
        'file' => ':attribute musi mieć co najmniej :min kilobajtów.',
        'string' => ':attribute musi mieć co najmniej :min znaków.',
        'array' => ':attribute musi mieć co najmniej :min elementów.',
    ],
    'multiple_of' => ':attribute musi być wielokrotnością :value.',
    'not_in' => 'Wybrany :attribute jest nieprawidłowy.',
    'not_regex' => 'Format :attribute jest nieprawidłowy.',
    'numeric' => ':attribute musi być liczbą.',
    'password' => 'Hasło jest nieprawidłowe.',
    'present' => 'Pole :attribute musi być obecne.',
    'regex' => 'Format :attribute jest nieprawidłowy.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_if' => 'Pole :attribute jest wymagane, gdy :other ma wartość :value.',
    'required_unless' => 'Pole :attribute jest wymagane, chyba że :other znajduje się w :values.',
    'required_with' => 'Pole :attribute jest wymagane, gdy :values jest obecny.',
    'required_with_all' => 'Pole :attribute jest wymagane, gdy :values są obecne.',
    'required_without' => 'Pole :attribute jest wymagane, gdy :values nie jest obecny.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy żadne z :values nie są obecne.',
    'prohibited' => 'Pole :attribute jest zabronione.',
    'prohibited_if' => 'Pole :attribute jest zabronione, gdy :other ma wartość :value.',
    'prohibited_unless' => 'Pole :attribute jest zabronione, chyba że :other znajduje się w :values.',
    'same' => ':attribute i :other muszą się zgadzać.',
    'size' => [
        'numeric' => ':attribute musi mieć rozmiar :size.',
        'file' => ':attribute musi mieć :size kilobajtów.',
        'string' => ':attribute musi mieć :size znaków.',
        'array' => ':attribute musi zawierać :size elementów.',
    ],
    'starts_with' => ':attribute musi zaczynać się od jednego z następujących: :values.',
    'string' => ':attribute musi być ciągiem znaków.',
    'timezone' => ':attribute musi być prawidłową strefą czasową.',
    'unique' => ':attribute został już zajęty.',
    'uploaded' => 'Przesyłanie :attribute nie powiodło się.',
    'url' => 'Format :attribute jest nieprawidłowy.',
    'uuid' => ':attribute musi być prawidłowym UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Tutaj możesz określić niestandardowe komunikaty walidacyjne dla atrybutów
    | używając konwencji "attribute.rule" do nazw linii. Pozwala to szybko
    | określić konkretną linię językową dla określonej zasady atrybutu.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'niestandardowy-komunikat',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Poniższe linie językowe służą do zamiany domyślnego tekstu zastępczego
    | atrybutów na coś bardziej przyjaznego użytkownikowi, np. "Adres E-Mail"
    | zamiast "email". Dzięki temu nasze komunikaty są bardziej wyraziste.
    |
    */

    'attributes' => [],

];