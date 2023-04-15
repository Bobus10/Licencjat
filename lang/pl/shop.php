<?php

declare(strict_types=1);

return [
    'columns' => [
        'actions' => 'Akcje'
    ],
    'messages' => [ // {{ __('shop.messages.delete.') }}
        'delete' => [
            'confirm' => 'Czy na pewno chcesz usunąć rekord?',
            'text' => 'Nie możesz tego cofnąć!',
            'confirm_button' => 'Tak usuń!',
            'cancel_button' => 'Anuluj',
            'done' => 'Dane zostały usuniętę!',
            'fail' => 'Coś poszło nie tak!',
        ],
    ],
    'button' => [ // {{ __('shop.button.save') }}
        'save' => 'Zapisz',
        'add' => 'Dodaj',
    ],
    'product' => [ // {{ __('shop.product.add_title') }}
        'add_title' => 'Dodawanie produktu',
        'edit_title' => 'Edycja produktu: :name',
        'show_title' => 'Podgląd produktu: :name',
        'index_title' => 'Lista produktów',
        'fields' => [
            // 'name' => 'Nazwa:',// {{ __('shop.product.fields.name') }}
            // 'description' => 'Opis:',// {{ __('shop.product.fields.description') }}
            // 'amount' => 'Ilość:',// {{ __('shop.product.fields.amount') }}
            // 'price' => 'Cena:', // {{ __('shop.product.fields.price') }}
            // 'image' => 'Grafika:',// {{ __('shop.product.fields.image') }}
        ],
    ],
    'user' => [
        'index_title' => 'Lista Użytkowników',
    ],

];
