$(document).ready(function(){
    /**
     * Delete alert
     * @param parameter to delete
     */
     deleteMethod =  function (slug) {
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location = window.location.pathname+'/delete/'+slug;
            }
        });
    }
    
    /**
     *  All About Search
     */
    $('#searchField').prop('selectedIndex',0); // Reset Search Select
    var searchItems = "&nbsp;"+"disableed";
    var countSelect = 0;
    $("select").change(function(){
        var newField = '&nbsp' + $(this).val() + '&nbsp';
        if(newField != null && newField != ""){
            var name = $(this).val();
            var placeholder = $("#searchField option:selected").text();
            var html = "<div style=\"margin: 4px 0;\" class=\"col-md-2\">\n" +
            "<input id='search' type=\"text\" name=\"" + name + "\" placeholder=\"" + placeholder + "\" class=\"form-control\">\n"  +
            "</div>";
            if(searchItems.indexOf(newField) == -1){
                countSelect = countSelect + 1;
                $(".search-field").append(html);
                $("#searchForm").show();
                $("#searchButton").show();
                searchItems = searchItems + newField + '&nbsp;';
                if (countSelect > 5) {
                    $("#searchButton").css({
                        //'margin-left': '5px',
                        //'margin-top': '5px'
                    });
                }
            }
        }
    });
    /*
    * Avro Bangla
    */

    $('input[type=text], input[type=number], input[type=email], input[type=search]').focus(function(){
        if ($(this).hasClass('avro_bn')) {
            $('.lang_pen').text('বাংলা ');
            $('.lang_pen_parent').show();
        }else{
            $('.lang_pen').text('Eng ');
            $('.lang_pen_parent').show();
        } 
        $(this).blur(function(){
            $('.lang_pen_parent').hide();
        });
    });
    $('textarea').focus(function(){
        if ($(this).hasClass('avro_bn')) {
            $('.lang_pen').text('বাংলা ');
            $('.lang_pen_parent').show();
        }else{
            $('.lang_pen').text('Eng ');
            $('.lang_pen_parent').show();
        } 
        $(this).blur(function(){
            $('.lang_pen_parent').hide();
        });
    });


    
    // alert($('h1').children('i').attr('class'));
    $(window).scroll(function(){
        if ($(window).width() >= 768) {
            if ($(window).scrollTop() > $('.app-header').height() + $('.card-header').height() + $('.app-title').height() + parseInt($('.app-title').css('margin-bottom'))) {
                $('.app-nav_custom_item').html('<i class="'+$('h1').children('i').attr('class')+'"></i>'+$('.card-header .row .col-md-6 h2').text());
            } else {
                $('.app-nav_custom_item').text('');
            }
        }
    });
    
});
