<div class="searchform__popup" id="searchForm">
    <a href="#" class="btn-close"><i class="la la-remove"></i></a>
    @if (Auth::check())
    <div class="searchform__body">
        <p>Start typing and press Enter to search</p>
        <form action="{{route('search')}}" method="GET" class="searchform">
            <input type="text" name="search" id="popup-search" class="searchform__input"
                value="{{ request()->input('search') }}"
                placeholder="Hello! {{Auth::user()->username}}, What are you looking for?" autofocus>
            <button type="submit" class="searchform__submit"><i class="la la-search"></i></button>
        </form>
    </div>
    @else
    <div class="searchform__body">
        <p>Start typing and press Enter to search</p>
        <form action="{{route('search')}}" method="GET" class="searchform">
            <input type="text" name="search" id="popup-search" class="searchform__input"
                value="{{ request()->input('search') }}" placeholder="Hello! What are you looking for?" autofocus>
            <button type="submit" class="searchform__submit"><i class="la la-search"></i></button>
        </form>
    </div>
    @endif

</div>