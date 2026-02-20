<?php
Route::get('/test-auth', function() {
    if(auth()->check()) {
        return "Estás autenticado como: " . auth()->user()->email . "<br><a href='/contacts/create'>Ir para Novo Contacto</a>";
    }
    return "NÃO estás autenticado. <a href='/login'>Fazer login</a>";
});
