{{--  creo componente para ver los usuarios  --}}
@include('backend.componentes.nav-link',[
    'title'=>'Usuarios',
    'link'=>'/',
    'color'=>'green',
    'icon'=>'user'
])
@include('backend.componentes.nav-link',[
    'title'=>'Mensajes',
    'link'=>'/',
    'color'=>'blue',
    'icon'=>'envelope'
])