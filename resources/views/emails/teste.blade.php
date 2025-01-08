@component('mail::message')

# Olá, {{ $nome }}

<div style="text-align: center;">
    <img src="{{ asset('storage/' . $imagem) }}" alt="Logo da Empresa" style="max-width: 100%; height: auto;" />
</div>

<div style="margin-top: 1em; ">

<p style="padding-left: 2em">
   {{ $mensagem }}
</p>

</div> 


Att,  
{{ config('app.name') }}
@endcomponent