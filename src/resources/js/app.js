import { createApp } from 'vue';
import store from './store/index';

import ProductsCollection from './components/ProductsCollection.vue';
import BasketPopup from './components/BasketPopup.vue';
import AddToBasket from './components/AddToBasket.vue';
import BasketPage from './components/basket/BasketPage.vue';

import CheckoutPage from './components/checkout/CheckoutPage.vue';
import BillingForm from './components/checkout/form/BillingForm.vue';
import PaymentForm from './components/checkout/form/PaymentForm.vue';
import ShippingForm from './components/checkout/form/ShippingForm.vue';
import PurchaseConfirmationPage from './components/checkout/PurchaseConfirmationPage.vue';

import AccountPage from './components/account/AccountPage.vue';
import AccountOverview from './components/account/sections/AccountOverview.vue';
import OrderHistory from './components/account/sections/OrderHistory.vue';
import PersonalInformation from './components/account/sections/PersonalInformation.vue';
import MyPets from './components/account/sections/MyPets.vue';
import PetDetails from './components/account/form/pets/PetDetails.vue';
import AccountMenu from './components/account/menu/AccountMenu.vue';
import FormGroup from './components/account/form/skeleton/FormGroup.vue';
// personal information forms
import BillingAddress from './components/account/form/BillingAddress.vue';
import ChangeEmail from './components/account/form/ChangeEmail.vue';
import ChangePassword from './components/account/form/ChangePassword.vue';
import DeliveryAddress from './components/account/form/DeliveryAddress.vue';

const app = createApp({});
const app2 = createApp({});
const app3 = createApp({});
const appAccount = createApp({});
const basketCheckoutApp = createApp({});

app.use(store);
app2.use(store);
app3.use(store);
appAccount.use(store);
basketCheckoutApp.use(store);

app.component('BasketPopup', BasketPopup);

app.mount('#basketpopup');

app2.component('AddBasket', AddToBasket);

app2.mount('#addToCart');

app3.component('ProductsCollection', ProductsCollection);

// gets user id
app3.config.globalProperties.userId = document
    .querySelector("meta[name='user-id']")
    .getAttribute('content');

app3.mount('#app');

// Basket & Checkout
basketCheckoutApp.component('BasketPage', BasketPage);

basketCheckoutApp.component('CheckoutPage', CheckoutPage);
basketCheckoutApp.component('BillingForm', BillingForm);
basketCheckoutApp.component('PaymentForm', PaymentForm);
basketCheckoutApp.component('ShippingForm', ShippingForm);
basketCheckoutApp.component('ConfirmationPage', PurchaseConfirmationPage);
basketCheckoutApp.mount('#basketApp');

// Account Page
appAccount.component('AccountPage', AccountPage);
appAccount.component('AccountOverview', AccountOverview);
appAccount.component('OrderHistory', OrderHistory);
appAccount.component('PersonalInformation', PersonalInformation);
appAccount.component('MyPets', MyPets);
appAccount.component('PetDetails', PetDetails);
appAccount.component('AccountMenu', AccountMenu);
// personal information forms
appAccount.component('BillingAddress', BillingAddress);
appAccount.component('ChangeEmail', ChangeEmail);
appAccount.component('ChangePassword', ChangePassword);
appAccount.component('DeliveryAddress', DeliveryAddress);
appAccount.component('FormGroup', FormGroup);

appAccount.mount('#accountPage');

document.addEventListener(
    'DOMContentLoaded',
    () => {
        let countBasketClicks = 0;
        let isBasketOpen = false;
        let isMenuOpen = false;

        // opens ups main menu
        function OpenHamburgerClose() {
            const element = document.getElementById('menuHamburger');
            const elementClose = document.getElementById('menuHamburgerClose');
            const elementMobile = document.getElementById('mobile-menu');

            // if basket is open for mobiles, it closes it and opens main menu
            if (isBasketOpen) {
                if (document.getElementById('shoppingCart')) {
                    document
                        .getElementById('shoppingCart')
                        .classList.add('translate-x-full');
                }

                isBasketOpen = false;
            }

            if (!isMenuOpen) {
                element.classList.remove('block');
                element.classList.add('hidden');

                elementClose.classList.remove('hidden');
                elementClose.classList.add('block');

                elementMobile.classList.remove('hidden');
                elementMobile.classList.add('block');

                isMenuOpen = true;
            } else {
                element.classList.remove('hidden');
                element.classList.add('block');

                elementClose.classList.remove('block');
                elementClose.classList.add('hidden');

                elementMobile.classList.remove('block');
                elementMobile.classList.add('hidden');

                isMenuOpen = false;
            }
        }

        // opens up shopping cart
        function Toggle() {
            const element = document.getElementById('shoppingCart');
            if (countBasketClicks <= 0) {
                element.classList.add('duration-300');
            }

            countBasketClicks += 1;

            if (!isBasketOpen) {
                element.classList.remove('translate-x-full');
                isBasketOpen = true;
            } else {
                element.classList.add('translate-x-full');
                isBasketOpen = false;
            }

            // if main menu is open for mobiles, it closes it and opens basket
            if (isMenuOpen) {
                OpenHamburgerClose();
                isMenuOpen = false;
                element.classList.remove('translate-x-full');
                isBasketOpen = true;
            }
        }
        if (document.getElementById('shoppingBasket')) {
            document
                .getElementById('shoppingBasket')
                .addEventListener('click', Toggle);
        }
        if (document.getElementById('menuHamburgerOpen')) {
            document
                .getElementById('menuHamburgerOpen')
                .addEventListener('click', OpenHamburgerClose);
        }

        // finds Country selection box height and how much it needs to
        // be pushed outside of the view area

        function CountryBoxAdd() {
            const e = document.getElementById('selectLanguage');
            // let e = document.getElementById("selectLanguage").clientHeight;
            // document.getElementById("header").style.transform = "translateY(-" + e + "px)";

            /* tailwind css classes which you would like to toggle */
            const addCSS = ['p-2', 'pb-8', 'max-h-full', 'ease-in'];

            for (let i = 0; i < addCSS.length; i += 1) {
                e.classList.add(addCSS[i]);
            }
        }
        if (document.getElementById('LanguageSelect')) {
            document
                .getElementById('LanguageSelect')
                .addEventListener('click', CountryBoxAdd);
        }

        function CountryBoxRemove() {
            const e = document.getElementById('selectLanguage');

            /* tailwind css classes which you would like to toggle */
            const addCSS = ['p-2', 'pb-8', 'max-h-full', 'ease-in'];

            for (let i = 0; i < addCSS.length; i += 1) {
                e.classList.remove(addCSS[i]);
            }
        }
        if (document.getElementById('close')) {
            document
                .getElementById('close')
                .addEventListener('click', CountryBoxRemove);
        }

        function ProductPageImageFilterHeight() {
            const clientHeight = document.getElementById('mainProductImage');

            if (document.getElementById('productImages')) {
                const imageFilterBox = document.getElementById('productImages');

                imageFilterBox.style.height = `${clientHeight}px`;
            }
        }

        window.addEventListener('load', () => {
            ProductPageImageFilterHeight();
        });

        let resize;

        // once finished resizing window it runs CountryHeight() function
        window.onresize = function onresize() {
            clearTimeout(resize);
            resize = setTimeout(() => {
                if (window.location.pathname === '/product') {
                    ProductPageImageFilterHeight();
                }
            }, 100);
        };

        // opens sort box for products

        function OpenProductSort() {
            document.getElementById('SortingOn').classList.toggle('hidden');
            document.getElementById('SortingHidden').classList.toggle('hidden');
            document
                .getElementById('product_collection_sort')
                .classList.toggle('active');
            const sortBy = document.getElementById('sortBy');
            const classList = [
                'max-h-full',
                'ease-in',
                'border',
                'max-h-screen',
                'opacity-100',
            ];

            // classList.forEach(element => {
            //     sortBy.classList.toggle(element);
            // });
            for (let i = 0; i <= classList.length; i += 1) {
                sortBy.classList.toggle(classList[i]);
            }
        }
        if (document.getElementById('product_collection_sort')) {
            document
                .getElementById('product_collection_sort')
                .addEventListener('click', OpenProductSort);
        }

        // opens sort box for filter on mobile/tablets

        function OpenFilterMobile() {
            const filterMobile = document.getElementById('product_filter_menu');
            const addCSS = ['max-h-full', 'ease-in'];

            for (let i = 0; i < addCSS.length; i += 1) {
                filterMobile.classList.toggle(addCSS[i]);
            }
        }
        if (document.getElementById('product_collection_filter')) {
            document
                .getElementById('product_collection_filter')
                .addEventListener('click', OpenFilterMobile);
        }

        // opens filter dropdown

        // for(var i = 0; i < filterElement.length; i++)
        // {
        //     filterElement[i].addEventListener("click", OpenFilterDropdown, false);
        // }
        function OpenFilterDropdownPrice() {
            const PriceCheckbox = document.getElementById('menu-Price');
            const Price = document.getElementById('Price');
            const PriceFilter = document.getElementById('filter-price');

            const addCSS = ['max-h-full', 'ease-in', 'py-2'];
            if (PriceCheckbox.checked === true) {
                for (let i = 0; i < addCSS.length; i += 1) {
                    Price.classList.add(addCSS[i]);
                    PriceFilter.classList.add('active');
                }
            } else {
                for (let i = 0; i < addCSS.length; i += 1) {
                    Price.classList.remove(addCSS[i]);
                    PriceFilter.classList.remove('active');
                }
            }
        }
        if (document.getElementById('priceClick')) {
            document
                .getElementById('priceClick')
                .addEventListener('click', OpenFilterDropdownPrice, false);
        }

        function OpenFilterDropdownCategory() {
            const CategoryCheckbox = document.getElementById('menu-Category');
            const Category = document.getElementById('Category');
            const CategoryFilter = document.getElementById('filter-category');

            const addCSS = ['max-h-full', 'ease-in', 'py-2'];
            if (CategoryCheckbox.checked === true) {
                for (let i = 0; i < addCSS.length; i += 1) {
                    Category.classList.add(addCSS[i]);
                    CategoryFilter.classList.add('active');
                }
            } else {
                for (let i = 0; i < addCSS.length; i += 1) {
                    Category.classList.remove(addCSS[i]);
                    CategoryFilter.classList.remove('active');
                }
            }
        }
        if (document.getElementById('categoryClick')) {
            document
                .getElementById('categoryClick')
                .addEventListener('click', OpenFilterDropdownCategory, false);
        }

        function OpenFilterDropdownSize() {
            const SizeCheckbox = document.getElementById('menu-Size');
            const Size = document.getElementById('Size');
            const SizeFilter = document.getElementById('filter-size');

            const addCSS = ['max-h-full', 'ease-in', 'py-2'];
            if (SizeCheckbox.checked === true) {
                for (let i = 0; i < addCSS.length; i += 1) {
                    Size.classList.add(addCSS[i]);
                    SizeFilter.classList.add('active');
                }
            } else {
                for (let i = 0; i < addCSS.length; i += 1) {
                    Size.classList.remove(addCSS[i]);
                    SizeFilter.classList.remove('active');
                }
            }
        }
        if (document.getElementById('sizeClick')) {
            document
                .getElementById('sizeClick')
                .addEventListener('click', OpenFilterDropdownSize, false);
        }
        const deleteWishlistButtons =
            document.getElementsByClassName('removeFromWishlist');

        function deleteProductFromWishlist(e) {
            const el = e.target;
            const xhr = new XMLHttpRequest();
            const method = 'POST';
            const url = `wishlist/delete/${el.getAttribute('data-id')}`;
            xhr.onreadystatechange = function state() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    window.location.reload();
                }
            };
            xhr.open(method, url, true);
            xhr.setRequestHeader(
                'X-CSRF-TOKEN',
                document.querySelector('meta[name="csrf-token"]').content
            );
            xhr.setRequestHeader(
                'Content-type',
                'application/x-www-form-urlencoded'
            );
            xhr.send();
        }

        for (let i = 0; i < deleteWishlistButtons.length; i += 1) {
            deleteWishlistButtons[i].addEventListener(
                'click',
                deleteProductFromWishlist,
                false
            );
        }
    },
    false
);
