	jQuery(document).ready(function() {
    jQuery("#datepicker").datepicker({
    beforeShowDay: function(date) {
        var result = [true, '', null];
        var matching = jQuery.grep(events, function(event) {
            return event.Date.valueOf() === date.valueOf();
        });
        
        if (matching.length) {
            result = [true, 'highlight', null];
        }
        return result;
    },
    onSelect: function(dateText) {
        var date,
            selectedDate = new Date(dateText),
            i = 0,
            event = null;
        
        while (i < events.length && !event) {
            date = events[i].Date;

            if (selectedDate.valueOf() === date.valueOf()) {
                event = events[i];
            }
            i++;
        }
        if (event) {
            alert(event.Title);
        }
    }
});

		jQuery( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
		jQuery( "#dialog" ).dialog();

    jQuery('#sortTable').DataTable();
    jQuery("#browser").treeview();
    /*th = jQuery('#sortTable');
    // setInterval(function (argument) {
    //     th = jQuery('#sortTable tr').size();
    //     alert(th);
    // },5000)
    ar = getTableData(th);
    function getTableData(table)
    {
        var data = [];
        table.find('tr').each(function (rowIndex, r) {
            var cols = [];
            jQuery(this).find('th,td').each(function (colIndex, c) {
                cols.push(c.textContent);
               // jQuery("input[type=hidden][name='sendQuery']").val()
            });
            data.push(cols);
            
        });

        furl = document.location.origin + '/businesssetup/index.php/component/businessservices/?task=genCsv';
   /*     jQuery.ajax({
            url: furl,
            type: 'POST',
            data: {csvData: data},
        })
        .done(function() {
            jQuery("#csvFrame").attr('src', 'downloadFileURL');
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    */
//     var options = {
//    url: furl,//replace with your request url
//    type: "POST",//replace with your request type
//    data: {csvData: data},//see above
//    context: document.body,//replace with your contex
//    success: function(data){
//     if (data) {
//         if (data.path) {
//                     //Create an hidden iframe, with the 'src' attribute set to the created ZIP file.
//             var dlif = $('<iframe/>',{'src':data.path}).hide();
//             //Append the iFrame to the context
//             this.append(dlif);
//         } else if (data.error) {
//             alert(data.error);
//         } else {
//             alert('Something went wrong'+data);
//         }
//     }
// }
// };
// jQuery.ajax(options);
//     }

});