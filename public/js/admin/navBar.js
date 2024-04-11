export async function mainNavbar(options) {
    let navBarToggle = $('#navBarToggle');
    let searchSection = $('#searchSection');
    let searchLink = $('#searchLink');
    let desktopSearchBar = $('#desktopSearchBar');
    let searchIcon = $('#searchIcon');

    let searchForm = $('#searchForm');
    let desktopSearchForm = $('#desktopSearchForm');
    let submitInput = $('#submitInput');

    let desktopNavbarShop = $('#desktopNavbarShop');
    let desktopShop = $('#desktopShop');

    if (window.getComputedStyle(searchSection[0]).display == 'none') {

        searchIcon.on("click", function() {
            desktopSearchForm.submit();
        });

        searchIcon.hover(function() {
            desktopSearchBar[0].hidden = false;
            desktopSearchForm[0].hidden = false;
        });

        desktopNavbarShop.click(function() {
            desktopShop[0].classList.toggle('show');
            console.log(desktopShop);
        });
    }

    document.onclick = function(e) {
        if (e.target.id === navBarToggle[0].id || e.target.id === searchIcon[0].id) {
            searchSection[0].classList.toggle('show');
        }
        else
        {
            searchSection[0].classList.remove('show');
        }
    }

    submitInput.on("click", function() {
        searchForm.submit();
    });
}
