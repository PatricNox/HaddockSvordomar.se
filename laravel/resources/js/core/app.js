// DOM Listener, indicator until DOM is ready.
export function waitUntilDOMReady(callback) {
    let intervalId = window.setInterval(function() {
      if (document.getElementsByTagName('body')[0] !== undefined) {
        window.clearInterval(intervalId);
        callback.call(this);
      }
    }, 1000);
  }

// Removes the loader indicator from the DOM tree
export function removeLoader() {
    let loader = document.getElementById('loader');
    document.querySelector('.site-wrapper').removeAttribute('style');

    setTimeout(() => {
        loader.style.opacity = 0;
        setTimeout(() => {
            loader.parentElement.removeChild(loader);
        }, 600);
    }, 350);
}
