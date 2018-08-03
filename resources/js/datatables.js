
$('#mainT').dataTable( {
    "fnDrawCallback": function ( oSettings ) {
        if ( oSettings.aiDisplay.length == 0 )
        {
            return;
        }
         
        var nTrs = $('#mainT tbody tr');
        var iColspan = nTrs[0].getElementsByTagName('td').length;
        var sLastGroup = "";
        for ( var i=0 ; i<nTrs.length ; i++ )
        {
            var iDisplayIndex = oSettings._iDisplayStart + i;
            var sGroup = oSettings.aoData[ oSettings.aiDisplay[iDisplayIndex] ]._aData[0];
            if ( sGroup != sLastGroup )
            {
                var nGroup = document.createElement( 'tr' );
                var nCell = document.createElement( 'td' );
                nCell.colSpan = iColspan;
                nCell.className = "group";
                nCell.innerHTML = sGroup;
                nGroup.appendChild( nCell );
                nTrs[i].parentNode.insertBefore( nGroup, nTrs[i] );
                sLastGroup = sGroup;
            }
        }
    },
    "aoColumnDefs": [
        {"bSortable": false, "aTargets": [ 0 ] },
        { "bVisible": false, "aTargets": [ 0 ] }
    ],
    "aaSorting": [[1, 'asc']],
     "aLengthMenu": [
        [5, 15, 20, -1],
        [5, 15, 20, "All"] // change per page values here
    ],
    // set the initial value
    "iDisplayLength": 10,
    // set the initial value
    "iDisplayLength": 10,
    "sPaginationType": "bootstrap",
    "oLanguage": {
         "sSearch": "Buscar:",
        "sLengthMenu": "_MENU_ ",
        "oPaginate": {
            "sPrevious": "Siguiente",
            "sNext": "Anterior",
        }
    },
});

// jQuery('#mainT_wrapper .dataTables_filter input').addClass("form-control input-small input-inline"); // modify table search input
jQuery('#mainT_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
jQuery('#mainT_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
 

