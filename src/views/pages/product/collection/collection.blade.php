@isset($products)
    <products-collection :products="{{ json_encode($products) }}"></products-collection>
@endisset

@isset($price)
    <products-collection :products="{{ json_encode($price) }}"></products-collection>
@endisset

@isset($category)
    <products-collection :products="{{ json_encode($category) }}"></products-collection>
@endisset

@isset($updatedAt)
    <products-collection :products="{{ json_encode($updatedAt) }}"></products-collection>
@endisset

@isset($createdAt)
    <products-collection :products="{{ json_encode($createdAt) }}"></products-collection>
@endisset

