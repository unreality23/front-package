<html class="overflow-x-hidden relative bg-gray-100 font-poppins">

<head>
    <x-vetuk::base.head />
</head>
<body class="overflow-x-hidden overflow-y-hidden relative bg-gray-100">

@component('vetuk::components.base.header')
@endcomponent

<div id="basketpopup">
    <basket-popup />
</div>

@yield('main')

@component('vetuk::components.base.footer.footer')
@endcomponent
</body>
</html>
