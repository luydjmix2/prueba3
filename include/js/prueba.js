/* 
 hoja de js endonde se realizan los proceso de js para mi prueba.
 */
/* 
 Created on : 12/11/2019, 03:36:54 PM
 Author     : Luis suarez
 */
$(document).ready(function (e) {
//    alert('hola mundo');

    $.ajax({
        type: "POST",
        url: '/controller/controllerAjax.php',
        data: {"paso": "paso1"}
    }).done(function (data, textStatus, jqXHR) {
        var obj = $.parseJSON(data);
        var result = [];

        if (obj.success != 'false') {
            $('#paso').val('paso2');
            $('#sesion').val(obj.result.sessionName);
            $("#ejecuta").prop('disabled', false);
        } else {
            console.log('hay un error en la comunicacion por favor refreque u pagina y intente de nuevo')
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        if (console && console.log) {
            console.log("La solicitud a fallado: " + textStatus);
        }
    });



    $('#prueba').submit(function (eForm) {
        eForm.preventDefault();
//        console.log($(this).serialize());
        $.ajax({
            type: "POST",
            url: '/controller/controllerAjax.php',
            data: $(this).serialize()
        }).done(function (data, textStatus, jqXHR) {
            var obj = $.parseJSON(data);

            if (obj.success != 'false') {
                console.log(obj);
                var conTabla = '';
                
                $.each(obj.result, function (key, value) {
//                    console.log(key + ": " + value);
                    var trIn = '<tr>';
                    var idH = '';
                    var contact_noH ='';
                    var lastnameH = '';
                    var createdtimeH='';
                    
                    $.each(value, function (keyB, valueB) {
                        console.log(keyB + ": " + valueB);
                        if (keyB === 'id') {
                            idH += '<td>' + valueB + '</td>';
                        }
                        if (keyB === 'contact_no'){
                            contact_noH += '<td>' + valueB + '</td>';
                        }
                        if (keyB === 'lastname') {
                            lastnameH += '<td>' + valueB + '</td>';
                        }
                        if (keyB === 'createdtime') {
                            createdtimeH += '<td>' + valueB + '</td>';
                        }                        
                    });
                   var trEn = '</tr>';
                    conTabla += trIn+idH+contact_noH+lastnameH+createdtimeH+trEn;
                });
                $('#contenTabla').html(conTabla);
                $('.reporte').show('');
            } else {
                console.log('hay un error en la comunicacion por favor refreque u pagina y intente de nuevo')
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud a fallado: " + textStatus);
            }
        });
    });

});
