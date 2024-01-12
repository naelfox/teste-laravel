{{-- <a href="{{ url()->current() != url()->previous() ? url()->previous() : Route::currentRouteName() . 'index' }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i> Voltar </a> --}}
<a href="{{ !isset($route) ? url()->previous() : $route }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i> Voltar </a>
{{-- <button  onclick="redirectToLastDifferentPage()"  class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i> Voltar </button> --}}
