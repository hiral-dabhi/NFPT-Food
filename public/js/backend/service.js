"use strict";
var service = function () {

  var initIndex = function () {
    var table = $('#serviceTable').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: {
        url: getServiceList,
        type: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      },
      columns: [
        {
          data: 'id',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'service_name',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'description',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'service_type',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'price',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'down_rate',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'up_rate',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'service_mode_misc_key',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'actions',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
      ],
      dom: '<"top"lfB>rt<"bottom"ip><"clear">',
      buttons: [
          {
              extend: 'copy',
              className: 'bg-violet-500 text-white',
              title: 'NFPT'
          },
          {
              extend: 'excel',
              className: 'bg-violet-500 text-white',
              title: 'NFPT'
          },
          {
              extend: 'print',
              className: 'bg-violet-500 text-white',
              title: 'NFPT'
          }
      ],
      columnDefs: [{
        targets: 'no-sort',
        orderable: false,
        'render': function (data, type, full, meta) {
          return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(
            data).html() + '">';
        }
      }],
      // language: {
      //   paginate: {
      //     next: '<i class="fas fa-angle-right"></i>',
      //     previous: '<i class="fas fa-angle-left"></i>'
      //   }
      // }
    });

    table.buttons().container()
      .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    $(".dataTables_length select").addClass('form-select form-select-sm');
  };

  var serviceFormValidation = function () {

    if (is_enable_burst_mode == '1') {
      $('.burst-fields').show();
    } else {
      $('.burst-fields').hide();
    }

    $('#is_enable_burst_mode').change(function () {
      $('.burst-fields input[type="number"]').val(0);
      if ($(this).is(':checked')) {
        $('.burst-fields').show();
      } else {
        $('.burst-fields').hide();
      }
    });
    $('input[type="checkbox"]').change(function () {
      var value = $(this).is(':checked') ? 1 : 0;
    });

    $('#serviceForm').validate({
      rules: {
        service_name: {
          required: true
        },
        description: {
          required: true,
        },
        service_group: {
          required: true
        },
        service_type: {
          required: true
        },
        price: {
          maxlength: 10,
          required: true,
          number: true,
        },
        down_rate: {
          maxlength: 10,
          required: true,
          number: true,
        },
        up_rate: {
          maxlength: 10,
          required: true,
          number: true,
        },
        burst_limit: {
          maxlength: 10,
          required: true,
          number: true,
        },
        from_burst_limit: {
          maxlength: 10,
          required: true,
          number: true,
        },
        threshold_limit: {
          maxlength: 10,
          required: true,
          number: true,
        },
        from_threshold_limit: {
          maxlength: 10,
          required: true,
          number: true,
        },
        burst_time: {
          maxlength: 10,
          required: true,
          number: true,
        },
        from_burst_time: {
          maxlength: 10,
          required: true,
          number: true,
        },
        priority: {
          maxlength: 10,
          required: true,
          number: true,
        },
        data_limiter: {
          maxlength: 10,
          required: true,
          number: true,
        },
        is_data_limiter_enable: {
          required: true,
        },
        uptime_limiter: {
          maxlength: 10,
          required: true,
          number: true,
        },
        expiration_limiter: {
          maxlength: 10,
          required: true,
          number: true,
        },
        data_interval_value: {
          maxlength: 10,
          required: true,
          number: true,
        },
        daily_datalimiter_value: {
          maxlength: 10,
          required: true,
          number: true,
        },
        daily_uptimelimiter_val: {
          maxlength: 10,
          required: true,
          number: true,
        },
        service_mode: {
          required: true,
        },
        next_fup_service: {
          required: true,
        },
        next_daily_service: {
          required: true,
        },
      },
      messages: {
        service_name: {
          required: "Service Name is required."
        },
        description: {
          required: "Description is required."
        },
        service_group: {
          required: "Service Group is required."
        },
        service_type: {
          required: "Service Type is required.",
        },
        price: {
          required: "Price is required.",
          number: "Price must be a valid number."
        },
        down_rate: {
          required: "Down Rate is required.",
          number: "Down Rate must be a valid number."
        },
        up_rate: {
          required: "Up Rate is required.",
          number: "Up Rate must be a valid number."
        },
        burst_limit: {
          number: "Burst Limit must be a valid number."
        },
        from_burst_limit: {
          number: "From Burst Limit must be a valid number."
        },
        threshold_limit: {
          number: "Threshold Limit must be a valid number."
        },
        from_threshold_limit: {
          number: "From Threshold Limit must be a valid number."
        },
        burst_time: {
          number: "Burst Time must be a valid number."
        },
        from_burst_time: {
          number: "From Burst Time must be a valid number."
        },
        priority: {
          required: "This field is require.",
          number: "Priority must be a valid number."
        },
        data_limiter: {
          required: "Data Limiter is required.",
          number: "Data Limiter must be a valid number."
        },
        is_data_limiter_enable: {
          required: "Please check this field.",
        },
        uptime_limiter: {
          required: "Uptime Limiter is required.",
          number: "Uptime Limiter must be a valid number."
        },
        expiration_limiter: {
          required: "Expiration Limiter is required.",
          number: "Expiration Limiter must be a valid number."
        },
        service_mode: {
          required: "Service Mode is required."
        },
        next_fup_service: {
          required: "Next FUP service is required."
        },
        next_daily_service: {
          required: "Next FUP service is required."
        },
      }
    });
  };

  var initMultiSelect = function () {
    $('.multi-select').select2({
      placeholder: '---Select---',
      allowClear: true
    });
    $("#select_btn").on('click', function () {
      if ($(this).hasClass('select-all')) {
        if ($('.multi-select').find('option').length !== 0) {
          $('.multi-select').find('option').prop('selected', true).trigger('change');
          $(this).toggleClass("select-all unselect-all");
          $(this).text('Unselect All');
        }
      } else {
        $('.multi-select').find('option').prop('selected', false).trigger('change');
        $(this).toggleClass("select-all unselect-all");
        $(this).text('Select All');
      }
    });
  };

  var forCreateEnable = function () {
    $(document).ready(function () {
      $('.default-hides').hide();
      $('.fup-hide').hide();
      $('.daily-quota').hide();

      $('#service_mode').change(function () {
        $('.default-hides').show();
        var selectedValue = $(this).val();
        if (selectedValue == 'fup') {              // 31 = FUP - misc_id
          $('.fup-hide').show();
          $('.daily-quota').hide();
        } else if (selectedValue == 'daily_quota') {       // 32 = Daily Quota - misc_id
          $('.fup-hide').hide();
          $('.daily-quota').show();
        }
        else {
          $('.default-hides').hide();
          $('.fup-hide').hide();
          $('.daily-quota').hide();
        }
      });

      $('#reset_data_interval').change(function () {
        $('#data_interval_value').val(0);
        $("select[name='data_interval_time_unit']").val($("select[name='data_interval_time_unit'] option:first").val());
        if ($(this).is(':checked')) {
          $('.interval-enable').prop('disabled', false);
        } else {
          $('.interval-enable').prop('disabled', true);
        }
      });

      $('#daily_data_limiter').change(function () {
        $('#daily_datalimiter_value').val(0);
        $("select[name='daily_time_unit']").val($("select[name='daily_time_unit'] option:first").val());
        if ($(this).is(':checked')) {
          $('.data-limiter-enable').prop('disabled', false);
        } else {
          $('.data-limiter-enable').prop('disabled', true);
        }
      });
      $('#daily_uptime_limiter').change(function () {
        $('#daily_uptimelimiter_val').val(0);
        $("select[name='daily_time_unit']").val($("select[name='daily_time_unit'] option:first").val());
        if ($(this).is(':checked')) {
          $('.uptime-limiter-enable').prop('disabled', false);
        } else {
          $('.uptime-limiter-enable').prop('disabled', true);
        }
      });
    });
  };

  var forEditEnable = function () {
    $(document).ready(function () {
      if (service_mode_val == 'fup') {
        $('.fup-hide').show();
        $('.daily-quota').hide();
      } else if (service_mode_val == 'daily_quota') {
        $('.daily-quota').show();
        $('.fup-hide').hide();
      } else {
        $('.default-hides').hide();
      }

      if ($('#reset_data_interval').is(':checked')) {
        $('.interval-enable').prop('disabled', false);
      } else {
        $('.interval-enable').prop('disabled', true);
      }

      $('#reset_data_interval').change(function () {
        $('#data_interval_value').val(0);
        $("select[name='data_interval_time_unit']").val($("select[name='data_interval_time_unit'] option:first").val());
        if ($(this).is(':checked')) {
          $('.interval-enable').prop('disabled', false);
        } else {
          $('.interval-enable').prop('disabled', true);
        }
      });

      if ($('#daily_data_limiter').is(':checked')) {
        $('.data-limiter-enable').prop('disabled', false);
      } else {
        $('.data-limiter-enable').prop('disabled', true);
      }

      if ($('#daily_uptime_limiter').is(':checked')) {
        $('.uptime-limiter-enable').prop('disabled', false);
      } else {
        $('.uptime-limiter-enable').prop('disabled', true);
      }

      $('#daily_data_limiter').change(function () {
        $('#daily_datalimiter_value').val(0);
        $("select[name='daily_time_unit']").val($("select[name='daily_time_unit'] option:first").val());
        if ($(this).is(':checked')) {
          $('.data-limiter-enable').prop('disabled', false);
        } else {
          $('.data-limiter-enable').prop('disabled', true);
        }
      });
      $('#daily_uptime_limiter').change(function () {
        $('#daily_uptimelimiter_val').val(0);
        $("select[name='daily_uptimelimiter_unit']").val($("select[name='daily_uptimelimiter_unit'] option:first").val());
        if ($(this).is(':checked')) {
          $('.uptime-limiter-enable').prop('disabled', false);
        } else {
          $('.uptime-limiter-enable').prop('disabled', true);
        }
      });
    });
  };

  var enableDisabledLimiter = function () {
    $("#is_data_limiter_enable").change(function () {
      var isEnabled = $(this).prop("checked");
      $(".data_limiter").prop("disabled", !isEnabled);
      if (!isEnabled) {
        $("input[name='data_limiter']").val(0);
        $("select[name='data_limiter_misc_id']").val($("select[name='data_limiter_misc_id'] option:first").val());
      }
    });
    $("#is_uptime_limiter_enable").change(function () {
      var isEnabled = $(this).prop("checked");
      $(".uptime_limiter").prop("disabled", !isEnabled);
      if (!isEnabled) {
        $("input[name='uptime_limiter']").val(0);
        $("input[name='uptime_limiter_misc_id']").val('');
        $("select[name='uptime_limiter_misc_id']").val($("select[name='uptime_limiter_misc_id'] option:first").val());
      }
    });
    $("#is_expiration_limiter_enable").change(function () {
      var isEnabled = $(this).prop("checked");
      $(".expiration_limiter").prop("disabled", !isEnabled);
      if (!isEnabled) {
        $("input[name='expiration_limiter']").val(0);
        $("input[name='expiration_limiter_misc_id']").val('');
        $("select[name='expiration_limiter_misc_id']").val($("select[name='expiration_limiter_misc_id'] option:first").val());
      }
    });
  };

  var serviceHistory = function () {
    var table = $('#service-history').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: {
        url: getHistory,
        type: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      },
      columns: [
        {
          data: 'id',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'username',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'plan',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'request_date',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'schedule_date',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'request_by',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'status',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
        {
          data: 'comment',
          class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600"
        },
      ],
      columnDefs: [{
        targets: 'no-sort',
        orderable: false,
        'render': function (data, type, full, meta) {
          return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(
            data).html() + '">';
        }
      }],
    });

    table.buttons().container()
      .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    $(".dataTables_length select").addClass('form-select form-select-sm');
  };


  // Public methods
  return {
    init: function () {
      initIndex();
    },
    create: function () {
      serviceFormValidation();
      forCreateEnable();
      enableDisabledLimiter();
    },
    edit: function () {
      serviceFormValidation();
      initMultiSelect();
      forEditEnable();
      enableDisabledLimiter();
    },
    serviceHistory: function(){
      serviceHistory();
    }
  };
}();