<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\ViewErrorBag;

class FlashMessages extends Component
{
    public $alerts = [];

    public function __construct()
    {
        // Tipos aceitos e ícones
        $types = [
            'success' => 'fas fa-check-circle',
            'error'   => 'fas fa-times-circle',
            'danger'  => 'fas fa-times-circle', // error e danger mesmos ícones/cores
            'warning' => 'fas fa-exclamation-circle',
            'info'    => 'fas fa-info-circle',
        ];

        foreach ($types as $type => $icon) {
            if (session()->has($type)) {
                $this->alerts[] = [
                    'type'    => $type === 'error' ? 'danger' : $type,
                    'icon'    => $icon,
                    'message' => session($type),
                ];
            }
        }

        // Se houver erros de validação, exibe todos juntos
        if (session()->has('errors') && session('errors') instanceof ViewErrorBag) {
            $errors = session('errors')->all();
            if (count($errors) > 0) {
                $this->alerts[] = [
                    'type'    => 'danger',
                    'icon'    => 'fas fa-times-circle',
                    'message' => $errors, // array!
                ];
            }
        }
    }

    public function render()
    {
        return view('components.flash-messages');
    }
}
