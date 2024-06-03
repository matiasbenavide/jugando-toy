export async function mainHome() {
    let flyerDiv = document.querySelectorAll('.flyer-container');

    if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches)
    {
        addAnimation();
    }

    function addAnimation() {
        flyerDiv.forEach((flyer) => {
          flyer.setAttribute("data-animated", true);

          const flyerInner = flyer.querySelector(".flyer");
          const flyerContent = Array.from(flyerInner.children);

          flyerContent.forEach((item) => {
            const duplicatedItem = item.cloneNode(true);
            duplicatedItem.setAttribute("aria-hidden", true);
            flyerInner.appendChild(duplicatedItem);
          });
        });
    }
}
