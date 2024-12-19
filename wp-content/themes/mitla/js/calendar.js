function calendar() {
    // CURRENT_LNG из файла app.js

    const currentDate = document.querySelector('.calendar_month')
    const daysTag = document.querySelector('.calendar_days')

    const prev = document.querySelector('.calendar_top-back')
    const next = document.querySelector('.calendar_top-forward')

    let date = new Date();
    currYear = date.getFullYear();
    currMonth = date.getMonth();
    currDate = date.getDate();

    const actualyMonth = date.getMonth();

    let currMonthCount = currMonth;

    const months = [
        "Январь",
        "Февраль",
        "Март",
        "Апрель",
        "Май",
        "Июнь",
        "Июль",
        "Август",
        "Сентябрь",
        "Октябрь",
        "Ноябрь",
        "Декабрь"
    ]

    const renderCalendar = () => {
        let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // получаем первый день месяца
        lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // получаем последнюю дату месяца 
        lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // получаем последний день месяца
        lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // получаем последнюю дату последнего месяца

        let liTag = "";

        if (months[actualyMonth] === months[currMonth]) {
            // вывод дней предыдущего месяца
            for (let i = firstDayofMonth; i > 0; i--) {
                liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
            }

            // вывод дней текущего месяца
            for (let i = 1; i <= lastDateofMonth; i++) {
                // let isToday = i === date.getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear() ? "active" : "";
                let isToday = i;

                liTag += `<li class="${isToday < currDate ? 'inactive' : isToday}">${i}</li>`;
            }

            // вывод дней слудующего месяца
            for (let i = lastDayofMonth; i < 6; i++) {
                liTag += `<li class="next_month">${i - lastDayofMonth + 1}</li>`
            }
        } else {
            // вывод дней предыдущего месяца
            for (let i = firstDayofMonth; i > 0; i--) {
                liTag += `<li>${lastDateofLastMonth - i + 1}</li>`;
            }

            // вывод дней текущего месяца
            for (let i = 1; i <= lastDateofMonth; i++) {
                liTag += `<li>${i}</li>`;
            }

            // вывод дней слудующего месяца
            for (let i = lastDayofMonth; i < 6; i++) {
                liTag += `<li>${i - lastDayofMonth + 1}</li>`
            }
        }
        

        currentDate.innerText = `${months[currMonth]}`;
        currentDate.setAttribute('data-name',  `${months[currMonth]}`)
        daysTag.innerHTML = liTag;

        document.querySelectorAll('.calendar_days li').forEach(item => {
            item.addEventListener('click', e => {
                document.querySelectorAll('.calendar_days li').forEach(el => el.classList.remove('active'))
    
                if (!item.classList.contains('inactive')) item.classList.add('active')
            })
        })
    }

    renderCalendar()

    next.addEventListener('click', e => {
        currMonth = currMonth + 1;
        prev.style.opacity = 1;
        prev.style.zIndex = '1';

        renderCalendar()
    })

    prev.addEventListener('click', e => {
        currMonth -= 1

        if (currMonthCount === currMonth) {
            prev.style.opacity = 0;
            prev.style.zIndex = '-1';
        }

        renderCalendar()
    })
}

document.querySelector('.calendar') && calendar()

function chooseTime() {
    const calendarTime = document.querySelectorAll('.calendar_time-min')
    const itemsTime = document.querySelectorAll('.calendar_time-item')
    const calendarTimeBtns = document.querySelectorAll('.calendar_time-btns a')

    calendarTime.forEach(time => {
        time.addEventListener('click', e => {

            itemsTime.forEach(el => el.classList.remove('active'))

            time.closest('.calendar_time-item').classList.add('active')

            if (!e.target.classList.contains('calendar_time-min')) {
                time.closest('.calendar_time-item').querySelector('span').innerText = e.target.innerText
            }
        })
    })

    itemsTime.forEach(item => {
        item.addEventListener('click', e => {

            itemsTime.forEach(el => el.classList.remove('active'))
            calendarTimeBtns.forEach(el => el.classList.remove('active'))

            item.classList.add('active')
        })
    })

    calendarTimeBtns.forEach(item => {
        item.addEventListener('click', e => {
            e.preventDefault()

            calendarTimeBtns.forEach(el => el.classList.remove('active'))
            itemsTime.forEach(el => el.classList.remove('active'))

            item.classList.add('active')
        })
    })
}
document.querySelector('.calendar_time') && chooseTime()