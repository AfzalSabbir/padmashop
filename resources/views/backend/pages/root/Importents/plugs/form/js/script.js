$(document).ready(function() {
    $("div.form_row").on("focus", ".form_input", function(){
        var lbl = $(this).closest("div.form_row").find("label");
        lbl.addClass("text_none");
    });

    $("div.form_row").on("blur", ".form_input", function(){
        var txt = $(this).val();
        var lbl = $(this).closest("div.form_row").find("label");
        
        if(txt.trim() === ""){lbl.removeClass("text_none");}
        $("input[type='reset']").click(function(){lbl.removeClass("text_none");});
    });
});