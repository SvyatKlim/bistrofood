export default function content() {
    const selectors = {
            nav: {
                wrapper: '.js-links-wrapper',
                item: '.js-links-item',
                removeBtn: '.js-remove-link',
                addLink: '.js-add-link',
                removeBtnWrapper: '.js-btn-delete-wrapper',
            }
        }, wrapper = document.querySelector(selectors.nav.wrapper),
        removeBtnWrapper = document.querySelector(selectors.nav.removeBtnWrapper),
        addLink = document.querySelector(selectors.nav.addLink);

    deleteitem();

    addLink.addEventListener('click', function (ev) {
        ev.preventDefault();
        createNewLinkBlock();
        deleteitem();
    })

    function deleteitem() {
        let items = [...wrapper.children];
        items.map((el) => {
            let removeBtn = el.querySelector(selectors.nav.removeBtn);
            removeBtn.addEventListener('click', function (ev) {
                    ev.preventDefault();
                    this.closest(selectors.nav.item).remove();
                })
            }
        )
    }

    function createNewLinkBlock() {
        let lastKey = parseInt(wrapper.getAttribute('data-last-key'));
        lastKey++;

        const template = `<div class="row mb-3 links-item js-links-item ">
                             <div class="pb-3 p-2 border-bottom mb-3 col-9">
                                 <h4>Link</h4>
                                 <div class="mb-2">
                                     <label for="link_title_${lastKey}" class="form-label">Title</label>
                                     <input type="text"
                                            name="links[${lastKey}][title]"
                                            class="form-control"
                                            id="link_title_${lastKey}"       
                                     />
                                 </div>
                                 <div>
                                     <label for="link_${lastKey}" class="form-label">URL</label>
                                     <input type="text"
                                            name="links[${lastKey}][hash]"
                                            class="form-control"
                                            id="link_${lastKey}"
                                     />
                                 </div>
                                 <div class="btn-group d-flex justify-content-start col-2 mt-4 ">
                               <a type="submit" class="btn admin-product-btn btn-danger remove-link js-remove-link">Delete <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M5.72 5.72a.75.75 0 0 1 1.06 0L12 10.94l5.22-5.22a.749.749 0 0 1 1.275.326.749.749 0 0 1-.215.734L13.06 12l5.22 5.22a.749.749 0 0 1-.326 1.275.749.749 0 0 1-.734-.215L12 13.06l-5.22 5.22a.751.751 0 0 1-1.042-.018.751.751 0 0 1-.018-1.042L10.94 12 5.72 6.78a.75.75 0 0 1 0-1.06Z"></path></svg></a>
                                 </div>
                             </div>
                          </div>`;

        wrapper.insertAdjacentHTML("beforeend", template);
        wrapper.setAttribute('data-last-key', lastKey++);

    }


}