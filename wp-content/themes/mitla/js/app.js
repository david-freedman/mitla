let CURRENT_LNG;
// сбор всех данных для отправки на сервер
let TOTAL_DATA = {};

// получаем текущий язык, только для использование скрипта
function getCurrentLanguage() {
  const url = window.location.href;

  if (url.includes('/pl/')) {
    return CURRENT_LNG = 'pl';
  } else if (url.includes('/en/')) {
    return CURRENT_LNG = 'en';
  } else if (url.includes('/ua/')) {
    return CURRENT_LNG = 'ua';
  } else if (url.includes('/de/')) {
    return CURRENT_LNG = 'de';
  } else {
    return CURRENT_LNG = '';
  }
} 
getCurrentLanguage()

const swiperReviews = new Swiper('.reviews_swiper', {
    navigation: {
      nextEl: '.reviews_swiper-next',
      prevEl: '.reviews_swiper-prev',
    }
});

const swiperAdditionServices = new Swiper('.addition_services-swiper', {
    centeredSlides: true,
    loop: true,
    grabCursor: true,
    breakpoints: {
    // when window width is >= 320
    320: {
      slidesPerView: 2.1,
      spaceBetween: 15,
    },
    // when window width is >= 768
    768: {
      slidesPerView: 3.6,
      spaceBetween: 28,
    },
    // when window width is >= 1140
    1140: {
      slidesPerView: 5.6,
      spaceBetween: 28,
    }
  }
});



if (window.innerWidth <= 1080) {
  const swiperNews = new Swiper('.new_inner', {
    navigation: {
      nextEl: '.news-button-next',
      prevEl: '.news-button-prev',
    }
  })
}

// логика блока header
function header() {

  // ховер на десктопное меню
  function desktopeMenuHover() {
    const menu = document.querySelector('.menu_wrap')
    const menuList = document.querySelector('.nav.menu_list')

    if (window.innerWidth <= 620) headerMedia(menuList)

    if (window.innerWidth <= 1440) {
      menu.querySelector('.menu').addEventListener('click', e => {
        
        menuList.classList.toggle('active')
        document.querySelector('body').classList.toggle('locked')

        // if (e.target.closest('.menu_list') || e.target.closest('.menu')) {
        //   menuList.classList.add('active')
        // } else {
        //   menuList.classList.remove('active')
        // }
      })
    }
  }
  desktopeMenuHover()


  // открыть/закрыть переключатель языков
  function chooseLanguage() {
    const language = document.querySelector('.language')
    const languageContent = document.querySelector('.language_content')
    const close = document.querySelector('.language_close')

    language.addEventListener('click', e => {
      e.preventDefault()

      languageContent.classList.add('active')
    })

    languageContent.addEventListener('click', e => {
      if (!e.target.closest('.language_inner')) {
        languageContent.classList.remove('active')
      }
    })

    close.addEventListener('click', e => languageContent.classList.remove('active'))
  }
  chooseLanguage()

  // открыть/закрыть список городов
  function chooseCity() {
    const country = document.querySelector('.country')
    const content = document.querySelector('.country_content')
    const close = document.querySelector('.language_close')

    country.addEventListener('click', e => {
      e.preventDefault()

      content.classList.add('active')
    })
    

    content.addEventListener('click', e => {
      e.preventDefault()
      if (!e.target.closest('.country_list')) {
        content.classList.remove('active')
      }
    })

    close.addEventListener('click', e => content.classList.remove('active'))
  }
  chooseCity()


  function headerMedia(menuList) {
    const language = document.querySelector('.language')
    const country = document.querySelector('.country')

    country.remove()
    language.remove()

    menuList.querySelector('.container').insertAdjacentHTML('beforeend', language.outerHTML)
    menuList.querySelector('.container').insertAdjacentHTML('beforeend', country.outerHTML)
  }

}

header()

// табы, просчет скидок 
function discounts() {  
  const navItems = document.querySelectorAll('.discounts_nav-item')
  const prices = document.querySelectorAll('.discounts_content-item_price')

  navItems.forEach(item => {
    item.addEventListener('click', e => {

      if (e.target.closest('.active')) return;

      navItems.forEach(el => el.classList.remove('active'))

      item.classList.add('active')

      let percent;

      if (item.querySelector('div')) {
        percent = Math.abs(parseInt(item.querySelector('div').innerText));
      } else percent = 0;

      prices.forEach(price => {
        let num = price.getAttribute('data-full-price')

        let res = num * (1 - percent / 100)

        // console.log(res)
    
        price.innerText = res.toFixed(2) + ' zł';
      })
    })
  })

}
document.querySelector('.discounts_nav') && discounts()


// табы, блок "из чего состоит уборка"
function cleanConsist() {
  const navItems = document.querySelectorAll('.include_nav-item')
  const contentItems = document.querySelectorAll('.include_content-item')

  navItems.forEach(item => {
    item.addEventListener('click', e => {

      navItems.forEach(el => el.classList.remove('active'))

      item.classList.add('active')

      const attr = item.getAttribute('data-nav')

      contentItems.forEach(content => {
        
        if (content.id == attr) {
          contentItems.forEach(el => el.classList.remove('active'))
          content.classList.add('active')
        }
      })
    })
  })

}
document.querySelector('.include_nav') && cleanConsist()


// если меньше чем 450px, категории из header переносим в блок benefits
function benefitsMedia() {
  const categories = document.querySelector('.header_categories')
  const benefits = document.querySelector('.benefits_inner')

  benefits.before(categories);
}

if (window.innerWidth <= 450) {
  document.querySelector('.benefits') && benefitsMedia()
}


// последний блок с городами прячим, связано с медиазпаросами в css
function citiesMedia() {
  const citiesItems = document.querySelectorAll('.cities_inner-item')
  const buttonAll = document.querySelector('.cities_inner-all')

  // если меньше чем 1080px, последний блок с городами прячим
  if (window.innerWidth <= 1080) {
    let count = 0;
    citiesItems.forEach(item => {
      if (count !== 2) {
        count++
      } else {
        item.classList.add('hidden')
      }
    })
  }

  // если меньше чем 768px, последний блок с городами прячим
  if (window.innerWidth <= 768) {
    let count = 0;
    citiesItems.forEach(item => {
      if (count !== 1) {
        count++
      } else {
        item.classList.add('hidden')
      }
    })
  }

  buttonAll.addEventListener('click', e => {
    e.preventDefault()

    buttonAll.style.display = 'none';

    citiesItems.forEach(item => item.classList.remove('hidden'))
  })
}

document.querySelector('.cities') && citiesMedia();

function footerMedia() {
  const footerContainer = document.querySelector('.footer .container')
  const footerLogoImg = document.querySelector('.footer_logo > img')
  const footerContent = document.querySelector('.footer_content')
  
  footerLogoImg.remove()
  footerContainer.insertAdjacentHTML('afterbegin', footerLogoImg.outerHTML)

  const footerLogo = document.querySelector('.footer_logo')
  footerLogo.remove()

  footerContent.after(footerLogo)

  // моблика, аккордеон
  function footerAccord() {
    const footerItems = document.querySelectorAll('.footer_content-top_item')

    footerItems.forEach(item => {
      item.querySelector('h4').addEventListener('click', e => {
        item.querySelector('ul').classList.toggle('active')
      })
    })
  }

  footerAccord()
}

window.innerWidth <= 1080 && footerMedia()


function inputTel() {
  const tel = document.querySelector('#telephone')

  window.intlTelInput(tel, {
    preferredCountries: ['pl', 'ua', 'de', 'ru', 'en'],
    separateDialCode: true,
  })
}
document.querySelector('#telephone') && inputTel()




function scroll(selector, height) {
  if (selector.getAttribute('data-id') === '1') {
    height = 0
  }
  const blockID = selector.getAttribute('data-id');
  const headerHeight = height; // высота фиксированного хедера
  
  const elementPosition = document.getElementById(blockID).getBoundingClientRect().top + window.pageYOffset;
  const offsetPosition = elementPosition - headerHeight;
  
  window.scrollTo({
    top: offsetPosition,
    behavior: 'smooth'
  });
}


function clickedAnchor() {
  const steps = document.querySelectorAll('.anchor_step-item')

  steps.forEach(item => {
    item.addEventListener('click', e => {
      scroll(item, 0)
    })
  })

  if (window.innerWidth <= 992) {
    const block = document.querySelector('.anchor_steps');
    const blockOffsetTop = block.offsetTop;
    const scrollTop = window.pageYOffset;
  
    function fixBlock() {
        const currentScroll = window.pageYOffset;
  
        if (currentScroll > blockOffsetTop - scrollTop) {
            block.style.position = 'fixed';
            block.style.top = '0';
            document.querySelector('main .container').style.marginTop = '120px';
        } else {
            block.style.position = 'static';
            document.querySelector('main .container').style.marginTop = '0px';
        }
    }
  
    fixBlock(); // Фиксируем блок при загрузке страницы
  
    window.addEventListener('scroll', () => {
        fixBlock();
    });
  }
}
document.querySelector('.anchor_steps') && clickedAnchor()



// function highlightNavigation() {
//   const steps = document.querySelectorAll('.anchor_step-item');

//   function isInViewport(element) {
//     const rect = element.getBoundingClientRect();
//     const windowHeight = (window.innerHeight || document.documentElement.clientHeight);
//     const top = rect.top;
//     const bottom = rect.bottom;

//     return (top >= 0 && top <= windowHeight) || (bottom >= 0 && bottom <= windowHeight);
//   }

//   function highlightStep() {
//     steps.forEach((step) => {
//       const sectionID = step.getAttribute('data-href');
//       const section = document.getElementById(sectionID);

//       if (isInViewport(section)) {
//         const activeStep = document.querySelector('.anchor_step-item.active');
//         if (activeStep) {
//           activeStep.classList.remove('active');
//         }
//         step.classList.add('active');
//       }
//     });
//   }

//   highlightStep();
//   window.addEventListener('scroll', highlightStep);
// }

// highlightNavigation();





