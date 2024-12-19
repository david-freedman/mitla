function getDistance() {
    const apiKey = 'AIzaSyB-6-HEnsNt2TqjAxJn42KoKit9CAETNxI';
    const form = document.querySelector('.google_distance');

    let origin; // откуда
    let destination; // куда

    form.addEventListener('submit', e => {
        e.preventDefault()

        const from = form.querySelector('.google_distance-form');
        const to = form.querySelector('.google_distance-to');

        if (from.value.length >= 3 && to.value.length >= 3) {
          form.classList.remove('error')

          origin = from.value;
          destination = to.value;
  
          const apiUrl = `https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=${encodeURIComponent(origin)}&destinations=${encodeURIComponent(destination)}&key=${apiKey}`;
      
          fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
              const distance = data.rows[0].elements[0].distance.text;
              // console.log(`Расстояние между ${origin} и ${destination}: ${distance}`);
              form.querySelector('.google_distance-res').value = distance;
            })
            .catch(error => form.classList.add('error'));
        } else {
          form.classList.add('error')
        }

    })
    

}
document.querySelector('.google_distance') && getDistance();


