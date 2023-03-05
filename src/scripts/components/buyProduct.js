import Cookies from 'js-cookie'


const buyProduct = () => {
    const selectors = {
        modal: {
            form: '#buyForm',
            productId: '#productIdField',
            product: {
                name: '.js-product-name',
                price: '.js-product-price',
                quantity: '.js-product-quantity',
                total: '.js-product-total',
            },
            additions: {
                item: '.additional-item',
                toggle: '.additional-toggle',
                price: '.additional-price',
                qty: '.additional-qty',
                total: '.additional-total',
            }
        },
        catalogItem: '.product',
        finalPrice: '#buyForm .final-price'
    }

    const products = document.querySelectorAll(selectors.catalogItem),
        form = document.querySelector(selectors.modal.form),
        id = form.querySelector(selectors.modal.productId),
        quantity = form.querySelector(selectors.modal.product.quantity),
        name = form.querySelector(selectors.modal.product.name),
        price = form.querySelector(selectors.modal.product.price),
        total = form.querySelector(selectors.modal.product.total),
        additionalToggleFields = form.querySelectorAll(selectors.modal.additions.toggle),
        additionalQuantityFields = form.querySelectorAll(selectors.modal.additions.qty);

    products.forEach((el, i) => {
        el.addEventListener('click', function () {
            const itemData = this.dataset;
            quantity.setAttribute('max', itemData.qty);
            quantity.value = 1;
            name.innerHTML = itemData.name;
            price.innerHTML = renderPrice(itemData.price);
            total.innerHTML = renderPrice(itemData.price);
            id.value = itemData.id
            changeTotalPrice(itemData.price);
            calculateFinalPrice();
        })
    })
    additionalToggleFields.forEach((el) => {
        el.addEventListener('change', function () {
            console.log(el)
            const parentWrapper = this.closest(selectors.modal.additions.item),
                additionalQuantity = parentWrapper.querySelector(selectors.modal.additions.qty),
                additionalTotal = parentWrapper.querySelector(selectors.modal.additions.total),
                additionalPrice = parentWrapper.querySelector(selectors.modal.additions.price);
            if (this.checked) {
                additionalQuantity.disabled = false;
                additionalQuantity.value = '1';
                additionalTotal.innerHTML = renderPrice(parseFloat(additionalPrice.textContent));
                calculateFinalPrice();

            } else {
                additionalQuantity.disabled = true;
                additionalQuantity.value = '';
                additionalTotal.innerHTML = - renderPrice(parseFloat(additionalPrice.textContent));
                calculateFinalPrice();
                additionalTotal.innerHTML = '';
            }
        });
    });
    additionalQuantityFields.forEach((el) => {
        const parentWrapper = el.closest(selectors.modal.additions.item);

        el.addEventListener('change', function () {
            const additionalQuantity = parseInt(this.value) ?? 0,
                additionalTotal = parentWrapper.querySelector(selectors.modal.additions.total),
                additionalPrice = parentWrapper.querySelector(selectors.modal.additions.price).textContent * additionalQuantity;
            additionalTotal.innerHTML = renderPrice(additionalPrice.toFixed(1));
            calculateFinalPrice();
        });
    });

    updateAdditionsQuantityFields();

    function changeTotalPrice(price) {
        quantity.addEventListener('change', function () {
            const qty = this.value;
            total.innerHTML = renderPrice(qty * price);
            calculateFinalPrice();
        });
    }

    function renderPrice(price) {
        return `<span class="price">${parseFloat(price).toFixed(1)}</span>$`;
    }

    function calculateFinalPrice() {
        let productTotal = parseFloat(form.querySelector(`${selectors.modal.product.total} .price`).textContent);
        const additions = [...form.querySelectorAll(selectors.modal.additions.toggle + ':checked')],
            finalPriceElement = document.querySelector(selectors.finalPrice);
        if (additions.length > 0) {
            additions.map((el) => {
                const parent = el.closest(selectors.modal.additions.item),
                    total = parseFloat(parent.querySelector(`${selectors.modal.additions.total} .price`).textContent);

                productTotal += total;
            })
        }
        finalPriceElement.innerHTML = productTotal.toFixed(1);
    }

    function updateAdditionsQuantityFields(){
        console.log(Cookies.get())
    }

}
export default buyProduct;