<div id="selectLanguage" class="bg-yellow-100 p-0 overflow-hidden max-h-0 transition-all ease-out  text-center ">
    <div id="close" class="text-right p-2 font-bold cursor-pointer">X</div>
    <p class="pb-5">Please select your <b>Shipping Region:</b></p>

    <b>EUROPE</b>

    @include('vetuk::components.countries_list.europe_countries_list')

    <b>NORTH AMERICA</b>

    @include('vetuk::components.countries_list.america_countries_list')

    <b>ASIA</b>

    @include('vetuk::components.countries_list.asia_countries_list')

</div>
