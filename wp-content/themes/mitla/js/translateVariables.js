// CURRENT_LNG из файла app.js

const translateVariables = () => {
    let ROOM_TEXT_LANG;
    let ROOM_TEXT_LANG_ENDING_LANG;

    let BATHROOM_TEXT_LANG;
    let BATHROOM_TEXT_LANG_ENDING_LANG;

    let HOURS_TEXT_LANG;
    let HOURS_TEXT_ENDING_LANG;
    let HOURS_TEXT_ENDING_2_LANG;

    let MINUTS_TEXT_LANG;
  
    switch (CURRENT_LNG) {
      case 'pl':
        ROOM_TEXT_LANG = 'pokój';
        ROOM_TEXT_LANG_ENDING_LANG = 'pokoje';

        BATHROOM_TEXT_LANG = 'łazienka';
        BATHROOM_TEXT_LANG_ENDING_LANG = 'łazienki';

        HOURS_TEXT_LANG = 'czas';
        HOURS_TEXT_ENDING_LANG = 'godziny';
        HOURS_TEXT_ENDING_2_LANG = 'godziny';

        MINUTS_TEXT_LANG = 'minuty'
        break;
      default:
        BATHROOM_TEXT_LANG = 'ванной комнатой';
        BATHROOM_TEXT_LANG_ENDING_LANG = 'ванными комнатами';

        ROOM_TEXT_LANG = 'жилой';
        ROOM_TEXT_LANG_ENDING_LANG = 'жилыми';

        HOURS_TEXT_LANG = 'час';
        HOURS_TEXT_ENDING_LANG = 'часa';
        HOURS_TEXT_ENDING_2_LANG = 'часов';

        MINUTS_TEXT_LANG = 'минут'
        break;
    }
  
    return {
      ROOM_TEXT_LANG,
      ROOM_TEXT_LANG_ENDING_LANG,
      BATHROOM_TEXT_LANG,
      BATHROOM_TEXT_LANG_ENDING_LANG,
      HOURS_TEXT_LANG,
      HOURS_TEXT_ENDING_LANG,
      HOURS_TEXT_ENDING_2_LANG,
      MINUTS_TEXT_LANG,
    };
};
  
