// получаем которкую запись для получения атрибута data-name
HTMLElement.prototype.getDataName = function() {
    return this.getAttribute('data-name');
};

// getDataName() - получаем атрибут data-name


function servicesData() {

    const ajaxBtn = document.querySelectorAll('.send_data-ajax')

    ajaxBtn.forEach(button => {
        button.addEventListener('click', e => {
            e.preventDefault()
    
            collectData()
        })
    })

    // валидация
    function validation() {

    }
    validation()

    // сбор данных 
    function collectData() {
        // основные данные TOTAL_DATA
        
        // console.log(TOTAL_DATA)

        // получаем название услуги
        function getNameOfService() {
            if (document.querySelector('h1')) {
                const mainTitle = document.querySelector('h1')
                TOTAL_DATA.nameOfService = mainTitle.getDataName()
            }
        }
        getNameOfService()



        // получаем тип особы которая заказывает, юр или физ лицо
        function getTypeOfPersen() {
            if (document.querySelector('.typeof_persen')) {
                const typeOfPersen = document.querySelectorAll('.typeof_persen a')

                typeOfPersen.forEach(persen => {
                    if (persen.classList.contains('active')) {
                        TOTAL_DATA.typeOfPersen = persen.getDataName()
                    }
                })
            }
        }
        getTypeOfPersen()

        // выбрали ли ночной тариф или нет
        function getNightRate() {
            if (document.querySelector('.form_calculate-bot')) {
                if (document.querySelector('.form_calculate-bot-line label').classList.contains('active')) {
                    TOTAL_DATA.nightRate = true;
                } else TOTAL_DATA.nightRate = false;
            }
        }
        getNightRate()

        // сдесь собираем данные из блока под h1
        function getDataOfHouse() {
            if(document.querySelector('.our_flat')) {
                switch(document.querySelector('main').id) {
                    case 'after_clean':
                        TOTAL_DATA.square = document.querySelectorAll('.calculate_right-square span')[1].innerText;
                        TOTAL_DATA.windows = document.querySelectorAll('.calculate_right-windows span')[1].innerText;
                    break;

                    case 'clean_office':
                        TOTAL_DATA.square = document.querySelectorAll('.calculate_right-square span')[1].innerText;
                    break;
                    
                    case 'standart_clean':
                        const kitchens = document.querySelectorAll('.form_calculate-bot-line.label_radio label');
                        const home = document.querySelectorAll('.form_calculate-bot-line.label_checkbox label');
                        
                        let data = TOTAL_DATA.standartCleanDataInputs = {};
                        let privateHouse = [];

                        kitchens.forEach(kitchen => {
                            if (kitchen.classList.contains('active')) {
                                data.kitchen = kitchen.querySelector('span').getDataName();
                            }
                        })
                        
                        home.forEach(home => {
                            if (home.classList.contains('active')) {
                                privateHouse.push({
                                    name: home.querySelector('span').getDataName(),
                                    price: home.querySelector('span').getAttribute('data-price')
                                })
                            }
                        })

                        data.house = privateHouse

                    break;

                    case 'transport_moving':
                        TOTAL_DATA.workers = document.querySelectorAll('.calculate_right-movers span')[1].innerText;
                        TOTAL_DATA.floor = document.querySelectorAll('.calculate_right-floor span')[1].innerText;
                        TOTAL_DATA.googleDistance = {
                            from: document.querySelector('.google_distance-form').value,
                            to: document.querySelector('.google_distance-to').value,
                            distanceKm: document.querySelector('.google_distance-res').value
                        }

                        document.querySelectorAll('.typeof_city a').forEach(item => item.classList.contains('active') ? TOTAL_DATA.typeofCity = item.innerText : '')
                        
                    break;

                    default:
                        break;
                }
            }
        }
        getDataOfHouse()


        // получить дату уборки, если оно есть
        function getDateOfCleaning() {
            let date = {};

            const month = document.querySelector('.calendar_month');
            const day = document.querySelectorAll('.calendar_days li');

            const time = document.querySelectorAll('.calendar_time-item')
            const timeBtns = document.querySelectorAll('.calendar_time-btns a')

            // получаем название месяца
            const getMonth = () => {
                return date.month = month.getDataName()
            }
            getMonth()

            // получаем число месяца
            const getDay = () => {
                
                day.forEach(day => {
                    if (day.classList.contains('active')) {
                        return date.day = day.innerText;
                    }
                })
            }
            getDay()
            
            // получаем время записи или иное(там есть две кнопки)
            const getTime = () => {
                time.forEach(time => {
                    if (time.classList.contains('active')) {
                        return date.time = time.querySelector('.wrapper_time').innerHTML.trim().replace(/<\/?[a-zA-Z]+>/gi,'');
                    }
                })

                timeBtns.forEach(time => {
                    if (time.classList.contains('active')) {
                        return date.time = time.getDataName()
                    }
                })
            }
            getTime()

            return TOTAL_DATA.dateOfCleaning = date;
        }
        getDateOfCleaning()


        // получаем выбраные опции текущей услуги
        function getOptionsOfService() {
            if (document.querySelector('.options')) {
                const options = document.querySelectorAll('.calculate_right-addition ul li')

                let optionsData = [];
                let dryCleaningData = [];

                // Услуги по электротехнике
                let electroData = [];

                // Услуги плотника
                let carpenterData = [];

                // Услуги слесаря
                let locksmithData = [];

                // Сантехнические услуги
                let plumbingData = [];

                // Упаковка 
                let packageData = [];


                if (document.querySelector('.golden_pens')) {

                }

                options.forEach(option => {
                    const elementById = document.getElementById(`${option.getAttribute('data-id')}`);

                    const name = elementById.querySelector('p').getDataName();
                    const costForOne = elementById.querySelector('.percent').innerText.split(' ')[0];

                    let totalCost;
                    let count;

                    // время в минутах
                    const timeForOne = elementById.getAttribute('data-time');
                    let totalTime;

                    const id = elementById.id;

                    if (elementById.querySelector('.card_item-block_calc')) {
                        const inputValue = +elementById.querySelector('.card_item-block_calc input').value;

                        totalCost = +elementById.querySelector('.percent').innerText.split(' ')[0] * inputValue;

                        count = inputValue;

                        totalTime = elementById.getAttribute('data-time') * inputValue;
                    } else {
                        totalCost = +elementById.querySelector('.percent').innerText.split(' ')[0];

                        count = 1;

                        totalTime = elementById.getAttribute('data-time')
                    }

                    switch(elementById.closest('.options').id) {
                        case 'main_options':
                            optionsData.push({
                                name,
                                price: {
                                    costForOne,
                                    totalCost
                                },
                                time: {
                                    timeForOne,
                                    totalTime,
                                },
                                count,
                                id
                            }) 
                            break;
                        case 'dry_cleaning':
                            dryCleaningData.push({
                                name,
                                price: {
                                    costForOne,
                                    totalCost
                                },
                                time: {
                                    timeForOne,
                                    totalTime,
                                },
                                count,
                                id
                            }) 
                            break;
                        case 'electro':
                            electroData.push({
                                name,
                                price: {
                                    costForOne,
                                    totalCost
                                },
                                time: {
                                    timeForOne,
                                    totalTime,
                                },
                                count,
                                id
                            }) 
                            break;
                        case 'carpenter':
                            carpenterData.push({
                                name,
                                price: {
                                    costForOne,
                                    totalCost
                                },
                                time: {
                                    timeForOne,
                                    totalTime,
                                },
                                count,
                                id
                            }) 
                            break;
                        case 'locksmith':
                            locksmithData.push({
                                name,
                                price: {
                                    costForOne,
                                    totalCost
                                },
                                time: {
                                    timeForOne,
                                    totalTime,
                                },
                                count,
                                id
                            }) 
                            break;
                        case 'plumbing':
                            plumbingData.push({
                                name,
                                price: {
                                    costForOne,
                                    totalCost
                                },
                                time: {
                                    timeForOne,
                                    totalTime,
                                },
                                count,
                                id
                            }) 
                            break;
                        case 'package':
                            packageData.push({
                                name,
                                price: {
                                    costForOne,
                                    totalCost
                                },
                                time: {
                                    timeForOne,
                                    totalTime,
                                },
                                count,
                                id
                            }) 
                            break;
                        default:
                            break;
                    }
                })

                TOTAL_DATA.options = {
                    dryCleaningData,
                    optionsData,
                    plumbingData,
                    locksmithData,
                    carpenterData,
                    electroData,
                    packageData
                }

            }

            
        }
        getOptionsOfService()


        // нужен пылесос да или нет
        function getVacuumCleaner() {
            if (document.querySelector('.vacuum_cleaner')) {
                const vacuum = document.querySelector('.vacuum_cleaner')
                
                if (vacuum.classList.contains('active')) {
                    TOTAL_DATA.vacuumCleaner = {
                        status: true,
                        price: vacuum.querySelector('.percent').innerText.split(' ')[0]
                    };
                }
            }  
        }
        getVacuumCleaner()


        // доставка ключей 
        function getDeliveryKeys() {
            if (document.querySelector('.keys')) {
                const keys = document.querySelectorAll('.keys_item')

                keys.forEach(key => {
                    if (key.classList.contains('active') && key.getAttribute('data-key') === 'beforeClean') {
                        TOTAL_DATA.deliveryKeys = {
                            ...TOTAL_DATA.deliveryKeys,
                            deliveryBefore: {
                                adress: key.querySelector('input').value,
                                name: 'Забрать ключи перед уборкой'
                            }
                        }
                    } else if (key.classList.contains('active') && key.getAttribute('data-key') === 'afterClean') {
                        TOTAL_DATA.deliveryKeys = {
                            ...TOTAL_DATA.deliveryKeys,
                            deliveryAfter: {
                                adress: key.querySelector('input').value,
                                name: 'Доставить ключи после уборки'
                            }
                        }
                    }
                })
            }
        }
        getDeliveryKeys()


        // местоположение 
        function getAddress() {
            if (document.querySelector('.form_adres')) {
                let address;
                let contactData;
                 
                address = {
                    city: document.querySelector('.form_cities .value span.city').innerText,
                    street: document.querySelector('#street input').value,
                    mailIndex: document.querySelector('#mail_index input').value,
                    mailIndex: document.querySelector('#mail_index input').value,
                    homeNumber: document.querySelector('#home_number input').value,
                    homeNumber: document.querySelector('#home_number input').value,
                    flatNumber: document.querySelector('#flat_number input').value,
                    frame: document.querySelector('#frame input').value,
                    entrance: document.querySelector('#entrance input').value,
                    floor: document.querySelector('#floor input').value,
                    intercomCode: document.querySelector('#intercom_code input').value
                }

                contactData = {
                    name: document.querySelector('#contact_name input').value,
                    phone: document.querySelector('#contact_tel input').value,
                    email: document.querySelector('#contact_email input').value,
                    infoDelivery: document.querySelector('#contact_info textarea').value
                }

                

                TOTAL_DATA.address = address
                TOTAL_DATA.contactData = contactData

                console.log(TOTAL_DATA)
            }
        }
        getAddress()

        // общее количество рабочих
        function getWorkers() {
            if (document.querySelector('.calculate_right-workers')) {
                const workers = document.querySelectorAll('.calculate_right-workers img')

                TOTAL_DATA.workers = workers.length
            }
        }
        getWorkers()


        console.log(TOTAL_DATA)

        return TOTAL_DATA;
    }
}

servicesData()