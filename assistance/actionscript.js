function block_assistance_reqassistance(e) {
    e.preventDefault();

    Y.log('Enetered method');

    var ioconfig = {
        method: 'POST',
        data: 'sesskey=' + M.cfg.sesskey,
        on: {
            success: function (o, response) {
              //OK
              var data = Y.JSON.parse(response.responseText);
              if (data.result) {
                alert('Assistance Requested. Please refresh the page!');
              }
            },
            failure: function (o, response) {
              alert('Not OK!');
            }
         }
    };

    Y.io(M.cfg.wwwroot + '/blocks/assistance/actionajaxscript.php', ioconfig);
}

function block_assistance_remassistance(e, args) {
    e.preventDefault();

    Y.log('Enetered method');

    var ioconfig = {
        method: 'POST',
        data: 'sesskey=' + M.cfg.sesskey + '&studentid=' + encodeURIComponent(args.studentid),
        on: {
            success: function (o, response) {
              //OK
              var data = Y.JSON.parse(response.responseText);
              if (data.result) {
                alert('Assistance request removed. Please refresh the page!');
              }
            },
            failure: function (o, response) {
              alert('Not OK!');
            }
         }
    };

    Y.io(M.cfg.wwwroot + '/blocks/assistance/removeajaxscript.php', ioconfig);
}
