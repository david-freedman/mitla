function servicesCalc() {
    // текущий язык, получаем с файла app.js 
    // CURRENT_LNG

    // переменная для сбора данных, получаем с файла app.js
    // TOTAL_DATA

    // из файла translateVariables
    const {
            ROOM_TEXT_LANG, 
            ROOM_TEXT_LANG_ENDING_LANG,
            BATHROOM_TEXT_LANG,
            BATHROOM_TEXT_LANG_ENDING_LANG,
            HOURS_TEXT_LANG,
            HOURS_TEXT_ENDING_LANG,
            HOURS_TEXT_ENDING_2_LANG,
            MINUTS_TEXT_LANG
        } = translateVariables();

    // выбранные опции
    let OPTIONS_DATA = {
        "options": []
    }

    let divid = 0;

    function chooseTypeOfPersen(selectors) {
      const persen = selectors;
    
      persen.forEach((item) => {
        item.addEventListener('click', (e) => {
          e.preventDefault();
    
          persen.forEach((el) => el.classList.remove("active"));
    
          item.classList.add("active");
    
          if (item.classList.contains("active") && item.getAttribute("data-percent")) {
            divid = +(TOTAL_DATA.totalPrice * (23 / 100)).toFixed(0);
            TOTAL_DATA.totalPrice += divid;
            
          } else {
            if (divid !== 0) {
                console.log(divid);
                TOTAL_DATA.totalPrice -= divid;
                divid = 0;
            }
          }
        });
      });
    }

    document.querySelector('.typeof_persen') && chooseTypeOfPersen(document.querySelectorAll('.typeof_persen a'))
    document.querySelector('.typeof_city') && chooseTypeOfPersen(document.querySelectorAll('.typeof_city a'))
    

    function vacuumCleaner() {
        const vacuum = document.querySelector('.vacuum_cleaner')

        vacuum.addEventListener('click', e => {
            e.preventDefault()
            
            if (vacuum.classList.contains('active')) {
                TOTAL_DATA.totalPrice -= +vacuum.querySelector('.percent').innerText.split(' ')[0]
                vacuum.classList.remove('active')
            } else {
                TOTAL_DATA.totalPrice += +vacuum.querySelector('.percent').innerText.split(' ')[0]
                vacuum.classList.add('active')
            }

            return
        })
    }
    document.querySelector('.vacuum_cleaner') && vacuumCleaner()
    
    let totalTime = 0;

    // отслеживаем изменение в объекте TOTAL_DATA за его свойством totalPrice;
    Object.defineProperty(TOTAL_DATA, 'totalPrice', {
        get() {
            return this._totalPrice;
        },
        set(newVal) {
            newVal = +newVal.toFixed(2)
            this._totalPrice = newVal;
            handleTotalPriceChange(newVal);

            
        }
    });
    

    // выводит результат с изменеными даннымы в зависимости от TOTAL_DATA.totalPrice
    function handleTotalPriceChange(newVal) {

        if (document.querySelector('.calculate_right-top .price')) {
            document.querySelector('.calculate_right-top .price').innerText = newVal + ' zł';
        }

        if (document.querySelector('.clean_often')) {

            document.querySelectorAll('.clean_often-item').forEach(item => {
                setTotalPrice(item)

                if (item.classList.contains('active')) {
                    TOTAL_DATA.totalPriceDicount = +item.querySelector('.price').innerText.split(' ')[0];
                    document.querySelector('.price_total').innerText = TOTAL_DATA.totalPriceDicount + ' zł';

                    document.querySelector('.button_order span').innerText = TOTAL_DATA.totalPriceDicount + ' zł';
                }
            })

            document.querySelector('.price_total-old').innerText = newVal + ' zł';

        } else {
            if (document.querySelector('.calculate_right-total .price_total')) {
                document.querySelector('.calculate_right-total .price_total').innerText = newVal + ' zł';
            }

            document.querySelector('.button_order span') ? document.querySelector('.button_order span').innerText = TOTAL_DATA.totalPrice + ' zł' : '';
        }

        console.log(TOTAL_DATA)
    }




    // получаем параметры и передаем в наш калькулятор формы
    function getGetParametars() {
        // прием get параметров
        const params = new URLSearchParams(window.location.search);

        if (document.querySelector('.form_calculate .rooms .form-block_count')) {
            const rooms = document.querySelector('.form_calculate .rooms .form-block_count')
            const bathrooms = document.querySelector('.form_calculate .bathrooms .form-block_count')
    
            // получаем цену
            const roomsAttr = +rooms.getAttribute('data-price')
            const bathroomAttr = +bathrooms.getAttribute('data-price')
    
            // получаем время
            const roomsTimeAttr = +rooms.getAttribute('data-time')
            const bathroomTimeAttr = +bathrooms.getAttribute('data-time')
    
            // если есть параметры
            if (params.get('room') && params.get('bathroom')) {
    
                changeText(params.get('room'), params.get('bathroom'), null)
    
                // значения из get параметров
                let count = (roomsAttr * params.get('room')) + (bathroomAttr * params.get('bathroom'));
                let countTime = (roomsTimeAttr * params.get('room')) + (bathroomTimeAttr * params.get('bathroom'));
    
                formatWorkTime(countTime)
    
                rooms.innerText = params.get('room');
                bathrooms.innerText = params.get('bathroom');
    
                TOTAL_DATA.rooms = params.get('room');
                TOTAL_DATA.bathrooms = params.get('bathroom');
                TOTAL_DATA.totalPrice = count;  
    
            } else {
                // значения по дефолту
                let count = (roomsAttr * 1) + (bathroomAttr * 1);
                let countTime = (roomsTimeAttr * 1) + (bathroomTimeAttr * 1);
    
                rooms.innerText = 1;
                bathrooms.innerText = 1;

                console.log(countTime)
    
                formatWorkTime(countTime)
    
                TOTAL_DATA.rooms = 1;
                TOTAL_DATA.bathrooms = 1;
                TOTAL_DATA.totalPrice = count;

                if (document.querySelector('.not_standart')) {
                    delete TOTAL_DATA.rooms;
                    delete TOTAL_DATA.bathrooms;
                }
            }
        }

        
    }
    getGetParametars()




    // записываем время в TOTAL_DATA
    function formatWorkTime(time) {
        if (document.querySelector('.calculate_right-work_time')) {
            if (time === null) {
                document.querySelector('.calculate_right-work_time').style.display = 'none';
                return
            } else {
                document.querySelector('.calculate_right-work_time').style.display = 'block';
            }

            

            const workers = document.querySelector('.calculate_right-workers')

            if (TOTAL_DATA.workTime) {
                let workersLength = document.querySelectorAll('.calculate_right-workers img')
                
                TOTAL_DATA.workTime += +time;

                if (!document.querySelector('.transportation')) {
                    // + один рабочий минус 4 часа(240 минут)

                    if (TOTAL_DATA.workTime > 540) {

                        TOTAL_DATA.workTime -= 240;

                        TOTAL_DATA.totalPrice += 45

                        workers.style.display = 'flex';
                        workers.insertAdjacentHTML('beforeend', `<img src="/wp-content/themes/mitla/images/worker.svg" alt="">`)
                    } else {
                        totalTime = TOTAL_DATA.workTime;
                    }

                    // сам запутался, что сдесь происходит

                    // проверяем на количество рабочих
                    if (workersLength.length >= 2) {
                        // если наше текущее время + 240минут(4часа) будет меньше чем 540минут(9часов)
                        if (TOTAL_DATA.workTime + 240 < 540) {
                            // при это если у нас не равен одиному рабочему, то есть 2 и более
                            if (workersLength.length !== 1) {
                                // удаляем последнего рабочего
                                workersLength.item(workersLength.length - 1).parentNode.removeChild(workersLength.item(workersLength.length - 1))

                                // тут плюсуем 4 часа к нашему общиму времени с один рабочим
                                TOTAL_DATA.workTime += 240
                            }

                            // если к-во рабочиъ - 1 будет меньше 2, скрываем блок с рабочими
                            if (workersLength.length - 1 < 2) {
                                workers.style.display = 'none';
                            }
                        }
                    }

                    // похоже на какой-то костыль)))
                }

                

                
           
            } else {
                TOTAL_DATA.workTime = +time;
                totalTime = TOTAL_DATA.workTime;
            }
    
            const timeH = document.querySelector('.calculate_right-work_time .hours del')
            const timeHText = document.querySelector('.calculate_right-work_time .hours ins')

            const timeM = document.querySelector('.calculate_right-work_time .minutes del')
            const timeMText = document.querySelector('.calculate_right-work_time .minutes ins')
    
            let hours = Math.floor(TOTAL_DATA.workTime / 60);
            let mins = TOTAL_DATA.workTime % 60;

            if (hours === 0) {
                document.querySelector('.calculate_right-work_time .hours').style.display = 'none';
            } else {
                document.querySelector('.calculate_right-work_time .hours').style.display = 'inline-block';
            }

            if (mins === 0) {
                document.querySelector('.calculate_right-work_time .minutes').style.display = 'none';
            } else {
                document.querySelector('.calculate_right-work_time .minutes').style.display = 'inline-block';
            }

            if (hours === 0 && mins === 0) {
                document.querySelector('.calculate_right-work_time').style.display = 'none';
            } else {
                document.querySelector('.calculate_right-work_time').style.display = 'block';
            }
    
            timeH.innerText = hours;
            timeM.innerText = mins;

            if (hours == 1) {
                timeHText.innerText = HOURS_TEXT_LANG;
            } else if (hours >= 2 && hours <= 4) {
                timeHText.innerText = HOURS_TEXT_ENDING_LANG;
            } else {
                timeHText.innerText = HOURS_TEXT_ENDING_2_LANG;
            }

            timeMText.innerText = MINUTS_TEXT_LANG;
        }
    }


    document.querySelector('.disinfection') && formatWorkTime(null)
    





    // форма калькулятора "Заказать уборку квартиры"
    function formCalculate() {
        const formCalculates = document.querySelectorAll('.form_calculate')
    
        formCalculates.forEach(form => {
            const rooms = form.querySelector('.rooms')
            const roomsCount = rooms.querySelector('.form-block_count');
            const roomsPlus = rooms.querySelector('.screen-plus');
            const roomsMinus = rooms.querySelector('.screen-minus');
        
            const bathrooms = form.querySelector('.bathrooms')
            const bathroomsCount = bathrooms.querySelector('.form-block_count');
            const bathroomsPlus = bathrooms.querySelector('.screen-plus');
            const bathroomsMinus = bathrooms.querySelector('.screen-minus');

            let floor;
            let floorCount;
            let floorPlus;
            let floorMinus;

            if (form.querySelector('.floor')) {
                floor = form.querySelector('.floor')
                floorCount = floor.querySelector('.form-block_count');
                floorPlus = floor.querySelector('.screen-plus');
                floorMinus = floor.querySelector('.screen-minus');
            }
        
            const plusInner = (selectorBtn, inner) => {
                selectorBtn.addEventListener('click', e => {
                    e.preventDefault()
            
                    inner.innerText = parseInt(inner.innerText) + 1;
                    changeText(null, null, e.target)

                    formatWorkTime(inner.getAttribute('data-time'))

                    if (selectorBtn.closest('.windows')) {
                        if (document.querySelectorAll('.calculate_right-windows span')[1]) {
                            document.querySelectorAll('.calculate_right-windows span')[1].innerText = parseInt(inner.innerText)
                        }
                    }

                    if (selectorBtn.closest('.square')) {
                        if (document.querySelectorAll('.calculate_right-square span')[1]) {
                            document.querySelectorAll('.calculate_right-square span')[1].querySelector('del').innerText = parseInt(inner.innerText)
                        }
                    }

                    console.log(e.target)

                    if (selectorBtn.closest('.floor')) {
                        document.querySelectorAll('.calculate_right-floor span')[1].innerText = parseInt(inner.innerText)
                    }
                    if (selectorBtn.closest('.movers')) {
                        document.querySelectorAll('.calculate_right-movers span')[1].innerText = parseInt(inner.innerText)
                    }

                })
            }
        
            plusInner(roomsPlus, roomsCount)
            plusInner(bathroomsPlus, bathroomsCount)
            form.querySelector('.floor') && plusInner(floorPlus, floorCount)
        
            const minusInner = (selectorBtn, inner) => {
                selectorBtn.addEventListener('click', e => {
                    e.preventDefault()
            
                    if (inner.innerText == 1) return;
            
                    inner.innerText = parseInt(inner.innerText) - 1;
                    changeText(null, null, e.target)

                    formatWorkTime(-inner.getAttribute('data-time'))

                    if (selectorBtn.closest('.windows')) {
                        if  (document.querySelectorAll('.calculate_right-windows span')[1]) {
                            document.querySelectorAll('.calculate_right-windows span')[1].innerText = parseInt(inner.innerText)
                        }
                    }

                    if (selectorBtn.closest('.square')) {
                        if (document.querySelectorAll('.calculate_right-square span')[1]) {
                            document.querySelectorAll('.calculate_right-square span')[1].querySelector('del').innerText = parseInt(inner.innerText)
                        }
                    }

                    if (selectorBtn.closest('.floor')) {
                        document.querySelectorAll('.calculate_right-floor span')[1].innerText = parseInt(inner.innerText)
                    }
                    if (selectorBtn.closest('.movers')) {
                        document.querySelectorAll('.calculate_right-movers span')[1].innerText = parseInt(inner.innerText)
                    }
                })
            }
        
            minusInner(roomsMinus, roomsCount)
            minusInner(bathroomsMinus, bathroomsCount)
            form.querySelector('.floor') && minusInner(floorMinus, floorCount)
        
        
            // делаем редирект на страницу "стандартная уборка"
            form.addEventListener('submit', e => {
                e.preventDefault()
                const countRoom = +form.querySelector('.rooms .form-block_count').innerText;
                const countBathroom = +form.querySelector('.bathrooms .form-block_count').innerText;
        
                let lang;
        
                if (CURRENT_LNG.length !== 0) {
                    lang = '/' + CURRENT_LNG;
                }
        
                let path = `${lang}/standartnaya-uborka/?room=${countRoom}&bathroom=${countBathroom}`;
        
                location.href = path;
            })
        })
    }
    // если есть хоть одна форма калькулятора
    document.querySelector('.form_calculate') && formCalculate()
    
    // меняем текст при смене количества комнат, санузлов
    function changeText(roomsCount, bathCount, elTarget) {
        if (document.querySelector('.calculate_page-right .calculate_text')) {
            const text = document.querySelector('.calculate_text')

            const residentialNum = text.querySelector('.residential_num')
            const residentialText = text.querySelector('.residential_text')

            const bathNum = text.querySelector('.bath_num')
            const bathText = text.querySelector('.bath_text')

            // проверка на окончание текста, 100млск для прогрузки текста
            const checkBathEndingText = () => {
                setTimeout(() => {
                    if (bathNum.innerText == '1') {
                        return bathText.innerText = BATHROOM_TEXT_LANG;
                    } else {
                        return bathText.innerText = BATHROOM_TEXT_LANG_ENDING_LANG;
                    }
                }, 100)
            }
            checkBathEndingText()
            // проверка на окончание текста, 100млск для прогрузки текста
            const checkRoomEndingText = () => {
                setTimeout(() => {
                    if (residentialNum.innerText == '1') {
                        return residentialText.innerText = ROOM_TEXT_LANG;
                    } else {
                        return residentialText.innerText = ROOM_TEXT_LANG_ENDING_LANG;
                    }
                }, 100)
            }
            checkRoomEndingText()
            
            // заполняем данные для первой загрузке страницы, дальше входящие параметры = null
            if (roomsCount && bathCount) {
                residentialNum.innerText = roomsCount;
                bathNum.innerText = bathCount;
            }

            const changeNumsInCalculateText = () => {
                // если нажали на +/- в блоке "санузел"
                if (elTarget.closest('.bathrooms')) {
                    bathNum.innerText = elTarget.closest('.bathrooms').querySelector('.form-block_count').innerText;

                    checkBathEndingText()

                    TOTAL_DATA.bathrooms = bathNum.innerText;
                }

                // если нажали на +/- в блоке "комната"
                if (elTarget.closest('.rooms')) {
                    residentialNum.innerText = elTarget.closest('.rooms').querySelector('.form-block_count').innerText;

                    checkRoomEndingText()

                    TOTAL_DATA.rooms = residentialNum.innerText;
                }
            }


            if (elTarget) {
                // если нажали на +
                if (elTarget.classList.contains('screen-plus')) {
                    changeNumsInCalculateText()

                    if (elTarget.closest('.rooms')) {
                        TOTAL_DATA.totalPrice += (+elTarget.closest('.rooms').querySelector('.rooms .form-block_count').getAttribute('data-price'));
                        TOTAL_DATA.time += (+elTarget.closest('.rooms').querySelector('.rooms .form-block_count').getAttribute('data-time'))
                    } else {
                        TOTAL_DATA.totalPrice += (+elTarget.closest('.bathrooms').querySelector('.bathrooms .form-block_count').getAttribute('data-price'));
                        TOTAL_DATA.time += (+elTarget.closest('.bathrooms').querySelector('.bathrooms .form-block_count').getAttribute('data-time'))
                    }
                }

                // если нажали на -
                if (elTarget.classList.contains('screen-minus')) {
                    changeNumsInCalculateText()

                    if (elTarget.closest('.rooms')) {
                        TOTAL_DATA.totalPrice -= (+elTarget.closest('.rooms').querySelector('.rooms .form-block_count').getAttribute('data-price'));
                        TOTAL_DATA.time -= (+elTarget.closest('.rooms').querySelector('.rooms .form-block_count').getAttribute('data-time'))
                    } else {
                        TOTAL_DATA.totalPrice -= (+elTarget.closest('.bathrooms').querySelector('.bathrooms .form-block_count').getAttribute('data-price'));
                        TOTAL_DATA.time -= (+elTarget.closest('.bathrooms').querySelector('.bathrooms .form-block_count').getAttribute('data-time'))
                    }
                }
            }
        } else {


            if (elTarget) {
                // если нажали на +
                if (elTarget.classList.contains('screen-plus')) {
                    if (elTarget.closest('.square')) {
                        TOTAL_DATA.totalPrice += (+elTarget.closest('.square').querySelector('.square .form-block_count').getAttribute('data-price'));
                    } else {
                        TOTAL_DATA.totalPrice += (+elTarget.closest('.windows').querySelector('.windows .form-block_count').getAttribute('data-price'));
                    }
                }

                // если нажали на -
                if (elTarget.classList.contains('screen-minus')) {
                    if (elTarget.closest('.square')) {
                        TOTAL_DATA.totalPrice -= (+elTarget.closest('.square').querySelector('.square .form-block_count').getAttribute('data-price'));
                    } else {
                        TOTAL_DATA.totalPrice -= (+elTarget.closest('.windows').querySelector('.windows .form-block_count').getAttribute('data-price'));
                    }
                }
            }
        }
    }
    





    // "форма калькулятора +/-", записываем цену в TOTAL_DATA с конопок type="checkbox"
    function formCalculateAdditionRadio() {
        const calculateBotRadio = document.querySelectorAll('.form_calculate-bot .label_radio label')

        let prevTime;

        calculateBotRadio.forEach(label => {

            if (label.classList.contains('active')) {
                TOTAL_DATA.totalPrice += +label.querySelector('input').getAttribute('data-price')

                prevTime = +label.querySelector('input').getAttribute('data-time');

                formatWorkTime(label.querySelector('input').getAttribute('data-time'))
            }


            label.addEventListener('click', e => {
                if (label.classList.contains('active')) return;

                calculateBotRadio.forEach(item => {
                    item.classList.remove('active')
                })

                label.classList.add('active')
                
                TOTAL_DATA.totalPrice += +label.querySelector('input').getAttribute('data-price')

                formatWorkTime(-prevTime)

                prevTime = +label.querySelector('input').getAttribute('data-time')

                formatWorkTime(label.querySelector('input').getAttribute('data-time'))
            })
        })
    }

    document.querySelector('.form_calculate-bot .label_radio') && formCalculateAdditionRadio();

     // "форма калькулятора +/-", записываем цену в TOTAL_DATA с конопок type="checkbox"
     function formCalculateAdditionCheckbox() {
        const calculateBotCheckbox = document.querySelectorAll('.form_calculate-bot .label_checkbox label')

        calculateBotCheckbox.forEach(label => {
            label.addEventListener('click', e => {
                e.preventDefault()
                
                if (label.classList.contains('active')) {
                    label.classList.remove('active')

                    TOTAL_DATA.totalPrice = TOTAL_DATA.totalPrice / (+label.querySelector('input').getAttribute('data-coef').split('x')[1])

                    formatWorkTime(-label.querySelector('input').getAttribute('data-time'))
                } else {
                    label.classList.add('active')

                    TOTAL_DATA.totalPrice = TOTAL_DATA.totalPrice * (+label.querySelector('input').getAttribute('data-coef').split('x')[1])

                    formatWorkTime(label.querySelector('input').getAttribute('data-time'))
                }
            })
        })
    }

    document.querySelector('.form_calculate-bot .label_checkbox') && formCalculateAdditionCheckbox();


    // аккордеон показать/скрыть опции(химситка)
    function accordeonOptions() {
        const accordTop = document.querySelector('.accordeon_top')
        const options = document.querySelector('.accordeon .options')

        accordTop.addEventListener('click', e => {
            options.classList.toggle('active')
            accordTop.classList.toggle('active')
        })

    }   
    document.querySelector('.accordeon') && accordeonOptions()

    // блок доставка ключей
    function deliveryKeys() {
        const keys = document.querySelectorAll('.keys_item')

        keys.forEach(key => {
            key.addEventListener('click', e => {
                if (!e.target.closest('.keys_item-bot')) {
                    
                    if (key.classList.contains('active')) {
                        key.classList.remove('active')

                        TOTAL_DATA.totalPrice -= +(key.querySelector('.percent').innerText.split(' ')[0])
                    } else {
                        key.classList.add('active')

                        TOTAL_DATA.totalPrice += +(key.querySelector('.percent').innerText.split(' ')[0])
                    }
                }
            })
        })
    }   

    document.querySelector('.keys') && deliveryKeys()

    // выборрать текущий город
    function chooseCities() {
        const cities = document.querySelectorAll('.cities_item')
        const cityActive = document.querySelector('.form_cities-inner')

        // записываем последний активный элемент(его цену)
        let prevPrice = 0;

        cities.forEach(city => {
            city.addEventListener('click', e => {

                cities.forEach(el => el.classList.remove('active'))

                city.classList.add('active')

                cityActive.querySelector('.value .city').innerText = city.querySelectorAll('span')[0].innerText;


                // если на кликнутом элементе есть цена 
                if (city.querySelector('.percent')) {
                    cityActive.querySelector('.value .city').nextElementSibling.classList.add('percent')
                    cityActive.querySelector('.value .city').nextElementSibling.innerText = city.querySelectorAll('span')[1].innerText;

                    TOTAL_DATA.totalPrice += +(city.querySelectorAll('span')[1].innerText).split(' ')[0].split('+')[1] - prevPrice;
                    prevPrice = +(city.querySelectorAll('span')[1].innerText).split(' ')[0].split('+')[1];
                } else {
                    cityActive.querySelector('.value .city').nextElementSibling.classList.remove('percent')
                    cityActive.querySelector('.value .city').nextElementSibling.innerText = '';

                    TOTAL_DATA.totalPrice -= prevPrice;

                    prevPrice = 0;
                }
            })
        })

        // открыть/закрыть форму выбор города
        const formCities = document.querySelector('.form_cities')
        const serachCities = document.querySelector('.search_cities')
        const items = document.querySelector('.cities_items')

        formCities.addEventListener('click', e => {
            e.preventDefault()

            serachCities.classList.toggle('active')
            items.classList.toggle('active')
            formCities.classList.toggle('active')
        })

    
        // поиск города
        function searchCity() {
            const input = document.querySelector('.search_cities input')

            input.addEventListener('input', e => {
                let value = e.target.value.trim().toLowerCase();
                
                document.querySelectorAll('.cities_item').forEach(city => {
                    let text = city.querySelector('.city').innerText.trim().toLowerCase()

                    if (text.indexOf(value) !== -1) {
                        city.classList.remove('hide')
                    } else {
                        city.classList.add('hide')
                    };
                })
            })
        }

        searchCity()
    }
    document.querySelector('.cities_items') && chooseCities()
    



    // записываем в html, текущюю общюю цену
    function setTotalPrice (item) {
        const price = item.querySelector('span.price')
        const percent = item.querySelector('span.percent')

        // высчитываем процент
        if (percent) {
            const percentNum = +percent.innerText.split('-')[1].split('%')[0]
            
            price.innerText = ((TOTAL_DATA.totalPrice * (100 - percentNum) / 100).toFixed(2)) + ' zł';

        } else {
            price.innerText = TOTAL_DATA.totalPrice.toFixed(2) + ' zł'
        }
    } 

    // частота уборки, скидка от общей цены 
    function cleaningFrequency() {
        const oftenItems = document.querySelectorAll('.clean_often-item')
        const asideFrequency = document.querySelectorAll('.calculate_right-often span')[1];

        
        function changeTotalPriceDicount(item) {
           
            if (item.classList.contains('clean_often-0')) {
                document.querySelector('.calculate_right-total .price_total-old').style.display = 'none';
                document.querySelector('.calculate_right-total .price_total').innerText = TOTAL_DATA.totalPrice + ' zł';

                delete TOTAL_DATA.totalPriceDicount;
                delete TOTAL_DATA.dicount;
            } else {
                document.querySelector('.calculate_right-total .price_total-old').style.display = 'inline';

                let dicount = +item.querySelector('.price').innerText.split(' ')[0]

                TOTAL_DATA.totalPriceDicount = dicount;
                TOTAL_DATA.dicount = item.querySelector('.percent').innerText;

                document.querySelector('.calculate_right-total .price_total').innerText = TOTAL_DATA.totalPriceDicount + ' zł';
            }
        }

        // выбираем активный элемент
        const setToggleActiveElement = () => {
            oftenItems.forEach(item => {

                const itemText = item.querySelector('p').innerText;

                item.addEventListener('click', e => {
                    oftenItems.forEach(el => el.classList.remove('active'))
    
                    item.classList.add('active')

                    asideFrequency.innerText = itemText;

                    TOTAL_DATA.cleaningFrequency = itemText;

                    changeTotalPriceDicount(item)
                })

                // при первой загрузке страници, определаем какие элементы выбраны и запонляем в TOTAL_DATA
                if (item.classList.contains('active') && itemText !== null) {
                    asideFrequency.innerText = itemText;

                    TOTAL_DATA.cleaningFrequency = itemText;
                    TOTAL_DATA.totalPriceDicount = +item.querySelector('.price').innerText.split(' ')[0]
                    TOTAL_DATA.dicount = item.querySelector('.percent').innerText;

                    document.querySelector('.calculate_right-total .price_total').innerText = TOTAL_DATA.totalPriceDicount + ' zł';
                }

                setTotalPrice(item)
            })
        }
        setToggleActiveElement()
    }

    document.querySelector('.clean_often') && cleaningFrequency()

    // добавление опций в массиве
    function addingOptionItem(item, count = 1) {
        // если есть input
        if (item.querySelector('input')) {
            count = item.querySelector('input').value
        }

        OPTIONS_DATA.options.push({
            name: item.querySelector('p').innerText,
            id: item.id,
            count
        })

        // передаем обновленный массив
        watchOptionDataChanges(OPTIONS_DATA.options)

        // вызываем ф-кцию для обновления наших тег li
        deleteChoosenOption()
    }

    // удаление опций в массиве по ID
    function deleteOptionItem(item) {
        OPTIONS_DATA.options = OPTIONS_DATA.options.filter(el => el.id !== item.id)

        // передаем обновленный массив
        watchOptionDataChanges(OPTIONS_DATA.options)

        // вызываем ф-кцию для обновления наших тег li
        deleteChoosenOption()
    }

    // обновление опций в массиве по ID
    function updateOptionItem(item, value) {
        const ID = item.id;

        OPTIONS_DATA.options.find(el => {
            if (el.id === ID) {
                el.count = value;
            }
        })

        // передаем обновленный массив
        watchOptionDataChanges(OPTIONS_DATA.options)

        // вызываем ф-кцию для обновления наших тег li
        deleteChoosenOption()
    }

    // автоматический разбор цены, если у нас к-во > 1 - умножаем к-во на цену. Иначе просто возвращаем цену текущюю
    // вынес в отдельную ф-кцию для удобства
    const multiplyNums = (item) => {
        let totalSum;

        // если есть инпут то умножаем на количество
        if (item.querySelector('input')) {
            totalSum = (+item.querySelector('.percent').innerText.split(' ')[0]) * +item.querySelector('input').getAttribute('value');
        } else {
            totalSum = (+item.querySelector('.percent').innerText.split(' ')[0])
        }

        return totalSum
    }

    // выбор (card_item), опции, химчистка
    function chooseCardItem() {
        const cardItems = document.querySelectorAll('.card_item ')

        cardItems.forEach(item => {
            item.addEventListener('click', e => {
                e.preventDefault()

                // если клацнули на калькулятор то ничего не делать
                if (e.target.closest('.card_item-block_calc')) {
                    return
                } else {
                    if (item.classList.contains('active')) {
                        item.classList.remove('active')

                        // удаление из массива
                        deleteOptionItem(item)

                        if (item.querySelector('input')) {
                            formatWorkTime(-item.getAttribute('data-time') * +item.querySelector('input').getAttribute('value'))
                        } else {
                            formatWorkTime(-item.getAttribute('data-time'))
                        }

                        TOTAL_DATA.totalPrice -= multiplyNums(item);
                    } else {
                        item.classList.add('active')
                        // добавление в массив
                        addingOptionItem(item)

                        if (item.querySelector('input')) {
                            formatWorkTime(item.getAttribute('data-time') * +item.querySelector('input').getAttribute('value'))
                        } else {
                            formatWorkTime(item.getAttribute('data-time'))
                        }

                        if (!TOTAL_DATA.totalPrice) {
                            TOTAL_DATA.totalPrice = multiplyNums(item);
                        } else {
                            TOTAL_DATA.totalPrice += multiplyNums(item);
                        }
                    }
                }  
            })

            // если при переборе есть калькулятор
            if (item.querySelector('.card_item-block_calc')) {
                const plus = item.querySelector('.block_calc-plus')
                const minus = item.querySelector('.block_calc-minus')
                const inner = item.querySelector('.card_item-block_calc input')

                let value = inner.value
                
                // если нажали +
                plus.addEventListener('click', e => {
                    inner.setAttribute('value', ++value)
                    // обновление в массиве
                    updateOptionItem(item, value)

                    formatWorkTime(item.getAttribute('data-time'))

                    TOTAL_DATA.totalPrice += (+item.querySelector('.percent').innerText.split(' ')[0])
                })

                // если нажали -
                minus.addEventListener('click', e => {
                    if (value > 1) {
                        inner.setAttribute('value', --value)
                        // обновление в массиве
                        updateOptionItem(item, value)

                        formatWorkTime(-item.getAttribute('data-time'))

                        TOTAL_DATA.totalPrice -= (+item.querySelector('.percent').innerText.split(' ')[0])
                    } else {
                        item.classList.remove('active')

                        // удаление из масива
                        deleteOptionItem(item)

                        formatWorkTime(-item.getAttribute('data-time'))

                        TOTAL_DATA.totalPrice -= (+item.querySelector('.percent').innerText.split(' ')[0])
                    }
                })
            }

        })
    }
    chooseCardItem()

    // проверка на заполненость списка
    const checkListIsEmpty = (listOptions) => {
        // если список пуст скрываем текст 
        if (listOptions.children.length === 0) {
            document.querySelector('.calculate_right-addition').style.display = 'none';
        } else {
            document.querySelector('.calculate_right-addition').style.display = 'block';
        }
    }

    // наблюдаем за изменениями массива опций и рендерим его в html
    function watchOptionDataChanges(options) {
        const listOptions = document.querySelector('.calculate_right-addition ul')

        // обнуляем наш список, для ввода новых данных
        // так как массив при каждом изменение меняется 
        listOptions.innerHTML = '';

        options.forEach(({name, id, count}) => {
            listOptions.insertAdjacentHTML('afterbegin', `
                <li data-id="${id}">
                    <span>${name} (${count})</span>
                    <div class="close">×</div>
                </li>
            `)
        })

        checkListIsEmpty(listOptions)

    }
    

    // удаляем опцию из списка в html
    function deleteChoosenOption() {
        const listOptions = document.querySelector('.calculate_right-addition ul')
        const options = document.querySelectorAll('.calculate_right-addition ul li')
        const cards = document.querySelectorAll('.card_item')

        options.forEach(option => {
            option.querySelector('.close').addEventListener('click', e => {
                
                const ID = option.getAttribute("data-id");

                // удаляем выбраный тег li из общего массива опций
                OPTIONS_DATA.options = OPTIONS_DATA.options.filter(el => el.id !== ID)

                // удалаем сам тег li
                option.remove()

                // перебераем наши карточки с опциями, если классы совподают то удаляем класс(active) и отнимаем цену
                cards.forEach(card => {
                    if (card.id === ID) {
                        card.classList.remove('active')

                        if (card.querySelector('input')) {
                            formatWorkTime(-card.getAttribute('data-time') * +card.querySelector('input').getAttribute('value'))
                        } else {
                            formatWorkTime(-card.getAttribute('data-time'))
                        }

                        TOTAL_DATA.totalPrice -= multiplyNums(card)
                    }
                })

                checkListIsEmpty(listOptions)
            })
        })
    }


    function payment() {
        TOTAL_DATA.payment = 'Наличными'

        const variants = document.querySelectorAll('.payment_variants a')
        
        variants.forEach(item => {
            item.addEventListener('click', e => {
                e.preventDefault()

                variants.forEach(el => el.classList.remove('active'))

                item.classList.add('active')

                TOTAL_DATA.payment = item.querySelector('span').innerText
            })
        })
    }
    payment()

    // аккордеон сверху страниц услуг
    function accrodTop() {
        const accordTop = document.querySelectorAll('.acc_top')

        accordTop.forEach(item => {
            item.addEventListener('click', e => {
                e.preventDefault()

                item.nextElementSibling.classList.toggle('active')

            })
        })
    }
    
    document.querySelector('.calculate_page-top') && accrodTop()


    


    const elements = document.querySelectorAll('.wrapper');
    let activeSection = null;
    const offset = 500;

    window.addEventListener('scroll', () => {
        elements.forEach((element) => {
            const rect = element.getBoundingClientRect();
            const visible = rect.top + offset < window.innerHeight && rect.bottom >= 0;

            if (visible) {
                const id = element.id;
                const section = document.querySelector(`[data-id="${id}"]`);
                if (activeSection !== section) {
                    if (activeSection) {
                        activeSection.classList.remove('active');
                    }
                    section.classList.add('active');
                    activeSection = section;
                }
            }
        });

        // Дополнительная проверка на последнюю активную секцию
        const lastSection = document.querySelector('.wrapper:last-child');
        if (lastSection && !activeSection) {
            const id = lastSection.id;
            const section = document.querySelector(`[data-id="${id}"]`);
            section.classList.add('active');
            activeSection = section;
        }
    });




    return TOTAL_DATA;
}

servicesCalc()