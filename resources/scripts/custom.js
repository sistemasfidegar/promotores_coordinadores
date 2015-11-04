$(function(){
			
    $('.checkall').click(
        function(){
            $(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));   
        }
        );

								
    //sortable, portlets
    $(".column").sortable({
        connectWith: '.column'
    });
				
    $(".sort").sortable({
        connectWith: '.sort'
    });
				

    $(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
    .find(".portlet-header")
    .addClass("ui-widget-header ui-corner-all")
    .prepend('<span class="ui-icon ui-icon-circle-arrow-s"></span>')
    .end()
    .find(".portlet-content");

    $(".portlet-header .ui-icon").click(function() {
        $(this).toggleClass("ui-icon-minusthick");
        $(this).parents(".portlet:first").find(".portlet-content").toggle();
    });

    $(".column").disableSelection();			
				

	
    // Tabs
    $('#tabs').tabs();
	
    // Dialog			
    $('#dialog').dialog({
        autoOpen: false,
        width: 500,
        buttons: {
            "Ok": function() { 
                $(this).dialog("close"); 
            }, 
            "Cancel": function() { 
                $(this).dialog("close"); 
            } 
        }
    });
				
    // Dialog Link
    $('#dialog_link').click(function(){
        $('#dialog').dialog('open');
        return false;
    });
    
    jQuery(function($){
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '&#x3C;Ant',
            nextText: 'Sig&#x3E;',
            currentText: 'Hoy',
            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
            'Jul','Ago','Sep','Oct','Nov','Dic'],
            dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);
    });
    // Datepicker
    $('.datepicker').datepicker({
        inline: true,
        buttonImage: "resources/images/calendar.jpg"
    });
		 
				
    //hover states on the static widgets
    $('#dialog_link, ul#icons li').hover(
        function() {
            $(this).addClass('ui-state-hover');
        }, 
        function() {
            $(this).removeClass('ui-state-hover');
        }
        );
            
    $( "button, .button").button();
    
    
    $( "#generic-dialog" ).dialog({
        autoOpen: false,
        resizable: false,
        height:150,
        width: 350,
        modal: true,
        buttons: {
            "Aceptar": function() {
                $( this ).dialog( "close" );
            }
        }
    });
    
    $( ".xxbutton" ).button({
        icons: {
            primary: "ui-icon-close"
        },
        text: false
    });
    $( ".findbutton" ).button({
        icons: {
            primary: "ui-icon-search"
        },
        text: false
    });
    
    
});

function altenativeAlert(options)
{
    
    $("#generic-dialog-content").html(options.content);
    if ('buttons' in options){
        $("#generic-dialog").dialog( "option", "buttons",options.buttons );
    }    
    if ('height' in options){
        $("#generic-dialog").dialog( "option", "height",options.height );
    }  
    if ('width' in options){
        $("#generic-dialog").dialog( "option", "width",options.width );
    }
    if ('dialogclose' in options){        
        $( "#generic-dialog" ).on( "dialogclose",options.dialogclose );         
    }
    $("#generic-dialog").dialog("open");
}

