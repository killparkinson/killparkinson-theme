document.addEventListener('DOMContentLoaded', () => {
  const page = document.getElementById('page')
  const navMain = document.getElementById('nav-main');
  const masthead = document.getElementById('masthead');

  // create a sentinel element used for intersection detection
  const topSentinel = document.createElement('div');

  topSentinel.style.position = 'absolute';
  topSentinel.style.top = '0';
  topSentinel.style.height = '1px';

  // insert the sentinel as the first child of the header element
  page.insertBefore(sentinel, masthead);

  // add shadow to navbar after scrolling.
  const observer = new IntersectionObserver(
    ([entry]) => {
      if (entry.intersectionRatio === 0) {
        navMain.classList.add('shadow');
      } else {
        navMain.classList.remove('shadow');
      }
    },
    {
      root: null,
      threshold: [0, 1]
    }
  );

  observer.observe(topSentinel);
})
