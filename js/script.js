function ajxLoadAmp(prov) {

    //alert(prov);

    $.ajax({
        url: 'index.php?r=Ajax/LoadAmp&prov=' + prov,
        success: function(data) {
            $('#Epe0_amp').html(data);
        }
    });

    return false;
}

function ajxLoadTmb(amp) {
    //alert(amp);

    $.ajax({
        url: 'index.php?r=Ajax/LoadTmb&amp=' + amp,
        success: function(data) {
            $('#Epe0_tmb').html(data);
        }
    });

    return false;

}

function ajxLoadVill(tmb) {
    //alert(tmb);

    $.ajax({
        url: 'index.php?r=Ajax/LoadVill&tmb=' + tmb,
        success: function(data) {
            $('#Epe0_vill').html(data);

        }
    });

    return false;

}

function assignVill(villcode) {
    $('#Epe0_addrcode').val(villcode);
    return false;
}


function getdis(ds) {
    //alert(ds); 
    $('#formdis').submit();
    return false;
}

function getdismap(ds) {
    //alert(ds); 
    $('#formdismap').submit();
    return false;
}

function MapSubmit(y, d, m) {
    if (y == '' || d == '') {
        return false;
    }
        if (m == 1) {
            $("#frm_to_map").attr("action", '../plkgis/map_area.php');
        }
        if (m == 2) {
            $("#frm_to_map").attr("action", '../plkgis/map_point.php');
        }

        $("#frm_to_map").submit();
    
    return false;
}