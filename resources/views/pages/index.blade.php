
<x-layout>

    @include('partials._banner')

    @include('partials._features')

    <x-categories :categories='$categories'/>
    <x-new-arrivals :products='$new_arrivals'/>

    @include('partials._ads')

    <x-recommended :recommended='$recommended' />

</x-layout>
