@php

    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }

@endphp
<div class="header__main-center">
<nav class="main-navigation text-center d-none d-lg-block">
<!--Main menu-->
<ul class="mainmenu">
@foreach ($items as $item)

    @php

        $originalItem = $item;
        if (Voyager::translatable($item)) {
            $item = $item->translate($options->locale);
        }

        $isActive = null;
        $styles = null;
        $icon = null;

        // Background Color or Color
        if (isset($options->color) && $options->color == true) {
            $styles = 'color:'.$item->color;
        }
        if (isset($options->background) && $options->background == true) {
            $styles = 'background-color:'.$item->color;
        }

        // Check if link is current
        if(url($item->link()) == url()->current()){
            $isActive = 'active';
        }

        // Set Icon
        

    @endphp
    <li class="mainmenu__item menu-item-has-children">
    @php 
    
    if($item->url==''){
        @endphp
        <a class="mainmenu__link">
        <span class="mm-text">{{ $item->title }}</span>
    </a>
    @php
    }
    
    else{  
        @endphp
        <a href="{{ url($item->link()) }}" class="mainmenu__link">
        <span class="mm-text">{{ $item->title }}</span>
        </a>
        @php   
    }
    @endphp
    
        @if(!$originalItem->children->isEmpty())
    <!--Children menu-->
    <ul class="sub-menu">
        @php 
        $item_children=$originalItem->children
        @endphp
    @foreach ($item_children  as $item)
    @php
        $originalItem = $item;
        if (Voyager::translatable($item)) {
            $item = $item->translate($options->locale);
        }
        $isActive = null;
        $styles = null;
        $icon = null;
        // Check if link is current
        if(url($item->link()) == url()->current()){
            $isActive = 'active';
        }
    @endphp
    <li>
        <a  href="{{ url($item->link()) }}">
        <span class="mm-text">{{ $item->title }}</span>
        </a>
    </li>
    @endforeach
    </ul>
    <!--END Children menu-->    
        @endif
    </li>
   
@endforeach
<!--END Main menu-->

</ul>
</nav>
</div>