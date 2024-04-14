@props(['routeName', 'routeParam'])

<a href="{{ route($routeName, $routeParam) }}" {{ $attributes->merge(['class' => 'py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full hover:ring-accent hover:ring-1 hover:text-primary hover:bg-background']) }}>{{ $slot }}</a>
