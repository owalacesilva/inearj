import './bootstrap';
import $, { get } from 'jquery';

import Alpine from 'alpinejs';
import select2 from "select2";

window.jQuery = window.$ = $
window.Alpine = Alpine;

Alpine.start();

function getStations(stationsId, stationsStatus, stationsDate) {
  const form = $('#dashboard-form-filter');

  $.ajax({
    type: 'GET',
    url: 'dashboard', // '/api/stations',
    data: {
      id: stationsId,
      status: stationsStatus,
      date: stationsDate
    },
    beforeSend: function() {
      $('#dashboard-loading').show();
      $('#dashboard-stations').empty();

      form.find('button[type="submit"]').attr('disabled', true);
      form.find('button[type="reset"]').attr('disabled', true);
    },
    success: function(response) {
      setTimeout(function() {
        $('#dashboard-loading').hide();
        
        form.find('button[type="submit"]').attr('disabled', false);
        form.find('button[type="reset"]').attr('disabled', false);
      }, 1000);
    }
  });
}

jQuery(document).ready(function() {
  $('#dashboard-form-filter').on('submit', function(event) {
    event.preventDefault();

    const stationsId = $('#station-filter-by-id').val();
    const stationsStatus = $('#station-filter-by-status').val();
    const stationsDate = $('#station-filter-by-date').val();

    getStations(stationsId, stationsStatus, stationsDate);
  });

  $('#status_filter').on('change', function() {
    $('#station_form').submit();
  });

  $('#date_filter').on('change', function() {
    $('#station_form').submit();
  });
});
